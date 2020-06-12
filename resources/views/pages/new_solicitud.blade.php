




@extends('layouts.app', ['activePage' => 'Solicitud', 'titlePage' => __('Solicitudes')])
@section('content')
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
        			<div class="card">
        				<div class="card-header card-header-primary">
				            <h4 class="card-title ">Nueva solicitud</h4>
				            <p class="card-category"> Crear nueva solicitud</p>

			          	</div>
			          	@include('pages.form')
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection