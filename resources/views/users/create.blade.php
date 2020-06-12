@extends('layouts.app', ['activePage' => 'Usuarios', 'titlePage' => __('Usuario')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">


            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Crear Perfil') }}</h4>
                <p class="card-category">{{ __('Informacion del Usuario') }}</p>
              </div>
               @if (session('info'))
              <div class="container">

                       <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session('info') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

              </div>
            @endif
    				<div class="card-body ">
              {!! Form::open(['route' => 'user.store']) !!}

                          @include('users.partials.form')

              {!! Form::close() !!}
    				</div>

            </div>

        </div>
      </div>

    </div>
  </div>
@endsection
