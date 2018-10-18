<div id="recompensa" class="col s12">
  <br>
  <div class="row">
    <div class="col s12">
      <div class="input-field col s6">
        <input placeholder="Ingresa el nombre de la recompensa" id="nombre" name="nombre" value="{{old('nombre',$reward->name)}} " type="text" class="validate">
        <label for="first_name">Nombre</label>
        @if($errors->has('nombre'))
            <div class="error-text">
                {{$errors->first('nombre')}}
            </div>
        @endif
      </div>
      <div class="input-field col s6">
        <input placeholder="Indica la cantidad de elementos" id="cantidad" value="{{old('cantidad',$reward->quantity)}}" name="cantidad" type="number" min="1" class="validate">
        <label for="first_name">Cantidad</label>
        @if($errors->has('cantidad'))
            <div class="error-text">
                {{$errors->first('cantidad')}}
            </div>
        @endif
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <div class="input-field col s6">
        <input placeholder="Ingresa el enunciado" id="etiqueta" value="{{old('etiqueta',$reward->label)}}" name="etiqueta" type="text" class="validate">
        <label for="first_name">Etiqueta</label>
        @if($errors->has('etiqueta'))
            <div class="error-text">
                {{$errors->first('etiqueta')}}
            </div>
        @endif
      </div>
      <div class="input-field col s6">
        {{ Form::select('Pusuario', $typeusers, old('Pusuario',isset($reward->typeuser->id)? $reward->typeuser->id : null ), array('class'=>'form-control', 'placeholder'=>'Seleciona una opcion'  )) }}
       <label>Aplica para usuarios</label>
       @if($errors->has('typeusers'))
           <div class="error-text">
               {{$errors->first('typeusers')}}
           </div>
       @endif
     </div>
    </div>
  </div>
</div>
<div id="regla" class="col s12">
  <br>
  <div class="row">
    <div class="col s12">
      <div class="input-field col s4">
         {{ Form::select('tipoRecompensa', $reward_types, old('tipoRecompensa',isset($reward->reward_type->id)? $reward->reward_type->id:null ), array('class'=>'form-control', 'placeholder'=>'Seleciona una opcion')) }}
         <label>Tipo de Recompensas</label>
         @if($errors->has('reward_types'))
             <div class="error-text">
                 {{$errors->first('reward_types')}}
             </div>
         @endif
       </div>
       <div class="input-field col s4">
         <input placeholder="Ingresa el monto minimo" id="montoMin" name="montoMin" value="{{ old('montoMin',isset($reward->roles_reward->quantity_min )? $reward->roles_reward->quantity_min: '' ) }}" type="number" min="1" class="validate">
         <label for="montoMax">Monto min</label>
         @if($errors->has('montoMin'))
             <div class="error-text">
                 {{$errors->first('montoMin')}}
             </div>
         @endif
       </div>
       <div class="input-field col s4">
         <input placeholder="Ingresa el monto maximo" id="montoMax" name="montoMax" value="{{ old('montoMax',isset($reward->roles_reward->quantity_max)? $reward->roles_reward->quantity_max:'') }}" type="number" min="1"  class="validate">
         <label for="montoMax">Monto max</label>
         @if($errors->has('montoMax'))
             <div class="error-text">
                 {{$errors->first('montoMax')}}
             </div>
         @endif
       </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
        <div class="input-field col s6">
          <input type="text" name="fechaAplica" value=" {{ old('fechaAplica', isset($reward->roles_reward->application_date)? $reward->roles_reward->application_date:'' ) }}" class="datepicker">
          <label for="first_name">Fecha aplicable</label>
          @if($errors->has('fechaAplica'))
              <div class="error-text">
                  {{$errors->first('fechaAplica')}}
              </div>
          @endif
        </div>
        <div class="input-field col s6">
          {{ Form::select('nivel', $levels,old('nivel',isset($reward->level->id)? $reward->level->id: null ), array('class'=>'form-control', 'placeholder'=>'Seleciona una opcion')) }}
           <label>Para que nivel?</label>
           @if($errors->has('levels'))
               <div class="error-text">
                   {{$errors->first('levels')}}
               </div>
           @endif
         </div>
      </div>
    </div>
  </div>
<!-- termina reglas -->
<div id="ayuda" class="col s12">
  <div class="row">
    <div class="col s12">
      <section>
        <head>
        Puntos importantes....
        <p>This template has a responsive menu toggling system. The menu will appear
           collapsed on smaller screens, and will appear non-collapsed on larger screens.
           When toggled using the button below, the menu will appear/disappear. On small screens,
           the page content will be pushed off canvas.</p>
        </head>
      </section>
    </div>
  </div>
</div>
{!! Form::submit($formMode === 'edit' ? 'Actualizar' : 'Guardar' ,['class'=>'waves-effect waves-light btn right']) !!}
{!! Form::close() !!}
