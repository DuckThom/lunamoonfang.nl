<!DOCTYPE html>
<html>
	<head>
		<title>Image list</title>
		<style type="text/css">
			@import url(//fonts.googleapis.com/css?family=Lato:700);

			html, body {
				font-family: 'Lato', sans-serif;
			}

			table {
			    border-collapse: collapse;
			    border-left: 1px dotted #bbb;
			    border-right: 1px dotted #bbb;
			    width: 100%;
			    margin-bottom: 20px;
			}

			th {
		        border-top: 1px solid #bbb;
		        border-left: 1px dotted #bbb;
		        border-bottom: 1px dotted #bbb;
		        padding: 15px 0px;
			}

			td {
		        padding: 10px;
		        border-bottom: 1px solid #bbb;
		        border-left: 1px dotted #bbb;
			}

			tr:nth-child(even) {
			    background-color: #7BFFFC;
			}
		</style>
	</head>
	<body>
		<table>
			<thead>
				<th>ID</th>
				<th>Link</th>
				<th>Hash</th>
				<th>Name</th>
			</thead>
			<tbody>
				@foreach($images as $image)
					<tr>
						<td>{{ $image->ID }}</td>
						<td><a href="/s/{{ $image->Hash }}">Html Page</a> | <a href="/s/{{ $image->Hash }}/full">Full Size</a></td>
						<td>{{ $image->Hash }}</td>
						<td>{{ $image->Name }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>