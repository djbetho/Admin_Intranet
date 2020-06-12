@extends('layouts.app', ['activePage' => 'Roles', 'titlePage' => __('Roles')])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-primary">
									<h4 class="card-title ">Crear  Roles</h4>
									<p class="card-category"> Crear Roles</p>

								</div>
								<div class="panel-body">
										 <div class="card-body">
                    {{ Form::open(['route' => 'roles.store']) }}

                        @include('roles.partials.form')

                    {{ Form::close() }}
									</div>
								</div>
				 </div>
			 </div>
		 </div>
		</div>
		</div>

@endsection
