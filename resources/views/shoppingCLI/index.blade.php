
@extends('layouts.client')
  @section('content')
  @include('layouts.menuTop')
<br>
<div>
  <h5 class="center-align">Historial de compras registradas</h5>
</div>
<div class="container">

  <div class="row">
    <div class="card_dash card col s6 m6 l6 xl6  ">
      <h6><small>Acumulado</small></h6>
      <h5> $ {{ number_format((float) Auth::user()->shopping->sum('rode') )}}</h5>
      <hr style="border:1em; color:blue;">
    </div>

    <div class="card_dash card col s6 m6 l6 xl6">
      <h6><small>Compras registradas</small></h6>
      <h5>{{ number_format((float) Auth::user()->shopping->count('id') )}}</h5>
    </div>
    <div class="row">
       <div class="col s12">
         <div class="row">
           <div class="input-field col s12">
             <i class="material-icons prefix">search</i>
             <input type="text" id="autocomplete-input" class="autocomplete">
             <label for="autocomplete-input">Buscar Factura</label>
           </div>
         </div>
       </div>
     </div>
    <table>
       <thead>
         <tr>
             <th>Folio</th>
             <th>Monto</th>
             <th>Fecha Timbrado</th>
             <th>Archivos</th>

         </tr>
       </thead>

       <tbody>
         @forelse ($shopping as $item)
              <tr>
                <td>{{$item->referenceFac}}</td>
                <td>${{$item->rode}}</td>
                <td>{{$item->shopping_date}}</td>
                <td>
                  <img src="{!! URL::asset('/img/pdf.png')!!}" alt="Contact Person">
                  <img src="{!! URL::asset('/img/xml.png')!!}" alt="Contact Person">
                </td>
              </tr>
          @empty
              @if(count($shopping) <= 0)
                <br><br><br><br><br>
                <p>No tienes compras registradas</p>
                <a href="{{url('/ShoppingClien/create')}}" class="waves-effect waves-light btn-small btn-large pulse">Registrar Compra</a>
                @else
                  <p>Esta pagina no contiene elementos</p>
              @endif
          @endforelse

       </tbody>
     </table>
     {{$shopping->render()}}
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var options ={!!$searchoption!!};
      $('input.autocomplete').autocomplete({
        data:options,
      });

    });
</script>
@endsection
