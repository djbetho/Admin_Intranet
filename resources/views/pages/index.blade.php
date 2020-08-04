@extends('layouts.app', ['activePage' => 'Solicitar permiso', 'titlePage' => __('Solicitar permiso')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Solicitar permiso </h4>
            <p class="card-category"> Listado de las solicitudes Aceptadas</p>

           
          </div>

          <div class="card-body">
              @can('solicitud.create')
                <a href="solicitud/create" class="btn btn-primary">Nueva Solicitud</a>
              @endcan()
              {{ Form::open(['route' => 'solicitud.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
              <div class="input-group no-border">
                  <div class="form-group">
                      {{ Form::text('detalle', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) }}
                  </div>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-default">
                      <span class="glyphicon glyphicon-search">Buscar</span>
                  </button>
              </div>
           {{ Form::close() }}
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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Solicitud
                  </th>
                  <th>
                    Reemplazo
                  </th>
                  <th>
                    Fecha Inicio
                  </th>
                  <th>
                   Fecha Hasta
                  </th>
                  <th>
                   Cantidad
                  </th>
                  <th>
                    Estado
                  </th>
                  <th colspan="3">
                    Accion
                  </th>
                </thead>
                <tbody>
                   @foreach ($solicitud as $solicitudes)
                   <tr>
                    <td>
                      {{ $solicitudes->detalle }}
                    </td>
                    <td>
                      {{ $solicitudes->reemplazo }}
                    </td>
                    <td>
                      {{ $solicitudes->fecha_desde }}
                    </td>
                    <td>
                      {{ $solicitudes->fecha_hasta }}
                    </td>
                    <td>
                      {{ $solicitudes->cantidad_dias }}
                    </td>
                    <td class="text-primary" width="10px">
                      @switch($solicitudes->estado)
                            @case(0)
                                Pendiente
                                @break

                            @case(1)
                                 Aceptado
                                 @break
                            @case(2)
                                 Rechazado
                                 @break

                            @default
                                Nulo
                        @endswitch
                    </td>
                    <td  width="5px">
                       @can('solicitud.show') <a href="solicitud/{{ $solicitudes->id }}" class="btn btn-sm btn-default" >Ver</a>@endcan
                    </td>
                    <td width="5px">
                       @can('solicitud.edit')<a href="solicitud/{{ $solicitudes->id }}/edit" class="btn btn-sm btn-default">editar</a>@endcan
                    </td >
                    <td width="5px">
                       @can('solicitud.destroy')



                            {!! Form::open(['route' => ['solicitud.destroy', $solicitudes->id],
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}


                       @endcan
                    </td>


                  </tr>
                   @endforeach
                </tbody>
              </table>
                {{ $solicitud->links() }}
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
