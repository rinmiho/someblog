@extends('layouts.app')
@section('title')
	Articles |
@stop
@section('content')
	<h1>Articles</h1>
	<hr/>

	@if(count($articles))
		@foreach($articles as $article)
			<article class="panel panel-default">
				<div class="panel-heading">
					<h4>
						<a href={{url('/articles', $article->id) }}>{{ $article->title }}</a>
						<small>
							{{ $article->published_at->diffForHumans() }} by
							<a href={{ url('/users', $article->user->id) }}>
								{{ $article->user->name }}
							</a>
						</small>
						@if(Auth::id() == $article->user_id)
							<div class="pull-right">
								<small>
									<a href={{route('articles.edit', $article->id) }}>Update</a> /
									<a onclick='return ConfirmDelete()' href={{route('articles.delete', $article->id) }}>Delete</a>
								</small>
							</div>
						@endif
					</h4>
				</div>
				<div class="panel-body">
					{{ $article->excerpt }}
				</div>

				<div class="panel-footer">
					<div class="pull-right">
						<a href={{url('articles/'.$article->id.'#comments')}}>
							{{ $article->comments->count() }} comments
						</a>
					</div>
					<div class="clearfix"></div>
				</div>

			</article>
		@endforeach
	@else
		<p>No records in table :( </p>
	@endif

@stop

{{ Html::script('js/myJavascripts.js') }}