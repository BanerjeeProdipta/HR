@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="font-weight-bold">{{ $department->name}}: 
                        @if ($emp_count > 1)
                            {{ $emp_count}} Employees
                        @elseif($emp_count === 1)
                            {{"1 Employee"}}
                        @else
                            {{"No Employee"}}
                        @endif
                    </h4>
                    <a href="{{ route('emp.create',[ $department-> id ]) }}" class="btn btn-success">{{ __('Add Employee') }}</a>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr class="d-flex">
                            <th class="col-2">Employee ID</th>
                            <th class="col-4">Employee Name</th>
                            <th class="col-4">Employee Email</th>
                            <th class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($department->employees as $employee)
                        <tr class="d-flex">
                                <td class="col-2"><strong>{{ $employee->id }}</strong></td>
                                <td class="col-4">{{ $employee->name}}</td>
                                <td class="col-4">{{ $employee->email }}</td>
                            <td class="col-2">
                                    <a href="/dept/{{ $department->id }}/emp/{{ $employee->id }}/edit" class="btn btn-warning">{{ __('Update') }}</a>
                            <form action="/dept/{{ $department->id }}/emp/{{ $employee->id }}" method="POST" style="float:right">
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
