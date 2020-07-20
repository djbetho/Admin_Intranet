@extends('layouts.app', ['activePage' => 'Semestres', 'titlePage' => __('Semestres')])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-primary">
									<h4 class="card-title ">Crear  semestre</h4>
									<p class="card-category"> Crear semestre</p>

								</div>
								<div class="panel-body">
										 <div class="card-body">
                    {{ Form::open(['route' => 'semestre.store']) }}

                        @include('semestres.partials.form')

                    {{ Form::close() }}
									</div>
								</div>
				 </div>
			 </div>
		 </div>
		</div>
		</div>
 
@endsection
