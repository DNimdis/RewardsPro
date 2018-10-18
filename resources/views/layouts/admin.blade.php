<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {!! MaterializeCSS::include_full() !!}
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  </head>
  <body>
    <nav class="nav-extended grey lighten-5">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo"><img src="{{URL::asset('/img/revshop.png')}}" alt="Logo"> </a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="collapsible.html">Perfil <i class="Tiny material-icons" style="display:inline;">verified_user</i></a></li>
          <li class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest('admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.login')}}">Login<i class="Tiny material-icons" style="display:inline;">security</i> </a>
                </li>
                @else
                <div class="input-field">
                  <select id="vamos">
                    <option value="" disabled selected>{{ auth('admin')->user()->name }}</option>
                    @admin('super')
                    <option value="{{ route('admin.show') }}" onchange="javascript:handleSelect(this)"><a class="dropdown-item" href="#">{{ ucfirst(config('multiauth.prefix')) }}</a></option>
                    <option value="{{ route('admin.roles') }}" onchange="javascript:handleSelect(this)" ><a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a></option>
                    @endadmin
                    <option value="salir">  <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a></option>
                  </select>
                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
                @endguest
          </li>
        </ul>
      </div>
      <div class="nav-content">
        <ul class="tabs tabs-transparent">
          <li class="tab"><a href="#test1">Promociones</a></li>
          <li class="tab"><a class="active" href="{{route('recompensa.index') }}" >Recompensas</a></li>
          <!-- <li class="tab disabled"><a href="#test3">Clientes</a></li> -->
          <li class="tab"><a href="#test4">Clientes</a></li>
        </ul>
        @if(isset($buttomNew))
        <a href="{{$buttomNew}}" class="btn-floating btn-large halfway-fab waves-effect waves-light teal">
         <i class="material-icons" style="color:#ffff !important;">add</i>
        </a>
       @endif
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li><a href="sass.html">Mensajes <i class="Tiny material-icons" style="display:inline;">message</i></a></li>
      <li><a href="badges.html">Perfil <i class="Tiny material-icons" style="display:inline;">verified_user</i></a></a></li>
      <li class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest('admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.login')}}">Login<i class="Tiny material-icons" style="display:inline;">security</i> </a>
            </li>
            @else
            <div class="input-field">
              <select id="vamos">
                <option value="" disabled selected>{{ auth('admin')->user()->name }}</option>
                @admin('super')
                <option value="{{ route('admin.show') }}" onchange="javascript:handleSelect(this)"><a class="dropdown-item" href="#">{{ ucfirst(config('multiauth.prefix')) }}</a></option>
                <option value="{{ route('admin.roles') }}" onchange="javascript:handleSelect(this)" ><a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a></option>
                @endadmin
                <option value="salir">  <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a></option>
              </select>
              <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
            @endguest
      </li>
    </ul>

      @yield('content');


      <script type="text/javascript">
          $(document).ready(function(){
            $('.sidenav').sidenav();
            $(".dropdown-trigger").dropdown();
            $('select').formSelect();
          });

          $('#vamos').change( function(e){
              if ($(this).val() == "salir") {
                //event.preventDefault();
                document.getElementById('logout-form').submit();
              }else{
                window.location = $(this).val();
              }
            });
      </script>

      <style media="screen">
        body nav ul li a{
          color: #757575;
        }
        body nav div ul li a{
          color: #757575 !important;
        }
        body nav div a i {
          color: #757575 !important;
        }
        body{
          font-family: 'Quicksand', sans-serif;
          font-weight: bold;
        }
      </style>
  </body>

</html>
