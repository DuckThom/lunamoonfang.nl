@extends('images.master')

@section('page_title')
	{{ $data->Name }}
@stop

@section('title')
	<h3>{{ $data->Name }}</h3>
@stop

@section('image')
	<img class='image' src='/img/{{ $data->Hash }}' alt='{{ $data->Time_Added }}'>
@stop