@extends('layouts.app', ['activePage' => '', '' => __('Viendo informacion')])

@section('content')

<style>
.content{
  text-align: center;
}
select {

text-align-last: center;
padding-right: 29px;

}
</style>

<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Estadistica general.</h3>
        <p class="card-category">
        </p>
      </div>
      <div class="col-md-12">
        <div class="">
          <form action="/estadisticas2" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            Usuarios aspirantes: {{ $asp }}<br>
            Usuarios de empresas: {{ $emp }}<br>
            Solicitudes de vacantes: {{ $vac }}<br>
            <br>
            <div class="filtro">

              <label for="">Ver informacion de:</label>
              <select class="form-control" name="filtro" data-style="btn btn-link" >
                <option value="0" @php if($opcF=='0'){echo 'selected';} @endphp>15 dias</option>
                <option value="1" @php if($opcF=='1'){echo 'selected';} @endphp>1 mes</option>
                <option value="2" @php if($opcF=='2'){echo 'selected';} @endphp>3 meses</option>
                <option value="3" @php if($opcF=='3'){echo 'selected';} @endphp>6 meses</option>
              </select>
            </div>
            <div class="filtro">

              <label for="">Carrera a filtrar:</label>
              <select class="form-control"  name="lic" id='lic' data-style="btn btn-link">
                <option value="0" @php if($opcL==0){echo 'selected';} @endphp>Todas las carreras</option>
                <option value="Tronco Comun" @php if($opcL=='Tronco Comun'){echo 'selected';} @endphp>Tronco Comun</option>
                <option value="Administracion de Empresas" @php if($opcL=='Administracion de Empresas'){echo 'selected';} @endphp>Administracion de Empresas</option>
                <option value="Contabilidad" @php if($opcL=='Contabilidad'){echo 'selected';} @endphp>Contabilidad</option>
                <option value="Informatica" @php if($opcL=='Informatica'){echo 'selected';} @endphp>Informatica</option>
                <option value="Negocios Internacionales" @php if($opcL=='Negocios Internacionales'){echo 'selected';} @endphp>Negocios Internacionales</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar por seleccion</button>
          </form>

 @if( $solicitando <> 0)
          <b>Estadisticas (tiempo de respuesta):</b><br>
          Promedio de tardanza: Meses: {{$promM}}, Dias: {{$promD}}, Horas: {{$promH}} <br>
          Maxima tardanza: Meses: {{$maxM}}, Dias: {{$maxD}}, Horas: {{$maxH}} <br>
          Minima tardanza: Meses: {{$minM}}, Dias: {{$minD}}, Horas: {{$minH}} <br>
          Total de solicitudes: {{$solicitando}}<br>
          Solicitudes en progreso: {{$progreso}} ({{$progreso/$solicitando*100}}%)<br>
          Cantidad aceptados: {{$aceptados}} ({{$aceptados/$solicitando*100}}%)<br>
          Cantidad de rechazados: {{$rechazados}} ({{$rechazados/$solicitando*100}}%)<br>
        </div>
        <div class="">
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
          <canvas id="myChart" ></canvas>
          <script>
var ctx = document.getElementById('myChart');
var myChart = new Chart (ctx, {
    type: 'pie',
    data: {
        labels: ['En progreso', 'Aceptadas', 'Rechazadas'],
        datasets: [{
            label: '# of Votes',
            data: [{{$progreso}}, {{$aceptados}}, {{$rechazados}}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@else
  No hay solicitudes para realizar estadisticas.
@endif
        <form action="/verBitacoraTodo" method="POST" class="form-horizontal">
          {{ csrf_field() }}
          <button type="submit" name="button" class="btn btn-primary">Ver todos los datos</button>
        </form>
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
