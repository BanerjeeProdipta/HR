<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Session;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid_department = request()->validate([
            'name' => 'required|unique:departments,name',
            'size' => 'required|integer',
            ]);
        $department = Department::create(request(['name', 'size']));
        Session::flash('success', 'Saved!');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        // $employees = $department->employees->first()->get();
        $employees = Employee::where('department_id', $department);//redundent maybe
        $emp_count = $department->employees->count();
        return view('departments.show', compact('department', 'employees', 'emp_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('departments.edit',compact('department'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $valid_department = request()->validate([
            'name' => 'required|unique:departments,name,'.$department->id,
            'size' => 'required|integer'
            ]);
        $department->update($valid_department);
        Session::flash('success', 'Updated!');
        return redirect('home');  
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        Session::flash('success', 'Deleted!');
        return redirect('home');  
        
    }

}
