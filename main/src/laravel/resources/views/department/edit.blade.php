@extends('layouts.app')

@section('title', 'Edit ' . $department->name)

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Edit {{ $department->name }}
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/department/{{ $department->id }}/edit" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="name" name="name" type="text" value="{{ $department->name }}" required>
                    <label for="name">Department Name</label>
                </div>
                <div class="input-field col s6">
                    <select name="manager">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                        @endforeach
                    </select>
                    <label>Manager</label>
                </div>
                <div class="input-field col s6">
                    <input id="start" name="start" type="text" value="{{ $department->start_date }}" required>
                    <label for="start">Manager Start Date</label>
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