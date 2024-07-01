@extends('layouts.app', ['activePage' => '', '' => __('Actualizar datos')])

@section('content')


<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <!-- <h3 class="card-title">Ver preguntas</h3>
        <p class="card-category">En esta seccion podras ver todas las preguntas -->
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
            <div class="col-md- ml-auto mr-auto text-center">
              <h4 class="card-title">
                <br>
                <form action="actualizarAsp2" method="POST" class="form-horizontal">

                  {{ csrf_field() }}
                  <label for="">Nombre: </label>
                  <input type='text' class='form-control' name='nom' value='{{$user->name}}' required><br>

                  <label for="">Correo: </label>
                  <input type='text' class='form-control' name='correo' value='{{$user->email}}' required><br>

                  <label for="">Direccion: </label>
                  <input type='text' class='form-control' name='dir' value='{{$aspirante->direccion}}' required><br>

                  <label for="">Contacto: </label>
                  <input type='text' class='form-control' name='contacto' value='{{$user->contacto}}' required><br>

                  <label for="">Licenciatura: </label>
                  <select class="form-control"  name='lic' value='{{$aspirante->licenciatura}}' required data-style="btn btn-link">
                    <option value="Tronco Comun">Tronco Comun</option>
                    <option value="Administracion de Empresas">Administracion de Empresas</option>
                    <option value="Contabilidad">Contabilidad</option>
                    <option value="Informatica">Informatica</option>
                    <option value="Negocios Internacionales">Negocios Internacionales</option>
                  </select>
                  <select class="form-control" name="estadoLic" data-style="btn btn-link" id='estadoLic'>
                    <option value="en_curso" @php if($aspirante->estadoLic=='en_curso'){echo 'selected';} @endphp>En curso</option>
                    <option value="egresado" @php if($aspirante->estadoLic=='egresado'){echo 'selected';} @endphp>Egresado</option>
                  </select>
                  <br>

                  <div class="dividioma">

                  <label for="">Nivel de ingles: escrito</label>
                  <select class="form-control" name="ingEscrito" data-style="btn btn-link" id='ingEscrito'>
                    <option value="0" @php if($aspirante->inglesEscrito=='0'){echo 'selected';} @endphp>Basico</option>
                    <option value="1" @php if($aspirante->inglesEscrito=='1'){echo 'selected';} @endphp>Intermedio</option>
                    <option value="2" @php if($aspirante->inglesEscrito=='2'){echo 'selected';} @endphp>Avanzado</option>
                  </select>
                </div>

                <div class="dividioma2">

                  <label for="">Nivel de ingles: hablado</label>
                  <select class="form-control" name="ingHablado" data-style="btn btn-link" id='ingHablado'>
                    <option value="0" @php if($aspirante->inglesHablado=='0'){echo 'selected';} @endphp>Basico</option>
                    <option value="1" @php if($aspirante->inglesHablado=='1'){echo 'selected';} @endphp>Intermedio</option>
                    <option value="2" @php if($aspirante->inglesHablado=='2'){echo 'selected';} @endphp>Avanzado</option>
                  </select>
                </div>
                <br>
                <div class="cont">
                  <label>Experiencia Laboral</label>
                  <label for="">Tiempo de experiencia: </label>
                  <input type='number' class='form-control' name='numeroExp' value='{{$aspirante->numeroExp}}' required><br>
                  <select class="form-control" name="tiempoExp" data-style="btn btn-link" id='ingEscrito'>
                    <option value="Meses" @php if($aspirante->tiempoExp=='Meses'){echo 'selected';} @endphp>Meses</option>
                    <option value="Años" @php if($aspirante->tiempoExp=='Años'){echo 'selected';} @endphp>Años</option>
                    </select>
                    <input type='text' class='form-control' name='areaLaboral' value='{{$aspirante->areaLaboral}}' required><br>
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
                  <!-- <label for='nomEncuesta'>Nombre del examen</label> -->
                  <br>

                  <br>
                  <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
