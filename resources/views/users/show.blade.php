@extends('layouts.app')
@section('title')
	{{ $user->name }} |
@stop
@section('content')
	<div class="panel panel-default">
		<div class="media">
			<div class="media-left">
				<img src="{{ $user->photo() }}" class="media-object profile-photo">
			</div>

			<div class="media-body">
				<h4 class="media-heading">
					{{ $user->name }}
				</h4>
				<p><b>Registered at:</b> {{ $user->created_at }}</p>
				<p><b>Last seen:</b> ----</p>
				<p><b>About:</b> ----</p>
			</div>
		</div>
	</div>
@stop