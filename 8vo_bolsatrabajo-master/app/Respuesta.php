<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    //
    protected $primaryKey = 'idrespuesta';
    protected $attributes = [
        'respuestacorrecta' => false
    ];
}
