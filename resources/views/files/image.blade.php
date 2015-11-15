@extends('images.master')

@section('page_title')
	{{ $data->name }}
@stop

@section('title')
	<h3>{{ $data->name }}</h3>
@stop

@section('image')
	<img class='image' src='/img/{{ $data->hash }}' alt='{{ $data->Time_Added }}'>
@stop
