@extends('layouts.app', ['activePage' => 'Reportes', 'titlePage' => __('Reportes')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Reportes</h4>
            <p class="card-category"> Generar reportes</p>

          </div>
<form action="{{ route('report.show') }}" method="get" >

{{ csrf_field() }}
          <div class="panel-body">
               <div class="card-body">
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="inputCity">Trabajdor</label>
                          <select class="form-control" id="selectUser" name="user_selected" required focus>
                           <option value="" disabled selected>Seleccione un trabajador</option>
                           <option value="all"  >Todos</option>
                           @foreach($users as $user)
                           <option value="{{$user->rut}}">{{ $user->name }} {{ $user->apellido }}</option>

                           @endforeach
                         </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputmes">Mes</label>
                          <select id="inputmes" class="form-control" name="mes">
                            <option value="" disabled selected>Elija un mes</option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2 ">
                          <label for="inputano">Año</label>
                          <select id="inputano" class="form-control" name="ano">
                            <option value="" disabled selected>Elija un Año</option>
                            <?php  for($i=2020;$i<=2030;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>

                          </select>
                        </div>
                        <div class="form-group col-md-2 ">
                           <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                      </div>
                    </div>
              </div>

        </form>

        </div>
      </div>
    </div>
  </div>
</div>


@endsection
