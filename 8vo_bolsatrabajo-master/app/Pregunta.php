<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $primaryKey = 'idpregunta';
    protected $attributes = [
        'espreguntaabierta' => false,
    ];
}
