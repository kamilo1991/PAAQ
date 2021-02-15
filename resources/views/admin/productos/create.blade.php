@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Crear Nueva Fuente</h1>
@stop

@section('content')
  <div class="card">
      <div class="card-body">
         {!! Form::open(['route'=>'admin.fuentes.store']) !!}

           <div class="form-group">
              {!! Form::label('detfuente','NOMBRE DE LA FUENTE') !!}
              {!! Form::text('detfuente',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre de la Fuente']) !!}
               @error('detfuente')
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

            {!! Form::submit('Crear la Fuente',['class'=> 'btn btn-primary']) !!}
         {!! Form::close() !!}
      </div>    
 </div>
@stop
@section('js')
  <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
  <script>
       $(document).ready( function() {
           $("#detfuente").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection