@extends('layouts.admin')

@section('content')
<br>
 <a href="{{url()->previous()}}" class="btn btn-floating"> <i class="material-icons">arrow_back</i></a>
<div class="container ">
      <!-- <div class="card"> -->
        <span class="card-title">
          Actualizar Recompensa
        </span>
        <ul class="tabs">
          <li class="tab col s3"><a class="active" href="#recompensa">Recompensa</a></li>
          <li class="tab col s3"><a href="#regla">Reglas</a></li>
          <li class="tab col s3"><a href="#ayuda">Ayuda</a></li>
        </ul>
        <!-- <form class="" action="{{ url('recompensa') }}" method="post"> -->
        {!! Form::open( array('route' => array('recompensa.update', $reward)) ,['method' => 'PATCH'] ) !!}
        {{ method_field('PATCH') }}
         {{ csrf_field() }}

          @include ('reward.form', ['formMode' => 'edit'])


        <!-- </form> -->
      <!-- </div> -->
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $('.tabs').tabs();
    $('.datepicker').datepicker();
  });
</script>


@endsection
