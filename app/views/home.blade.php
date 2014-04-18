@extends('layout.main')

@section ('content')
	@if(Auth::check())
		Hello {{ Auth::user()->username }}.
		<p>-----------------------------------</p>
	{{ Auth::user()->all() }}

	@else
		You are not signed in.
	@endif
@stop