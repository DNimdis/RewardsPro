<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    //

    public function reward()
   {
       return $this->hasMany('App\reward');
   }
}
