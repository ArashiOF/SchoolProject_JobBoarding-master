@extends('layouts.app', ['activePage' => '', '' => __('Aplicación exitosa')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Datos de tiempo de respuesta.</h3>
        <p class="card-category">
        </p>
      </div>
      <div class="col-md-12">
        <div class="">
          <table>
            <thead>
              <tr>
                <th>Estado anterior</th>
                <th>Estado al que se cambio</th>
                <th>Tiempo anterior</th>
                <th>Tiempo al realizar cambio</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bitacoras as $bitacora)
              <tr>
                <td>{{$bitacora->estadoAnterior}}</td>
                <td>{{$bitacora->estadoCambiado}}</td>
                <td>{{$bitacora->tiempoAnterior}}</td>
                <td>{{$bitacora->tiempoCambiado}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="places-buttons">
          <div class="row">
            <div class="col-md- ml-auto mr-auto text-center">
              <h4 class="card-title">

                <form action="/" method="GET" class="form-horizontal">
                  <br>
                  <button type="submit" class="btn btn-primary">Regresar al menú prinicpal</button>
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
