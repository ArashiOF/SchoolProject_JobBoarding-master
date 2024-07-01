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
                <form action="actualizarEmp2" method="POST" class="form-horizontal">

                  {{ csrf_field() }}
                  <label for="">Nombre del usuario: </label>
                  <input type='text' class='form-control' name='nom' value='{{$user->name}}' required><br>

                  <label for="">Correo: </label>
                  <input type='text' class='form-control' name='correo' value='{{$user->email}}' required><br>

                  <label for="">Nombre de la empresa</label>
                  <input type='text' class='form-control' name='nomEmp' value='{{$empresa->nombre}}' required><br>

                  <label for="">Descripcion de la empresa: </label><br>
                  <textarea name="descr" id='descr' rows="5" cols="40" required>{{$empresa->descripcion}}</textarea><br>

                  <label for="">Url de empresa: </label>
                  <input type='text' class='form-control' name='url' value='{{$empresa->url}}' required><br>
                  <label for="">Redes sociales: </label>
                  <input type='text' class='form-control' name='redes' value='{{$empresa->redes}}' required><br>

                  <label for="">Direccion de empresa: </label>
                  <input type='text' class='form-control' name='dir' value='{{$empresa->direccion}}' required><br>
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
