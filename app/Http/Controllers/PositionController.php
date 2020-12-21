<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    protected $position_model;
    protected $department_model;
    public function __construct(Position $position, Department $department)
    {
        $this->middleware('auth:admin');
        $this->position_model = $position;
        $this->department_model = $department;

    }//end of constructor

    public function index(Request $request)
    {
        $departments = $this->department_model::get();
        //For Search
        $positions = $this->position_model::when($request->search, function ($q) use ($request) {

            return $q->where('title', '%' . $request->search . '%');

        })->when($request->department_id, function ($q) use ($request) {

            return $q->where('department_id', $request->department_id);

        })->latest()->paginate(5);



        return view('dashboard.positions.index', compact('departments', 'positions'));
    }//end of index

    public function create()
    {
        $departments = $this->department_model::get();
        return view('dashboard.positions.create', compact('departments'));
    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:positions',
            'department_id' => 'required'
        ]);

        try{
            $this->position_model::create([
                'title' => $request->title,
                'department_id' => $request->department_id
            ]);
            session()->flash('success', __('Position Added Successfully'));
            return redirect()->route('positions.index');
        } catch(\Exception $ex){
            session()->flash('success', __('Try Again'));
            return redirect()->route('positions.index');
        }//end of try
    }//end of store

    public function destroy($id)
    {
        $position = $this->position_model::findOrFail($id);
        try{
            $position->delete();
            session()->flash('success', __('Position Deleted Successfully'));
            return redirect()->route('positions.index');
        } catch(\Exception $ex){
            session()->flash('success', __('Try Again'));
            return redirect()->route('positions.index');
        }//end of try
    }//end of destroy
}//end of controller
