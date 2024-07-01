<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Aspirante;
use App\Empresa;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'contacto' => $data['cel'],
            'tipoUsuario' => $data['tipoDeUser'],
            'password' => Hash::make($data['password'])
        ]);
        $user->tipoUsuario = $data['tipoDeUser'];
        $user->contacto = $data['cel'];
        $user->save();
        $userid = $user->id;

        if ($data['tipoDeUser']==1){
          $empresa = new Empresa;
          $empresa->nombre = $data['nomEmp'];
          $empresa->descripcion = $data['descr'];
          $empresa->url = $data['url'];
          $empresa->direccion = $data['dirEmp'];
          $empresa->redes = $data['redes'];
          $empresa->userid = $userid;
          $empresa->save();
        }
        else{
          $aspirante = new Aspirante;
          $aspirante->direccion = $data['dir'];
          // $aspirante->contacto = $data['cel'];
          $aspirante->licenciatura = $data['lic'];
          $aspirante->estadoLic = $data['estadoLic'];
          $aspirante->inglesEscrito = $data['ingEscrito'];
          $aspirante->inglesHablado = $data['ingHablado'];
          $aspirante->numeroExp = $data['numeroExp'];
          $aspirante->tiempoExp = $data['tiempoExp'];
          $aspirante->areaLaboral = $data['areaLaboral'];
          $aspirante->dispViaje = $data['dispViaje'];
          $aspirante->dispReubicar = $data['dispReub'];
          $aspirante->userid =  $userid;
          $aspirante->save();
        }

        $user->sendEmailVerificationNotification();

        return $user;
    }
}
