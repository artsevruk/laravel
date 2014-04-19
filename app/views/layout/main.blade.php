<!DOCTYPE html>
<html>
	<head>
		<title>Авторизация</title>
		<link href="{{{ asset('assets/css/bootstrap.css') }}}" rel="stylesheet">
		<link href="{{{ asset('assets/css/style.css') }}}" rel="stylesheet">

	</head>
	<body>

		@include('layout.navigation')

		<div class="conteiner">
		@if(Session::has('global'))
			<p>{{ Session::get('global') }}</p>
		@endif

		@yield('content')
	</div>

		<script src="{{{ asset('assets/js/jquery.min.js') }}}"></script>
		<script src="{{{ asset('assets/js/bootstrap.min.js') }}}"></script>
	</body>

</html>
