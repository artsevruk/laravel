<nav>
	<ul>
		<li><a href = "{{ URL::route('home') }}"> Home </a>
			@if(Auth::check())

			@else
			<li><a href = "{{ URL::route ('account-create') }}"> Create an account </a>
			@endif
		
	</ul>
</nav>