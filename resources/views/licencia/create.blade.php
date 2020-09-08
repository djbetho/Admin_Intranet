@extends('layouts.app', ['activePage' => 'Licencia', 'titlePage' => __('Licencia')])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-primary">
									<h4 class="card-title ">Crear  Licencia</h4>
									<p class="card-category"> Crear Licencia</p>

								</div>
								<div class="panel-body">
										 <div class="card-body">
                    {{ Form::open(['route' => 'licencia.store']) }}

                        @include('licencia.partials.form')

                    {{ Form::close() }}
									</div>
								</div>
				 </div>
			 </div>
		 </div>
		</div>
		</div>

@endsection
