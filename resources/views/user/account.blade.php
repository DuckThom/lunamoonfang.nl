@extends('master', ['title' => 'Account'])

@section('content')
    <div class="container">
        <div class="column-md-1">
            <h3>Welcome back, {{ ucfirst(auth()->user()->username) }}!</h3>
        </div>

        <div class="column-sm-2">
            <a href="{{ url('s/upload') }}" class="button btn-primary btn-block">Upload image</a>
        </div>
        <div class="column-sm-2">
            <a href="{{ url('f/upload') }}" class="button btn-primary btn-block">Upload file</a>
        </div>

        <div class="column-sm-2">
            <a href="{{ url('s/list') }}" class="button btn-default btn-block">Image list</a>
        </div>
        <div class="column-sm-2">
            <a href="{{ url('f/list') }}" class="button btn-default btn-block">File list</a>
        </div>

        <div class="column-sm-1">
            <a href="{{ url('logout') }}" class="button btn-danger">Logout</a>
        </div>
    </div>
@stop
