<li class="single-comment">
	<div class="panel panel-default comment-content">
		<div class="panel-body">
			<div class="media" id={{$comment->id}}>
				<div class="media-left">
					<img src="{{$comment->user->photo()}}" class="media-object comment-photo">
				</div>
				<div class="media-body">
					@if(Auth::id() == $comment->user_id)
						<div class="pull-right">
							<a href={{route('comments.edit', $comment->id) }}>
								<span class="glyphicon glyphicon-edit"></span>
							</a>
							<a onclick='return ConfirmDelete()' href={{route('comments.delete', $comment->id) }}>
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</div>
					@endif
					<h4 class="media-heading">
						{{---------- Add link to profile view + Profile View ----------------}}
						<a href={{ url('/users', $comment->user->id) }}>
							{{ $comment->user->name }}
						</a>
						<small>
							{{ $comment->created_at->diffForHumans() }}
						</small>
					</h4>
					<p>{{ $comment->body }}</p>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<small>
				<a href={{url('articles/'.$article->id.'#'.$comment->id)}}>
					<span class="glyphicon glyphicon-link"></span>
				</a>
			</small>
			@if (Auth::check())
				<div class="pull-right">
					{{---------- REPLY to comment ----------------}}
					<button type="button" class="btn btn-link btn-sm replyButton" id="replyButton-{{$comment->id}}" onclick="toggleCommentsForm({{$comment->id}})">
						<span class="glyphicon glyphicon-share-alt"></span>
						Reply
					</button>
				</div>
			@endif
			<div class="clearfix"></div>
		</div>
	</div>
	@if (Auth::check())
		{!! Form::open([
			'action' => 'CommentsController@store',
			'class' => 'addCommentsForm',
			'id' => 'addCommentsForm-'.$comment->id]) !!}
		@include (
			'comments._form',
			['articleId' => $article->id,
			'parentCommentId' => $comment->id,
			'submitButtonText' => 'Add Comment']
			)
		{!! Form::close() !!}

	@endif
	@if (count($threads->where('parent_comment_id', $comment->id)))
		<ul class="children">
			@include ('comments.list', ['collection' => $threads->where('parent_comment_id', $comment->id)])
		</ul>
	@endif
</li>

