@extends( 'layouts.dashboard' )

@section('container')
	<div class="col-lg-4 col-md-4 col-sm-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-2" id="painel-usuarios">
		@if( $errors->any() )
			@foreach( $errors->all() as $errors )
			<div class="alert alert-{{ session( 'type' ) ?? 'danger' }} alert-dismissible" role="alert">
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  				<span aria-hidden="true">&times;</span>
	  			</button>
	  			
	  			<?php if ( strpos( $errors, 'cilogin' ) ) { ?>
	  				{!! str_replace( 'cilogin', '<strong>login</strong>', $errors ) !!}
	  			<?php } elseif ( strpos( $errors, 'cisenha' ) ) { ?>
	  				{!! str_replace( 'cisenha', '<strong>senha</strong>', $errors ) !!}
	  			<?php } ?>
				
			</div>
			@endforeach
		@endif

		@if( session( 'messages' ) )
			<div class="alert alert-{{ session( 'type' ) ?? 'danger' }} alert-dismissible" role="alert">
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  				<span aria-hidden="true">&times;</span>
	  			</button>
	  			{{ session( 'messages' ) }}				
			</div>
		@endif

		<form action="{{ route( 'painel.usuarios.logar' ) }}" method="post">
			@csrf

			<div class="form-group">
				<label for="cilogin" class="ci-label">Login: </label>
				<input type="text" name="cilogin" class="form-control" value="">
			</div>

			<div class="form-group">
				<label for="cisenha" class="ci-label">Senha: </label>
				<input type="password" name="cisenha" class="form-control" value="">
			</div>

			<div class="form-group">
				<input type="submit" name="entrar" class="btn btn-success" value="Entrar">

				<a href="{{ route('tasks.index') }}" class="btn btn-danger">Cancelar</a>
			</div>
		</form>
	</div>
@endsection