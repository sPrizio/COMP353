@extends('layouts.app')

@section('title', 'Department: ' . $location->name)

@section('content')
    <div class="row">
        <div class="col s10">
        <span class="card-title">
            {{ $location->name }}
        </span>
        </div>
        <div class="col s1 align-right">
            <a href='{{ URL("/location/{$location->id}/edit") }}' class="waves-effect waves-dark btn">
                <i class="material-icons">mode_edit</i>
            </a>
        </div>
        <div class="col s1 align-right">
            <form action="/location/{{ $location->id }}/delete" method="post">
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
                    ID: {{ $location->id }}
                </p>
                <p class="attribute">
                    Name: {{ $location->name }}
                </p>
                <p class="attribute">
                    Address: {{ $location->address }}
                </p>
            </div>
        </div>
        <div class="col l6 m12 s12">
            <span class="attribute-category">
                Departments
            </span>
            <div class="attribute-container">
                @forelse($departments as $department)
                    <p class="attribute">
                        <a href='{{ URL("/department/view/{$department->id}") }}'>{{ Helper::getDepartmentName($department->id, $departments) }}</a>
                    </p>
                @empty
                    <p class="attribute">
                        This location does not have any departments.
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
                <th class="align-left">Department</th>
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
                        {{ Helper::getProjectDepartment($project->id) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="align-center">
            This location does not have any assigned projects.
        </p>
    @endif
@endsection