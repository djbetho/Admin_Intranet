<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ __('Intranet') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @can('home')

      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
     @endcan

     @can('solicitud.index')
      <li class="nav-item{{ $activePage == 'Solicitar permiso' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('solicitud.index')}}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Solicitar permiso ') }}</p>
        </a>
      </li>
     @endcan

      @can('licencia.index')
      <li class="nav-item{{ $activePage == 'licencias' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('licencia.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Licencias Medicas') }}</p>
        </a>
      </li>
     @endcan

      @can('asistencia.index')
      <li class="nav-item{{ $activePage == 'Asistencia' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('asistencia.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Asistencia') }}</p>
        </a>
      </li>
      @endcan

      <li class="nav-item ">
        <a class="nav-link collapsed" data-toggle="collapse" href="#pagesExamples" aria-expanded="false">
          <i class="material-icons">image</i>
          <p> Reportes
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="pagesExamples" style="">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'Permisos' ? ' active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> Permisos </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'Asistencias' ? ' active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> A </span>
                <span class="sidebar-normal"> Asistencias </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'Licencias' ? ' active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> L </span>
                <span class="sidebar-normal"> Licencias </span>
              </a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link collapsed" data-toggle="collapse" href="#pagesAdmin" aria-expanded="false">
          <i class="material-icons">image</i>
          <p> Administracion
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="pagesAdmin" style="">
            @can('users.index')
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'Usuarios' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> Usuarios </span>
              </a>
            </li>
              @endcan

            @can('roles.index')
            <li class="nav-item{{ $activePage == 'Roles' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('roles.index') }}">
                <span class="sidebar-mini"> A </span>
                <span class="sidebar-normal"> Roles </span>
              </a>
            </li>


            @endcan
            @can('permision.index')
            <li class="nav-item{{ $activePage == 'Permisos' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('permision.index') }}">
                <span class="sidebar-mini"> L </span>
                <span class="sidebar-normal"> Permisos </span>
              </a>
            </li>
            @endcan
            @can('semestre.index')
            <li class="nav-item{{ $activePage == 'Semestres' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('semestre.index') }}">
                <span class="sidebar-mini"> S </span>
                <span class="sidebar-normal"> Semestres </span>
              </a>
            </li>
            @endcan

          </ul>
        </div>
      </li>




  </div>
</div>
