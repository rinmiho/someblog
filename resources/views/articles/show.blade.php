@extends('layouts.app')
@section('title')
	{{ $article->title }} |
@stop
@section('content')
	<h1>{{ $article->title }}</h1>
	<hr>
	<article class="panel panel-default">
		<div class="panel-heading">
			<h3>
				Created {{ $article->created_at->diffForHumans() }} by
				<a href={{ url('/users', $article->user->id) }}>
					{{ $article->user->name }}
				</a>
			</h3>
			<p>{{ $article->excerpt }}</p>
		</div>
		<div class="panel-body">
			{{ $article->body }}
		</div>
	</article>

	<hr/>
	{{-- If authorized user is the author of the article he/she can see update & delete buttons --}}
	@if(Auth::id() == $article->user_id)
		{{-- Update button --}}
		<a href={{route('articles.edit', $article->id) }} class="btn btn-primary">
			<span class="glyphicon glyphicon-edit"></span> Update
		</a>

		{{-- Delete button in the form with delete method --}}
		{!! Form::open(['url' => route('articles.destroy', $article->id),
						'method' => 'delete',
						'class' => 'pull-right',
						'onsubmit' => 'return ConfirmDelete()']) !!}
		<button type="submit" class="btn btn-danger">
			<span class="glyphicon glyphicon-trash"></span> Delete
		</button>
		{!! Form::close() !!}
		<hr/>
	@endif

	{{-- Comments section ---------------------------------------------------------------------}}
	@if(count($threads))


		<div class="comments-section" id="comments">
			<h3>Comments:</h3>
			<ul class="comments-list">
				@include('comments.list', ['collection' => $threads->where('parent_comment_id', 0)])
			</ul>
		</div>

	@else

		<h4 id="comments">There's no comments for the article. Be the first one to comment!</h4>

	@endif

	{{---------- REPLY to comment ----------------}}
	@if (Auth::check())
		<div class="col-md-12 center-block">
			<button type="button" class="btn btn-primary center-block replyButton" id="replyButton-0" onclick="toggleCommentsForm(0)">
				<span class="glyphicon glyphicon-share-alt"></span>
				Reply
			</button>
		</div>
	@else
		<h4>Please log in to leave a comment.</h4>
	@endif

	{{-- Awesome form for adding new comment --}}
	{!! Form::open(['action' => 'CommentsController@store', 'class' => 'addCommentsForm', 'id' => 'addCommentsForm-0']) !!}
		@include(
			'comments._form',
			['articleId' => $article->id,
			'parentCommentId' => 0,
			'submitButtonText' => 'Add Comment']
			)
	{!! Form::close() !!}
	{{-- End of Awesome form for adding new comment --}}

@stop

{{ Html::script('js/myJavascripts.js') }}