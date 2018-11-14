<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoPadre extends Model
{
    protected $table = 'alumnos_padres';

    protected $fillable = [
        'alumno', 'padre', 'is_tutor'
    ];

    public function alumnos()
    {
        return $this->belongsTo('App\Alumno', 'matricula', 'alumno');
    }

    public function padres()
    {
        return $this->belongsTo('App\Padre', 'curp', 'padre');
    }
}
