@extends('layouts.app', ['activePage' => '', '' => __('Viendo informacion')])

@section('content')
<style>
.content{
  text-align: center;
}
</style>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Viendo datos de: {{$empresa->nombre}}.</h3>
        <p class="card-category">
        </p>
      </div>
      <div class="col-md-12">
        <div class="">
          <b>Informacion de empresa: </b><br>
          Descirpcion: {{$empresa->descripcion}}<br>
          url: {{$empresa->url}}<br>
          Direccion:{{$empresa->direccion}}<br>

          <b>Infomacion de Usuario:</b><br>
          Nombre de usuario: {{$usuario->name}}<br>
          Correo: {{$usuario->email}}<br>

          <b>Estadisticas (tiempo de respuesta):</b><br>
          Promedio de tardanza: Meses: {{$promM}}, Dias: {{$promD}}, Horas: {{$promH}} <br>
          Maxima tardanza: Meses: {{$maxM}}, Dias: {{$maxD}}, Horas: {{$maxH}} <br>
          Minima tardanza: Meses: {{$minM}}, Dias: {{$minD}}, Horas: {{$minH}} <br>
        </div>
        <form action="/verBitacoraCambio" method="POST" class="form-horizontal">
          {{ csrf_field() }}
          <input type="hidden" name="idUs" value='{{$usuario->id}}'>
          <button type="submit" name="button" class="btn btn-primary">Ver todos los datos</button>
        </form>
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
