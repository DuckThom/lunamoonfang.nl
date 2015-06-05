<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('page_title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">

	<style>
		@import url(//fonts.googleapis.com/css?family=Titillium+Web:700);
		@import url(//lunamoonfang.nl/css/app.css);
	</style>
</head>
<body>
	@yield('title')

	<div class="content">
		@yield('image')
	</div>

	<footer>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

		<script type="text/javascript">
			
		</script>
	</footer>
</body>
</html>
