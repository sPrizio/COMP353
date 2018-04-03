@extends('layouts.app')

@section('title', 'Supervisor: ' . $supervisor->first_name . ' ' . $supervisor->last_name)

@section('content')
    <div class="row">
        <div class="col s10">
        <span class="card-title">
            {{ $supervisor->first_name }} {{ $supervisor->last_name }}
        </span>
        </div>
        <div class="col s2 align-right">
            <form action="/supervisor/{{ $supervisor->id }}/delete" method="post">
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
                    First Name: {{ $supervisor->first_name }}
                </p>
                <p class="attribute">
                    Last Name: {{ $supervisor->last_name }}
                </p>
                <p class="attribute">
                    Salary: ${{ $supervisor->salary }}
                </p>
                <p class="attribute">
                    Department: <a
                            href='{{ URL("/department/view/{$supervisor->department_id}") }}'>{{ Helper::getDepartmentName($supervisor->department_id, $departments) }}</a>
                </p>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col s6">
        <span class="card-title">
            Subordinates
        </span>
        </div>
        <div class="col s6 align-right">
            <a href='{{ URL("/supervisor/{$supervisor->id}/employee/create") }}' class="waves-effect waves-dark btn">
                Add Employee
            </a>
        </div>
    </div>

    <hr/>
    <br/>
    @if (count($subordinates))
        <table class="responsive-table highlight centered">
            <thead>
            <tr>
                <th>ID</th>
                <th class="align-left">Name</th>
                <th>SIN</th>
                <th>DOB</th>
                <th>Gender</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($subordinates as $subordinate)
                <tr>
                    <td>{{ $subordinate->id }}</td>
                    <td class="align-left"><a href='{{ URL("/employee/view/{$subordinate->id}") }}'>{{ $subordinate->first_name }} {{ $subordinate->last_name }}</a></td>
                    <td>{{ $subordinate->sin }}</td>
                    <td>{{ $subordinate->date_of_birth }}</td>
                    <td>{{ $subordinate->gender }}</td>
                    <td>
                        <form action="/supervisor/{{ $supervisor->id }}/employee/{{ $subordinate->id }}/delete" method="post">
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
            This supervisor does not have any assigned employees.
        </p>
    @endif
@endsection