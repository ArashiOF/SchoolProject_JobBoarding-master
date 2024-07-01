@extends('layouts.app', ['activePage' => '', '' => __('agregarEmpresa')])

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Agregar empresa</h3>
        <p class="card-category">Aqui puede agregar empresa
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
            <!-- <div class="col-md- col-10 ml-auto mr-auto text-center"> -->
            <div class="col-md-8 ml-auto mr-auto">
              <h4 class="card-title">
                <br>
                <form action="guardarEmpresa" method="POST" class="form-horizontal">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="nombre">Nombre de la empresa</label>
                    <input type="text" class="form-control" id="nombre" name = 'nombre' required maxlength="40">
                  </div>

                  <div class="form-group">
                    <label for="descripcion">Descripcion de la empresa</label>
                    <input type="text" class="form-control" id="descripcion" name = 'descripcion' required maxlength="40">
                  </div>

                  <div class="form-group">
                    <label for="calle">Calle de la empresa</label>
                    <input type="text" class="form-control" id="calle" name = 'calle' maxlength="40">
                  </div>

                  <div class="form-group">
                    <label for="url">URL del sitio de la empresa</label>
                    <input type="text" class="form-control" id="url" name = 'url' maxlength="40">
                  </div>

                  <button type="submit" class="btn btn-primary">Guardar empresa</button>
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
