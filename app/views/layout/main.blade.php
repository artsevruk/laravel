<!DOCTYPE html>
<html>
	<head>
		@include('layout.head')
	</head>
	<body>
		<div class="container">

			@include('layout.navigation')

			@if(Session::has('global'))
				<p>{{ Session::get('global') }}</p>
			@endif

			@yield('content')

			@include('layout.script')
	</div>
		@include('layout.footer')
	</body>
</html>
