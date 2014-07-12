<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Project 3')</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo URL::asset('/css/bootstrap.min.css') ?>" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo URL::asset('/css/custom.css') ?>">

	@yield('head')

</head>
<body>

	<div class="container-fluid">
		@yield('content')
	</div>


	<script type="text/javascript" src="<?php echo URL::asset('/js/bootstrap.min.js') ?>"></script>
	@yield('body')



</body>
</html>

