<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = "alumnos";

    protected $fillable = [
        'matricula', 'names', 'paterno', 'materno', 'sex'
    ];

    public function alumno_padre()
    {
        return $this->hasMany('App\AlumnoPadre');
    }
}
