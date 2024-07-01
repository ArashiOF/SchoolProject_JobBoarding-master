@extends('layouts.app', ['activePage' => '', '' => __('Vacantes')])

@section('content')
@php
$tipo = Auth::user()->tipoUsuario;
@endphp
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Vacantes. </h3>
        <p class="card-category">Lista de vacantes que administras/gestionas
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
                          <th>Titulo</th>
                          <th>Descripcion</th>
                          <th>Nombre de la empresa</th>
                          <th>Salario</th>
                          <th>Expira</th>
                          <th class="text-right">Aplicar</th>
                          @if ($tipo==2)
                          <th class="text-right">Ver aplicantes</th>
                          @endif
                      </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 0;
                      //var_dump($nomEmp[0]);
                    @endphp
                    @foreach ($vacantes as $vacante)
                      <tr>
                          <td class="text-center">{{$i+1}}</td>
                          <td>{{ $vacante->titulo }}</td>
                          <td>{{ $vacante->descripcion }}</td>
                          <td>
                            @if ($nomEmp[$i] == null)
                          {{ $vacante->nombreEmpresa}}
                          @else
                          {{ $nomEmp[$i]->nombre }}
                          @endif
                          </td>
                          <td>
                            @if ($vacante->cantidad == null)
                              Fijar en entrevista
                            @else
                              {{ $vacante->cantidad }}, {{ $vacante->tiempoSalario}}
                            @endif
                          </td>
                          <td>{{ $vacante->expira }}</td>
                          <td class="td-actions text-right">
                            <form action="/verVacante/{{ $vacante->id }}" method="GET">
                              {{ csrf_field() }}
                              <button  rel="tooltip" class="btn btn-primary">
                                  <i class="material-icons">info</i>
                              </button>
                            </form>
                          </td>
                          @if ($tipo==2)
                          <td class="td-actions text-right">
                            <form action="/verAplicaciones/{{ $vacante->id }}" method="GET">
                              {{ csrf_field() }}
                              <button  rel="tooltip" class="btn btn-primary">
                                  <i class="material-icons">assignment</i>
                              </button>
                            </form>
                          </td>
                          @endif
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
