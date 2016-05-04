@extends('master', ['title' => 'Create API key'])

@section('content')
    <div class="container">
        <form class="form" action="" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                    @endforeach
                </div>
            @endif

            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" placeholder="Name">

            <button type="submit" class="button btn-success btn-block">Create key</button>
        </form>
    </div>
@endsection
