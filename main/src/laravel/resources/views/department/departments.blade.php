@extends('layouts.app')

@section('title', 'Department List')

@section('content')
    <div class="row">
        <div class="col s6">
        <span class="card-title">
            Department List
        </span>
        </div>
        <div class="col s6 align-right">
            <a href="/department/create" class="waves-effect waves-dark btn">
                Add Department
            </a>
        </div>
    </div>
    <hr/>
    <table class="responsive-table highlight centered">
        <thead>
        <tr>
            <th>ID</th>
            <th class="align-left">Name</th>
            <th class="align-left">Manager</th>
            <th>Manager Start Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td class="align-left">
                    <a href='{{ URL("/department/view/{$department->id}") }}'>{{ $department->name }}</a>
                </td>
                <td class="align-left">
                    <a href='{{ URL("/employee/view/{$department->manager_id}") }}'>{{ Helper::getManagerName($department->manager_id, $employees) }}</a>
                </td>
                <td>{{ $department->manager_start_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection