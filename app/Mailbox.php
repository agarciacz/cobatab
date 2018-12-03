<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailbox extends Model
{
    protected $table = 'mailbox';

    protected $fillable = [
        'name', 'mail', 'telephone', 'description'
    ];

    public function category_mailbox()
    {
        return $this->belongsTo('App\CategoryMailbox', 'category_mailbox', 'category_mailbox');
    }

}
