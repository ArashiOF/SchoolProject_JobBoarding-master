@extends('layouts.app', ['activePage' => '', '' => __('Apliacaciones')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Aplicaciones</h3>
        <p class="card-category">Lista de aplicaciones en la vacante seleccionada
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
            <!-- <div class="col-md- col-10 ml-auto mr-auto text-center"> -->
            <div class="col-md-8 ml-auto mr-auto">
              <h4 class="card-title">
                <br>
                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th class="text-center">#</th>
                          <th>Nombre del aplicante</th>
                          <th>Titulo de la vacante</th>
                          <th>Fecha de aplicacion</th>
                          <th>Estado</th>
                          <!-- <th>Ultima modificacion</th> -->
                          <th class="text-right">Cambiar estado</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach ($users_vacantes as $users_vacante)
                      <tr>
                          <td class="text-center">{{$i}}</td>
                          <td>{{ $aspirantesNombre[$i-1] }}</td>
                          <td>{{ $tituloVacante[$i-1] }}</td>
                          <td>{{ $users_vacante->created_at }}</td>
                          <!-- <td>{{ $users_vacante->updated_at }}</td> -->
                          <td>{{ $users_vacante->estado }}</td>
                          <td class="td-actions text-right">
                            <form action="/cambiarEstado/{{ $users_vacante->userid }}/{{ $users_vacante->vacanteid }}" method="POST">
                              {{ csrf_field() }}
                              <button  rel="tooltip" class="btn btn-primary">
                                  <i class="material-icons">info</i>
                              </button>
                            </form>
                          </td>
                      </tr>
                      @php
                        $i++;
                      @endphp
                    @endforeach
                  </tbody>
                </table>
                <br>
                <br>
                <br>
                <!-- <form class="" action="/agregarVacante" method="POST">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary">Agregar vacante</button>
                </form> -->
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
