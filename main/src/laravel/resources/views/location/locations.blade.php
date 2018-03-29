@extends('layouts.app')

@section('title', 'Location List')

@section('content')
    <div class="row">
        <div class="col s6">
        <span class="card-title">
            Location List
        </span>
        </div>
        <div class="col s6 align-right">
            <a href="/location/create" class="waves-effect waves-dark btn">
                Add Location
            </a>
        </div>
    </div>
    <hr/>
    <table class="responsive-table highlight centered">
        <thead>
        <tr>
            <th>ID</th>
            <th class="align-left">Name</th>
            <th class="align-left">Address</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td class="align-left">
                    <a href='{{ URL("/location/view/{$location->id}") }}'>{{ $location->name }}</a>
                </td>
                <td class="align-left">{{ $location->address }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection