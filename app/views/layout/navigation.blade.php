<nav>
	<ul>
		<li><a href = "{{ URL::route('home') }}"> Home </a>
			@if(Auth::check())
				<li><a href = "{{ URL::route ('account-sing-out') }}"> Sing out </a>
			@else
				<li><a href = "{{ URL::route ('account-sing-in') }}"> Sing in </a>
				<li><a href = "{{ URL::route ('account-create') }}"> Create an account </a>
			@endif
		
	</ul>
</nav>