<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    {!! MaterializeCSS::include_full() !!}
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="{{URL::asset('/css/estilos.css')}}">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
  </head>
  <body>
    <ul id="slide-out" class="sidenav">
      @auth
      <li>
        <div class="user-view">
          <div class="background">
            <img src="{{URL::asset('/img/backgroupmenu.jpg')}}" width="100%" height="100%">
          </div>
          <a href="#user" class="img_perfil"><img class="circle" src="{{URL::asset('/img/c/personal.png')}}"></a>
          <a href="#name"><span class="white-text name">{{ Auth::user()->email }}</span></a>
          <a href="#email"><span class="white-text email">{{ Auth::user()->typeuser->name }}</span></a>
          @guest

          @else
          <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
          <ul id="dropdown2" class="dropdown-content">
            <li><a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form2').submit();">
                {{ __('Cerrar Sesion') }}
            </a></li>
            <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </ul>
          @endguest
        </div>
      </li>
      @endauth
        @if (Route::has('login'))
              @auth
                <li><a  class="waves-effect" href="{{ url('/home') }}"><i class="material-icons">dvr</i> Mi cuenta</a></li>
              @else
                <li><a class="waves-effect" href="{{ route('login') }}"><i class="material-icons">arrow_forward</i> Login</a></li>
                <li><a class="waves-effect" href="{{ route('register') }}"> <i class="material-icons">person_pin</i> Register</a></li>
              @endauth
        @endif

      @auth
      <li><div class="divider"></div></li>
      <li><a href="#!"><i class="material-icons">redeem</i>Mis recompensa</a></li>
      @endauth
      <li><a href="#!"><i class="material-icons">photo_size_select_actual</i>Promociones</a></li>
      <li><div class="divider"></div></li>
      @auth
      <li><a class="waves-effect"><i class="material-icons">insert_chart</i>Compras</a></li>
      @endauth
      <li><a class="waves-effect" href="#!"><i class="material-icons">contact_mail</i>Contactos</a></li>
      <li><div class="divider"></div></li>
    </ul>

      @yield('content')

  </body>

  @include('layouts.footer')

  <script type="text/javascript">
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $(".dropdown-trigger").dropdown();
      $('select').formSelect();
    });
  </script>

  <style media="screen">

    .card-body {
      padding-top: 1em;
      padding-left: 2em;
      padding-right: 2em;
      padding-bottom: 2em;
      border-radius: 2px 2px 10px 10px;
    }
    .card-header {
        padding-left: 1em;
        padding-top: 1em;
        background-color: lightseagreen;
        color: #fff;
        border-radius: 6px 6px 0px 0px;
    }
    img.circle {
      margin-left: 2em;
    }
  </style>
</html>
