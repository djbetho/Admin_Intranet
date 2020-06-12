@extends('layouts.app', ['activePage' => 'Solicitudes', 'titlePage' => __('Editar Solicitud')])


@section('content')
	




	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
        			<div class="card">
        				<div class="card-header card-header-primary">
				            <h4 class="card-title ">Editar  solicitud</h4>
				            <p class="card-category"> Editar solicitud</p>

			          	</div>
		          	<form class="form" method="POST" action="/solicitudes">
			          		@csrf
				        <div class="card-body">
							<form>
								<div class="form-group">
									<label for="Detalle">rut</label>
									<input type="text" class="form-control" name="rut" value="{{$solicitud->rut}}" >
								</div>
								<div class="form-group">
									<label for="Detalle">Detalle de la solicitud</label>
									<input  type="text" class="form-control" name="detalle"  value="{{$solicitud->detalle}}" ></input>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Reemplazante </label>
									<input type="text" class="form-control" name="reemplazo" value="{{$solicitud->reemplazo}}" >
								</div>
								<div class="form-group">
								<div class="form-group">
									<div class="form-check">
								      <label class="form-check-label">
								          <input class="form-check-input" type="checkbox" value="{{}}">
								          Mas de un día
								          <span class="form-check-sign">
								              <span class="check"></span>
								          </span>
								      </label>

							  		</div>

								</div>
								<div class="form-group">
									<div class='input-group date' id='datetimepicker1'>
					                    <input type='text' name="fecha" class="form-control" value="{{$solicitud->fecha}}" />
					                    <span class="input-group-addon">
					                        <span class="glyphicon glyphicon-calendar"></span>
					                    </span>
					                </div>
								</div>
								
								 
								  <button type="submit"  class="btn btn-primary">Submit</button>
							</form>
						</div>
					 	</form>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection