@extends('layouts.app', ['activePage' => 'Asistencia', 'titlePage' => __('Asistencia')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Asistencia</h4>
            <p class="card-category"> Listado de  Asistencia </p>

          </div>


          <div class="card-body">
            <div class="table-responsive">
                  <table class="table">
                <thead>
                      <tr>
                          <!-- <th width="10px">ID</th> -->
                          <!-- <th>Nombre</th> -->
                          <th>VerifyMode</th>
                          <th>InOutMode</th>
                          <th>Time</th>
                          <th>Time</th>
                      </tr>
                  </thead>
                  <tbody>
                           @foreach($something as $asistencia)
                           <tr>
                               <!-- <td>{{ $asistencia->LogID }}</td> -->
                               <!-- <td>{{ $asistencia->EnrollNumber }}</td> -->
                               <td>{{ $asistencia->VerifyMode }}</td>
                               <td>{{ $asistencia->InOutMode }}</td>
                               <td>{{ $asistencia->Time }}</td>
                               <td>{{ $asistencia->WorkCode }}</td>

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
