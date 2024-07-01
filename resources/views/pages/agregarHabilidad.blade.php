@extends('layouts.app', ['activePage' => '', '' => __('AgregarHabilidad')])

@section('content')
<style media="screen">
.Habilidades{
	border: #DEDEDE 3px solid;
	border-radius: .5em;
	text-align: center;
}
.Boton2{
 margin-left: 400px;

}
.Boton1{
 margin-left: 220px;

}
</style>
@php
$b=0;
@endphp
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Agregar Habilidad</h3>
        <p class="card-category">Para agregar Habilidad que tienes
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
            <!-- <div class="col-md- col-10 ml-auto mr-auto text-center"> -->
            <div class="col-md-8 ml-auto mr-auto">
              <h4 class="card-title">
                <br>
								<form action="agregarHabilidad" method="POST" class="form-horizontal">
                  {{ csrf_field() }}


                  <div class="form-group">
                    <label>Habilidad que voy a agregar:</label>
                    <input list="habilidades" name="habilidad" id="habilidad" required>
                    <datalist id="habilidades">
                      @foreach ($habilidades as $habilidad)
                        <option id='{{ $habilidad->id }}' value='{{ $habilidad->nombre }}'></option>
                      @endforeach
                    </datalist>
                    <br>
                    <br>
	                   <div class="Habilidades">
                    <label>Habilidad que tengo:</label><br>
                    @foreach ($habilidadAsp as $habAsp)
                    <div class="forma">
                      <label for="habilidadesAspirante">{{ $habAsp->nombre }}</label><br>
                    </div>

                    @endforeach
                    <br>
                    @php
                    //var_dump($habilidadAsp);
                    @endphp
                  </div>
<br>
<div class="Boton1">
  <button type="submit" class="btn btn-primary">Agregar habilidad</button>

</div>
                </form>
              </h4>
            </div>
          </div>
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
