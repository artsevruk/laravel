@extends('layout.main')

@section('content')
<div class="container">
	<form class="form-signin" role="form" action="{{ URL::route('account-sing-in-post') }}" method="post">
			<h2 class="form-signin-heading">Please sign in</h2>
			<input type="email" class="form-control" placeholder="Email address" required="" autofocus="" name="email" {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : ''}}>

			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif	
			<input type="password" class="form-control" placeholder="Password" required="" name="password">	
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
			<input class="btn btn-lg btn-primary btn-block" type="submit" value="Sing in">
		{{ Form::token() }}
	</form>
</div>
@stop
