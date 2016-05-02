@extends('master', ['title' => 'Login'])

@section('content')
    <div class="container">
        <div class="column-md-1">
            <form action="" method="POST" class="form">
                {!! csrf_field() !!}

                <label for="username">Login</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">

                <br />

                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">

                <button type="submit" class="button btn-success btn-block">Sign in</button>
            </form>
        </div>
    </div>
@stop
