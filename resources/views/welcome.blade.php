@extends('layouts.client')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="top-left links">
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <a  class="btn" href="{{ url('/home') }}">Promociones</a>

      @if (Route::has('login'))
              @auth
                  <a class="btn" href="{{ url('/home') }}">Mi cuenta</a>
              @else
                  <a class="btn" href="{{ route('login') }}">Login</a>
                  <a class="btn" href="{{ route('register') }}">Registrate</a>
              @endauth
      @endif
    </div>
    <div class="content">
        <div class="title m-b-md" style="color:#f3e5f5;">
            Revko Rewared
        </div>
        <div class="links">
          <a  class="btn pulse" href="{{url('/ShoppingClien/create')}}"> Registrar Compra</a>
        </div>
    </div>
</div>
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <div class="right">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat"> <i class="material-icons Large">close</i></a>
      </div>
      <h4>Hola</h4>
      <p>Bienvenido a Revko Rewards Ingresa, Interactúa y gana.</p>
      <p>Nuestra pagina puede utilizar las cookies de tu navegador para mejorar tu experiencia en nuestra plataforma.</p>
      <div class="right">
        <a class="modal-close waves-effect waves-light btn-small  red darken-4" id ="cookieNo" >En otro Moento</a>
        <a class="modal-close waves-effect waves-light btn-small purple darken-4" id="cookieSi">Acceptar</a>
      </div>
    </div>
    <div class="modal-footer">
      <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
    </div>
</div>

    <script src="{{URL::asset('/js/jquery.backstretch.min.js')}}"></script>
     <style type="text/css">
        body {
            background-image: url("{{URL::asset('/img/2.jpg')}}");
            position: sticky;
        }
      </style>
     <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            overflow-y: hidden;
            overflow-x: hidden;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #fff;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .btn{
          border-radius: 17px !important;
          border: 1px solid #8e24aa !important;
          background-color: transparent !important;
          background: rgba(142,36,170, 0.5) !important;
        }
    </style>
        <script type="text/javascript">

            jQuery.backstretch(
                [
                    "{{URL::asset('/img/1.png')}}",
                    "{{URL::asset('/img/2.jpg')}}",
                    "{{URL::asset('/img/3.jpg')}}",
                    "{{URL::asset('/img/4.jpg')}}",
                    "{{URL::asset('/img/5.jpg')}}"
                ],
                {duration: 3000, fade: 1000}
            );

            $( document ).ready(function(){
              $('.sidenav').sidenav();
              $(".dropdown-trigger").dropdown();
              $('select').formSelect();
              $('.modal').modal();
            });

            $( document ).ready(function(){

              $('#cookieSi').click( function (){
                localStorage.setItem('saludo', '1');
              });

              if (localStorage.getItem("saludo") === null) {
                setTimeout(function(){
                  var toastHTML = '<span>Bienvenido!</span><button class="btn-flat toast-action">Unir</button>';
                  M.toast({html: toastHTML,classes: 'rounded'});
                  $('#modal1').modal('open');
                }, 2000);

              }else{
                setTimeout(function(){
                  var toastHTML = '<span>Bienvenido!</span><button class="btn-flat toast-action">Unir</button>';
                  M.toast({html: toastHTML,classes: 'rounded'});
                }, 2000);
              }
            });
        </script>
  @endsection
