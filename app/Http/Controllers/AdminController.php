<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }//end of construct

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees_count = Employee::count();
        $departments_count = Department::count();
        $positions_count = Position::count();

        return view('dashboard.welcome', compact('employees_count', 'departments_count', 'positions_count'));
    }//end of index

}//end of controller

