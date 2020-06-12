

 <div class="card-body">
	<div class="form-group">
		{!! Form::label('title', 'Rut') !!}
		{!! Form::text('rut',   $user->rut  , ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('title', 'Nombre') !!}
		{!! Form::text('name',   $user->name  , ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('title', 'Apellido') !!}
		{!! Form::text('apellido',   $user->apellido  , ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('title', 'Direccion') !!}
		{!! Form::text('direccion',   $user->direccion  , ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('title', 'Telefono') !!}
		{!! Form::text('telefono',   $user->telefono  , ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('title', 'Email') !!}
		{!! Form::text('email',   $user->email  , ['class' => 'form-control']) !!}
	</div>

   <h3>Lista de roles</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($roles as $role)
	    <li>
	        <label>
	        {{ Form::checkbox('roles[]', $role->id, null) }}
	        {{ $role->name }}
	        <em>({{ $role->description }})</em>
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>
