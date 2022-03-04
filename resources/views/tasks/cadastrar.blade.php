@extends('layouts.principal')

@section('container')
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
		@if( $errors->any() )
			<div class="alert alert-warning alert-dismissible" role="alert">
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  				<span aria-hidden="true">&times;</span>
	  			</button>
				@foreach( $errors->all() as $errors )
					{{ $errors }}
				@endforeach
			</div>		
		@endif

		<form action="{{ route('tasks.inserir') }}" method="post">
			@csrf

			<div class="form-group">
				<label for="task" class="ci-label">Task</label>
				<input type="text" name="task" class="form-control">
			</div>

			<div class="form-group">
				<input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success">
			</div>
		</form>
	</div>	
@endsection