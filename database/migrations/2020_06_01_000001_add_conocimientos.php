<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConocimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('conocimientos')->insert(
            [
               ['id' => '1','nombre' => 'Programacion Java'],
               ['id' => '2','nombre' => 'Programacion Python'],
               [ 'id' => '3', 'nombre'=>'Programacion Sql'],
               [ 'id' => '4', 'nombre'=>'Programación orientada a objetos' ],
               [ 'id' => '5', 'nombre'=>'Administración de base de datos' ],
               [ 'id' => '6', 'nombre'=>'Analista jr.' ],
               [ 'id' => '7', 'nombre'=>'Diseñador jr' ],
               [ 'id' => '8', 'nombre'=>'Redes' ],
               [ 'id' => '9', 'nombre'=>'Mantenimiento de computadoras' ],
               [ 'id' => '10', 'nombre'=>'Documentación' ],
               [ 'id' => '11', 'nombre'=>'Creación de páginas web html' ],
               [ 'id' => '12', 'nombre'=>'Creación de páginas web php' ],
               [ 'id' => '13', 'nombre'=>'Creación de páginas web javascript' ],
               [ 'id' => '14', 'nombre'=>'Diseño web css' ],
               [ 'id' => '15', 'nombre'=>'Diseño web bootstrap' ],
               [ 'id' => '16', 'nombre'=>'Administración de Linux jr' ],
               [ 'id' => '17', 'nombre'=>'Seguridad Informática' ],
               [ 'id' => '18', 'nombre'=>'Ingeniería de Software' ],
               [ 'id' => '19', 'nombre'=>'Experiencia en Scrum' ],
               [ 'id' => '20', 'nombre'=>'Experiencia en metodologías ágiles' ],


            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
