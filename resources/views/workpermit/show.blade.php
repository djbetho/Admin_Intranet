@extends('layouts.app', ['activePage' => 'Semestres', 'titlePage' => __('Roles')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
           <div class="card-header card-header-primary">
            <h4 class="card-title ">Semestres</h4>
            <p class="card-category"> Detalle del semestres </p>
            </div>
                  <div class="container">

                            <div class="panel-body">
                            <p><strong>Nombre</strong>     {{ $semestre->name }}</p>
                            <p><strong>Fecha Inicio</strong>       {{ $semestre->fecha_ini }}</p>
                            <p><strong>Fecha Termino</strong>  {{ $semestre->fecha_term }}</p>
                            </div>
                    </div



          </div>
          </div>
          </div>
        </div>
        </div>
@endsection
