@extends('layouts.app', ['activePage' => '', '' => __('Empresas')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Empresas</h3>
        <p class="card-category">Lista de empresas que administras/gestionas
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
                          <th>Nombre</th>
                          <th>Descripcion</th>
                          <th>Ver detalles</th>
                          <!-- <th># veces contestado</th>
                          <th class="text-right">Contestar</th> -->
                      </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach ($empresas as $empresa)
                      <tr class="td-actions text-right">
                          <td class="text-center">{{$i}}</td>
                          <td>{{ $empresa->nombre }}</td>
                          <td>{{ $empresa->descripcion }}</td>
                          <td>
                            <form action="/verEmpresa/{{ $empresa->id }}" method="post">
                              {{ csrf_field() }}
                              <button  rel="tooltip" class="btn btn-primary">
                                  <i class="material-icons">assignment</i>
                              </button>
                            </form>
                          </td>
                          <td class="td-actions text-right"></td>
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
                <!-- <form class="" action="/agregarEmpresa" method="POST">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary">Agregar empresa</button>
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
