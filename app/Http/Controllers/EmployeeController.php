<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use App\Department;
use Illuminate\Http\Request;
use Session;

class EmployeeController extends Controller
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
    public function create(Department $department)
    {
        return view('employees.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Department $department)
    {
        $valid_employee = request()->validate([
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:employees,email'
        ]);
        $employee = Employee::create(request(['department_id', 'name', 'email']));
        Session::flash('success', 'Saved!');
        return redirect()->route('dept.show',compact('department'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department, Employee $employee)
    {
        $alldept = Department::all();
        return view('employees.edit', compact('employee','department','alldept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department, Employee $employee)
    {
        $valid_employee = request()->validate([
            'department_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
        ]);
        $employee->update($valid_employee);
        Session::flash('success', 'Updated!');
        return redirect()->route('dept.show', compact('department'));  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department,Employee $employee)
    {
        $employee->delete();  
        Session::flash('success', 'Deleted!');
        return redirect()->route('dept.show', compact('department'));  
    }
    
}
