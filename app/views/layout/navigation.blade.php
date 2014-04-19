<!--<nav>
	<ul>
		<li><a href = "{{ URL::route('home') }}"> Home </a>
			@if(Auth::check())
				<li><a href = "{{ URL::route ('account-sing-out') }}"> Sing out </a>
			@else
				<li><a href = "{{ URL::route ('account-sing-in') }}"> Sing in </a>
				<li><a href = "{{ URL::route ('account-create') }}"> Create an account </a>
			@endif
		
	</ul>
</nav> --> 


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	@if(Auth::check())
            <li><a href="{{ URL::route ('account-sing-out') }}"> Sing out </a></li>
            @else
            <li><a href="{{ URL::route ('account-sing-in') }}"> Sing in </a></li>
            <li><a href="{{ URL::route ('account-create') }}"> Create an account</a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>