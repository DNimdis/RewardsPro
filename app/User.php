<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\reward;
use App\level;
use App\DB;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','typeuser_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function typeuser(){
      return $this->belongsTo('App\typeuser');
    }

    public function shopping(){
      return $this->hasMany('App\shopping');
    }

    public static function getRecompensasUser($currentuser){
      //$acumulado = $currentuser->shopping->sum('rode');
      $acumulados = \DB::select('SELECT MONTH(compras.shopping_date) AS mes, YEAR(compras.shopping_date) AS ano, SUM(compras.rode)
      AS monto FROM shoppings AS compras WHERE compras.user_id = :id GROUP BY YEAR(compras.shopping_date),
       MONTH(compras.shopping_date)' , ['id' => $currentuser->id]);
      $rewards = reward::where('typeuser_id','=',"$currentuser->typeuser_id")->get();
      $resultados = array();
      foreach ($rewards as $reward) {
        $year = Carbon::createFromFormat('Y-m-d',$reward->roles_reward->application_date)->year;
        $mount = Carbon::createFromFormat('Y-m-d',$reward->roles_reward->application_date)->month;
        foreach ($acumulados as $acumulado) {
          // comparamos las recompensas contra los acumulados del cliente
          if ($acumulado->mes ==(int) $mount && $acumulado->ano == (int)$year && ($acumulado->monto >= $reward->roles_reward->quantity_min && $acumulado->monto < $reward->roles_reward->quantity_max || $reward->roles_reward->quantity_max < $acumulado->monto)) {
            // solomante pasan la recompensas decuardo el monto  mensual
            array_push($resultados,$reward);
          }

        }
      }

      return  $resultados;
    }

    public static function getPuntosUser($currentuser){
      $recompensas = self::getRecompensasUser($currentuser);
      $puntos =0;
      foreach ($recompensas as $recompensa) {
        // code...
        if ($recompensa->reward_type->name == "Puntos") {
          // code...
          $puntos += $recompensa->quantity;
        }

      }

      return $puntos;
    }

    public static function getNivelUser($currentuser){

    $levels= level::where('typeuser_id','=',"$currentuser->typeuser_id")->get();
    $acumulado =$currentuser->shopping->sum('rode');
    $puntos= self::getPuntosUser($currentuser);

    $levelsCurrent = array();
    foreach ($levels as $level) {
      // niveles que ha palicado el usuario dependiendo de los puntos acumulados o el monto acumulado
      if ( ($puntos >= $level->points && $puntos < $level->points || $level->points < $puntos)) {
        // validamos que si el usuario comple con los muntos o muntos necesarios
        array_push($levelsCurrent,$level);
      }else if(( $acumulado >= $level->accumulated_amount && $acumulado < $level->accumulated_amount || $level->accumulated_amount < $acumulado ) ){
        array_push($levelsCurrent,$level);
      }

    }
      //dd($levelsCurrent);
      return $levelsCurrent;
    }
}
