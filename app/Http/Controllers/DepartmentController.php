<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    protected $department_model;
    public function __construct(Department $department)
    {
        $this->middleware('auth:admin');
        $this->department_model = $department;
    } //end of constructor

    public function index(Request $request)
    {
        //For Search
        $departments = $this->department_model::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('title', 'like', '%' . $request->search . '%');
            });
        })->latest()->paginate(5);

        return view('dashboard.departments.index', compact('departments'));
    } //end of index

    public function create()
    {
        return view('dashboard.departments.create');
    } //end of create

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|unique:departments',
            ]);

            $this->department_model::create([
                'title' => $request->title,
            ]);
            session()->flash('success', __('Department Added Successfully'));
            return redirect()->route('departments.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('Try Again'));
            return redirect()->route('departments.index');
        } //end of try
    }

    public function edit($id)
    {
        $department = $this->department_model::findOrFail($id);
        return view('dashboard.departments.edit', compact('department'));
    } //end of user

    public function update(Request $request, Department $department)
    {
        try {
            $request->validate([
                'title' => [
                    'required',
                    Rule::unique('departments')->ignore($department->id),
                ],
            ]);

            $department->update($request->all());
            session()->flash('success', __('Department Updated Successfully'));
            return redirect()->route('departments.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('Try Again'));
            return redirect()->route('departments.index');
        } //end of try
    }//end of update

    public function destroy($id)
    {
        try {
            $department = $this->department_model::findOrFail($id);
            $department->delete();
            session()->flash('success', __('Department Deleted Successfully'));
            return redirect()->route('departments.index');
        } catch (\Exception $ex) {
            session()->flash('error', __('Try Again'));
            return redirect()->route('departments.index');
        } //end of try
    } //end of destroy
}
