<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
<style>

  /* .sidebar {
    display:none !important;
  }
  .main-panel{
    width: 100% !important;
  } */

  #favicon {
position: absolute;
height: 100px;
left: 90px;
top: 520px;
  }

</style>
@php
  $tipo = Auth::user()->tipoUsuario;
@endphp
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
      <img id="favicon" src=/material/img/favicon.png alt="logo_plustra">
    </a>
  </div>
   <div class="sidebar-wrapper">
    <ul class="nav">
      @if ($tipo=='1')
        <li class="nav-item{{ $activePage == 'agregarVacante' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('agregarVacante') }}">
            <i class="material-icons">business</i>
              <p>{{ __('Registrar Vacante') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'agregarConocimientosDB' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('agregarConocimientosDB') }}">
            <i class="material-icons">description</i>
              <p>{{ __('Agregar Conocimientos') }}</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'agregarHabilidadDB' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('agregarHabilidadDB') }}">
            <i class="material-icons">description</i>
              <p>{{ __('Agregar Habilidades') }}</p>
          </a>
        </li>
        @elseif ($tipo=='0')
      <li class="nav-item{{ $activePage == 'vacantes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('vacantes') }}">
          <i class="material-icons">description</i>
            <p>{{ __('Vacantes') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'registroIdioma' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('registroIdioma') }}">
          <i class="material-icons">check_circle_outline</i>
            <p>{{ __('Registrar idioma') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'registroConocimiento' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('registroConocimiento') }}">
          <i class="material-icons">check_circle_outline</i>
            <p>{{ __('Registrar Conocimiento') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'registroHabilidad' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('registroHabilidad') }}">
          <i class="material-icons">check_circle_outline</i>
            <p>{{ __('Registrar Habilidad') }}</p>
        </a>
      </li>
	  <li class="nav-item{{ $activePage == 'agregarCurriculumDB' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('agregarCurriculumDB') }}">
          <i class="material-icons">description</i>
            <p>{{ __('Curriculum') }}</p>
        </a>
      </li>
      @elseif ($tipo=='2')
      <li class="nav-item{{ $activePage == 'user' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">account_circle</i>
            <p>{{ __('Administrar usuarios') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'empresas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('estadisticas') }}">
          <i class="material-icons">business</i>
            <p>{{ __('Estadisticas') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'adminVacantes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('adminVacantes') }}">
          <i class="material-icons">description</i>
            <p>{{ __('Vacantes') }}</p>
        </a>
      </li>
    </li>
    <li class="nav-item{{ $activePage == 'adminAgregarVacante' ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('adminAgregarVacante') }}">
        <i class="material-icons">description</i>
          <p>{{ __('Agregar Vacante') }}</p>
      </a>
    </li>
      <li class="nav-item{{ $activePage == 'empresas' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('empresas') }}">
          <i class="material-icons">business</i>
            <p>{{ __('Empresas') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'agregarConocimientosDB' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('agregarConocimientosDB') }}">
          <i class="material-icons">description</i>
            <p>{{ __('Agregar Conocimientos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'agregarHabilidadDB' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('agregarHabilidadDB') }}">
          <i class="material-icons">description</i>
            <p>{{ __('Agregar Habilidades') }}</p>
        </a>
      </li>

      @else
      <li class="nav-item{{ $activePage == 'adminVacantes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('adminVacantes') }}">
          <i class="material-icons">description</i>
            <p>{{ __('Vacantes') }}</p>
        </a>
      </li>
    </li>
    <li class="nav-item{{ $activePage == 'adminAgregarVacante' ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('adminAgregarVacante') }}">
        <i class="material-icons">description</i>
          <p>{{ __('Agregar Vacante') }}</p>
      </a>
    </li>
    <li class="nav-item{{ $activePage == 'agregarConocimientosDB' ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('agregarConocimientosDB') }}">
        <i class="material-icons">description</i>
          <p>{{ __('Agregar Conocimientos') }}</p>
      </a>
    </li>
    <li class="nav-item{{ $activePage == 'agregarHabilidadDB' ? ' active' : '' }}">
      <a class="nav-link" href="{{ route('agregarHabilidadDB') }}">
        <i class="material-icons">description</i>
          <p>{{ __('Agregar Habilidades') }}</p>
      </a>
    </li>
      @endif
      <div class="dropdown-divider"></div>
      <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p>{{ __('Cuenta') }}</p>
          <div class="ripple-container"></div></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="/">Ver perfil</a>
            <a class="dropdown-item" href="{{ route('profile.edit') }}">Editar</a>
            <!-- <div class="dropdown-divider"></div> -->
            <a class="dropdown-item" href="https://material-dashboard-laravel.creative-tim.com/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar sesión</a>
          </div>
        </li>
    </ul>
  </div>
</div>
