{!! Form::hidden('article_id', $articleId ) !!}
{!! Form::hidden('parent_comment_id', $parentCommentId ) !!}
<div class="form-group">
	{!! Form::label('body', 'Your comment here:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>