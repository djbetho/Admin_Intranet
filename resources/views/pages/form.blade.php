

{!! Form::open(['route' => [$solicitud->url(),$solicitud->id],'method' => $solicitud ->method(),'class'=>'form']) !!}


 <div class="card-body">
	<div class="form-group">
		{!! Form::label('title', 'Rut') !!}
		{!! Form::text('rut',   auth()->user()->rut  , ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('title', 'Detalle de la solicitud', []) !!}
		{!! Form::text('detalle', $solicitud ->detalle, ['class'=> 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('title', 'Reemplazo') !!}
		{!! Form::text('reemplazo', $solicitud ->reemplazo , ['class'=> 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::checkbox('cantidad_fech', 'value')  !!}
		{!! Form::label('title', 'Mas de un dia ') !!}

	</div>
	<div class="form-group">

    <input name= "fecha_desde" id="fecha_desde" placeholder="Fecha desde..." type="text" class="form-control datetimepicker" value={{ $solicitud ->fecha_desde }}>
  </div>

  <div class="form-group">

      <input name= "fecha_hasta" id="fecha_hasta" placeholder="Fecha hasta..." type="text" class="form-control datetimepicker" value={{ $solicitud ->fecha_hasta }} >
  </div>

  {{ $nombre_semestre_actual }}

  </div>

<button type="submit"  class="btn btn-primary">Guardar</button>


{!! Form::close() !!}
