{!! Form::open(['method' => 'DELETE', 'route' => ['solicitud.destroy',$solicitud->id]]) !!}

  <input type="submit" value="Eliminar" class="btn btn-danger">

{!! Form::close() !!}
