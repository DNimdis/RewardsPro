<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $currentuser = \Auth::User();
      $recompensas = User::getRecompensasUser($currentuser);
      $puntos  = User::getPuntosUser($currentuser);
      $niveles = User::getNivelUser($currentuser);

        return view('home', compact('recompensas','puntos','niveles'));
    }
}
