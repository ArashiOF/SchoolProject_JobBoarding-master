<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth; //para poder obtener el id del usuario
use Illuminate\Http\Request;
use App\User;
use App\Empresa;
use App\Vacante;
use App\Aspirante;
use App\Conocimiento;
use App\Habilidad;
use App\Users_vacantes;
use App\Aspirante_conocimiento;
use App\Aspirante_habilidad;
use App\Vacante_conocimiento;
use App\Vacante_habilidad;
use App\Bitacora_aspVac_estado;
use App\TotalSolicitud;
use DateTime;//utilizar para manejar valores de fechas

class MailController extends Controller
{
    public function send()
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';

        Mail::to("fabian.arias@uabc.edu.mx")->send(new DemoEmail($objDemo));

    }

    function aplicarVacante($vacanteid) {
      $user_vacante = new Users_vacantes;
      $user_vacante->userid = Auth::id();
      $user_vacante->vacanteid = $vacanteid;
      $user_vacante->estado = "solicitando";
      $user_vacante->save();
      $total_solicitud = new TotalSolicitud;
      $aspirante = Aspirante::where('userid', Auth::id())->first();
      $total_solicitud->carrera = $aspirante->licenciatura;
      $total_solicitud->save();

      $vacante = Vacante::find($vacanteid);

      $usuarioAsp = User::find(Auth::id());
      $usuarioEmp = User::find($vacante->userid);

      $objDemo = new \stdClass();
      $objDemo->demo_one = env('RUTA_SITIO', 'default_value').'verAplicaciones/'.$user_vacante->vacanteid;
      $objDemo->demo_two = 'Demo Two Value';
      $objDemo->sender = $usuarioAsp->name;
      $objDemo->receiver = $usuarioEmp->name;

      Mail::to($usuarioEmp->email)->send(new DemoEmail($objDemo));

      return view('pages.exitoAplicar', [
          'vacante' => $vacante
      ]);
    }

    function guardarVacante(Request $request) {

        $carreras = "";
        if($request->troncoComun == 'true'){
          $carreras = $carreras."Tronco Comun\n";
        }
        if($request->administracion == 'true'){
          $carreras = $carreras."Administracion\n";
        }
        if($request->contabilidad == 'true'){
          $carreras = $carreras."Contabilidad\n";
        }
        if($request->informatica == 'true'){
          $carreras = $carreras."Informatica\n";
        }
        if($request->negocios_Internacionales == 'true'){
          $carreras = $carreras."Negocios Internacionales\n";
        }
        $vacante = new Vacante;
        if ($request->empresaid == -1){
          $vacante->nombreEmpresa = $request->nombre;
        }else{
        $vacante->empresaid = $request->empresaid;
        $nomEmp = Empresa::find($request->empresaid)->value('nombre');
        }
        $vacante->userid = $request->userid;
        $vacante->titulo = $request->titulo;
        if($request->file('file') <> null) {
            $vacante->file = $request->file('file')->getClientOriginalName();
        }
        $vacante->expira = $request->expira;
        $vacante->descripcion = $request->descripcion;
        $vacante->tareas = $request->tareas;
        $vacante->fijar = $request->valorEntrevista;
        $vacante->cantidad = $request->cantidad;
        $vacante->calle = $request->calle;
        $vacante->nDisponibles = $request->disponible;
        $vacante->carreras = $carreras;
        // $vacante->activo = ($request->activo == 'true') ? 1 : 0;
        // $vacante->estemporal = ($request->estemporal == 'true') ? 1 : 0;
        $vacante->tiempoSalario = $request->tiempoSal;
        $vacante->save();



        $i=0;
        while($i<$request->cantCon){
          $i++;
          $leyenda = "con".$i;
          $vac_con = new Vacante_conocimiento;
          $vac_con->vacanteId = $vacante->id;
          $idConocimiento = Conocimiento::where('nombre', $request->$leyenda)->value('id');
          $vac_con->conocimientoId = $idConocimiento;
          $vac_con->save();

          $asp_cons = Aspirante_conocimiento::where('conocimientoId', $idConocimiento)->get();
          foreach ($asp_cons as $asp_con) {
            $aspirante = User::find($asp_con->userid);

            $objDemo = new \stdClass();
            $objDemo->demo_one = env('RUTA_SITIO', 'default_value').'verVacante/'.$vacante->id;
            $objDemo->demo_two = 'Demo Two Value';
            $objDemo->sender = $nomEmp;
            $objDemo->receiver = $aspirante->name;

            Mail::to($aspirante->email)->send(new DemoEmail($objDemo));
          }//foreach
        }//while
        $i=0;
        while($i<$request->cantHab){
          $i++;
          $leyenda = "hab".$i;
          $vac_hab = new Vacante_habilidad;
          $vac_hab->vacanteId = $vacante->id;
          $idHabilidad = Habilidad::where('nombre', $request->$leyenda)->value('id');
          $vac_hab->habilidadId = $idHabilidad;
          $vac_hab->save();
        }//while

          if($request->file('file') <> null) {
            $file = $request->file('file');
            //obtenemos el nombre del archivo
            $nombre = $request->file('file')->getClientOriginalName();
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put($nombre,  \File::get($file));
          }
          return view('pages.exitoVacante', [

        ]);
    }

    function cambiarEstado2 (request $request) {
      $user_vacante = Users_vacantes::where('vacanteid', '=', $request->vacanteid)->
                                      where('userid', '=', $request->userid)->first();

      $vacante = Vacante::find($user_vacante->vacanteid);
      $userEmpresa = User::find($vacante->userid);

      $bitacora = new Bitacora_aspVac_estado;
      $bitacora->userid = $userEmpresa->id;
      $bitacora->carrera = Aspirante::find($request->aspid)->licenciatura;
      $bitacora->estadoAnterior = $user_vacante->estado;
      $bitacora->estadoCambiado = $request->estado;

      $ultimoDiaCambio = new Datetime($user_vacante->updated_at); //conseguir la ultima fecha de actualizacion de info
      // $bitacora->diferencia = '2020-08-10 05:04:28';
      // $bitacora->save();
      if($request->estado <> "baja") {
        $user_vacante->estado = $request->estado;
        // $user_vacante->updated_at = '2019-05-26 01:05:06';
        $user_vacante->save();

        $cambioNuevo = new DateTime($user_vacante->updated_at);//consigue la fecha actual (la que se actualizo)
        // $cambioNuevo = new DateTime('2020-08-16 08:46:32');
        $bitacora->tiempoAnterior = $ultimoDiaCambio;
        // $bitacora->tiempoCambiado = $cambioNuevo;
        $bitacora->tiempoCambiado = $cambioNuevo;
        $intervalo = $ultimoDiaCambio->diff($cambioNuevo);//saca diferencia de fechas
        $bitacora->diffMes = $intervalo->format('%M');
        $bitacora->diffDia = $intervalo->format('%D');
        $bitacora->diffHora = $intervalo->format('%H');
        // $intervalo = $intervalo->format('%MDHI');
        // $bitacora->diferencia = $intervalo->format('20%Y-%M-%D %H:%I:%S');
        // $bitacora->diferencia = '2020-08-10 10:31:45';
        $bitacora->save();

        $aspirante = User::find($user_vacante->userid);

        $objDemo = new \stdClass();
        $objDemo->demo_one = $request->estado;
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = Auth::user()->name;
        $objDemo->receiver = $aspirante->name;

        Mail::to($aspirante->email)->send(new DemoEmail($objDemo));

        return view('pages.exitoEstado', [
          'nomAsp' => $aspirante->name,
          'usr_vac' => $user_vacante
        ]);
      }
      else{
        $aspirante = User::find($user_vacante->userid);
        $cambioNuevo = new DateTime(date('Y-m-d H:i:s'));
        $bitacora->tiempoAnterior = $ultimoDiaCambio;
        $bitacora->tiempoCambiado = $cambioNuevo;
        $intervalo = $ultimoDiaCambio->diff($cambioNuevo);//saca diferencia de fechas
        $bitacora->diffMes = $intervalo->format('%M');
        $bitacora->diffDia = $intervalo->format('%D');
        $bitacora->diffHora = $intervalo->format('%H');
        $bitacora->save();
        $user_vacante->delete();

        $objDemo = new \stdClass();
        $objDemo->demo_one = $request->estado;
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = Auth::user()->name;
        $objDemo->receiver = $aspirante->name;

        Mail::to($aspirante->email)->send(new DemoEmail($objDemo));

        return view('pages.bajaAspirante', [
          'nomAsp' => $aspirante->name
        ]);
      }
    }
}
