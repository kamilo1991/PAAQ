@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Crear Nueva Dependencia</h1>
@stop

@section('content')
  <div class="card">
      <div class="card-body">
         {!! Form::open(['route'=>'admin.dependencias.store']) !!}

           <div class="form-group">
              {!! Form::label('nomdependencia','NOMBRE DEPENDENCIA') !!}
              {!! Form::text('nomdependencia',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre de la Dependencia']) !!}
               @error('nomdependencia')
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

            {!! Form::submit('Crear Dependencia',['class'=> 'btn btn-primary']) !!}
         {!! Form::close() !!}
      </div>    
 </div>
@stop
@section('js')
  <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
  <script>
       $(document).ready( function() {
           $("#nomdependencia").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection