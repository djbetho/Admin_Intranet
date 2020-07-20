@extends('layouts.app', ['activePage' => 'Checkear Permisos', 'titlePage' => __('Checkear Permisos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Checkear Permisos <h4>
            <p class="card-category"> Revisar listado de permisos</p>
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
                    Funcionario
                  </th>
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
                   Cant.
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
                       {{ $solicitudes->rut }} {{ $solicitudes->user->name }} {{ $solicitudes->user->apellido }}
                    </td>
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

                    <td >
                       @can('solicitud.edit')
                                   <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#AceptModal-{{$solicitudes->id}}">
                                     <span class="material-icons">
                                                thumb_up
                                      </span>
                                   </button>
                                   @foreach($solicitud as $acepto)
                                     <div class="modal fade bs-example-modal-lg" id="AceptModal-{{$acepto->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                         <div class="modal-content">
                                           <div class="modal-header">
                                             <h4 class="modal-title" id="myModalLabel"></i>Aceptar permiso</h4>
                                           </div>
                                               <div class="modal-body">
                                                   <p>¿ Esta seguro de aceptar este permiso? de  {{ $acepto->rut }} {{ $acepto->user->name }} {{ $acepto->user->apellido }}</p>
                                               </div>
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>


                                               {!! Form::open(['route' => ['solicitud.update', $acepto->id],'method' => 'PATCH']) !!}

                                                <input type=hidden name="rut"         class="form-control"   value="{{$acepto->rut}}">
                                                <input type=hidden name="detalle"     class="form-control"   value="{{$acepto->detalle}}">
                                                <input type=hidden name="reemplazo"   class="form-control"   value="{{$acepto->reemplazo}}">
                                                <input type=hidden name="fecha_desde" class="form-control"   value="{{$acepto->fecha_desde}}">
                                                <input type=hidden name="fecha_hasta" class="form-control"   value="{{$acepto->fecha_hasta}}">
                                                <input type=hidden name="observacion" class="form-control"   value="">
                                                <input type=hidden name="estado" class="form-control" placeholder="estado" value="1">
                                                <button class="btn btn-sm btn-danger">Aceptar</button>
                                               {!! Form::close() !!}


                                             </div>

                                         </div>

                                       </div>
                                     </div>

                                   @endforeach
                       @endcan
                    </td>
                    <td >
                       @can('solicitud.destroy')
                       <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#RechazartModal-{{$solicitudes->id}}">
                         <span class="material-icons">
                                    thumb_down
                          </span>
                       </button>
                       @foreach($solicitud as $rechazo)
                         <div class="modal fade bs-example-modal-lg" id="RechazartModal-{{$rechazo->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h4 class="modal-title" id="myModalLabel"></i>Rechazar permiso</h4>
                               </div>
                                   <div class="modal-body">
                                       <p>¿ Esta seguro de aceptar este permiso? de  {{ $rechazo->rut }} {{ $rechazo->user->name }} {{ $rechazo->user->apellido }}</p>
                                   </div>
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>


                                   {!! Form::open(['route' => ['solicitud.update', $rechazo->id],'method' => 'PATCH']) !!}

                                    <input type=hidden name="rut" class="form-control"   value="{{$rechazo->rut}}">
                                    <input type=hidden name="detalle" class="form-control"    value="{{$rechazo->detalle}}">
                                    <input type=hidden name="reemplazo" class="form-control"    value="{{$rechazo->reemplazo}}">
                                    <input type=hidden name="fecha_desde" class="form-control"    value="{{$rechazo->fecha_desde}}">
                                    <input type=hidden name="fecha_hasta" class="form-control"   value="{{$rechazo->fecha_hasta}}">

                                    <input type=hidden name="observacion" class="form-control" placeholder="observacion"  value="">
                                    <input type=hidden name="estado" class="form-control" placeholder="estado" value="2">
                                    <button class="btn btn-sm btn-danger">Aceptar</button>
                                   {!! Form::close() !!}


                                 </div>

                             </div>

                           </div>
                         </div>

                       @endforeach
                       @endcan
                    </td>
                  </tr>
                   @endforeach
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
