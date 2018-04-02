@extends('layouts.app')

@section('title', 'Create Location')

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Create Location
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/location/create" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="name" name="name" type="text" required>
                    <label for="name">Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="address" name="address" type="text" required>
                    <label for="address">Address</label>
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