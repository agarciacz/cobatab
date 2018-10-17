<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeIsAuthorized extends Model
{
    protected $table = 'notice_is_authorize';

    protected $fillable = [
        'notice', 'user', 'is_authorized'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user');
    }
}
