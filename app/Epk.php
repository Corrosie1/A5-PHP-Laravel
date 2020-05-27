<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Epk extends Model
{
    protected $fillable = [
      'titel', 'biografie', 'category', 'epk_id', 'image', 'youtubeId'
    ];
}
