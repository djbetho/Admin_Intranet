@extends('layouts.app', ['activePage' => 'Semestres', 'titlePage' => __('Roles')])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-primary">
									<h4 class="card-title ">Editar  semestre</h4>
									<p class="card-category"> Editar semestre</p>

								</div>
								<div class="panel-body">
										 <div class="card-body">
	 						     {!! Form::model($semestre, ['route' => ['semestre.update', $semestre->id],'method' => 'PUT']) !!}

	 						         @include('semestres.partials.form')

	 						     {!! Form::close() !!}
								 </div>
	 						 </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
