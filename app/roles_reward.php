<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles_reward extends Model
{
    //
    protected $fillable =['reward_id','quantity_min','quantity_max','application_date'];

    function getDobAttribute()
    {
        return $this->attributes['application_date']->format('m/d/Y');
    }

    public function reward(){
        return $this->belongsTo('App\reward');
    }

}
