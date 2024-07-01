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
      <div class="container-fluid">
        <div class="col-md-12">
          <form action="actualizarEmp" method="POST" class="form-horizontal">
            <div class="form-group">
              {{ csrf_field() }}
              <div class="cont">
                <h6>Datos</h6>


              <label for="etiqueta">Nombre de usuario: </label>
              <label for="nombre">{{ $user->name }}</label><br>
              <label for="etiqueta">Correo: </label>
              <label for="correo">{{ $user->email }}</label><br>
              <label for="etiqueta">Nombre de emmpresa: </label>
              <label for="nombre">{{ $empresa->nombre }}</label><br>
              <label for="etiqueta">Descripcion de empresa: </label>
              <label for="descripcion">{{ $empresa->descripcion }}</label><br>
              <label for="etiqueta">Link de empresa: </label>
              <label for="url">{{ $empresa->url }}</label><br>
              <label for="etiqueta">Redes Sociales: </label>
              <label for="redes">{{ $empresa->redes }}</label><br>
              <label for="etiqueta">Direccion de empresa: </label>
              <label for="dir">{{ $empresa->direccion }}</label><br>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Actualizar datos</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<br>

<div class="container-fluid">
  <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Vacantes</h3>
        <p class="card-category">Lista de vacantes que he publicado
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
                          <!-- <th class="text-right">Ver más</th> -->
                          <th class="text-right">Ver aplicantes</th>
                          <th>Borrar vacante</th>
                      </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 0;
                    @endphp
                    @foreach ($vacantes as $vacante)
                      <tr>
                          <td class="text-center">{{$i+1}}</td>
                          <td>{{ $vacante->titulo }}</td>
                          <td>{{ $vacante->descripcion }}</td>
                          <td>{{ $nomEmp[$i]->nombre }}</td>
                          @if( $vacante->cantidad == null)
                            <td>{{ $vacante->fijar }}</td>
                          @else
                            <td>{{ $vacante->cantidad }}, {{ $vacante->tiempoSalario }}</td>
                          @endif
                          <!-- <td class="td-actions text-right">
                            <form action="/verVacante/{{ $vacante->id }}" method="POST">
                              {{ csrf_field() }}
                              <button  rel="tooltip" class="btn btn-primary">
                                  <i class="material-icons">info</i>
                              </button>
                            </form>
                          </td> -->
                          <td class="td-actions text-right">
                            <form action="/verAplicaciones/{{ $vacante->id }}" method="get">
                              {{ csrf_field() }}
                              <button  rel="tooltip" class="btn btn-primary">
                                  <i class="material-icons">assignment</i>
                              </button>
                            </form>
                          </td>
                          <td>
                            <form class="" action="bajaVacante/{{ $vacante->id }}" method="get">
                              <button type="submit" name="bajaVac" class="bajaVac">x
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
              </h4>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
</div>

@endsection
