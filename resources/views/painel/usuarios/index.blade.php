@extends( 'layouts.dashboard' )

@section('container')
	<div class="col-lg-12" style="background-color: #fff;">

		<h3 class="text-center">Usuários</h3>

		<p>
			<a href="{{ route( 'painel.usuarios.sair' ) }}" class="btn btn-danger">
				Sair
			</a>
		</p>
		
	</div>
@endsection