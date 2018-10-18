@extends('layouts.admin')
@section('content')
<br>
<div class="row">
  <div class="container">
    <div class="card col s4">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" width="30%"src="{{URL::asset('/img/m/gifts.png')}}">
      </div>
      <div class="card-content">
        <a class="btn-floating right red"><i class="material-icons">add</i></a>
        <span class="card-title activator grey-text text-darken-4 ">Recompensas <i class="material-icons right">more_vert</i></span>
        <p><a href="#">Cantidad : 12</a></p>
      </div>
      <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">Recompensas registradas<i class="material-icons right">close</i></span>
        <a class="btn-floating right red"><i class="material-icons">add</i></a>
        <article >
          <p>Recompensas Tipo</p>
          <label for="">Dinero : <strong> 15</strong> </label> <br>
          <label for="">Puntos : <strong> 15</strong> </label><br>
          <label for="">Mix Pop : <strong> 15</strong> </label><br>
          <label for="">Pesos en vales : <strong> 15</strong> </label><br>
          <label for="">Tarjeta personalizada : <strong> 15</strong> </label><br>
          <label for="">Pesos en vales/ especies: <strong> 15</strong> </label>
        </article>
        <article >
          <p>Recompensas Usuarios</p>
          <label for="">Mayorista : <strong> 15</strong> </label>
          <label for="">Distribuidor : <strong> 15</strong> </label>
        </article>
        <p>Se mustran los tipos de  recompensas con mas cantidad</p>
      </div>
    </div>
</div>
<!-- clientes registrasdos -->
<div class="container">
  <div class="card col s4">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" width="30%"src="{{URL::asset('/img/m/customer.png')}}">
    </div>
    <div class="card-content">
      <a class="btn-floating right red"><i class="material-icons">add</i></a>
      <span class="card-title activator grey-text text-darken-4 ">Clientes <i class="material-icons right">more_vert</i></span>
      <p><a href="#">Cantidad : 500</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Clientes Registrados<i class="material-icons right">close</i></span>
      <a class="btn-floating right red"><i class="material-icons">add</i></a>
      <article >
        <p>Clientes Ejecutivos/Mayorista </p>
        <label for="">Activos : <strong> 200</strong> </label> <br>
        <label for="">Inactivos : <strong> 100</strong> </label><br>
      </article>
      <article >
        <p>Clientes Distribuidor</p>
        <label for="">Activos : <strong> 200</strong> </label> <br>
        <label for="">Inactivos : <strong> 100</strong> </label><br>
      </article>
      <p>Mustra general de usuarios registrados</p>
    </div>
  </div>
</div>
<!-- Compras resitradas -->
<div class="container">
  <div class="card col s4">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" width="30%"src="{{URL::asset('/img/m/compras.png')}}">
    </div>
    <div class="card-content">
      <a class="btn-floating right red"><i class="material-icons">add</i></a>
      <span class="card-title activator grey-text text-darken-4 ">Comparas<i class="material-icons right">more_vert</i></span>
      <p><a href="#">Cantidad : 27,565,400</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Clientes Registrados<i class="material-icons right">close</i></span>
      <a class="btn-floating right red"><i class="material-icons">add</i></a>
      <article >
        <p>Clientes Ejecutivos/Mayorista </p>
        <label for="">Activos : <strong> 200</strong> </label> <br>
        <label for="">Inactivos : <strong> 100</strong> </label><br>
      </article>
      <article >
        <p>Clientes Distribuidor</p>
        <label for="">Activos : <strong> 200</strong> </label> <br>
        <label for="">Inactivos : <strong> 100</strong> </label><br>
      </article>
      <p>Mustra general de usuarios registrados</p>
    </div>
  </div>
</div>

</div>



<div class="container">
            <div class="card">
                <span class="card-title">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</span>

                <div class="card-body">
                    @if (session('status'))
                    <div class="card-content">
                        {{ session('status') }}
                    </div>
                    @endif You are logged in to {{ config('multiauth.prefix') }} side!
                </div>
            </div>
</div>
@endsection
