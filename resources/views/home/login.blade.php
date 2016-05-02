@extends('master', ['title' => 'Login'])

@section('content')
    <div class="container">
        <div class="column-md-1">
            <form action="" method="POST" class="form" id="loginForm">
                {!! csrf_field() !!}

                <label>Login</label>
                <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="{{ (Session::has('username') ? Session::get('username') : '') }}">

                <br />

                <label>Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">

                <button type="submit" class="button btn-success btn-block">Sign in</button>
            </form>
        </div>
    </div>
@stop
