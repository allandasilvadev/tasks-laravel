@extends('layouts.principal')

@section('container')
	<div class="col-lg-12 col-md-12">
		@if( session( 'messages' ) )
			<div class="alert alert-{{ session( 'type' ) ?? 'success' }} alert-dismissible" role="alert">
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  				<span aria-hidden="true">&times;</span>
	  			</button>
	  			{{ session('messages') }}
			</div>		
		@endif
	</div>

	<div class="col-lg-12 col-md-12">
		{{-- Config::get( 'cms.app_key' ) --}}
		{{-- cirand() --}}
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Task</th>
					<th>Created at</th>
					<th>Updated at</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@if( sizeof( $tasks ) > 0 )
				    @foreach( $tasks as $task )
				    <tr>
				    	<td>{{ $task['id'] }}</td>
				    	<td>{{ $task['task'] }}</td>
				    	<td>
				    		<?php 
				    		    echo date( 
				    		    	'd-m-Y H:i:s', 
				    		    	strtotime( $task['created_at'] ) 
				    		    ); 
				    		?>				    			
				    	</td>
				    	<td>
				    		<?php 
				    		    echo date( 
				    		    	'd-m-Y H:i:s', 
				    		    	strtotime( $task['updated_at'] ) 
				    		    ); 
				    	    ?>
				    	</td>
				    	<td>
				    		<a href="{{ route( 'tasks.editar', [ 'id' => $task['id'] ] ) }}" class="btn btn-info">Editar</a>
				    		@if( $task['deleted_at'] != null )
				    			<a href="{{ route( 'tasks.restaurar', [ 'id' => $task['id'] ] ) }}" class="btn btn-warning">
				    				Restaurar
				    			</a>
				    		@else
				    			<a href="{{ route( 'tasks.deletar', [ 'id' => $task['id'] ] ) }}" class="btn btn-danger">Remover</a>
				    		@endif
				    		
				    	</td>
				    </tr>
				    @endforeach
				@else
					<tr>
						<td colspan="5">
							<p class="text-center" style="margin-top: 8px;">Nenhuma tarefa cadastrada.</p>
						</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
@endsection