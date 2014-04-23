@extends ('layout.main')

@section ('content')
	
	<form action="{{ URL::route ('account-forgot-password-post') }}" method="post">

		<input type="submit" value="Recover">
			{{ Form::token() }}
	</form>

@stop