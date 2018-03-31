@extends('layouts.app')

@section('title', 'Employee: ' . $employee->first_name . ' ' . $employee->last_name)

@section('content')
    <div class="row">
        <div class="col s10">
        <span class="card-title">
            {{ $employee->first_name }} {{ $employee->last_name }}
        </span>
        </div>
        <div class="col s1 align-right">
            <a href='{{ URL("/employee/{$employee->id}/edit") }}' class="waves-effect waves-dark btn">
                <i class="material-icons">mode_edit</i>
            </a>
        </div>
        <div class="col s1 align-right">
            <form action="/employee/{{ $employee->id }}/delete" method="post">
                <button class="waves-effect waves-dark btn" type="submit">
                    <i class="material-icons">delete</i>
                </button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
    <hr/>
    <br/>

    <div class="row">
        <div class="col l6 m12 s12">
        <span class="attribute-category">
            General
        </span>
            <div class="attribute-container">
                <p class="attribute">
                    First Name: {{ $employee->first_name }}
                </p>
                <p class="attribute">
                    Last Name: {{ $employee->last_name }}
                </p>
                <p class="attribute">
                    Social Insurance Number: {{ $employee->sin }}
                </p>
                <p class="attribute">
                    Date of Birth: {{ $employee->date_of_birth }}
                </p>
            </div>
        </div>
        <div class="col l6 m12 s12">
        <span class="attribute-category">
            Employment Information
        </span>
            <div class="attribute-container">
                <p class="attribute">
                    Employee ID: {{ $employee->id }}
                </p>
                <p class="attribute">
                    Salary: ${{ $employee->salary }}
                </p>
                <p class="attribute">
                    Gender: {{ Helper::getFullGender($employee->gender) }}
                </p>
                <p class="attribute">
                    Department: <a
                            href='{{ URL("/department/view/{$employee->department_id}") }}'>{{ Helper::getDepartmentName($employee->department_id, $departments) }}</a>
                </p>
            </div>
        </div>
        <div class="col l6 m12 s12">
        <span class="attribute-category">
            Contact Information
        </span>
            <div class="attribute-container">
                <p class="attribute">
                    Address: {{ $employee->address }}
                </p>
                <p class="attribute">
                    Phone: {{ $employee->phone }}
                </p>
            </div>
        </div>
        <div class="col l6 m12 s12">
        <span class="attribute-category">
            Work Information
        </span>
            <div class="attribute-container">
                <p class="attribute">
                    @if (is_null($supervisor))
                        Supervisor: None
                    @else
                        Supervisor: <a
                                href='{{ URL("/employee/view/{$supervisor->id}") }}'>{{ $supervisor->first_name }} {{ $supervisor->last_name }}</a>
                    @endif
                </p>
                @if (is_null($project))
                    <p class="attribute">
                        Assigned Project: None
                    </p>
                    <p class="attribute">
                        Hours Worked: 0
                    </p>
                @else
                    <p class="attribute">
                        Assigned Project: <a href='{{ URL("/project/view/{$project->id}") }}'>{{ $project->name }}</a>
                    </p>
                    <p class="attribute">
                        Hours Worked: {{ $project->hours_worked }}
                    </p>
                @endif
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col s6">
        <span class="card-title">
            Dependents
        </span>
        </div>
        <div class="col s6 align-right">
            <a href='{{ URL("/employee/{$employee->id}/dependent/create") }}' class="waves-effect waves-dark btn">
                Add Dependent
            </a>
        </div>
    </div>

    <hr/>
    <br/>
    @if (count($dependents))
        <table class="responsive-table highlight centered">
            <thead>
            <tr>
                <th class="align-left">Name</th>
                <th>SIN</th>
                <th>DOB</th>
                <th>Gender</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dependents as $dependent)
                <tr>
                    <td class="align-left">{{ $dependent->first_name }} {{ $dependent->last_name }}</td>
                    <td>{{ $dependent->sin }}</td>
                    <td>{{ $dependent->date_of_birth }}</td>
                    <td>{{ $dependent->gender }}</td>
                    <td>
                        <a href='{{ URL("/dependent/{$dependent->id}/edit") }}'>
                            <i class="material-icons">mode_edit</i>
                        </a>
                    </td>
                    <td>
                        <form action="/dependent/{{ $dependent->id }}/delete" method="post">
                            <button class="waves-effect waves-dark btn" type="submit">
                                <i class="material-icons">delete</i>
                            </button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="align-center">
            This employee has not listed any dependents.
        </p>
    @endif
@endsection