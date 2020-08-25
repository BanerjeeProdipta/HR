<?php

namespace App\Http\Controllers;
use App\Department;
use App\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = [
            'dept_count'=> Department::all(),
            'emp_count'=> Employee::all()
        ];
        $departments = Department::all();
        return view('home', compact('departments','count'));
    }
}
