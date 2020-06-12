@extends('layouts.app', ['activePage' => 'Usuarios', 'titlePage' => __('Usuarios')])

@section('content')
<div class="content">
  <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Usuarios</h4>
              <p class="card-category"> Aqui puedes Administrar todos los usuarios</p>
            </div>
            <div class="card-body">
              @can('users.create')
              <div class="row">
                <div class="col-12 text-right">
                  <a href="{{ route('user.create')  }}" class="btn btn-sm btn-primary">Agregar nuevo Usuario</a>
                </div>
              </div>
                @endcan()
                          {{ Form::open(['route' => 'user.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                          <div class="input-group no-border">
                              <div class="form-group">
                                  {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) }}
                              </div>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-default">
                                  <span class="glyphicon glyphicon-search">Buscar</span>
                              </button>
                          </div>
                       {{ Form::close() }}
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr><th>
                        Rut
                    </th>
                    <th>
                      Nombre
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Direccion
                    </th>
                    <th>
                      Telefono
                    </th>



                    <th class="text-right">
                      Actions
                    </th>
                  </tr></thead>
                  <tbody>
                     @foreach($users as $user)
                        <tr>
                              <td>
                             {{ $user->rut }}
                              </td>

                              <td width="25px">
                               {{ $user->name }}
                              </td>
                              <td width="10px">
                               {{ $user->email }}
                              </td>
                               <td>
                               {{ $user->direccion }}
                              </td>

                              <td width="5px">
                               {{ $user->telefono }}
                              </td>
                             

                              @can('users.edit')
                              <td class="td-actions text-right">
                                    <a rel="tooltip" class="btn btn-success btn-link" href="user/{{ $user->id }}/edit" data-original-title="" title="">
                              <i class="material-icons">edit</i>
                              @endcan
                              <div class="ripple-container"></div>
                              </a>
                                </td>
                          </tr>
                          @endforeach
                      </tbody>
                </table>
                  {!! $users->render() !!}
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
</div>

@endsection
