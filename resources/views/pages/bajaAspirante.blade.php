@extends('layouts.app', ['activePage' => 'notifications', 'titlePage' => __('Aplicación exitosa')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Se ha dado de baja el aspirante: {{ $nomAsp }}</h3>
        <p class="card-category">
        </p>
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
