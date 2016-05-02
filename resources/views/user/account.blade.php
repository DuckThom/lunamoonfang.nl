@extends('master', ['title' => 'Account'])

@section('content')
    <div class="container">
        <div class="column-md-1">
            <h3>Welcome back, {{ ucfirst(auth()->user()->username) }}!</h3>
        </div>

        <div class="column-md-2">
            <a href="{{ url('s/upload') }}" class="button btn-primary btn-block">Upload Image</a>
        </div>
        <div class="column-md-2">
            <a href="{{ url('f/upload') }}" class="button btn-primary btn-block">Upload File</a>
        </div>
    </div>
@stop
