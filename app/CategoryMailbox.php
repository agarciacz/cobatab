<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMailbox extends Model
{
    protected $table = 'categories_mailbox';

    protected $fillable = [
        'category_mailbox'
    ];
}
