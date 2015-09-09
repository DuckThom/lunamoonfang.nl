@extends('home.master', ['polymer' => true])

@section('title')
        Login
@stop

@section('content')
        <div class="row">
        	<div class="col-md-8 col-md-offset-2">
        		<form action="" method="POST" class="form-horizontal">
                                {{ Form::token() }}

                                <paper-input name="username" label="Username"></paper-input>
                                <!--input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" {{{ (Session::has('username') ? 'value=' . Session::get('username') : '') }}}-->
                                <paper-input type="password" name="password" label="Password"></paper-input>
                                <!--input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password"-->

                                <br />

                                <paper-button id="loginButton" type="submit" raised>Sign in</paper-button>
                                <!--button type="submit" class="btn btn-primary btn-block">Sign in</button-->
                        </form>
        	</div>
        </div>
@stop

@section('extraCSS')
        <style is="custom-style">
                #loginButton {
                        --paper-button: {
                                background: #4CAF50;
                                color: white;
                                float: right;
                        }
                }
        </style>
@stop
