@extends('master', ['title' => 'Upload image'])

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
            <label for="name">Image name</label>
            <input name="name" type="text" class="form-control" placeholder="Image name">

            <label for="image">Select an image to upload</label>
            <input name="image" type="file" accept="image/*" class="form-control">

            <button type="submit" class="button btn-success btn-block">Upload image</button>
        </form>
    </div>
@endsection
