@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Employee') }}</div>
                <div class="card-body">
                    <form method="POST" action="/dept/{{$department->id}}/emp/{{$employee->id}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
                            <div class="col-md-6">
                                <select class ="form-control @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                                    @foreach ($alldept as $dept)
                                    <option value="{{$dept->id }}" {{ old('department_id', $employee->department_id) == $dept->id ? 'selected' : '' }}>{{ $dept->name}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ $employee -> name }}" 
                                required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="email" 
                                type="text" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ $employee -> email }}" 
                                required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <a href={{ route('dept.show',[$department->id]) }} class="btn btn-danger">{{ __('Cancle') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
