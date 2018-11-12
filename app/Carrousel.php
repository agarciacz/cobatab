<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrousel extends Model
{
    protected $table = "carrousel";

    protected $fillable = [
        'image', 'title', 'description', 'is_active',
    ];
}
