@extends('layout.main')

@section ('content')
	@if(Auth::check())
		Hello {{ Auth::user()->username }}.
		<p>-----------------------------------</p>
	{{ Auth::user()->all() }}

	@else
	<div class="container">
		You are not signed in.You are not signed in.You are not signed in.You are not signed in.You are not signed in.
		You are not signed in.You are not signed in.You are not signed in.You are not signed in.You are not signed in.
		You are not signed in.You are not signed in.You are not signed in.You are not signed in.You are not signed in.
		You are not signed in.You are not signed in.You are not signed in.You are not signed in.You are not signed in.
		You are not signed in.You are not signed in.You are not signed in.You are not signed in.You are not signed in.
		You are not signed in.You are not signed in.You are not signed in.You are not signed in.You are not signed in.
		You are not signed in.You are not signed in.You are not signed in.You are not signed in.You are not signed in.
		
		
	</div>
	@endif
@stop