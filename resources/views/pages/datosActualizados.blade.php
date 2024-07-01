@extends('layouts.app', ['activePage' => '', '' => __('Actualización de examen')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Informacion actualizada</h3>
        <p class="card-category">
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
            <div class="col-md- ml-auto mr-auto text-center">
              <h4 class="card-title">
<h3>La informacion del usuario ha si actualizada con exito</h3>
                <form action="/" method="GET" class="form-horizontal">
                {{ csrf_field() }}
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
