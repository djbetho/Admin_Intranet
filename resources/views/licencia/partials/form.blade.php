<div class="form-group">
	<div class="col-sm-6">
	{{ Form::label('nro_licencia', 'Numero de Licencia') }}
	{{ Form::text('nro_licencia', null, ['class' => 'form-control', 'id' => 'nro_licencia']) }}
	</div>
</div>
<div class="form-group">
	<div class="col-sm-2">
	{{ Form::label('fecha_desde', 'Fecha Inicio') }}
	{{ Form::date('fecha_desde', null, ['class' => 'form-control', 'fecha_desde' => 'fecha_desde']) }}
	</div>
</div>
<div class="form-group">
	<div class="col-sm-2">
	{{ Form::label('fecha_desde', 'Fecha Inicio') }}
	{{ Form::date('fecha_hasta', null, ['class' => 'form-control', 'fecha_hasta' => 'fecha_hasta']) }}
	</div>
</div>
<div class="form-group">
	<div class="col-sm-2">
	{{ Form::label('dias', 'Dias') }}
	{{ Form::number('dias', null, ['class' => 'form-control', 'dias' => 'dias']) }}
	</div>
</div>
<div class="form-group">
<div class="col-sm-2">
	<select class="form-control" id="estado" name="estado" required focus>
	 <option value="" disabled selected>Seleccione Estado</option>
	 	 <option value="1">Aceptado</option>
	   <option value="2">Rechazado</option>
 	</select>
</div>
</div>



<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
