@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Create Project
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/project/create" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="name" name="name" type="text" required>
                    <label for="name">Project Name</label>
                </div>
                <div class="input-field col s6">
                    <select name="location">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                    <label>Location</label>
                </div>
                <div class="input-field col s6">
                    <select name="department">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    <label>Department</label>
                </div>
            </div>
            <div class="align-right">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Create
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection