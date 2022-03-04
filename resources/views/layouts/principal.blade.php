<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ $title ?? 'Painel' }}</title>
		<link rel="stylesheet" type="text/css" href="{{ asset( 'css/bootstrap.min.css' ) }}" media="screen">
		<link rel="stylesheet" type="text/css" href="{{ asset( 'css/style.css' ) }}" media="screen">
	</head>
	<body>
		@include('navs.navbar')		

		<div class="container">
			<div class="row">
				@yield('container')
			</div>
		</div>

		<script type="text/javascript" src="{{ asset( 'js/vendor/jquery-1.12.4.min.js' ) }}"></script>
		<script type="text/javascript" src="{{ asset( 'js/bootstrap.min.js' ) }}"></script>
	</body>
</html>