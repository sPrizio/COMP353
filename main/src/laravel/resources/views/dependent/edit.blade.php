@extends('layouts.app')

@section('title', 'Edit ' . $dependent->first_name . ' ' . $dependent->last_name)

@section('content')
    <div class="row">
        <div class="col s9">
        <span class="card-title">
            Edit {{ $dependent->first_name }} {{ $dependent->last_name }}
        </span>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <form class="col s12" action="/dependent/{{ $dependent->id }}/edit" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="first_name" name="first_name" type="text" value="{{ $dependent->first_name }}" required>
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input id="last_name" name="last_name" type="text" value="{{ $dependent->last_name }}" required>
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="sin" name="sin" type="number" value="{{ $dependent->sin }}" required>
                    <label for="sin">SIN (exactly 9 digits)</label>
                </div>
                <div class="input-field col s6">
                    <input id="dob" name="dob" type="text" value="{{ $dependent->date_of_birth }}" required>
                    <label for="dob">Date of Birth (YYYY-MM-DD)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <p>
                        <label>
                            <input name="gender" type="radio" value="male"/>
                            <span>Male</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="gender" type="radio" value="female"/>
                            <span>Female</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="align-right">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    Submit
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection