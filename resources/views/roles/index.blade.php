@extends('layouts.app', ['activePage' => 'Roles', 'titlePage' => __('Roles')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Roles</h4>
            <p class="card-category"> Listado de los Roles </p>

          </div>
          <div class="card-body">
                  @can('roles.create')
                   <a href="{{ route('roles.create') }}"
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
                           @foreach($roles as $role)
                           <tr>
                               <td>{{ $role->id }}</td>
                               <td>{{ $role->name }}</td>
                               <td>{{ $role->slug }}</td>
                               <td>{{ $role->description }}</td>
                               @can('roles.show')
                               <td width="10px">
                                   <a href="{{ route('roles.show', $role->id) }}"
                                   class="btn btn-sm btn-default">
                                       ver
                                   </a>
                               </td>
                               @endcan
                               @can('roles.edit')
                               <td width="10px">
                                   <a href="{{ route('roles.edit', $role->id) }}"
                                   class="btn btn-sm btn-default">
                                       editar
                                   </a>
                               </td>
                               @endcan
                               @can('roles.destroy')
                               <td width="10px">
                                   {!! Form::open(['route' => ['roles.destroy', $role->id],
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
                   {{ $roles->render() }}


            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
