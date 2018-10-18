<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeuser extends Model
{
  protected $fillable = ['name'];
    //
    public function reward(){
        return $this->belongsTo('App\reward');
    }
}
