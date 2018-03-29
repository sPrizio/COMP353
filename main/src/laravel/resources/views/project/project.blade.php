@extends('layouts.app')

@section('title', 'Project: ' . $project->name)

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            {{ $project->name }}
        </span>
        </div>
        <div class="col s3 align-right">
            <a href='{{ URL("/project/{$project->id}/edit") }}' class="waves-effect waves-dark btn">
                <i class="material-icons">mode_edit</i>
            </a>
            <a href='{{ URL("/project/{$project->id}/delete") }}' class="waves-effect waves-dark btn">
                <i class="material-icons">delete</i>
            </a>
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
                    Department: <a href='{{ URL("/department/view/{$department->id}") }}'>{{ $department->name }}</a>
                </p>
                <p class="attribute">
                    Location: <a
                            href='{{ URL("/location/view/{$project->location_id}") }}'>{{ Helper::getLocationName($project->location_id, $locations) }}</a>
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