<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices';

    protected $fillable = [
        'title', 'description', 'image'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user', 'user');
    }

    public function notice_is_authorized()
    {
        return $this->hasOne('App\NoticeIsAuthorized', 'notice', 'id');
    }

    public function image_notice()
    {
        return $this->hasMany('App\ImageNotice');
    }
}
