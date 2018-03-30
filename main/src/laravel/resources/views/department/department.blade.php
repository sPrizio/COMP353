@extends('layouts.app')

@section('title', 'Department: ' . $department->name)

@section('content')
    <div class="row">
        <div class="col s10">
        <span class="card-title">
            {{ $department->name }}
        </span>
        </div>
        <div class="col s1 align-right">
            <a href='{{ URL("/department/{$department->id}/edit") }}' class="waves-effect waves-dark btn">
                <i class="material-icons">mode_edit</i>
            </a>
        </div>
        <div class="col s1 align-right">
            <form action="/department/{{ $department->id }}/delete" method="post">
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
                    ID: {{ $department->id }}
                </p>
                <p class="attribute">
                    Department Name: {{ $department->name }}
                </p>
                <p class="attribute">
                    Manager: <a
                            href='{{ URL("/employee/view/{$department->manager_id}") }}'>{{ Helper::getManagerName($department->manager_id, $employee_list) }}</a>
                </p>
            </div>
        </div>
        <div class="col l6 m12 s12">
            <span class="attribute-category">
                Locations
            </span>
            <div class="attribute-container">
                @forelse($locations as $location)
                    <p class="attribute">
                        <a href='{{ URL("/location/view/{$location->id}") }}'>{{ $location->name }}</a>
                    </p>
                @empty
                    <p class="attribute">
                        This department does not have any locations.
                    </p>
                @endforelse
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col s6">
        <span class="card-title">
            Projects
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    @if (count($projects))
        <table class="responsive-table highlight centered">
            <thead>
            <tr>
                <th>ID</th>
                <th class="align-left">Name</th>
                <th class="align-left">Location</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td class="align-left">
                        <a href='{{ URL("/project/view/{$project->id}") }}'>{{ $project->name }}</a>
                    </td>
                    <td class="align-left">
                        {{ Helper::getLocationName($project->location_id, $locations) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="align-center">
            This department does not have any assigned projects.
        </p>
    @endif
    <br/>
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
                <th class="align-left">Name</th>
                <th>SIN</th>
                <th>DOB</th>
                <th class="align-left">Address</th>
                <th>Phone</th>
                <th>Gender</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td class="align-left">
                        <a href='{{ URL("/employee/view/{$employee->id}") }}'>{{ $employee->first_name }} {{ $employee->last_name }}</a>
                    </td>
                    <td>{{ $employee->sin }}</td>
                    <td>{{ $employee->date_of_birth }}</td>
                    <td class="align-left">{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->gender }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="align-center">
            This department does not have any employees.
        </p>
    @endif
@endsection