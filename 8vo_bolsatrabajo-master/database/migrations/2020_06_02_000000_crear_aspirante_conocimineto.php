<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearAspiranteConocimineto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('aspirante_conocimientos', function (Blueprint $table) {
          $table->bigInteger ('userid')->unsigned();
          $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');

          $table->bigInteger ('conocimientoId')->unsigned();
          $table->foreign('conocimientoId')->references('id')->on('conocimientos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('aspirante_habilidades');
    }
}
