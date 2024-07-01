@extends('layouts.app', ['activePage' => '', '' => __('AgregarConocimiento')])

@section('content')
<style media="screen">
.Conocimientos{
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
        <h3 class="card-title">Agregar Conocimiento</h3>
        <p class="card-category">Para agregar conocimiento que tienes
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
            <!-- <div class="col-md- col-10 ml-auto mr-auto text-center"> -->
            <div class="col-md-8 ml-auto mr-auto">
              <h4 class="card-title">
                <br>
								<form action="agregarConocimiento" method="POST" class="form-horizontal">
                  {{ csrf_field() }}


                  <div class="form-group">
                    <label>Conocimiento que voy a agregar:</label>
                    <input list="conocimientos" name="conocimiento" id="conocimiento" required>
                    <datalist id="conocimientos">
                      @foreach ($conocimientos as $conocimiento)
                        <option id='{{ $conocimiento->id }}' value='{{ $conocimiento->nombre }}'></option>
                      @endforeach
                    </datalist>
                    <br>
                    <br>
	                   <div class="Conocimientos">
                    <label>Conocimiento que tengo:</label><br>
                    @foreach ($conocimientoAsp as $conAsp)
                    <div class="forma">
                      <label for="conocimientosAspirante">{{ $conAsp->nombre }}</label><br>
                    </div>

                    @endforeach
                    <br>
                    @php
                    //var_dump($conocimientoAsp);
                    @endphp
                  </div>
<br>
<div class="Boton1">
  <button type="submit" class="btn btn-primary">Agregar conocimiento</button>

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
