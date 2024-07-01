@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Bolsa de trabajo')])
@section('content')
<style>
.esconderContenedor{
  display:none;
}
</style>
<script type="text/javascript">
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32);
    }
    function tipoDeUsuario(){
      var botonCambio = document.getElementById("botonCambio");
      var contenedorAbierta = document.getElementById('contenedorAbierta');
      var contenedorCerrada = document.getElementById('contenedorCerrada');
      var tipoDeUser = document.getElementById('tipoDeUser');
      if (tipoDeUser.value == 0){
        tipoDeUser.value = 1;
        document.getElementById('botonCambio').firstChild.data = "Soy alumno";
        contenedorCerrada.classList.remove("esconderContenedor");
        contenedorAbierta.classList.add("esconderContenedor");
        document.getElementById('nomEmp').required = true;
        document.getElementById('descr').required = true;
        document.getElementById('dirEmp').required = true;
        document.getElementById('redes').required = true;
        document.getElementById('dir').required = false;
        document.getElementById('lic').required = false;
        document.getElementById('estadoLic').required = false;
      }
      else{
        tipoDeUser.value = 0;
        contenedorAbierta.classList.remove("esconderContenedor");
        contenedorCerrada.classList.add("esconderContenedor");
        /*document.getElementById('dir').required = true;
        document.getElementById('cel').required = true;
        document.getElementById('lic').required = true;
        document.getElementById('estadoLic').required = true;*/
        /*document.getElementById('ingEscrito').required = true;
        document.getElementById('ingHablado').required = true;
        document.getElementById('dispViaje').required = true;
        document.getElementById('dispReub').required = true;*/
        document.getElementById('nomEmp').required = false;
        document.getElementById('descr').required = false;
        document.getElementById('dirEmp').required = false;
        document.getElementById('redes').required = false;
        document.getElementById('botonCambio').firstChild.data = "Soy empresa";
      }
    }
</script>
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Registrar') }}</strong></h4>
            <div class="social-line">
              <a href="{{ URL::route('login/google') }}" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google"></i>
              </a>
            </div>
          </div>
          <div class="card-body ">
            <p class="card-description text-center">{{ __('O registra tus datos') }}</p>
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Nombre') }}" value="{{ old('name') }}" required maxlength="40" autocomplete="name" autofocus onkeypress="return blockSpecialChar(event)">
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required maxlength="40">
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" required maxlength="40">
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirma tu contraseña') }}" required maxlength="40">
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
              <br>
            <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">
            <i class="material-icons">phone</i>
              </span>
            </div>
            <input type="text" name="cel" id='cel' class='form-control'  placeholder="{{ __('No. Celular') }}" required>
            </div>

            <button type="button" class="btn btn-default" id="botonCambio" onclick="tipoDeUsuario()" > Soy Alumno </button>
            <input type="hidden" name="tipoDeUser" id='tipoDeUser' value="1">
            <div class='form-group esconderContenedor' id="contenedorAbierta">
              <div class="dividiomaidioma">
              <label for="">Direccion:</label>
              <input type="text" name="dir" id='dir' class='form-control'>
              </div>
              <div class="divicarrera">
              <label for="">Carrera que cursas/cursaste:</label>
              <select class="form-control"  name="lic" id='lic' data-style="btn btn-link">
                <option value="Tronco Comun">Tronco Comun</option>
                <option value="Administracion de Empresas">Administracion de Empresas</option>
                <option value="Contabilidad">Contabilidad</option>
                <option value="Informatica">Informatica</option>
                <option value="Negocios Internacionales">Negocios Internacionales</option>
              </select>

              <select class="form-control" name="estadoLic" data-style="btn btn-link">
                <option value="En Curso">En curso</option>
                <option value="Egresado">Egresado</option>
              </select>
            </div>
              <div class="dividioma">
              <label for="">Nivel de ingles: escrito</label>
              <select class="form-control" name="ingEscrito" data-style="btn btn-link">
                <option value="0">Basico</option>
                <option value="1">Intermedio</option>
                <option value="2">Avanzado</option>
              </select>
            </div>
            <div class="dividioma2">
              <label for="">Nivel de ingles: hablado</label>
              <select class="form-control" name="ingHablado" data-style="btn btn-link">
                <option value="0">Basico</option>
                <option value="1">Intermedio</option>
                <option value="2">Avanzado</option>
              </select>
            </div>
            <div class="ExperienciaLaboral">
              <label for="">Agregar tiempo de experiencia laboral</label> <br>
              <input type="number" name="numeroExp" value="" min='1' max="12">
              <select class="form-control" name="tiempoExp">
                <option value="Meses">Meses</option>
                <option value="Años">Años</option>
              </select>
              <label for="">Areas en la que se tiene experiencia</label>
              <textarea name="areaLaboral" rows="3" cols="40"></textarea>
            </div>
            <div class="divviajes">
              <label for="">Disponibilidad de viaje:</label>
              <select class="form-control" name="dispViaje" data-style="btn btn-link">
                <option value="si">si</option>
                <option value="no">no</option>
              </select>
            </div>
            <div class="divreubicacion">
              <label for="">Disponibilidad de reubicacion:</label>
              <select class="form-control" name="dispReub" data-style="btn btn-link">
                <option value="si">si</option>
                <option value="no">no</option>
              </select>
            </div>
            </div>
            <div id='contenedorCerrada'>
              <label for="">Nombre de la empresa:</label>
              <input type="text" name="nomEmp" id='nomEmp' class='form-control' required>
              <label for="">Que hace la empresa:</label>
              <textarea name="descr" id='descr' rows="5" cols="40" required></textarea>
              <label for="">Agregar redes sociales:</label>
              <textarea name="redes" id='redes' rows="3" cols="40" placeholder="ejemplo: facebook:www.facebook.com/ejemplo "></textarea>
              <label for="">Pagina web de la empresa:</label>
              <input type="text" name="url" id='url' class='form-control' >
              <label for="">Direccion:</label>
              <input type="text" name="dirEmp" id='dirEmp' class='form-control' required>
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('Estoy de acuerdo con la ') }} <a href="#">{{ __('Política de privacidad') }}</a>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Crear cuenta') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
