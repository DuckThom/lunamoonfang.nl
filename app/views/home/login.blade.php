@extends('home.master')

@section('content')
        <div class="text-center">
                <div class="page-header">
                        <h1>Login</h1>
                </div>
        </div>

        <div class="row">
        	<div class="col-md-8 col-md-offset-2">
        		<form action="" method="POST" class="form-horizontal">
                                {{ Form::token() }} 
                                <div class="form-group">
                                        <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                                        <div class="col-sm-10">
                                                <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" {{{ (Session::has('username') ? 'value=' . Session::get('username') : '') }}}>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                                        </div>
                                </div>
                                <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                        </div>
                                </div>
                        </form>
        	</div>
        </div>
@stop