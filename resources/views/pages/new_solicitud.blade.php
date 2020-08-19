


@extends('layouts.app', ['activePage' => 'Solicitud', 'titlePage' => __('Solicitudes')])
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="{{ asset('sweetalert') }}/sweetalert.min.js"></script>

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
        			<div class="card">
        				<div class="card-header card-header-primary">
				            <h4 class="card-title ">Nueva solicitud</h4>
				            <p class="card-category"> Crear nueva solicitud</p>

 			          	</div>
									@if (session('info'))
										 <div class="container">

															<div class="alert alert-warning alert-dismissible fade show" role="alert">
															 <strong>{{ session('info') }}</strong>
															 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																 <span aria-hidden="true">&times;</span>
															 </button>
														 </div>

										 </div>
									 @endif
			          	@include('pages.form')
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
       (function() {
        	$(document).on('click', '.btn-primary', function (e) {

						 e.preventDefault();

						 if($('#fecha_hasta').val().length === 0){
							 var parametros = {"fecha_desde" : $('#fecha_desde').val() };
						 }else{
							 var parametros = {"fecha_desde" : $('#fecha_desde').val(),"fecha_hasta" : $('#fecha_hasta').val() };
						 }


             $.ajax({
							  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							  url:  "{{url('/solicitud/ValidarPermiso')}}",
                type: 'POST',
                data: parametros,
                dataType: 'JSON',
                beforeSend: function() {

                },
								success: function(response) {

											Swal({
																  title: 'Informacion',
																  text: response['error'],
																  type: 'warning',
																  showCancelButton: true,
																  confirmButtonColor: '#3085d6',
																  cancelButtonColor: '#d33',
																  confirmButtonText: 'Si solicitar!'
																}).then((result) => {
																  if (result.value) {
																		$('#ss').val(response['ss']);

																    Swal.fire(
																      'Permiso!',
																      'a sido solicitado.',
																      'success'
																    ),
																		$('#a').attr('disabled', true);
																	 $('#formulario_busqueda').submit();
																  }
																})
								},
                error: function(response) {
									 console.log(response);
											swal({
												 title: "Error",
												 text: "Revisa las fechas porfavor"+response,
												 type: "error",
												 showCancelButton: false,
												 confirmButtonText: "Acepto",

											});
                },

             });

          });
       }).call(this);
    </script>

@endsection
