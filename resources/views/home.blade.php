@extends('layouts.client')
@section('content')
@include('layouts.menuTop')
<div class="container">
<div class="row">
        <div class="col s12 m12 l12">
            <div class="card nivel-card z-depth-4">
                <div class="card-body">
                @forelse ($niveles as $nivel)
                  <div class="chip">
                    <img src="{!! URL::asset('/img/levels/'.$nivel->image)!!}" alt="Contact Person">
                   {{$nivel->description}}
                  </div>
                @empty
                    <p>Registra tu primer compra</p>
                @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{url('/ShoppingClien/create')}}" class="waves-effect waves-light btn-small btn-large pulse">Registrar Compra</a>
    </div>
    <div class="row">
        <div class="col s6 m6 l4">
            <div class="card z-depth-4">
                <div class="card-content purple white-text">
                    <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total Sales</p>

                    <h4 class="card-stats-number"><img src="{{URL::asset('/img/banknote.png')}}" style="display: initial;" alt=""> ${{Auth::user()->shopping->sum('rode')}}</h4>
                    <p class="card-stats-compare"><i class="material-icons">keyboard_arrow_up</i> $ {{ Auth::user()->shopping->count('id')>0? ((Auth::user()->shopping->sum('rode')) /(Auth::user()->shopping->count('id'))) : '0'}} <span class="purple-text text-lighten-5">promedio mensual</span>
                    </p>
                </div>
                <div class="card-action purple darken-2">
                </div>
            </div>
          </div>
          <div class="col s6 m6 l4">
              <div class="card z-depth-4">
                  <div class="card-content  green white-text">
                      <p class="card-stats-title"><i class="mdi-social-group-add"></i>Recompensas</p>
                      <h4 class="card-stats-number"> <i class="material-icons">card_giftcard</i> {{count($recompensas)}}</h4>
                      <p class="card-stats-compare"><i class="material-icons">keyboard_arrow_up</i>15% <span class="green-text text-lighten-5">Proximo nivel</span>
                      </p>
                  </div>
                  <div class="card-action  green darken-2">
                  </div>
              </div>
          </div>
          <div class="col s6 m6 l4">
            <div class="card">
                <div class="card-content blue-grey white-text">
                    <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Puntos Totales</p>
                    <h4 class="card-stats-number"><i class="material-icons">local_activity</i>PT {{$puntos}}</h4>
                    <p class="card-stats-compare"><i class="material-icons">keyboard_arrow_up</i> 80% <span class="blue-grey-text text-lighten-5">Proximo nivel</span>
                    </p>
                </div>
                <div class="card-action blue-grey darken-2">
                </div>
            </div>
          </div>
      </div>
  </div>
<style media="screen">
  .chip{
        margin-top: 1em;
  }
  .card.nivel-card {
      border-radius: 3em 3em 3em 3em;
  }
</style>
@endsection
