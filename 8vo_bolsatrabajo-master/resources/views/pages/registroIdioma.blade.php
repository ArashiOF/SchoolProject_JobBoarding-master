@extends('layouts.app', ['activePage' => '', '' => __('Aplicación exitosa')])

<style>


.contenedoridiomas {
margin-top: 25px;
text-align: center;
}
.botonidioma{
background-color: #dc9b2a;
color: white;
border-radius: .4em;
border-color: #dc9b2a;
font-family: "Roboto", "Helvetica";
height:40px;
  border-style: solid;
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
        <h3 class="card-title">Registro de idioma nuevo.</h3>
        <p class="card-category">
        </p>
      </div>

      <div class="contenedoridiomas">
        <form action="guardarIdioma" method="POST" class="form-horizontal">
          {{ csrf_field() }}
          <label for="">
            Idioma a registrar:
          </label>
          <!-- <input type="text" name="idioma" value=""><br> -->
          <input list="idiomas" name="idioma" id="idioma" required>
          @php
          $idiomas = explode(',', env("IDIOMAS", "default"));
          $i=0;
          @endphp
          <datalist id="idiomas">
            @foreach ($idiomas as $idioma)
              <option id='{{ $idioma }}' value='{{ $idioma }}' ></option>
              @php
              $i++;
              @endphp
            @endforeach
          </datalist>
          <br>
          <br>
          <label for="">Nivel de idioma: escrito</label>
          <select class="form-control" name="escrito" data-style="btn btn-link" >
            <option value="0">Basico</option>
            <option value="1">Intermedio</option>
            <option value="2">Avanzado</option>
          </select>
          <br>

          <label for="">Nivel de idioma: hablado</label>
          <select class="form-control" name="hablado" data-style="btn btn-link" >
            <option value="0">Basico</option>
            <option value="1">Intermedio</option>
            <option value="2">Avanzado</option>
          </select>
          <br>

          <button type="submit" name="boton" class="btn btn-primary">Registrar nuevo idioma</button>
        </form>
      </div>

      <div class="contenedoridiomas">
        <b6 for="">

          Idiomas que tengo:
        </b6>
        <br>
        @foreach ($idiomasA as $idiomaA)
          <label for="">
            Idioma: {{$idiomaA->idioma}}, escrito:
            @php
            switch($idiomaA->escrito){
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
            , hablado:
            @php
            switch($idiomaA->hablado){
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
          </label>
        @endforeach
      </div>
      <div class="col-md-12">
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
