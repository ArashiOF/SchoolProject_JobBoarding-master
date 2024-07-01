@extends('layouts.app', ['activePage' => '', 'titlePage' => 'Manos a la obra, ' . $nombre])

@section('content')
<style>
form {
  display: inline-block;

}

.form-group {
text-align: center;
}
.bajaVac{
  margin: 5px;
  background-color: #dc9b2a;
  color: white;
  border-radius: .1em;
  border-color: #dc9b2a;
  font-family: "Roboto", "Helvetica";
  height:25px;
  width: 25px;
  border-style: solid;

}
.cont{
  border: #DEDEDE 3px solid;
	border-radius: .5em;
	text-align: center;
}
</style>

<div class="container-fluid">
  <div class="card">
    <div class="card-header card-header-primary">
      <h3 class="card-title">Actualizar Datos</h3>
      <p class="card-category">Actualiza los datos ya introducidos

      </p>
    </div>
    <div class="form-group">


      @if ($errors->principal->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->principal->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="actualizarAsp" method="POST">
        {{ csrf_field() }}



        <div class="actializareasp">
          <div class="cont">
            <h6>Datos</h6>
          <label for="etiqueta">Nombre: </label>
          <label for="nombre">{{$user->name}}</label><br>
          <label for="etiqueta">Direccion: </label>
          <label for="dir">{{ $aspirante->direccion }}</label><br>
          <label for="etiqueta">Contacto: </label>
          <label for="celular">{{ $user->contacto }}</label><br>
          <label for="etiqueta">Licenciatura: </label>
          <label for="lic">{{ $aspirante->licenciatura }}</label> <label for="estado">{{ $aspirante->estadoLic }}</label> <br>
          </div>
          <br>
<div class="cont">
<h6 for="">Idiomas</h6>

          <label for="etiqueta">Ingles</label><br>
          <label for="etiqueta">Escrito: </label>
          <label for="escrito">
          @php
            switch($aspirante->inglesEscrito){
              case 0:
                echo 'Basico';
                break;
              case 1:
                echo 'Intermedio';
                break;
              case 2:
                echo 'Avanzado';
                break;
            }
          @endphp
          </label><br>
          <label for="etiqueta">Hablado: </label>
          <label for="escrito">
          @php
            switch($aspirante->inglesHablado){
              case 0:
                echo 'Basico';
                break;
              case 1:
                echo 'Intermedio';
                break;
              case 2:
                echo 'Avanzado';
                break;
            }
          @endphp
          </label><br>
          </div>
          <br>
          <div class="cont">
<h6>Experiencia Laboral</h6>

          <label for="etiqueta">Tiempo de experiencia:</label>
          <label for="numeroExp">{{ $aspirante->numeroExp }} {{ $aspirante->tiempoExp }}</label><br>
          <label for="etiqueta">Areas con experiencia:</label>
          <label for="areaLaboral">{{ $aspirante->areaLaboral }}</label><br>
          </div>
          <br>
          <div class="cont">
<h6>Ubicacion</h6>

          <label for="etiqueta">¿Disponibilidad de viaje?</label>
          <label for="dispViaje">{{ $aspirante->dispViaje }}</label><br>
          <label for="etiqueta">¿Disponibilidad de reubicacion?</label>
          <label for="dispReubicar">{{ $aspirante->dispReubicar }}</label><br>
          </div>
          <br>
        <button type="submit" class="btn btn-primary">Actualizar datos</button>
        @php
          // var_dump($user->name);
        @endphp
      </form>
      </div>
    </div>
  </div>

@endsection
