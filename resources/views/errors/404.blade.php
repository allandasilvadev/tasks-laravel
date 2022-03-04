@extends('layouts.default')

@section('container')

	<div class="col-lg-6 col-lg-offset-3">
		<h1>404</h1>

		<p>Página não encontrada.</p>
		<p><a href="{{ route( 'tasks.index' ) }}">voltar a página inicial.</a></p>
	</div>

@endsection