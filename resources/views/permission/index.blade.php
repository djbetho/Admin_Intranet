@extends('layouts.app', ['activePage' => 'Permisos', 'titlePage' => __('Roles')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Permisos</h4>
            <p class="card-category"> Listado de los Permisos </p>

          </div>
          <div class="card-body">
                  @can('permision.create')
                   <a href="{{ route('permision.create') }}"
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
                            <th>URL Amigable</th>
                              <th>Descripcion</th>
                          <th colspan="3">&nbsp;</th>
                      </tr>
                  </thead>
                  <tbody>
                           @foreach($Permission as $permiso)
                           <tr>
                               <td>{{ $permiso->id }}</td>
                               <td>{{ $permiso->name }}</td>
                               <td>{{ $permiso->slug }}</td>
                               <td>{{ $permiso->description }}</td>
                               @can('permision.show')
                               <td width="10px">
                                   <a href="{{ route('permision.show', $permiso->id) }}"
                                   class="btn btn-sm btn-default">
                                       ver
                                   </a>
                               </td>
                               @endcan
                               @can('permision.edit')
                               <td width="10px">
                                   <a href="{{ route('permision.edit', $permiso->id) }}"
                                   class="btn btn-sm btn-default">
                                       editar
                                   </a>
                               </td>
                               @endcan
                               @can('permision.destroy')
                               <td width="10px">
                                   {!! Form::open(['route' => ['permision.destroy', $permiso->id],
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
                   {{ $Permission->render() }}


            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
