<div class="form-group">
	{{ Form::label('name', 'Nombre del Semestre') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
			<label class="label-control">Fecha inicio</label>
			<input name= "fecha_ini" type="text" class="form-control datetimepicker" value={{ $semestre ->fecha_ini }}/>
</div>
<div class="form-group">
				<label class="label-control">Fecha Termino</label>
				<input name= "fecha_term" type="text" class="form-control datetimepicker" value={{ $semestre ->fecha_term }}/>
</div>
<div class="form-group">
	{{ Form::label('name', 'Cantidad goce de remuneraciones') }}
	{{ Form::number('cantidad', null, ['class' => 'form-control', 'id' => 'cantidad']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
