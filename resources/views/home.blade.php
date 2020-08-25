@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="font-weight-bold">
                    @if (count($count['dept_count']) > 1)
                        {{ count($count['dept_count'])}} Departments
                        @if (count($count['emp_count']) > 1)
                            {{ count($count['emp_count'])}} Employees
                        @elseif(count($count['emp_count']) === 1)
                            {{"1 Employee"}}
                        @else
                            {{"No Employee"}}
                        @endif
                    @elseif(count($count['dept_count']) === 1)
                        {{"1 Department"}}
                        @if (count($count['emp_count']) > 1)
                            {{ count($count['emp_count'])}} Employees
                        @elseif(count($count['emp_count']) === 1)
                            {{"1 Employee"}}
                        @else
                            {{"No Employee"}}
                        @endif
                    @else
                        {{"No Department Found!"}}
                    @endif
                </h4>
                    <a href="{{ route('dept.create') }}" class="btn btn-success">Create Department</a>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr class="d-flex">
                            <th class="col-2">Department ID</th>
                            <th class="col-3">Department Name</th>
                            <th class="col-2">Employee Count</th>
                            <th class="col-2">Department Size</th>
                            <th class="col-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                        <tr class="d-flex">
                            
                                <td class="col-2"><strong>{{ $department->id }}</strong></td>
                                <td class="col-3">{{ $department->name }}</td>
                                <td class="col-2">{{ $department->employees->count() }}</td>
                                <td class="col-2">{{ $department->size }}</td>
                            
                            <td class="col-3">
                                <a href="{{ route('dept.show',[ $department -> id ]) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('dept.edit',[ $department -> id ]) }}" class="btn btn-warning">Update</a>
                                <form action="{{ route('dept.delete',[ $department -> id ]) }}" method="POST" style="float:right">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="if (!confirm('Are you sure?')) { return false }">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
                     
@endsection
