@extends('image.master')

@section('page_title')
	{{ $data->name }}
@endsection

@section('title')
	<h3>{{ $data->name }}</h3>
@endsection

@section('image')
	<img class='image' src='/img/{{ $data->hash }}' alt='{{ $data->Time_Added }}'>
@endsection
