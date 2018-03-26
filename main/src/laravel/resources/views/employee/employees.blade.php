@extends('layouts.app')

@section('title', 'Employee List')

@section('content')
<table class="responsive-table highlight centered">
    <thead>
    <tr>
        <th>ID</th>
        <th class="align-left">Name</th>
        <th>SIN</th>
        <th>DOB</th>
        <th class="align-left">Address</th>
        <th>Phone</th>
        <th>Salary ($)</th>
        <th>Gender</th>
        <th class="align-left">Department</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td class="align-left">
                <a href='{{ URL("/employee/{$employee->id}") }}'>{{ $employee->first_name }} {{ $employee->last_name }}</a>
            </td>
            <td>{{ $employee->sin }}</td>
            <td>{{ $employee->date_of_birth }}</td>
            <td class="align-left">{{ $employee->address }}</td>
            <td>{{ $employee->phone }}</td>
            <td>{{ $employee->salary }}</td>
            <td>{{ $employee->gender }}</td>
            <td class="align-left">
            <a href='{{ URL("/department/{$employee->department_id}") }}'>{{ Helper::getDepartmentName($employee->department_id, $departments) }}</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection