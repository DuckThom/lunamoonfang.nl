@extends('home.master')

@section('title')
        Login
@stop

@section('content')
        <div class="row">
        	<div class="col-md-8 col-md-offset-2">
        		<form action="" method="POST" class="form-horizontal" id="loginForm">
                                {{ Form::token() }}

                                <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" {{{ (Session::has('username') ? 'value=' . Session::get('username') : '') }}}>
                                <br />
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">

                                <br />
                                <br />

                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </form>
        	</div>
        </div>
@stop
