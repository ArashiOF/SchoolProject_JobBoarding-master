@extends('layouts.app', ['activePage' => '', '' => __('agregarVacante')])

@section('content')
<style media="screen">
.Conocimientos,.Habilidades{
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

<script type="text/JavaScript">
var i=0;
var j=0;
// document.getElementById("myText").value = "Johnny Bravo";

function createNewElement() {
    // First create a DIV element.
			var txtNewInputBox = document.createElement('div');
			var txtNewInputBox2 = document.createElement('div');
			if (document.getElementById("conocimiento").value== "") {

			}
			else{
		    i++;
		    // Then add the content (a new input box) of the element.
			txtNewInputBox.innerHTML = "<label for='conocimiento'>"+i+" "+document.getElementById("conocimiento").value+"</label>";
		  // txtNewInputBox.innetHTML = "<input type='text' id='hab1' value="+document.getElementById("habilidad").value+">";
		  txtNewInputBox2.innerHTML = "<input type='hidden' id='con"+i+"' name='con"+i+"' value='"+document.getElementById("conocimiento").value+"'>";

		    // Finally put it where it is supposed to appear.
			document.getElementById("newElementId").appendChild(txtNewInputBox);
			document.getElementById("newElementId2").appendChild(txtNewInputBox2);

		  document.getElementById("conocimiento").value ="";
		  document.getElementById("cantCon").value = i;
		}
}
function createNewElementH() {
    // First create a DIV element.
			var txtNewInputBox = document.createElement('div');
			var txtNewInputBox2 = document.createElement('div');
			if (document.getElementById("habilidad").value== "") {

			}
			else{
		    j++;
		    // Then add the content (a new input box) of the element.
			txtNewInputBox.innerHTML = "<label for='habilidad'>"+j+" "+document.getElementById("habilidad").value+"</label>";
		  // txtNewInputBox.innetHTML = "<input type='text' id='hab1' value="+document.getElementById("habilidad").value+">";
		  txtNewInputBox2.innerHTML = "<input type='hidden' id='hab"+j+"' name='hab"+j+"' value='"+document.getElementById("habilidad").value+"'>";

		    // Finally put it where it is supposed to appear.
			document.getElementById("newElementIdH").appendChild(txtNewInputBox);
			document.getElementById("newElementIdH2").appendChild(txtNewInputBox2);

		  document.getElementById("habilidad").value ="";
		  document.getElementById("cantHab").value = j;
		}
}
</script>

<div class="content">
  <input type="hidden" name="con" value="">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-primary">
        <h3 class="card-title">Agregar vacante</h3>
        <p class="card-category">Aqui puede agregar vacante
        </p>
      </div>
      <div class="col-md-12">
        <div class="places-buttons">
          <div class="row">
            <!-- <div class="col-md- col-10 ml-auto mr-auto text-center"> -->
            <div class="col-md-8 ml-auto mr-auto">
              <h4 class="card-title">
                <br>
                <form action="guardarVacante" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <!-- <label for="empresaid">ID de la empresa</label>
                    <input type="number" class="form-control" id="empresaid" name = 'empresaid' required maxlength="40"> -->
                    <input type="hidden" name="empresaid" id="empresaid" value='{{$empresa->id}}'>
                  </div>

                  <div class="form-group">
                    <!-- <label for="userid">ID del empleado/usuario</label>
                    <input type="number" class="form-control" id="userid" name = 'userid' required maxlength="40"> -->
                    <input type="hidden" name="userid" id="userid" value='{{$user->id}}'>
                  </div>

                  <div class="form-group">
                    <label for="titulo">Título de la vacante</label>
                    <input type="text" class="form-control" id="titulo" name = 'titulo' required maxlength="40" placeholder="Tiene limite de caracteres: 40 maximo">
                  </div>

                  <div class="form-group">
                    <label for="descripcion">Descripcion de la vacante</label>
                    <input type="text" class="form-control" id="descripcion" name = 'descripcion' required maxlength="40" placeholder="Tiene limite de caracteres: 40 maximo">
                  </div>

									<div class="form-group">
										<label for="dirigirVacante">A que Carrera/Carreras va dirigida la vacante</label>
									</br><input type="checkbox" name="troncoComun" value='true' id="TC"><label for=""> Tronco Comun</label>
											</br><input type="checkbox" name="administracion" value='true' id="LAE"><label for=""> Administracion de Empresas</label>
											</br><input type="checkbox" name="contabilidad" value='true' id="LC"><label for=""> Contabilidad</label>
											</br><input type="checkbox" name="informatica" value='true' id="LI"><label for=""> Informatica</label>
											</br><input type="checkbox" name="negocios_Internacionales" value='true' id="LNI"><label for=""> Negocios Internacionales</label>
									</div>

									<div class="form-group">
										<label for="labores">Agregar Labores/Tareas a realizar de la vacante </label><br>
										<textarea id="tareas" name = 'tareas' rows="5" cols="40" required maxlength="120" placeholder="Tiene limite de caracteres: 120 maximo"> </textarea>
									</div>

									<label class="form-group">Agregar archivo con detalles de la vacante</label>
										<input type="file" class="form-control" name="file" id="file" > <br>

                  <div class="form-group">
                    <label for="expira">Agregar fecha para cerrar la vacante</label>
                    <input type="date" class="form-control" id="expira" name = 'expira' maxlength="40" required>
                  </div>

                  <!-- <div class="form-group">
                    <label for="activo">Activo</label>
                    <input type="checkbox" class="form-control" id="activo" name = 'activo' value="true" checked>
                  </div> -->

										<label for="Salario">Salario</label>
										<div class="form-group">
                    <input type="radio" name="salario" id="fijar" onclick="botones()" required><input type="hidden" name="valorEntrevista" id="valorEntrevista" >	<label id="Entrevista">   Fijar en entrevista</label>
                  </div>

                  <input type="radio" name="salario" id="agregarSalario" onclick="botones()"><label id="Salario">    Agregar Salario</label>
									<div class="form-group">
                    <select class="form-control" id="tiempoSal" name="tiempoSal" disabled = "true" data-style="btn btn-link">
                      <option value="dia">Diario</option>
                      <option value="semanal">Semanal</option>
                      <option value="quincena">Por quincena</option>
                    </select>
									<input type="number" class="form-control" id="cantidad" name = 'cantidad' placeholder="Cantidad" disabled = "true" maxlength="40" min="1">
									</div>

								<script>
								function botones(){
		                if (document.getElementById("fijar").checked == true) {
		                    document.getElementById("Entrevista").style.color = "black";
												document.getElementById("Salario").style.color = "gray";
												document.getElementById("cantidad").style.color = "gray";
												document.getElementById("tiempoSal").style.color = "gray";
												document.getElementById("tiempoSal").disabled = true;
												document.getElementById("cantidad").disabled = true;
												document.getElementById("valorEntrevista").value="fijar en entrevista";
												document.getElementById("tiempoSal").value="null";

		                }
										else if(document.getElementById("agregarSalario").checked == true) {
											document.getElementById("Salario").style.color = "black";
											document.getElementById("tiempoSal").style.color = "black";
											document.getElementById("Salario").style.color = "black";
											document.getElementById("Entrevista").style.color = "gray";
											document.getElementById("tiempoSal").disabled = false;
											document.getElementById("cantidad").disabled = false;
											document.getElementById("valorEntrevista").value="null";
										}
								}
								</script>
                  <!-- <div class="form-group">
                    <label for="estemporal">¿Es una posición temporal?</label>
                    <input type="checkbox" class="form-control" id="estemporal" name = 'estemporal' value="true">
                  </div> -->
									<br>
                  <div class="form-group">
                    <label for="calle">Calle</label>
                    <input type="text" class="form-control" id="calle" name = 'calle' required>
                  </div>

									<div class="form-group">
                    <label for="calle">Cantidad de vacantes disponibles:</label>
                    <input type="number" class="form-control" id="disponible" name = 'disponible' min="1" required>
                  </div>

                  <input type="hidden" id="cantCon" name="cantCon" value="0">

                  <div class="form-group">
                    <label>Agregar Conocimientos que debe tener el Aspirante:</label>
                    <input list="conocimientos" name="conocimiento" id="conocimiento"  >
                    <datalist id="conocimientos">
                      @foreach ($conocimientos as $conocimiento)
                        <option id='{{ $conocimiento->id }}' value='{{ $conocimiento->nombre }}'></option>
                      @endforeach
                    </datalist>
                    <br>
  									<br>

										<div class="Conocimientos">
                    <label>Lista de Conocimientos Solicitados:</label><br>
                    <div id="newElementId"></div>
										<div id="newElementId2"></div>
                    <br>

										</div>
										<br>
										<div id="dynamicCheck" class="Boton1">

											 <button type="button" class="btn btn-primary" onclick="createNewElement();"/>Agregar Conocimiento </button>
											 </div>
                  </div>
									<input type="hidden" id="cantHab" name="cantHab" value="0">

                  <div class="form-group">
                    <label>Agregar habilidades que debe tener el Aspirante:</label>
                    <input list="habilidades" name="habilidad" id="habilidad"  >
                    <datalist id="habilidades">
                      @foreach ($habilidades as $habilidad)
                        <option id='{{ $habilidad->id }}' value='{{ $habilidad->nombre }}'></option>
                      @endforeach
                    </datalist>
                    <br>
  									<br>

										<div class="Habilidades">
                    <label>Lista de habilidades Solicitados:</label><br>
                    <div id="newElementIdH"></div>
										<div id="newElementIdH2"></div>
                    <br>

										</div>
										<br>
										<div id="dynamicCheckH" class="Boton1">

											 <button type="button" class="btn btn-primary" onclick="createNewElementH();"/>Agregar Habilidad </button>
											 </div>
                  </div>
									<div class="Boton2">
										<button type="submit" class="btn btn-primary">Guardar vacante</button>

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
@endsection
