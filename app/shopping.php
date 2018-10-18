<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\shopping;
class shopping extends Model
{
    //
    protected $fillable =['user_id','referenceFac','rode','shopping_date','url_fact'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public static function getShoppingUser(){
       return   shopping::all();
    }

    public static function getSumShoppin($id_user){

      $current_user_id = Auth::user()->id;
      return shopping::all();
    }

}
