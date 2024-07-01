<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; //para poder obtener el id del usuario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Empresa;
use App\Vacante;
use App\Users_vacantes;
use App\Aspirante;
use App\Conocimiento;
use App\Habilidad;
use App\Aspirante_conocimiento;
use App\Aspirante_habilidad;
use App\Vacante_conocimiento;
use App\Vacante_habilidad;
use App\Bitacora_aspVac_estado;
use App\Aspirante_idioma;
use App\TotalSolicitud;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
      $id = Auth::id();
      $user = User::find($id);
      $nombre = $user->name;
      $tipo = $user->tipoUsuario;

      if($tipo==0){
        $aspirante = Aspirante::where('userid', $id)->first();
        return view('pages.indexAsp', [
          'nombre' => $nombre, 'user' => $user,
          'tipoUs' => $tipo, 'aspirante' => $aspirante
        ]);
      }
      elseif($tipo==1){
        $empresa = Empresa::where('userid', $id)->first();
        $idEmpresa = $empresa->id;
        $vacantes = Vacante::where('empresaid', '=', $empresa->id)->orderBy('created_at', 'asc')->get();
        $nomEmpresa = [];
        foreach($vacantes as $vacante){
          array_push($nomEmpresa, (Empresa::find($vacante->empresaid)));
        }
        return view('pages.index', [
            'nombre' => $nombre,
            'user' => $user, 'empresa' => $empresa, 'tipoUs' => $tipo, 'vacantes' => $vacantes,
            'nomEmp' => $nomEmpresa
        ]);

      }
      // else {
      //   return view('pages.exitoCompartir', [
      //
      //   ]);
        // return view('pages.index', [
        //     'user' => $user, 'tipoUs' => $tipo, 'nombre' => $nombre
        // ]);
      // }
      elseif($tipo==2){
        // $ruta = env('RUTA_SITIO', 'default_value').'verAplicaciones/';
        // $tipoUsuario = Auth::user()->tipoUsuario;
        // return view('pages.exitoCompartir', [
        //   'ruta' => $ruta, 'tipo' => $tipoUsuario
        // ]);
        return view('pages.admin', [

        ]);
      }
      else{
        return view('pages.adminAux', [

        ]);
      }
      // return view('pages.index', [
      //     'encuestas' => $encuestas, 'categorias' => $categorias,  'nombre' => $nombre,
      //     'empresa' => $empresa, 'aspirante' =>$aspirantes
      // ]);

      //return view('dashboard');
    }

    public function filtrar($cadena){
        $lista_palabras = array('abanto', 'abrazafarolas', 'adufe', 'afloja', 'alcornoque', 'alfeñíque', 'anal', 'andurriasmo', 'argentuzo', 'argentuso', 'argentucho', 'arrastracueros', 'Arse', 'Arsehole', 'arseholes', 'artabán', 'artaban', 'ass', 'asshole', 'assholes', 'auschwitz', 'ausschwitz', 'aguebonado', 'aguebonada', 'agüevonado', 'agüevonada', 'asco', 'asqueroso', 'asquerosa', 'aweonado', 'aweonada', 'awebonado', 'awebonada', 'awevonado', 'awevonada', 'baboso', 'babosa', 'babosadas', 'Bellaco', 'bitch', 'bizcocho', 'blow', 'Blowjob', 'Bollocks', 'bolú', 'bolu', 'boludo', 'b0ludo', 'bolud0', 'b0lud0', 'boluda', 'b0luda', 'boobs', 'bufarron', 'bufarrón', 'bujarron', 'bujarrón', 'buey', 'Bullshit', 'buttfuck', 'buttfucker', 'cabilla', 'cabron', 'cabrón', 'cabrona', 'caca', 'Cachapera', 'cagalera', 'cagar', 'caga', 'cagante', 'cagarla', 'cagaste', 'cagaste', 'cagón', 'cagon', 'cagona', 'cancer', 'cáncer', 'Carado', 'caramonda', 'caramono', 'caremono', 'caramondá', 'caraculo', 'careculo', 'carepito', 'carapito', 'carapendejo', 'carependejo', 'castra', 'castroso', 'castrosa', 'castrante', 'chacha', 'chachar', 'chichar', 'chichis', 'chilote', 'chinga', 'chinga tu madre', 'chingadera', 'chingada', 'chingado', 'chíngate', 'chingate', 'chingar', 'chingas', 'chingaste', 'chingo', 'chingon', 'chingón', 'chingona', 'chingues', 'chinguisa', 'chinguiza', 'Chink', 'Chinky', 'chiquitingo', 'chocha', 'chój', 'chucha', 'chuchamadre', 'chuj', 'chupalo', 'chúpalo', 'chúpala', 'chupala', 'chwdp', 'cipa', 'cipo', 'cochon', 'cochón', 'cock', 'Cock', 'Cocks', 'Cocksucker', 'cogas', 'cojas', 'coger', 'cojete', 'cojón', 'cojon', 'cochar', 'coshar', 'cocho', 'comecaca', 'comepollas', 'comepoyas', 'coñazo', 'coñaso', 'concha', 'conchatumadre', 'conchadetumadre', 'conxetumare', 'conxetumadre', 'conxatumare', 'conxatumadre', 'conchetumare', 'conchatumare', 'coño', 'creido', 'creído', 'creida', 'creída', 'cuca', 'cueco', 'Cul', 'culea', 'culear', 'culera', 'culero', 'culiado', 'culiada', 'culiao', 'culia', 'culiad@', 'culo', 'Culo', 'Cum', 'Cunt', 'cunts', 'ctm', 'csm', 'Dick', 'Dickhead', 'Dicks', 'encabrona', 'encabronado', 'encabronada', 'emputar', 'enputar', 'emputo', 'enputo', 'empute', 'emputado', 'emputada', 'enputado', 'enputada', 'encular', 'Enculé', 'enculer', 'encula', 'enculada', 'enculado', 'enculo', 'estafador', 'estafadora', 'estupido', 'estúpido', 'estupida', 'estúpida', 'Faggot', 'falkland', 'falklands', 'fucklands', 'fuckland', 'falangista', 'fascista', 'Fellatio', 'fick', 'fistfuck', 'follada', 'follar', 'follo', 'follón', 'follon', 'Fook', 'Fooker', 'Fooking', 'Fotze', 'follada', 'foyada', 'frei', 'frijolero', 'Fuck', 'Fucker', 'Fuckers', 'Fucking', 'Führer', 'garcha', 'gilipolla', 'guatepeor', 'jilipolla', 'gachupín', 'gachupin', 'gilipoya', 'jilipoya', 'gonorrea', 'guevon', 'guevón', 'guevona', 'guey', 'heil', 'hideputa', 'hijodeputa', 'hijoputa', 'hdp', 'hitler', 'Hitler', 'hueva', 'huevon', 'huevón', 'huevona', 'HWDP', 'idiota', 'imbécil', 'imbecil', 'jalabola', 'Japseye', 'jeba&H107', 'jebanie', 'jebca', 'jilipollas', 'Jizz', 'job', 'jodan', 'jodas', 'jodaz', 'joder', 'jodido', 'jodida', 'joto', 'joyo', 'judenmutter', 'judensöhne', 'kaka', 'caka', 'kaca', 'kabron', 'kabrón', 'kabrona', 'Kike', 'korwa', 'kórwa', 'kurwa', 'kurwia', 'kutas', 'leck', 'leche', 'lexe', 'm4nco', 'macht', 'maldito', 'maldita', 'malnacida', 'Malnacido', 'malparida', 'malparido', 'Malvinas', 'mamada', 'mamadas', 'mamado', 'mamalo', 'mámalo', 'mamarla', 'mamaste', 'mames', 'mamón', 'mamon', 'mamona', 'manco', 'manko', 'manca', 'maraca', 'Marica', 'marico', 'Maricon', 'Maricón', 'maricones', 'maricona', 'mariconas', 'mariconson', 'mariconsón', 'mariconzón', 'mariconzon', 'mariqueta', 'mariquis', 'mayate', 'meco', 'mecos', 'melgambrea', 'merde', 'mexicaca', 'mejicaca', 'mexicoño', 'mejicoño', 'mejicaño', 'mexicaño', 'mich', 'mierda', 'm1erda', 'mierdero', 'mondá', 'monda', 'Mong', 'moraco', 'motherfucker', 'Motherfucking', 'Nazi', 'neger', 'negrata', 'Nègre', 'negrero', 'nekrofil', 'Nigga', 'Nigger', 'niggers', 'Niquer', 'no mames', 'odbyt', 'odjeba&H142o', 'ojete', 'ogete', 'pajear', 'pajote', 'Paki', 'pakis', 'panocha', 'Paragua', 'payaso', 'payasa', 'pecheche', 'peda', 'pederasta', 'pedo', 'pedota', 'pedota', 'pedofila', 'pedófila', 'pedofilo', 'pedófilo', 'pedón', 'pendeja', 'pendejear', 'pendejo', 'pendejos', 'pendejas', 'pelotudo', 'pel0tud0', 'pelotuda', 'pel0tuda', 'pene', 'percanta', 'perra', 'Perucho', 'pete', 'pierdol', 'pierdolic', 'pierdolona', 'Pinacate', 'pinche', 'pinches', 'pinga', 'pirobo', 'pito', 'pitudo', 'pizda', 'polla', 'porno', 'poronga', 'poya', 'Prick', 'Pricks', 'prostiputo', 'prostiputa', 'prostituir', 'prostituta', 'prostituto', 'proxeneta', 'pt', 'pucha', 'Puñeta', 'Pussy', 'puta', 'Putain', 'Putaso', 'Putazo', 'pute', 'Pute', 'Putete', 'putillo', 'putiyo', 'putito', 'putita', 'putitos', 'putitas', 'Putiza', 'puto', 'putos', 'putón', 'ql', 'qli40', 'qliao', 'qli4o', 'qlia0', 'qliaos', 'qli40s', 'qli4os', 'qlia0s', 'Queer', 'raghead', 'ragheads', 'rallig', 'ramera', 'rape', 'reculia', 'reculiao', 'retardado', 'retrasado', 'retrazado', 'renob', 'reql', 'rentafuck', 'ridiculo', 'ridículo', 'ridicula', 'ridícula', 'rimjob', 'rimming', 'rozpierdala&H107', 'rozpierdolone', 'rozpierdolony', 'rucha&H107', 'ruchanie', 'ruha&H107', 'ruski', 'ruskoff', 'ruskov', 's-c-v-m', 's.hit', 's&m', 's1ut', 'sackgesicht', 'sado-masochistic', 'sadomaso', 'sadomasochistic', 'sadomasoquismo', 'sadomasoquista', 'salame', 'salvatrucha', 'salvatrusha', 'salbatrucha', 'salbatrusha', 'samckdaddy', 'sandm', 'sandnigger', 'sangron', 'sangrón', 'sangrona', 'sangrones', 'sangronas', 'sarasa', 'sarracena', 'sarraceno', 'satan', 'satán', 'satánico', 'satanico', 'sausagejockey', 'sc*m', 'scat', 'schamhaar', 'scheiss', 'schlampe', 'schleu', 'schleuh', 'schlitzauge', 'schlong', 'schutzstaffel', 'schwanz', 'schwuchtel', 'scrote', 'scum', 'scum!', 'sh!t', 'sh!te', 'sh!tes', 'sh1\'t', 'sh1t', 'sh1te', 'sh1thead', 'sh1theads', 'shadybackroomdealings', 'shadydealings', 'shag', 'shaggers', 'shaggin', 'shagging', 'shat', 'shawtypimp', 'sheep-l0ver', 'sheep-l0vers', 'sheep-lover', 'sheep-lovers', 'sheep-shaggers', 'sheepl0ver', 'sheepl0vers', 'sheeplover', 'sheepshaggers', 'sheethead', 'sheetheads', 'sheister', 'shhit', 'shit', 'shít', 'shit4brains', 'shitass', 'shitbag', 'shitbagger', 'shitbrains', 'shitbreath', 'shitcunt', 'shitdick', 'shiteater', 'shited', 'shitface', 'shitfaced', 'shitforbrains', 'shitfuck', 'shitfucker', 'shitfull', 'shithapens', 'shithappens', 'shithead', 'shithole', 'shithouse', 'shiting', 'shitings', 'shitoutofluck', 'shits', 'shitspitter', 'shitstabber', 'shitstabbers', 'shitstain', 'shitted', 'shitter', 'shitters', 'shittiest', 'shitting', 'shittings', 'shitty', 'shiz', 'shiznit', 'shortfuck', 'shortfuck', 'shyte', 'sida', 's1da', 'sidoso', 's1doso', 'slag', 'slanderyou2.blogspot.com', 'slanteye', 'slut', 'slutbag', 'sluts', 'slutt', 'slutting', 'slutty', 'slutwear', 'slutwhore', 'slutwhore', 'smackdaddy', 'smackthemonkey', 'smagma', 'smartass', 'smeg', 'snortingcoke', 'sonofabitch', 'sorete', 'sonofbitch', 'soplapollas', 'soplapoyas', 'Spacka', 'Spast', 'Spasten', 'Spasti', 'Spaz', 'Spunk', 'Spunkbubble', 'sranie', 'subnormal', 'sucker', 'sudaca', 'sudaka', 'tarado', 'tarada', 'tarados', 'taradas', 'tarugo', 'tetas', 'tetona', 'tolete', 'tortillera', 'tortiyera', 'torpe', 'traga', 'Tranny', 'Twat', 'verga', 'vergasen', 'vergón', 'vergon', 'violar', 'Violer', 'Wank', 'Wanker', 'weon', 'weona', 'wey', 'wn wehon', 'wheon', 'weohn', 'weonh ', 'w3on', 'wetback', 'wyjeb&H107', 'wyjebac', 'wyjebany', 'wypierdol', 'xuxa', 'xuxas', 'Yoruga', 'zajeba&H107', 'zajebane', 'zajebany', 'zemen', 'zooplapollas', 'zoplapollas', 'zorra', 'zorriputa', 'zudaca', 'zudaka');

        $filtered_text = $cadena;

        foreach($lista_palabras as $palabra)
        {
            $match_count = preg_match_all('/' . $palabra . '/i', $cadena, $matches);
            for($i = 0; $i < $match_count; $i++)
                {
                    $bwstr = trim($matches[0][$i]);
                    $filtered_text = preg_replace('/\b' . $bwstr . '\b/', str_repeat("*", strlen($bwstr)), $filtered_text);
                }
        }

        if ($cadena != $filtered_text){
            return true;
        } else {
            return false;
        }
        //return $filtered_text;
    }

    function getEmpresas(Request $request) {
        //$empresas = Empresas->get();
        $empresas = Empresa::all();

        return view('pages.empresas ', [
            'empresas' => $empresas
        ]);
    }

    function agregarEmpresa(Request $request) {
        return view('pages.agregarEmpresa ', [
        ]);
    }

    function guardarEmpresa(Request $request) {
        $empresa = new Empresa;
        $empresa->nombre = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        $empresa->calle = $request->calle;
        $empresa->url = $request->url;
        $empresa->save();

        return redirect()->route('empresas');
    }

    function getVacantes() {
        $hoy = date('Y-m-d');
        $vacantes = DB::select("select * from vacantes where expira > '$hoy'");//%%
        $nomEmpresa = [];
        foreach($vacantes as $vacante){
          array_push($nomEmpresa, (Empresa::find($vacante->empresaid)));
        }
        // array_push($aspirantesNombre, (User::find($users_vacante->userid))->name);

        return view('pages.vacantes ', [
            'vacantes' => $vacantes,
            'nomEmp' => $nomEmpresa,
            'hoy' => $hoy
        ]);
    }
    function getadminVacantes(Request $request) {
        $hoy = date('Y-m-d');
        $vacantes = DB::select("select * from vacantes where expira > '$hoy'");//%%
        $nomEmpresa = [];
        foreach($vacantes as $vacante){
          array_push($nomEmpresa, (Empresa::find($vacante->empresaid)));
        }
        // array_push($aspirantesNombre, (User::find($users_vacante->userid))->name);

        return view('pages.adminVacantes ', [
            'vacantes' => $vacantes,
            'nomEmp' => $nomEmpresa,
            'hoy' => $hoy
        ]);
    }

    function agregarVacante(Request $request) {
        // $user = Auth::id();
        $id = Auth::id();
        $user = User::find($id);
        $conocimientos = Conocimiento::all();
        $habilidades = Habilidad::all();
        // $empresa = Empresa::find($user);
        $empresa = Empresa::where('userid', $id)->first();
        return view('pages.agregarVacante ', [
          'user' => $user,
          'empresa' => $empresa,
          'conocimientos' => $conocimientos,
          'habilidades' => $habilidades
        ]);
    }

    function adminAgregarVacante(Request $request) {
        // $user = Auth::id();
        $id = Auth::id();
        $user = User::find($id);
        $conocimientos = Conocimiento::all();
        $habilidades = Habilidad::all();
        // $empresa = Empresa::find($user);
        return view('pages.adminAgregarVacante ', [
          'user' => $user,
          'conocimientos' => $conocimientos,
          'habilidades' => $habilidades
        ]);
    }

    // function guardarVacante(Request $request) {
    //     $vacante = new Vacante;
    //     $vacante->empresaid = $request->empresaid;
    //     $vacante->userid = $request->userid;
    //     $vacante->titulo = $request->titulo;
    //     // $vacante->expira = $request->expira;
    //     $vacante->descripcion = $request->descripcion;
    //     $vacante->salario = $request->salario;
    //     $vacante->calle = $request->calle;
    //     // $vacante->activo = ($request->activo == 'true') ? 1 : 0;
    //     // $vacante->estemporal = ($request->estemporal == 'true') ? 1 : 0;
    //     $vacante->tiempoSalario = $request->tiempoSal;
    //     $vacante->save();
    //
    //     $i=0;
    //     while($i<$request->cantHab){
    //       $i++;
    //       $leyenda = "hab".$i;
    //       $vac_hab = new Vacante_habilidad;
    //       $vac_hab->vacanteId = $vacante->id;
    //       $vac_hab->habilidadId = Habilidad::where('nombre', $request->$leyenda)->value('id');
    //       $vac_hab->save();
    //     }
    //
    //     return view('pages.exitoVacante', [
    //
    //     ]);
    // }

    function verVacante($id) {
        $vacante = Vacante::find($id);
        $empresa = Empresa::find($vacante->empresaid);
        $vac_conocimientos = Vacante_conocimiento::where('vacanteId', $vacante->id)->get();
        $conocimientos = [];
        foreach($vac_conocimientos as $vac_conocimiento) {
          $conocimientos[] = Conocimiento::find($vac_conocimiento->conocimientoId);
        }
        $vac_habilidades = Vacante_habilidad::where('vacanteId', $vacante->id)->get();
        $habilidades = [];
        foreach($vac_habilidades as $vac_habilidad) {
          $habilidades[] = Habilidad::find($vac_habilidad->habilidadId);
        }

        return view('pages.vacante', [
            'vacante' => $vacante, 'emp' => $empresa,
            'conocimientos' => $conocimientos,
            'habilidades' => $habilidades
        ]);
    }

    function verAdminVacante($id) {
        $vacante = Vacante::find($id);
        $empresa = Empresa::find($vacante->empresaid);
        $vac_conocimientos = Vacante_conocimiento::where('vacanteId', $vacante->id)->get();
        $conocimientos = [];
        foreach($vac_conocimientos as $vac_conocimiento) {
          $conocimientos[] = Conocimiento::find($vac_conocimiento->conocimientoId);
        }
        $vac_habilidades = Vacante_habilidad::where('vacanteId', $vacante->id)->get();
        $habilidades = [];
        foreach($vac_habilidades as $vac_habilidad) {
          $habilidades[] = Habilidad::find($vac_habilidad->habilidadId);
        }
        $url_actual = env('RUTA_SITIO', 'default_value'). "/verVacante/" . $id;

        return view('pages.adminVacante', [
            'vacante' => $vacante, 'emp' => $empresa,
            'conocimientos' => $conocimientos,
            'habilidades' => $habilidades,
            'url' => $url_actual
        ]);
    }
    // function aplicarVacante($vacanteid) {
    //     $user_vacante = new Users_vacantes;
    //     $user_vacante->userid = Auth::id();
    //     $user_vacante-> vacanteid = $vacanteid;
    //     $user_vacante->save();
    //
    //     $vacante = Vacante::find($vacanteid);
    //
    //     return view('pages.exitoAplicar', [
    //         'vacante' => $vacante,
    //     ]);
    // }

    function verAplicaciones($id) {
      $tipo = Auth::user()->tipoUsuario;
      $vacante = Vacante::find($id);
      if(($tipo==1  && $vacante->userid==Auth::id())|| $tipo==2) {
        // $vacante = Vacante::find($id);
        $users_vacantes = Users_vacantes::where('vacanteid', '=', $id)->get();
        $aspirantesNombre = [];
        $tituloVacante = [];

        foreach ($users_vacantes as $users_vacante){
            array_push($aspirantesNombre, (User::find($users_vacante->userid))->name);
            array_push($tituloVacante, (Vacante::find($users_vacante->vacanteid))->titulo);
        }

        return view('pages.aplicaciones', [
            'vacante' => $vacante, //todo tal vez no se necesita
            'users_vacantes' => $users_vacantes,
            'aspirantesNombre' => $aspirantesNombre,
            'tituloVacante' => $tituloVacante
        ]);
      }
      else {
        return view('pages.accesoDenegado', [

        ]);
      }
    }

    function getAsignados(Request $request) { //sigue en proceso
      //$idAspirante = Aspirantes::all();
      $idAspirante = Auth::id();
      $idVacantesAsignados = vacante_Aspirantes::find($idAspirante);
      $asignados = Vacante::find($idVacantesAsignados->idVacante);

      $user = User::find($idAspirante);
      $tipoUsuario = $user->$tipoUsuario;

      return view('pages.vacantes ', [
          'vacantes' => $asignados,
          'tipo' => $tipoUsuario
      ]);
    }

    public function getConocimientos (Request $request) {
      $conocimientos = Conocimiento::all();
      $idAspirante = Auth::id();
      $idConocimientoAspirante = Aspirante_conocimiento::select('conocimientoId')->where('userid', '=', $idAspirante)->get();
      // if(!is_null($idHabilidadAspirante)){
        // $idhabasp = $idHabilidadAspirante;
      $conocimientoAspirante = Conocimiento::find($idConocimientoAspirante);
      // }
      // else{
      //   $habilidadAspirante = null;
      // }

      return view('pages.agregarConocimiento', [
        'conocimientos' => $conocimientos,
        'idAspirante' => $idAspirante,
        'conocimientoAsp' => $conocimientoAspirante
      ]);
    }

    public function getHabilidades (Request $request) {
      $habilidades = Habilidad::all();
      $idAspirante = Auth::id();
      $idHabilidadAspirante = Aspirante_habilidad::select('habilidadId')->where('userid', '=', $idAspirante)->get();
      // if(!is_null($idHabilidadAspirante)){
        // $idhabasp = $idHabilidadAspirante;
      $habilidadAspirante = Habilidad::find($idHabilidadAspirante);
      // }
      // else{
      //   $habilidadAspirante = null;
      // }

      return view('pages.agregarHabilidad', [
        'habilidades' => $habilidades,
        'idAspirante' => $idAspirante,
        'habilidadAsp' => $habilidadAspirante
      ]);
    }

    function agregarHabilidad(Request $request) {
      $idHabilidad = Habilidad::where('nombre', $request->habilidad)->value('id');
      $aspHab = new Aspirante_habilidad;
      $aspHab->userid = Auth::id();
      $aspHab->habilidadId = $idHabilidad;
      $aspHab->save();
      //
      $habilidades = Habilidad::all();
      $idAspirante = Auth::id();
      $idHabilidadAspirante = Aspirante_habilidad::select('habilidadId')->where('userid', '=', $idAspirante)->get();
      if(!is_null($idHabilidadAspirante)){
        $idhabasp = $idHabilidadAspirante;
        $habilidadAspirante = Habilidad::find($idHabilidadAspirante);
      }
      else{
        $habilidadAspirante = null;
      }

      // return redirect()->route('getHabilidades');
      return view('pages.agregarHabilidad', [
        'habilidades' => $habilidades,
        'idAspirante' => $idAspirante,
        'habilidadAsp' => $habilidadAspirante
      ]);
    }



    function agregarConocimiento(Request $request) {
      $idConocimiento = Conocimiento::where('nombre', $request->conocimiento)->value('id');
      $aspCon = new Aspirante_conocimiento;
      $aspCon->userid = Auth::id();
      $aspCon->conocimientoId = $idConocimiento;
      $aspCon->save();
      //
      $conocimientos = Conocimiento::all();
      $idAspirante = Auth::id();
      $idConocimientoAspirante = Aspirante_conocimiento::select('conocimientoId')->where('userid', '=', $idAspirante)->get();
      if(!is_null($idConocimientoAspirante)){
        $idconasp = $idConocimientoAspirante;
        $conocimientoAspirante = Conocimiento::find($idConocimientoAspirante);
      }
      else{
        $conocimientoAspirante = null;
      }

      // return redirect()->route('getHabilidades');
      return view('pages.agregarConocimiento', [
        'conocimientos' => $conocimientos,
        'idAspirante' => $idAspirante,
        'conocimientoAsp' => $conocimientoAspirante
      ]);
    }

    function agregarConocimientosDB(Request $request) {
      $agregarCon = new Conocimiento;
      $agregarCon->nombre = $request->nombreCon;
      if ($agregarCon->nombre <> null){
      $agregarCon->save();
    }
      $conocimientos = DB::select("select * from conocimientos");
      // return redirect()->route('getHabilidades');
      return view('pages.agregarConocimientosDB', [
        'conocimientos' => $conocimientos,
      ]);
    }

    function agregarHabilidadDB(Request $request) {
      $agregarHab = new Habilidad;
      $agregarHab->nombre = $request->nombreHab;
      if ($agregarHab->nombre <> null){
      $agregarHab->save();
    }
      $habilidades = DB::select("select * from habilidades");
      // return redirect()->route('getHabilidades');
      return view('pages.agregarHabilidadDB', [
        'habilidades' => $habilidades,
      ]);
    }

    function actualizarAsp (){
      $id = Auth::id();
      $user = User::find($id);
      $nombre = $user->name;
      $correo = $user->email;
      $aspirante = Aspirante::where('userid', $id)->first();
      return view('pages.actualizarAspirante', [
          'nombre' => $nombre, 'user' => $user, 'aspirante' => $aspirante
      ]);

    }
	function agregarCurriculumDB(Request $request) {
      $id = Auth::id();
      $aspirante = Aspirante::where('userid', $id)->first();
      if($request->file('file') <> null) {
        $file = $request->file('file');
        //obtenemos el nombre del archivo
        $nombre = $request->file('file')->getClientOriginalName();
        $aspirante->curriculum = $request->file('file')->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
        $aspirante->save();
      }

        return view('pages.agregarCurriculumDB', [
          'cv' => $aspirante->curriculum,
        ]);

    }


    function actualizarAsp2 (request $request){
        // $encuesta = Encuesta::find($request->idencuesta);
        // $encuesta->titulo = $request->nomEncuesta;
        // $encuesta->save();
        $id = Auth::id();
        $user = User::find($id);
        $aspirante = Aspirante::where('userid', $id)->first();

        $user->name = $request->nom;
        $user->email = $request->correo;
        $user->contacto = $request->contacto;

        $aspirante->direccion = $request->dir;
        //$aspirante->contacto = $request->contacto;
        $aspirante->licenciatura = $request->lic;
        $aspirante->estadoLic = $request->estadoLic;
        $aspirante->inglesEscrito = $request->ingEscrito;
        $aspirante->inglesHablado = $request->ingHablado;
        $aspirante->dispViaje = $request->dispViaje;
        $aspirante->dispReubicar = $request->dispReub;

        $user->save();
        $aspirante->save();

        return view('pages.datosActualizados');
    }

    function actualizarEmp (){
      $id = Auth::id();
      $user = User::find($id);
      $nombre = $user->name;
      $correo = $user->email;
      $empresa = Empresa::where('userid', $id)->first();
      return view('pages.actualizarEmpresa', [
          'nombre' => $nombre, 'user' => $user, 'empresa' => $empresa
      ]);

    }

    function actualizarEmp2 (request $request){
        // $encuesta = Encuesta::find($request->idencuesta);
        // $encuesta->titulo = $request->nomEncuesta;
        // $encuesta->save();
        $id = Auth::id();
        $user = User::find($id);
        $empresa = Empresa::where('userid', $id)->first();

        $user->name = $request->nom;
        $user->email = $request->correo;

        $empresa->nombre = $request->nomEmp;
        $empresa->descripcion = $request->descr;
        $empresa->url = $request->url;
        $empresa->direccion = $request->dir;

        $user->save();
        $empresa->save();

        return view('pages.datosActualizados', [
          'emp' => $empresa
        ]);
    }

    function cambiarEstado ($userid, $vacanteid){
      $user = User::find($userid);
      $aspirante = Aspirante::where('userid', '=', $userid)->get();
      $vacante = Vacante::find($vacanteid);
      $users_vacante = Users_vacantes::where('vacanteid', '=', $vacanteid)->where('userid', '=', $userid)->get();
      $asp_conocimientos = Aspirante_conocimiento::where('userid', $userid)->get();
      $aspirantecv = Aspirante::where('userid', $userid)->first();
      $conocimientos = [];
      foreach($asp_conocimientos as $asp_conocimiento) {
        $conocimientos[] = Conocimiento::find($asp_conocimiento->conocimientoId);
      }
      $asp_habilidades = Aspirante_habilidad::where('userid', $userid)->get();
      $habilidades = [];
      foreach($asp_habilidades as $asp_habilidad) {
        $habilidades[] = Habilidad::find($asp_habilidad->habilidadId);
      }

      return view('pages.infoAspirante', [
        'user' => $user, 'asp' => $aspirante, 'vac' => $vacante,
        'conocimientos' => $conocimientos, 'users_vacante' => $users_vacante,
        'habilidades' => $habilidades, 'cv'=> $aspirantecv->curriculum
      ]);

    }

    // function cambiarEstado2 (request $request){
    //   $user_vacante = Users_vacantes::where('vacanteid', '=', $request->vacanteid)->
    //                                   where('userid', '=', $request->userid)->first();
    //   if($request->estado <> "baja") {
    //     $user_vacante->estado = $request->estado;
    //     // $user_vacante->updated_at = '2019-05-26 01:05:06';
    //     $user_vacante->save();
    //     $id = Auth::id();
    //     $nomAspirante = User::find($id)->name;
    //
    //     return view('pages.exitoEstado', [
    //       'nomAsp' => $nomAspirante,
    //       'usr_vac' => $user_vacante
    //     ]);
    //   }
    //   else{
    //     $user_vacante->delete();//delete
    //     $id = Auth::id();
    //     $nomAspirante = User::find($id)->name;
    //
    //     return view('pages.bajaAspirante', [
    //       'nomAsp' => $nomAspirante
    //     ]);
    //   }
    //
    // }

    function bajaVacante($id) {
      $vacante = Vacante::find($id);
      $vacante->delete();

      return view('pages.exitoBajaVacante', [

      ]);
    }

    function verBitacoraCambio(request $request) {
      $bitacoras = Bitacora_aspVac_estado::where('userid', $request->idUs);

      return view('pages.bitacora', [
        'bitacoras' => $bitacoras
      ]);
    }

    function verBitacoraTodo(request $request) {
      $bitacoras = Bitacora_aspVac_estado::all();

      return view('pages.bitacora', [
        'bitacoras' => $bitacoras
      ]);
    }

    function verEmpresa($id) {
        $empresa = Empresa::find($id);
        $usuario = User::find($empresa->userid);
        $estadistica = Bitacora_aspVac_estado::where('userid', $usuario->id);

        $maxMes = Bitacora_aspVac_estado::where('userid', $usuario->id)->max('diffMes');
        $maxDia = Bitacora_aspVac_estado::where('userid', $usuario->id)->max('diffDia');
        $maxHora = Bitacora_aspVac_estado::where('userid', $usuario->id)->max('diffHora');
        $minMes = Bitacora_aspVac_estado::where('userid', $usuario->id)->min('diffMes');
        $minDia = Bitacora_aspVac_estado::where('userid', $usuario->id)->min('diffHora');
        $minHora = Bitacora_aspVac_estado::where('userid', $usuario->id)->min('diffHora');
        $promMes = Bitacora_aspVac_estado::where('userid', $usuario->id)->avg('diffMes');
        $promDia = Bitacora_aspVac_estado::where('userid', $usuario->id)->avg('diffDia');
        $promHora = Bitacora_aspVac_estado::where('userid', $usuario->id)->avg('diffHora');
        return view('pages.infoEmpresa', [
          'empresa' => $empresa,
          'usuario' => $usuario,
          'maxM' => $maxMes, 'maxD' => $maxDia, 'maxH' => $maxHora,
          'minM' => $minMes, 'minD' => $minDia, 'minH' => $minHora,
          'promM' => $promMes, 'promD' => $promDia, 'promH' =>$promHora
        ]);
    }

    function registrarIdioma() {
      $idiomasAsp = Aspirante_idioma::where('userid', Auth::id())->get();

      return view('pages.registroIdioma', [
        'idiomasA' => $idiomasAsp
      ]);
    }

    function guardarIdioma(request $request) {
      $idiomaRegistrar = new Aspirante_idioma;
      $idiomaRegistrar->userid = Auth::id();
      $idiomaRegistrar->idioma = $request->idioma;
      $idiomaRegistrar->escrito = $request->escrito;
      $idiomaRegistrar->hablado = $request->hablado;
      $idiomaRegistrar->save();


      return redirect()->back();
      // return view('pages.registroIdioma', [
      //   'idiomas' => $idiomasAsp
      // ]);
    }

    function estadisticas() {
        $estadistica = Bitacora_aspVac_estado::all();

        $maxMes = $estadistica->max('diffMes');
        $maxDia = $estadistica->max('diffDia');
        $maxHora = $estadistica->max('diffHora');
        $minMes = $estadistica->min('diffMes');
        $minDia = $estadistica->min('diffHora');
        $minHora =$estadistica->min('diffHora');
        $promMes = $estadistica->avg('diffMes');
        $promDia = $estadistica->avg('diffDia');
        $promHora = $estadistica->avg('diffHora');
        // $mytime = Carbon::now();

        // $solicitando = Users_vacantes::all()->count();
        $solicitando = TotalSolicitud::all()->count();
        // $aceptados = Bitacora_aspVac_estado::where('estadoCambiado', 'practicante')
//                                     ->orWhere('estadoCambiado', 'contratado')
//                                     ->count();
// $en_progreso = Bitacora_aspVac_estado::where('estadoCambiado', 'solicitando')
//                                       ->orWhere('estadoCambiado', 'evaluando')
//                                       ->orwhere('estadoCambiado', 'entrevista')
//                                       ->count();
$aceptados = Users_vacantes::where('estado', 'practicante')
                            ->orWhere('estado', 'contratado')
                            ->count();
$en_progreso = Users_vacantes::where('estado', 'solicitando')
                              ->orWhere('estado', 'evaluando')
                              ->orWhere('estado', 'entrevista')
                              ->count();
        $rechazados = $estadistica->where('estadoCambiado', 'baja')->count();

        $totalAsp = Aspirante::all()->count();
        $totalEmp = Empresa::all()->count();
        $totalVac = Vacante::all()->count();

        return view('pages.estadisticas', [
          'asp' => $totalAsp, 'emp' => $totalEmp, 'vac' => $totalVac,
          'maxM' => $maxMes, 'maxD' => $maxDia, 'maxH' => $maxHora,
          'minM' => $minMes, 'minD' => $minDia, 'minH' => $minHora,
          'promM' => $promMes, 'promD' => $promDia, 'promH' =>$promHora,
          'solicitando' => $solicitando, 'rechazados' => $rechazados, 'aceptados' => $aceptados, 'progreso' => $en_progreso
        ]);
    }

    function estadisticas2(request $request) {
        // $hoy = Carbon::now();
        // $dia = $hoy->format('D') + 15;
        // $hoy = $hoy->format('Y-M-$dia');
        if($request->filtro == 0) {
          $hoy = date('d');
          $filtro = $hoy-15;
          $consultaM = date('m');
          if($filtro < 0) {
            // $filtroD = 0;
            $consultaM = $consultaM-1;
            $filtro = 30+$filtro;
          }
          $consulta = date('Y-'.$consultaM.'-'.$filtro.' H:i:s');
        }
        elseif($request->filtro == 1){
          $hoy = date('m');
          $filtro = $hoy-1;
          $year = date('Y');
          if($filtro < 0) {
            $filtro = 12;
            $year = $year - 1;
          }
          $consulta = date($year.'-'.$filtro.'-d H:i:s');
        }
        elseif($request->filtro == 2){
          $hoy = date('m');
          $filtro = $hoy-3;
          $year = date('Y');
          if($filtro < 0) {
            $filtro = 12+$filtro;
            $year = $year - 1;
          }
          $consulta = date($year.'-'.$filtro.'-d H:i:s');
        }
        elseif($request->filtro == 3){
          $hoy = date('m');
          $filtro = $hoy-6;
          $year = date('Y');
          if($filtro < 0) {
            $filtro = 12+$filtro;
            $year = $year - 1;
          }
          $consulta = date($year.'-'.$filtro.'-d H:i:s');
        }

        $estadistica = Bitacora_aspVac_estado::where('tiempoCambiado', '>', $consulta);
        // $consulta = Bitacora_aspVac_estado::where('tiempoCambiado', '>', $consulta)->count();
        $opcFiltro = $request->filtro;
        $opcLic = $request->lic;
        if($opcLic == '0') {
          $maxMes = $estadistica->max('diffMes');
          $maxDia = $estadistica->max('diffDia');
          $maxHora = $estadistica->max('diffHora');
          $minMes = $estadistica->min('diffMes');
          $minDia = $estadistica->min('diffHora');
          $minHora = $estadistica->min('diffHora');
          $promMes = $estadistica->avg('diffMes');
          $promDia = $estadistica->avg('diffDia');
          $promHora = $estadistica->avg('diffHora');

          $solicitando = TotalSolicitud::where('created_at', '>', $consulta)->count();
          // $aceptados = Bitacora_aspVac_estado::where('tiempoCambiado', '>', $consulta)
           //                                     ->where('estadoCambiado', 'practicante')
           //                                     ->orWhere('estadoCambiado', 'contratado')->count();
           // $en_progreso = Bitacora_aspVac_estado::where('tiempoCambiado', '>', $consulta)
           //                                       ->where('estadoCambiado', 'solicitando')
           //                                       ->orWhere('estadoCambiado', 'evaluando')
           //                                       ->orwhere('estadoCambiado', 'entrevista')->count();
           $aceptados = Users_vacantes::where('created_at', '>', $consulta)
                                       ->where('estado', 'practicante')
                                       ->orWhere('estado', 'contratado')
                                       ->count();
           $en_progreso = Users_vacantes::where('created_at', '>', $consulta)
                                         ->where('estado', 'solicitando')
                                         ->orWhere('estado', 'evaluando')
                                         ->orWhere('estado', 'entrevista')
                                         ->count();

          $rechazados = $estadistica->where('estadoCambiado', 'baja')->count();
          // $mytime = Carbon::now();
          $totalAsp = Aspirante::where('created_at', '>', $consulta)->count();
          $totalEmp = Empresa::where('created_at', '>', $consulta)->count();
          $totalVac = Vacante::where('created_at', '>', $consulta)->count();

          return view('pages.estadisticas2', [
            'asp' => $totalAsp, 'emp' => $totalEmp, 'vac' => $totalVac,
            'maxM' => $maxMes, 'maxD' => $maxDia, 'maxH' => $maxHora,
            'minM' => $minMes, 'minD' => $minDia, 'minH' => $minHora,
            'promM' => $promMes, 'promD' => $promDia, 'promH' =>$promHora,
            'solicitando' => $solicitando, 'rechazados' => $rechazados, 'aceptados' => $aceptados, 'progreso' => $en_progreso,
            'opcF' => $opcFiltro, 'opcL' => $opcLic
          ]);
        }
        $carrera = $opcLic;

        $estadistica = $estadistica->where('carrera', $carrera);

        $maxMes = $estadistica->max('diffMes');
        $maxDia = $estadistica->max('diffDia');
        $maxHora = $estadistica->max('diffHora');
        $minMes = $estadistica->min('diffMes');
        $minDia = $estadistica->min('diffHora');
        $minHora = $estadistica->min('diffHora');
        $promMes = $estadistica->avg('diffMes');
        $promDia = $estadistica->avg('diffDia');
        $promHora = $estadistica->avg('diffHora');

        $solicitando = TotalSolicitud::where('carrera', $carrera)->where('created_at', '>', $consulta)->count();
        // $aceptados = Bitacora_aspVac_estado::where('carrera', $carrera)
       //                                     ->where('tiempoCambiado', '>', $consulta)
       //                                     ->where('estadoCambiado', 'practicante')
       //                                     ->orWhere('estadoCambiado', 'contratado')->count();
       // $en_progreso = Bitacora_aspVac_estado::where('carrera', $carrera)
       //                                       ->where('tiempoCambiado', '>', $consulta)
       //                                       ->where('estadoCambiado', 'solicitando')
       //                                       ->orWhere('estadoCambiado', 'evaluando')
       //                                       ->orwhere('estadoCambiado', 'entrevista')->count();
       $en_progresos1 = Users_vacantes::where('created_at', '>', $consulta)
                                     ->where('estado', 'solicitando')
                                     ->orWhere('estado', 'evaluando')
                                     ->orWhere('estado', 'entrevista')->get();
       $en_progreso = 0;
       foreach($en_progresos1 as $en_progreso1) {
         $aspirante = Aspirante::where('userid', $en_progreso1->userid)->value('licenciatura');
         if($aspirante == $carrera){
           $en_progreso++;
         }

       }

       $aceptados1 = Users_vacantes::where('created_at', '>', $consulta)
                                   ->where('estado', 'practicante')
                                   ->orWhere('estado', 'contratado')->get();
       $aceptados = 0;
       foreach($aceptados1 as $aceptado1) {
         $aspirante = Aspirante::where('userid', $aceptado1->userid)->value('licenciatura');
         if($aspirante == $carrera){
           $aceptados++;
         }

       }

       // $en_progresos1 = Users_vacantes::where('created_at', '>', $consulta)
       //                               ->where('estado', 'solicitando')
       //                               ->orWhere('estado', 'evaluando')
       //                               ->orWhere('estado', 'entrevista');
       // $en_progreso = 0;
       // foreach($en_progresos1 as $en_progreso1) {
       //   $aspirante = Aspirante::where('userid', $en_progreso1->userid)->value('licenciatura');
       //   if($aspirante == $carrera){
       //     $en_progreso++;
       //   }
       //
       // }
        $rechazados = $estadistica->where('carrera', $carrera)->where('estadoCambiado', 'baja')->count();
        // $mytime = Carbon::now();
        $totalAsp = Aspirante::where('licenciatura', $carrera)->where('created_at', '>', $consulta)->count();
        $totalEmp = Empresa::where('created_at', '>', $consulta)->count();
        $totalVac = Vacante::where('created_at', '>', $consulta)->count();

        return view('pages.estadisticas2', [
          'asp' => $totalAsp, 'emp' => $totalEmp, 'vac' => $totalVac, 'car' => $carrera,
          'maxM' => $maxMes, 'maxD' => $maxDia, 'maxH' => $maxHora,
          'minM' => $minMes, 'minD' => $minDia, 'minH' => $minHora,
          'promM' => $promMes, 'promD' => $promDia, 'promH' =>$promHora,
          'solicitando' => $solicitando, 'rechazados' => $rechazados, 'aceptados' => $aceptados, 'progreso' => $en_progreso,
          'opcF' => $opcFiltro, 'opcL' => $opcLic
        ]);
    }
}
