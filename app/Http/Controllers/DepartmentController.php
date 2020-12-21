<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $department_model;
    public function __construct(Department $department)
    {
        $this->middleware('auth:admin');
        $this->department_model = $department;
    }//end of constructor

    public function index(Request $request)
    {
        //For Search
        $departments = $this->department_model::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('title', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(5);

        return view('dashboard.departments.index', compact('departments'));
    }//end of index

    public function create()
    {
        return view('dashboard.departments.create');
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:departments',
        ]);

        try{
            $this->department_model::create([
                'title' => $request->title,
            ]);
            session()->flash('success', __('Department Added Successfully'));
            return redirect()->route('departments.index');
        } catch(\Exception $ex){
            session()->flash('success', __('Try Again'));
            return redirect()->route('departments.index');
        }//end of try
    }

    public function destroy($id)
    {
        $department = $this->department_model::findOrFail($id);
        try{
            $department->delete();
            session()->flash('success', __('Department Deleted Successfully'));
            return redirect()->route('departments.index');
        } catch(\Exception $ex){
            session()->flash('success', __('Try Again'));
            return redirect()->route('departments.index');
        }//end of try
    }//end of destroy
}
