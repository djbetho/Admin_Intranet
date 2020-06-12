@extends('layouts.app', ['activePage' => 'Permisos', 'titlePage' => __('Roles')])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-primary">
									<h4 class="card-title ">Editar  Permiso</h4>
									<p class="card-category"> Editar Permiso</p>

								</div>
								<div class="panel-body">
										 <div class="card-body">
	 						     {!! Form::model($Permission, ['route' => ['permision.update', $Permission->id],'method' => 'PUT']) !!}

	 						         @include('permission.partials.form')

	 						     {!! Form::close() !!}
								 </div>
	 						 </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
