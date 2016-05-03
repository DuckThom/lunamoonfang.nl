@extends('master', ['title' => 'Image list'])

@section('content')
	<div class="container">
		@if(count($images) === 0)
			<div class="alert alert-warning">No images have been uploaded yet</div>
		@else
			{{ $_SERVER['HTTP_ACCEPT_LANGUAGE'] }}
			<table class="table table-stiped">
				<thead>
				<th>ID</th>
				<th>Link</th>
				<th>Hash</th>
				<th>Name</th>
				</thead>
				<tbody>
				@foreach($images as $image)
					<tr>
						<td>{{ $image->id }}</td>
						<td><a href="/s/{{ $image->hash }}">Html Page</a> | <a href="/s/{{ $image->hash }}/full">Full Size</a></td>
						<td>{{ $image->hash }}</td>
						<td>{{ $image->name }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		@endif
	</div>
@stop
