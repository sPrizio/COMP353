@extends('layouts.app')

@section('title', 'Add Department Project')

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Add Department Project
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/department/{{ $id }}/project/create" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <select name="id">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                    <label>Project</label>
                </div>
            </div>
            <div class="align-right">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Add
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection