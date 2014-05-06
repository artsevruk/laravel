@extends('layout.main')

@section ('content')

	@if(Auth::check())
		Hello {{ Auth::user()->username }}.
		<p>-----------------------------------</p>

	@else
	<div class="container">
		You are not signed in.
	</div>
	@endif
@stop

