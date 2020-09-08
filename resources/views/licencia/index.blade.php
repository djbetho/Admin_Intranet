@extends('layouts.app', ['activePage' => 'Licencia', 'titlePage' => __('Licencia')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Licencia</h4>
            <p class="card-category"> Listado de las Licencia </p>

          </div>
          <div class="card-body">
                  @can('licencia.create')
                   <a href="{{ route('licencia.create') }}"
                   class="btn btn-sm btn-primary pull-right">
                       Crear
                   </a>
                   @endcan
          </div>

              <div class="container">
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
              </div>

          <div class="card-body">
            <div class="table-responsive">
                  <table class="table">
                <thead>
                      <tr>
                          <th >Numero de Licencia</th>
                          <th>Fecha inicio</th>
                            <th>Fecha Término</th>
                              <th>Dias</th>
                          <th>Estado</th>
                          <th colspan="3">Accion</th>
                      </tr>
                  </thead>
                  <tbody>
                           @foreach($licencias  as $licencia)
                           <tr>
                               <td>{{ $licencia->nro_licencia }}</td>
                               <td>{{ $licencia->fecha_desde }}</td>
                               <td>{{ $licencia->fecha_hasta }}</td>
                               <td>{{ $licencia->dias }}</td>
                               <td>{{ $licencia->estados }}</td>

                               @can('licencia.edit')
                               <td width="10px">
                                   <a href="{{ route('licencia.edit', $licencia->id) }}"
                                   class="btn btn-sm btn-default">
                                       editar
                                   </a>
                               </td>
                               @endcan
                               @can('licencia.destroy')
                               <td width="10px">
                                   {!! Form::open(['route' => ['licencia.destroy', $licencia->id],
                                   'method' => 'DELETE']) !!}
                                       <button class="btn btn-sm btn-danger">
                                           Eliminar
                                       </button>
                                   {!! Form::close() !!}
                               </td>
                               @endcan
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   {{ $licencias ?? ''->render() }}


            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
