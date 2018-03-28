@extends('layouts.app')

@section('title', 'Project List')

@section('content')
    <div class="row">
        <div class="col s6">
        <span class="card-title">
            Project List
        </span>
        </div>
        <div class="col s6 align-right">
            <a href="/project/create" class="waves-effect waves-dark btn">
                Add Project
            </a>
        </div>
    </div>
    <hr/>
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
                    <a href='{{ URL("/location/view/{$project->location_id}") }}'>{{ Helper::getLocationName($project->location_id, $locations) }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection