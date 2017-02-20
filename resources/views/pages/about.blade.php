@extends('layouts.app')
@section('title')
	About
@stop
@section('content')
	<h1>About</h1>

	@if(count($people))
		<h3>Ppl I like:</h3>
		<ul>
			@foreach($people as $person)
				<li>{{ $person }}</li>
			@endforeach
		</ul>
	@endif
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Donec sodales egestas nisi, in malesuada purus lacinia eget.
		Etiam fermentum, ante ut volutpat vehicula, nunc nulla imperdiet purus,
		et aliquam est orci vitae dui. Nam maximus quis arcu at fringilla.
		Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
		Maecenas quis elementum risus. Praesent condimentum est ut tellus ultrices, eget vulputate neque interdum.
		Phasellus bibendum, massa sed condimentum mattis, enim turpis faucibus sem, et congue justo quam nec ligula.
		Phasellus eget finibus justo, at mattis ante. Suspendisse vitae tristique orci, ut vestibulum nibh.
		Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
		Praesent lorem mi, scelerisque eu felis quis, maximus commodo ex. Aenean fringilla vehicula condimentum.
	</p>
@stop