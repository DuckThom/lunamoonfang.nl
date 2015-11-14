@extends('master')

@section('content')
	@if(count($files) === 0)
		<div class="alert alert-warning">No images have been uploaded yet</div>
	@else
		<table class="table table-stiped">
			<thead>
				<th>ID</th>
				<th>Link</th>
				<th>Hash</th>
				<th>Name</th>
			</thead>
			<tbody>
				@foreach($files as $file)
					<tr>
						<td>{{ $file->id }}</td>
						<td><a href="/f/{{ $file->hash }}">Download</a></td>
						<td>{{ $file->hash }}</td>
						<td>{{ $file->name }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@stop
