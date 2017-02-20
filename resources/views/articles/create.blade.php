@extends('layouts.app')
@section('title')
	Create |
@stop
@section('content')
	<h1>Create a new article</h1>
	<hr>
	{!! Form::open(['url' => 'articles']) !!}
	@include('articles._form', ['submitButtonText' => 'Add Article'])
	{!! Form::close() !!}

	@include('errors.list')
@stop