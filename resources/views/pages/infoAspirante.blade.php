@extends('layouts.app', ['activePage' => '', 'titlePage' => __('Apliacaciones')])
<style media="screen">
.actializareasp {
text-align: center;
}
select {

text-align-last: center;
padding-right: 29px;

}
</style>
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Aplicante</h3>
        <p class="card-category">Informacion de aplicante
        </p>
      </div>
      <br>
      <div class="actializareasp">


      <div class="col-md-12">
        <label for="text-center">Nombre del aplicante: {{ $user->name }}</label>
        <br>
        <label for="text-center">Titulo de la vacante: {{ $vac->titulo }}</label>
        <br>
        <label for="text-center">Correo de aspirante: {{ $user->email }}</label>
        <br>
        <label for="text-center">Celular de aspirante: {{ $user->contacto }}</label>
        <br>
        <label for="text-center">
          Carrera: {{ $asp[0]->licenciatura }}, {{ ($asp[0]->estadoLic) }}
        </label>
        <br>
        <label for="text-center">
          Ingles escrito:
          @if ($asp[0]->inglesEscrito == 0)
            Basico
          @elseif ($asp[0]->inglesEscrito == 1)
            Intermedio
          @else
            Avanzado
          @endif
        </label>
        <br>
        <label for="text-center">
          Ingles hablado:
          @if ($asp[0]->inglesHablado == 0)
            Basico
          @elseif ($asp[0]->inglesHablado == 1)
            Intermedio
          @else
            Avanzado
          @endif
        </label>
        <br>
        <label for="text-center">Disponibilidad de viaje: {{ $asp[0]->dispViaje }}</label>
        <br>
        <label for="text-center">Disponibilidad de reubicacion: {{ $asp[0]->dispReubicar }}</label>
        <br>
        @if ($asp[0]->numeroExp <> null)
        <label for="text-center">Tiempo de experiencia: {{ $asp[0]->numeroExp }} {{ $asp[0]->tiempoExp }}</label><br>
        <label for="text-center">Areas con experiencia: {{ $asp[0]->areaLaboral }}</label><br>
        @endif
        <label>Conocimientos :</label><br>
        @foreach ($conocimientos as $conocimiento)
        <div class="forma">
          -{{ $conocimiento->nombre }}<br>
        </div>
        @endforeach
        <label>Habilidades solicitados:</label><br>
        @foreach ($habilidades as $habilidad)
        <div class="forma">
          -{{ $habilidad->nombre }}<br>
        </div>
        @endforeach
        <label for="tezt-center">Estado de aspirante: {{ $users_vacante[0]->estado }}</label>
        <br>
        @if ($cv == null)

        @else
        <label for="titulo">Vista previa del curriculum </label> <a href="/storage/{{$cv}}" download>Descarga</a>
      </br><iframe src="/storage/{{$cv}}" style="width:600px; height:500px;" frameborder="0"></iframe>

        @endif


        <form class="" action="/cambiarEstado2" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="userid" id="userid" value='{{ $users_vacante[0]->userid }}'>
          <input type="hidden" name="vacanteid" id="vacanteid" value='{{ $users_vacante[0]->vacanteid }}'>
          <input type="hidden" name="aspid" id="aspid" value='{{ $asp[0]->id }}'>
          <div class="form-group">
            <label for="form">Cambiar estado del aspirante a:</label>
            <select class="form-control" name="estado" data-style="btn btn-link">
              <option value="evaluando">Evaluando</option>
              <option value="entrevista">Entrevista</option>
              <option value="practicante">Practicante</option>
              <option value="contratado">Contratado</option>
              <option value="baja">Baja</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar estado</button>
        </form>
          </div>
        <!-- <div class="places-buttons">
          <div class="row">
            <div class="col-md- col-10 ml-auto mr-auto text-center">
            <div class="col-md-8 ml-auto mr-auto">
              <h4 class="card-title">
                <br>
                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th class="text-center">#</th>
                          <th>Nombre del aplicante</th>
                          <th>Titulo de la vacante</th>
                          <th>Correo de aspirante: </th>
                          <th>Estado</th>
                          <th>Ultima modificacion</th>
                          <th class="text-right">Cambiar estado</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $vac->titulo }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $users_vacante[0]->estado }}</td>
                          <td class="td-actions text-right">
                            <form action="/cambiarEstado2/" method="POST">
                              {{ csrf_field() }}
                              <button  rel="tooltip" class="btn btn-primary">
                                  <i class="material-icons">info</i>
                              </button>
                            </form>
                          </td>
                      </tr>
                  </tbody>
                </table>
                <br>
                <br>
                <br>
                <form class="" action="/agregarVacante" method="POST">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary">Agregar vacante</button>
                </form>
              </h4>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>
@endsection
