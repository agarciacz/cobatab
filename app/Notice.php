<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices';

    //Relacion de uno a muchos
    //Un fabricante a muchos productos
    /*public function is_authorized(){
        return $this->hasMany('App\Proveedor');
    }*/

    protected $fillable = [
        'title', 'description', 'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user');
    }

    public function notice_is_authorized()
    {
        return $this->hasMany('App\NoticeIsAuthorized');
    }

    public function image_notice()
    {
        return $this->hasMany('App\ImageNotice');
    }
}
