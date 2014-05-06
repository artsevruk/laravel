@extends('layout.main')

@section('content')
		Профили пользователей
	<p>-----------------------------------</p>
	@foreach (User::all() as $user)
	<li><a href="{{ URL::route ('profile-user', $user->username) }}"> {{ $user->username }} </a></li>
	@endforeach
	
	<p>-----------------------------------</p>
@stop