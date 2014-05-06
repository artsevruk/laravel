@extends('layout.main')

@section('content')

	@if(Auth::user()->username === $user->username)
		<p> Profile {{ Auth::user()->username }} </p>
		<p> ------------------------------------------------------ </p>
		<p> Username: {{ Auth::user()->username }} </p>
		<p> Email: {{ Auth::user()->email }} </p>
	@else
	<p> Username: {{ $user->username }} </p>
	@endif
@stop