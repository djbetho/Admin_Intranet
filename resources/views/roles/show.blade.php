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
                  <div class="container">

                            <div class="panel-body">
                            <p><strong>Nombre</strong>     {{ $role->name }}</p>
                            <p><strong>Slug</strong>       {{ $role->slug }}</p>
                            <p><strong>Descripción</strong>  {{ $role->description }}</p>
                            </div>
                    </div



          </div>
          </div>
          </div>
        </div>
        </div>
@endsection
