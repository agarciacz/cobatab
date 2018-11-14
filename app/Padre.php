<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    protected $table = 'padres';

    protected $fillable = [
        'curp','names','paterno','materno','telephone1','telephone2'
    ];

    public function alumno_padre()
    {
        return $this->hasMany('App\AlumnoPadre');
    }
}
