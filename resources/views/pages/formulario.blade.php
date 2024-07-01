<!-- @extends('layouts.app', ['activePage' => '', '' => __('agregarVacante')])

@section('content')
<style media="screen">
.Habilidades{
	border: #DEDEDE 3px solid;
	border-radius: .5em;
	text-align: center;
}
.Boton2{
 margin-left: 500px;

}
.Boton1{
 margin-left: 240px;

}
</style>


<div class="content">
  <input type="hidden" name="hab" value="">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Agregar archivo</h3>
        <p class="card-category">Aqui puede agregar archivos
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
             <div class="col-md- col-10 ml-auto mr-auto text-center"> -->
            <!--<div class="col-md-8 ml-auto mr-auto">
              <h4 class="card-title">
                <br>
                <form method="POST" action="storage/create" accept-charset="UTF-8" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>


            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection -->
<html>
<head>
<title>Your Website Title</title>
</head>
<body>
<div class="fb-share-button" data-href="" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2Fshare-button%3Flocale%3Des_ES&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v8.0" nonce="tZVykJrZ"></script>
</body>
</html>
