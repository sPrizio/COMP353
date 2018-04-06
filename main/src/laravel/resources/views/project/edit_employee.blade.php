@extends('layouts.app')

@section('title', 'Edit Project Employee')

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Edit Project Employee
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/project/{{ $id }}/employee/{{ $employee->employee_id }}/edit" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="hours" name="hours" type="number" value="{{ $employee->hours_worked }}" required>
                    <label for="hours">Hours Worked</label>
                </div>
            </div>
            <div class="align-right">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Edit
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection