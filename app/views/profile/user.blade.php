@extends('layout.main')

@section('content')
	<p> Profile {{ Auth::user()->username }} </p>
	<p> ------------------------------------------------------ </p>
	<p> {{ Auth::user()->all() }} </p>
@stop