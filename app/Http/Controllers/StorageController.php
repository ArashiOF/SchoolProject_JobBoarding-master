<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archivo;
class StorageController extends Controller
{
  public function formulario()
     {
        return view('pages.formulario', [

                ]);;
     }
  public function save(Request $request)
  {


    //$archivo = new Archivo;
    //obtenemos el nombre del archivo
    //$archivo->doc = $request->file('file');
     //obtenemos el campo file definido en el formulario
    //$archivo->nombre = $archivo->doc->getClientOriginalName();
    //$archivo->save();


          $file = $request->file('file');
          //obtenemos el nombre del archivo
          $nombre = $file->getClientOriginalName();
         //indicamos que queremos guardar un nuevo archivo en el disco local
         \Storage::disk('local')->put($nombre,  \File::get($file));

         return view('pages.pruebaArchivo', [


                 ]);;;
  }
}
