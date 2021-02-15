@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Crear Nuevo Tipo de Proceso Contratual</h1>
@stop

@section('content')
  <div class="card">
      <div class="card-body">
         {!! Form::open(['route'=>'admin.tipoprocesoconts.store']) !!}

           <div class="form-group">
              {!! Form::label('dettipoprocesocont','NOMBRE DEL TIPO DE PROCESO CONTRATUAL') !!}
              {!! Form::text('dettipoprocesocont',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre del Tipo del Proceso Contratual']) !!}
               @error('dettipoprocesocont')
                   <span class="text-danger">{{$message}}</span>
               @enderror
           </div>

           <div class="form-group">
              {!! Form::label('slug','SLUG') !!}
              {!! Form::text('slug',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Slug','readonly']) !!}
               @error('slug')
                   <span class="text-danger">{{$message}}</span>
               @enderror
           </div>

            {!! Form::submit('Crear Tipo del Proceso Contratual',['class'=> 'btn btn-primary']) !!}
         {!! Form::close() !!}
      </div>    
 </div>
@stop
@section('js')
  <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
  <script>
       $(document).ready( function() {
           $("#dettipoprocesocont").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection