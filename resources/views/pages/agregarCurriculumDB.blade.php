@extends('layouts.app', ['activePage' => '', '' => __('AgregarConocimiento')])

@section('content')
<style media="screen">
.Conocimientos{
	border: #DEDEDE 3px solid;
	border-radius: .5em;
	text-align: center;
}
.listaConocimientos{
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
        <h3 class="card-title">Agregar Curriculum</h3>
        <p class="card-category">Para agregar tu curriculum y las empresas puedan verlo
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
            <!-- <div class="col-md- col-10 ml-auto mr-auto text-center"> -->
            <div class="col-md-8 ml-auto mr-auto">
              <h4 class="card-title">
                <br>
								<form method="POST" action="agregarCurriculumDB" accept-charset="UTF-8" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <label class="col-md-4 control-label">Agregar Curriculum</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>


            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Subir</button>
              </div>
            </div>
          </form>
	              </h4>
								@if ($cv == null)

                @else
                <label for="titulo">Vista previa del curriculum </label> <a href="/storage/{{$cv}}" download>Descarga</a>
                <iframe src="/storage/{{$cv}}" style="width:600px; height:500px;" frameborder="0"></iframe>

                @endif
	            </div>
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