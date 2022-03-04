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

		<form action="{{ route('tasks.update') }}" method="post">
			@csrf

			<div class="form-group">
				<label for="task">Task</label>
				<input type="text" name="task" value="{{ old( 'task', $task['task'] ) }}" class="form-control">
			</div>

			<input type="hidden" name="taskid" value="{{ $task['id'] }}">

			<div class="form-group">
				<input type="submit" name="editar" value="Editar" class="btn btn-success">
			</div>
		</form>
	</div>	
@endsection