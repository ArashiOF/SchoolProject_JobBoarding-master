@extends('layouts.app', ['activePage' => '', 'titlePage' => 'Bienvenido'])

@section('content')
<style>
form {
  display: inline-block;
}
</style>

<div class="content">
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
    <div class="container-fluid">
      <div class="card">
        <div class="card-header card-header-primary">
          <h3 class="card-title">Cuenta de Apoyo a Administrador </h3>
          <p class="card-category">
          </p>
        </div>
        <div class="col-md-12">
          <div class="places-buttons">
            <div class="row">
              <div class="col-md- ml-auto mr-auto text-center">
                <h4 class="card-title">
                  <br>
                  <br>

                  <h3>En la cuenta Apoyo por el momento podras ver y agregar vacantes para otras empresas.</h3>
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
</div>
@endsection