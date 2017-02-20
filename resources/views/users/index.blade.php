@extends('layouts.app')
@section('title')
	Users |
@stop
@section('content')
	<h1>Users here</h1>
	<div class="panel panel-default">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Role</th>
					<th>Last seen</th>
					<th>Registered</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td><a href={{ url('/users', $user->id) }}>{{ $user->name }}</a></td>
						<td>Role</td>
						<td>Last seen</td>
						<td>{{ $user->created_at }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop