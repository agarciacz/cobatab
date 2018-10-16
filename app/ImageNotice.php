<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageNotice extends Model
{
    protected $table = 'images_notice';

    protected $fillable = [
      'notice', 'image', 'image_title',
    ];
}
