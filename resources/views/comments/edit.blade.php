@extends('layouts.app')
@section('title')
	Edit comment |
@stop
@section('content')
	<h1>Edit comment</h1>
	<hr/>
	{!! Form::model($comment, ['method' => 'PATCH', 'action' => ['CommentsController@update', $comment->id]]) !!}
	@include('comments._form', ['parentCommentId' => $comment->parent_comment_id, 'submitButtonText' => 'Update Comment'])

	{!! Form::close() !!}

	@include('errors.list')
@stop