<?php

namespace App\Http\Controllers;

use App\level;
use App\reward;
use App\typeuser;
use App\reward_type;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class RewardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      //$this->middleware('auth:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //
        $keyword = $request->get('search');
        $keywordsUser=$request->get('Pusuario');
        $perPage = 9;

        $typeusers = typeuser::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        if (!empty($keyword) && empty($keywordsUser)) {

          $recompensas =reward::where('name', 'LIKE', "%$keyword%")
                  ->latest()->paginate($perPage);
        }elseif (!empty($keywordsUser)) {
            //dd($keywordsUser);
            if (!empty($keyword)) {
              // buscar por tipo de usuarios y la cadena
              $recompensas =reward::where('name', 'LIKE', "%$keyword%")
                      ->where('reward_type_id','=', $keywordsUser)
                      ->latest()->paginate($perPage);
            }else {
              // buscar por tipo de usuarios
              $recompensas =reward::where('reward_type_id','=', "$keywordsUser")
                      ->latest()->paginate($perPage);
            }

        } else {
            $recompensas = reward::latest()->paginate($perPage);
        }
        // $recompensas=reward::latest()->paginate(6);
        $buttomNew= route('recompensa.create');
        return view('reward.index', compact('buttomNew', 'recompensas','typeusers', 'keywordsUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $currentcreate = url()->current();
      $backurl= url()->previous();
      $reward = new reward();
      $typeusers = typeuser::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
      $reward_types = reward_type::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
      $levels = level::select(DB::raw("CONCAT(levels.title,' ',levels.description) as full_name"),"levels.id")
        ->get()->pluck('full_name', 'id');

        //
      return view('reward.create', compact('currentcreate','backurl','typeusers','reward_types','levels','reward'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          'nivel' => 'required',
          'nombre'=>'required',
          'tipoRecompensa'=>'required',
          'cantidad'=>'required',
          'etiqueta'=>'required',
          'Pusuario'=>'required'
        ]);

        DB::transaction(function () use ($request ) {

        $reward =reward::create([
          'level_id' => $request['nivel'],
          'name'=>$request['nombre'],
          'reward_type_id'=>$request['tipoRecompensa'],
          'quantity'=>$request['cantidad'],
          'label'=>$request['etiqueta'],
          'typeuser_id'=>$request['Pusuario']
        ]);
        $reward->roles_reward()->create(['quantity_min' => $request['montoMin'],
                                        'quantity_max' => $request['montoMax'],
                                        'application_date' => Carbon::parse($request['fechaAplica'])->format('Y-m-d')
                                      ]);
          $reward->push();
        });

        return redirect('recompensa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function show(reward $reward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reward= reward::findOrFail($id);
        $typeusers = typeuser::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        $reward_types = reward_type::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        $levels = level::select(DB::raw("CONCAT(levels.title,' ',levels.description) as full_name"),"levels.id")
          ->get()->pluck('full_name', 'id');
          //
        return view('reward.edit', compact('currentcreate','backurl','typeusers','reward_types','levels','reward'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $reward_id)
    {
        //
          $reward= reward::findOrFail($reward_id);
          //dd($reward);
          DB::transaction(function () use ($request, $reward ) {


              $reward->level_id =  $request['nivel'];
              $reward->name= $request['nombre'];
              $reward->reward_type_id= $request['tipoRecompensa'];
              $reward->quantity= $request['cantidad'];
              $reward->label= $request['etiqueta'];
              $reward->typeuser_id= $request['Pusuario'];
              $reward->roles_reward
                 ->quantity_min = $request['montoMin'];
              $reward->roles_reward
                 ->quantity_max = $request['montoMax'];
              $reward->roles_reward
                 ->application_date = Carbon::parse($request['fechaAplica'])->format('Y-m-d');

              $reward->push();
            });

        return redirect('recompensa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\reward  $reward
     * @return \Illuminate\Http\Response
     */
    public function destroy($reward)
    {
        //
        reward::destroy($reward);
        return redirect('recompensa')->with('flash_message', 'Recompensa Elimnada..');
    }
}
