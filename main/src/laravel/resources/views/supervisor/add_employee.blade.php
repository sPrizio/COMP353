@extends('layouts.app')

@section('title', 'Add Subordinate')

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Add Subordinate
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/supervisor/{{ $id }}/employee/create" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <select name="id">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                        @endforeach
                    </select>
                    <label>Employee</label>
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