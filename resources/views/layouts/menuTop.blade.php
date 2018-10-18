<nav class="grey lighten-5 z-depth-2">
  <a href="#" data-target="slide-out" class="sidenav-trigger" style="color:#796d6d;"><i class="material-icons">menu</i></a>
 <div class="nav-wrapper">
   <a href="{{url('/')}}" class="brand-logo"><img src="{{URL::asset('/img/revshop.png')}}" alt="Logo"></a>
    <ul id="nav-mobile" class="left  hide-on-med-and-down">
      <div class="elingMenuitem">
        <li><a href="#!">Mis recompensa</a></li>
        <li><a href="#!">Promociones</a></li>
        <li><div class="divider"></div></li>
        <li><a href="{{ route('Compras') }}">Compras</a></li>
        <!-- <li><a class="subheader">Compras</a></li> -->
        <li><a class="waves-effect" href="#!">Contactos</a></li>
      </div>
    </ul>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      @if (Route::has('login'))
              @auth
                <li>  <a href="{{ url('/home') }}">Mi cuenta</a></li>
                @guest

                @else
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                <ul id="dropdown1" class="dropdown-content">
                  <li><a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </ul>
                @endguest
              @else
                <li>  <a href="{{ route('login') }}">Login</a></li>
                <li>  <a href="{{ route('register') }}">Register</a></li>
              @endauth
      @endif
      </ul>
 </div>
</nav>
<style media="screen">
.elingMenuitem {
  padding-left: 11em;
}
a.brand-logo {
    padding-left: 1em;
}

nav ul a {
  color: #796d6d;
}
nav {
  padding-bottom: 5em !important;
  padding-top: 1em !important;
}
</style>
