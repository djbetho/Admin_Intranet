@extends('layouts.app', ['activePage' => 'Semestres', 'titlePage' => __('Semestre')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Semestre</h4>
            <p class="card-category"> Listado de los semestre creados </p>

          </div>
          <div class="card-body">
                  @can('semestre.create')
                   <a href="{{ route('semestre.create') }}"
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
                          <th width="10px">ID</th>
                          <th>Nombre</th>
                          <th>Fecha inicio</th>
                          <th>Fecha termino</th>
                          <th>Cantidad</th>
                          <th colspan="3">&nbsp;</th>
                      </tr>
                  </thead>
                  <tbody>
                           @foreach($semestre as $sm)
                           <tr>
                               <td>{{ $sm->id }}</td>
                               <td>{{ $sm->name }}</td>
                               <td>{{ date_format($sm ->fecha_ini,'d/m/Y') }}</td>
                               <td>{{ date_format($sm ->fecha_term,'d/m/Y') }}</td>
                               <td>{{ $sm->cantidad }}</td>
                               @can('semestre.show')
                               <td width="10px">
                                   <a href="{{ route('semestre.show', $sm->id) }}"
                                   class="btn btn-sm btn-default">
                                       ver
                                   </a>
                               </td>
                               @endcan
                               @can('roles.edit')
                               <td width="10px">
                                   <a href="{{ route('semestre.edit', $sm->id) }}"
                                   class="btn btn-sm btn-default">
                                       editar
                                   </a>
                               </td>
                               @endcan
                               @can('roles.destroy')
                               <td width="10px">
                                   {!! Form::open(['route' => ['semestre.destroy', $sm->id],
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
                   {{ $semestre->render() }}


            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
