@extends('layouts.app')

@section('title', 'Add Dependent')

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Add Dependent
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/employee/{{ $employee->id }}/dependent/create" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" name="first_name" type="text" required>
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" name="last_name" type="text" required>
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="sin" name="sin" type="number" required>
                    <label for="sin">SIN (exactly 9 digits)</label>
                </div>
                <div class="input-field col s6">
                    <input id="dob" name="dob" type="text" required>
                    <label for="dob">Date of Birth (YYYY-MM-DD)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <p>
                        <label>
                            <input name="gender" type="radio" value="male"/>
                            <span>Male</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="gender" type="radio" value="female"/>
                            <span>Female</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="align-right">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Add
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection