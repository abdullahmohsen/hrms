<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;


class EmployeeController extends Controller
{
    protected $employee_model;
    protected $positions_model;
    public function __construct(Employee $employee, Position $positions)
    {
        $this->middleware('auth:admin');
        $this->employee_model = $employee;
        $this->positions_model = $positions;
    }//end of constructor

    public function index(Request $request)
    {
        //For Search
        $employees = $this->employee_model::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);

        return view('dashboard.employees.index', compact('employees'));

    }//end of index

    public function create()
    {
        $positions = $this->positions_model::get();
        $employee_supervisors = $this->employee_model::get();
        return view('dashboard.employees.create', compact('positions', 'employee_supervisors'));
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:employees',
            'password' => 'required|confirmed',
            'nationality' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'avatar' => 'image',
            'resume' => 'nullable|mimes:pdf',
            'marital_status' => 'required',
            'military_service' => 'required',
            'passport_number' => 'required',
            'joining_date' => 'required|date',
            'mobile' => 'required',
            'position_id' => 'required',
            // 'supervisor_employee_id' => 'exits:employees, supervisor_employee_id',
            'basic_salary' => 'required',
            'education' => 'required',
        ]);

        $request_data = $request->except(['password', 'password_confirmation', 'image', 'resume']);
        $request_data['password'] = bcrypt($request->password);
        $request_data['admin_id'] = Auth::user()->id;

        if ($request->hasFile('resume')) {
            $filenameWithExt = $request->file('resume')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('resume')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'.'.$extension;
            $path = $request->file('resume')->move(public_path('uploads/employee_resumes'), $fileNameToStore);
            $request_data['resume'] = $fileNameToStore;
        }//end of resume

        if ($request->avatar) {

            Image::make($request->avatar)
                ->resize(130, 130)
                ->save(public_path('uploads/employee_avatars/' . $request->avatar->hashName()));

            $request_data['avatar'] = $request->avatar->hashName();

        }else {
            if ($request->gender == 'male') {
                $request->avatar = 'male.png';
            }else {
                $request->avatar = 'female.png';
            }
            $request_data['avatar'] = $request->avatar;
        }//end of image

        $this->employee_model::create($request_data);

        session()->flash('success', __('Employee Added Successfully'));
        return redirect()->route('employees.index');

    }//end of store

    public function show($id)
    {
        $employee = $this->employee_model::where('id', $id)->first();
        $employee_supervisor = $this->employee_model::where('id', $employee->supervisor_employee_id)->first();
        $position = $this->positions_model::get();

        // $employees = $this->employee_model::get(['date_of_birth']);
        // dd($employees);
        // $years = \Carbon\Carbon::parse($employees)->age;


        return view('dashboard.employees.show', compact('employee', 'employee_supervisor', 'position'));
    }//end of show

    public function edit($id)
    {
        $employee = $this->employee_model::findOrFail($id);
        $positions = $this->positions_model::select('id', 'title')->get();
        $employee_supervisors = $this->employee_model::select('id', 'first_name')->get();
        return view('dashboard.employees.edit', compact('employee', 'positions', 'employee_supervisors'));
    }//end of user

    public function update(Request $request, Employee $employee)
    {
        // dd($request->all());

        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                Rule::unique('employees')->ignore($employee->id),
            ],
            'position_id' => 'required',
            'nationality' => 'required',
            'city' => 'required',
            'street' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'avatar' => 'image',
            'resume' => 'mimes:pdf',
            'marital_status' => 'required',
            'military_service' => 'required',
            'passport_number' => 'required',
            'joining_date' => 'required|date',
            'mobile' => 'required',
            'basic_salary' => 'required',
            'education' => 'required',
        ]);

        $request_data = $request->except(['image', 'resume']);

        // if ($request->hasFile('resume')) {

            if ($employee->resume) {
                unlink(public_path("uploads/employee_resumes/$employee->resume"));
            // }//end of deleted resume

            $filenameWithExt = $request->file('resume')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('resume')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'.'.$extension;
            $path = $request->file('resume')->move(public_path('uploads/employee_resumes'), $fileNameToStore);
            $request_data['resume'] = $fileNameToStore;
        }//end of resume


        if ($request->image) {

            if ($employee->avatar != 'female.png' && $employee->avatar != 'male.png') {
                Storage::disk('public_uploads')->delete('/employee_avatars/' . $employee->avatar);
            }//end of deleted image

            Image::make($request->avatar)
                ->resize(130, 130)
                ->save(public_path('uploads/employee_avatars/' . $request->avatar->hashName()));

            $request_data['avatar'] = $request->avatar->hashName();

        }//end of external if

        $user->update($request_data);

        session()->flash('success', __('Employee Updated Successfully'));

        return redirect()->route('dashboard.welcome');

    }//end of update

    public function destroy(Employee $employee)
    {
        if ($employee->avatar != 'female.png' && $employee->avatar != 'male.png') {
            Storage::disk('public_uploads')->delete('/employee_avatars/' . $employee->avatar);
        }//end of deleted image

        if ($employee->resume) {
            unlink(public_path("uploads/employee_resumes/$employee->resume"));
        }//end of deleted resume

        $employee->delete();
        session()->flash('success', __('Employee Deleted Successfully'));
        return redirect()->route('employees.index');

    }//end of destroy

}//end of controller
