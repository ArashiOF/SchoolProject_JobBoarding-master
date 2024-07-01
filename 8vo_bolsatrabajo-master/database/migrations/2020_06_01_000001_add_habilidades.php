<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHabilidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('habilidades')->insert(
            [
               ['id' => '1','nombre' => 'Trabajo en equipo'],
               ['id' => '2','nombre' => 'Puntual'],
               [ 'id' => '3', 'nombre'=>'Facilidad de palabra'],
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
