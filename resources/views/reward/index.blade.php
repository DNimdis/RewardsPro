@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-sm-12">
		<div class="container">
      <div class="input-field ">
        <div class="form-group">

					{!! Form::open(['url' => 'recompensa', 'method' => 'get', 'id'=> 'searchuser' ]) !!}
					 {{ csrf_field() }}
					 <div class="input-field col s8">
					 <i class="red-text material-icons prefix">search</i>
					 <input type="text" placeholder="search" name="search" id="search" class="autocomplete red-text" >
					 </div>
						<div class="input-field col s4">
						{{ Form::select('Pusuario', $typeusers, old('Pusuario', $keywordsUser), array('class'=>'form-control', 'placeholder'=>'Todos','id'=>'Pusuario'  )) }}
						 <label>Usuarios</label>
					 </div>
				 	{!! Form::close() !!}

        </div>
      </div>
		</div>
	</div>
</div>
<div class=" container right-align">
<h5> Recompensas:
	@if(count($recompensas) >1)
	{{count($recompensas)+1}}
	@else
	{{count($recompensas)}}
	@endif
</h5>
</div>
{!!$recompensas->render()!!}
<div class="row">
	@if(!$recompensas->isEmpty())
  @foreach($recompensas as $recom)
  <div class="col  s12 m4 l4">
      <div class="card horizontal z-depth-4">
        <div class="card-image">
          <img src="{{URL::asset('/img/m/gifts.png')}}" height="50%" width="50%" alt="Logo">
        </div>
        <div class="card-stacked">
          <div class="card-content">
            <p>{{$recom->label}}</p>
							<article>
								<p> <strong>Nivel:</strong>	{{$recom->level->title}}</p>
								<p><small>{{$recom->level->description}} </small> </p>
								<hr>
								<small>
								<p> Monto min:<strong>$ {{$recom->roles_reward->quantity_min}} </strong></p>
								<p> Monto max:<strong>$ {{$recom->roles_reward->quantity_max}} </strong></p>
								<p>Fecha Aplicable: <strong>{{$recom->roles_reward->application_date}} </strong> </p>
								</small>
							</article>
          </div>
          <div class="card-action">
            <a href="#" style="font-size:12px;"> {{ str_limit($recom->name, $limit = 15, $end = '...') }}</a>
						{!! Form::open( array('route' => array('recompensa.destroy', $recom)) ,['method' => 'POST ']) !!}
						{{ method_field('DELETE') }}
						 {{ csrf_field() }}
            <button  class="btn-floating right red " style="font-size:12px;" onclick="return confirm(&quot;Seguro que deseas eliminar esta recompensa?&quot;)"><i class="material-icons Tiny">delete_sweep</i></button>
						{!! Form::close() !!}
            <a href="{{ route('recompensa.edit',$recom->id) }}" class="btn-floating right yellow accent-4" style="font-size:12px;"><i class="material-icons Tiny">edit</i></a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
	@else
		<div class="container">
			<h5>No se encontraron resultados</h5>
		</div>
	@endif
</div>
{!!$recompensas->render()!!}

<script type="text/javascript">

	$('#Pusuario').change(function(){
		$('#searchuser').submit();
	} );
	$('#search').keypress(function(e){
		if(e.which == 13) {
				 $('#searchuser').submit();
		}
	});

</script>

@endsection
