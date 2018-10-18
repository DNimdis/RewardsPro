<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reward extends Model
{
    //
    protected $fillable =['level_id','reward_type_id','name','quantity','label','typeuser_id'];


    public function level(){
      return $this->belongsTo('App\level');
    }

    public function typeuser(){
      return $this->belongsTo('App\typeuser');
    }
    public function reward_type(){
        return $this->belongsTo('App\reward_type');
    }

    public function roles_reward(){
      return $this->hasOne('App\roles_reward');
    }
}
