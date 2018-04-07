@extends('layouts.app')

@section('title', 'Project: ' . $project->name)

@section('content')
    <div class="row">
        <div class="col s10">
        <span class="card-title">
            {{ $project->name }}
        </span>
        </div>
        <div class="col s1 align-right">
            <a href='{{ URL("/project/{$project->id}/edit") }}' class="waves-effect waves-dark btn">
                <i class="material-icons">mode_edit</i>
            </a>
        </div>
        <div class="col s1 align-right">
            <form action="/project/{{ $project->id }}/delete" method="post">
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
                    ID: {{ $project->id }}
                </p>
                <p class="attribute">
                    Project Name: {{ $project->name }}
                </p>
                <p class="attribute">
                    @if (is_null($department))
                        Department: None
                    @else
                        Department: <a
                                href='{{ URL("/department/view/{$department->id}") }}'>{{ $department->name }}</a>
                    @endif
                </p>
                <p class="attribute">
                    Location: <a
                            href='{{ URL("/location/view/{$project->location_id}") }}'>{{ Helper::getLocationName($project->location_id, $locations) }}</a>
                </p>
                <p class="attribute">
                    Assigned Employees: {{ $sum_employees }}
                </p>
                <p class="attribute">
                    Total Hours Worked: {{ $sum_hours }}
                </p>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col s6">
            <span class="card-title">
                Employees
            </span>
        </div>
        <div class="col s6 align-right">
            <a href="/project/{{ $project->id }}/employee/create" class="waves-effect waves-dark btn">
                Add Employee
            </a>
        </div>
    </div>
    <hr/>
    <br/>
    @if (count($employees))
        <table class="responsive-table highlight centered">
            <thead>
            <tr>
                <th>ID</th>
                <th class="align-left">Name</th>
                <th class="align-left">Address</th>
                <th>Salary</th>
                <th>Hours Worked</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td class="align-left">
                        <a href='{{ URL("employee/view/{$employee->id}") }}'>{{ $employee->first_name }} {{ $employee->last_name }}</a>
                    </td>
                    <td class="align-left">{{ $employee->address }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->hours_worked }}</td>
                    <td>
                        <a href='{{ URL("/project/{$project->id}/employee/{$employee->id}/edit") }}'>
                            <i class="material-icons">mode_edit</i>
                        </a>
                    </td>
                    <td>
                        <form action="/project/{{ $project->id }}/employee/{{ $employee->employee_id }}/delete" method="post">
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
            This project does not have any assigned employees.
        </p>
    @endif
@endsection