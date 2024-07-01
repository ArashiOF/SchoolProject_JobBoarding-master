@extends('layouts.app', ['activePage' => '', 'titlePage' => __('Ver vacante')])

<style media="screen">
#texto{
  text-align: center;
}

  }
</style>
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Ver vacante</h3>
        <p class="card-category">Detalles de la vacante seleccionada
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">


            <div class="col-md-8 ml-auto mr-auto" id="texto">
              <h4 class="card-title">
                <br>
                <label for="titulo">Título de la vacante</label>
                <h5>{{$vacante->titulo}}</h5>

                <label for="desc">Descripcion de vacante:</label>
                <h5>{{$vacante->descripcion}}</h5>
                @if ( $vacante->nombreEmpresa <> null)
                <label>Nombre de la empresa: </label> <br>
                <h5>{{ $vacante->nombreEmpresa}}</h5>

                @else

                <label>Nombre de la empresa: </label> <br>
                <h5>{{$emp->nombre}}</h5>

                <label>Descripcion de la empresa:</label> <br>
                <h5>{{$emp->descripcion}}</h5>

                <label>Pagina de la empresa: </label> <br>
                <h5>{{$emp->url}}</h5>

                <label>Ubicacion de la empresa: </label> <br>
                <h5>{{$emp->direccion}}</h5>

                @endif
                <label>Ubicacion de la vacante: </label>
                <!-- //convertir a dinero? --><br>
                <h5>{{$vacante->calle}}</h5>
                <label for="">Salario publicado:</label>
                <h5>
                  @if ($vacante->cantidad == null)
                    Fijar en entrevista
                  @else
                    ${{$vacante->cantidad}}, {{ $vacante->tiempoSalario }}
                  @endif
                 </h5>
                <!-- condicionar a solo mostrar si es temporal -->
                <!-- mejor varias categorias: tiempo completo, medio tiempo, practicas -->
                <!-- <h3>Es temporal: {{$vacante->temporal}}</h3> -->
                <label>Conocimientos solicitados:</label><br>
                @foreach ($conocimientos as $conocimiento)
                <div class="forma">
                  -{{ $conocimiento->nombre }}<br>
                </div>
                @endforeach
                <label>Habilidades solicitados:</label><br>
                @foreach ($habilidades as $habilidad)
                <div class="forma">
                  -{{ $habilidad->nombre }}<br>
                </div>
                @endforeach

                @if ($vacante->file == null)

                @else
                <label for="titulo">Contenido extra de la vacante </label> <a href="/storage/{{$vacante->file}}" download>Descarga</a>
                <iframe src="/storage/{{$vacante->file}}" style="width:600px; height:500px;" frameborder="0"></iframe>

                @endif
                <!-- <label for="">{{$url}}</label> -->
                <div class="fb-share-button" data-href="{{$url}}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url}}" class="fb-xfbml-parse-ignore">Compartir</a></div>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v8.0" nonce="tZVykJrZ"></script>

              </h4>
            </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
