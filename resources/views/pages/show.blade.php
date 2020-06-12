@extends('layouts.app', ['activePage' => 'Solicitud', 'titlePage' => __('Solicitudes')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
           
{{ $solicitud }}

	@can('solicitud.destroy')
	include('pages.delete')
	@endcan
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
