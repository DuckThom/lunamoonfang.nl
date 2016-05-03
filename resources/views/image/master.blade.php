<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('page_title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

	<style>
		@import url("//fonts.googleapis.com/css?family=Titillium+Web:700");

		html, body {
			margin: 0px;
			font-family: "Titillium Web",sans-serif;
			width: 100%;
			background-color: #2196F3;
			text-align: center;
		}

		h1, h2, h3, h4, h5 {
			font-size: 32px;
			margin: 16px 0 0 0;
			color: #fff;
		}

		.content {
			width: 100%;
			background-color: rgb(51, 51, 51);
			position: absolute;
			top: 10%;
			bottom: 10%;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.image {
			padding: 20px;
			max-width: 95%;
			max-height: 95%;
		}
	</style>
</head>
<body>
	@yield('title')

	<div class="content">
		@yield('image')
	</div>
</body>
</html>
