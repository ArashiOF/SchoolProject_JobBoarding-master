<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    //
    protected $primaryKey = 'idencuesta';
    protected $attributes = [
        'vecescontestado' => 0,
        'valoracion' => 0,
        'almacenarrespuestas' => 0,
        'encuestapublica' => 0,
        'valoracionpromedio' => 0
    ];
}
