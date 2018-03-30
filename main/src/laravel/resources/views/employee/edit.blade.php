@extends('layouts.app')

@section('title', 'Edit ' . $employee->first_name . ' ' . $employee->last_name)

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Edit {{ $employee->first_name }} {{ $employee->last_name }}
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/employee/{{ $employee->id }}/edit" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" name="first_name" type="text" value="{{ $employee->first_name }}" required>
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" name="last_name" type="text" value="{{ $employee->last_name }}" required>
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="sin" name="sin" type="number" value="{{ $employee->sin }}" required>
                    <label for="sin">SIN (exactly 9 digits)</label>
                </div>
                <div class="input-field col s6">
                    <input id="dob" name="dob" type="text" value="{{ $employee->date_of_birth }}" required>
                    <label for="dob">Date of Birth (YYYY-MM-DD)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="address" name="address" type="text" value="{{ $employee->address }}" required>
                    <label for="address">Address</label>
                </div>
                <div class="input-field col s6">
                    <input id="phone" name="phone" type="tel" value="{{ $employee->phone }}" required>
                    <label for="phone">Phone ###-###-####</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="salary" name="salary" type="number" value="{{ $employee->salary }}" required>
                    <label for="salary">Salary</label>
                </div>
                <div class="input-field col s6">
                    <p>
                        <label>
                            <input name="gender" type="radio" value="male" />
                            <span>Male</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="gender" type="radio" value="female" />
                            <span>Female</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="department">
                        @foreach ($departments as $department)
                            <option value="{{ $department->name }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    <label>Department</label>
                </div>
            </div>
            <div class="align-right">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Submit
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection