@extends('layouts.client')
  @section('content')
  @include('layouts.menuTop')
  <div class="container">
    <div class="rows">
      <div class="col s12 m12 l12">
        <div class="card">
          <div class="card-header">{{ __('Registrar Compra') }}</div>
          <div class="card-body">


            {!! Form::open(['url' => 'ShoppingClien', 'method' => 'post','enctype' => 'multipart/form-data' ]) !!}
             {{ csrf_field()}}
             <div class="row">
               @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error-text">{{$error}}</div>
                    @endforeach
                @endif
                <div class="input-field col s12 m12 l6">
                   <input id="referenceFac" type="text" name="referenceFac" value="{{old('referenceFac')}}"data-length="10">
                   <label for="input_text">Folio de Compra</label>
                   @if($errors->has('folio'))
                       <div class="error-text">
                           {{$errors->first('folio')}}
                       </div>
                   @endif
                 </div>
                 <div class="input-field col s12 m12 l6">
                    <input type="text" name="fechaEmision" class="datepicker">
                    <label for="input_text">Fecha Emision</label>
                    @if($errors->has('fechaEmision'))
                        <div class="error-text">
                            {{$errors->first('fechaEmision')}}
                        </div>
                    @endif
                 </div>
               </div>
               <div class="row">
                 <div class="col s12 m12 l6">
                   <div class="file-field input-field">
                      <div class="btn">
                        <span>XML</span>
                        <input type="file"  name="factXML">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate"  placeholder="Seleciona tu factura XML" type="text">
                      </div>
                      @if($errors->has('factXML'))
                          <div class="error-text">
                              {{$errors->first('factXML')}}
                          </div>
                      @endif
                    </div>
                 </div>
                 <div class="col s12 m12 l6">
                   <div class="file-field input-field">
                      <div class="btn">
                        <span>PDF</span>
                        <input type="file" name="factPDF" >
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" placeholder="Seleciona tu factura PDF" type="text">
                      </div>
                      @if($errors->has('factPDF'))
                          <div class="error-text">
                              {{$errors->first('factPDF')}}
                          </div>
                      @endif
                    </div>
                 </div>
             </div>
             {!! Form::submit('Guardar' ,['class'=>'waves-effect waves-light btn ']) !!}
             {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.datepicker').datepicker();
      $('input#input_text').characterCounter();

    });
  </script>
  <script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
          var s = input.files[0];
        }
      }
  </script>

  <style media="screen">
    .error-text{
      color: #b71c1c;
    }
  </style>

@endsection
