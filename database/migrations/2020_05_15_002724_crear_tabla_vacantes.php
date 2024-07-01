<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaVacantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger ('empresaid')->unsigned()->nullable();
            $table->string('nombreEmpresa')->nullable();
            $table->foreign('empresaid')->references('id')->on('empresas')->onDelete('cascade');
            $table->bigInteger ('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
                        //de empleado conseguir empresa?
                                        //puede que un empleado publique para varias
                                        //id usuario
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('tareas');
            // $table->boolean('activo');
            $table->string('file')->nullable();
            $table->string('fijar')->nullable();
            $table->float('cantidad')->nullable();
            // $table->boolean('esTemporal');
            $table->string('calle'); //id
            $table->string('tiempoSalario')->nullable();
            $table->integer('nDisponibles');
            $table->string('carreras')->nullable();
            $table->date('expira');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacantes');
    }
}
