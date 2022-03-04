@extends('layouts.principal')

@section('container')
	<div class="col-lg-6 col-lg-offset-3">
		<h1>Cadastrar Categorias</h1>

		<form action="{{ route( 'categorias.store' ) }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="photo" class="ci-label">Photo: </label>
				<input type="file" name="photo" class="form-control">
			</div>

			<div class="form-group">
				<input type="submit" name="cadastrar_categorias" value="Cadastrar" class="btn btn-success">
			</div>
		</form>
	</div>	
@endsection