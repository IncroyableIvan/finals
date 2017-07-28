<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TvShow extends Model
{
    public $timestamps = false;

    public function genres() {
      return $this->belongsToMany('App\Genre');
    }
}
