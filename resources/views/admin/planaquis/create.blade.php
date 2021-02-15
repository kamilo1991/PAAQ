@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Crear Nueva Modalidad</h1>
@stop

@section('content')
  <div class="card">
      <div class="card-body">
         {!! Form::open(['route'=>'admin.modalidads.store']) !!}

           <div class="form-group">
              {!! Form::label('detmodalidad','NOMBRE DE LA MODALIDAD') !!}
              {!! Form::text('detmodalidad',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre de la Modalidad']) !!}
               @error('detmodalidad')
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

            {!! Form::submit('Crear la Modalidad',['class'=> 'btn btn-primary']) !!}
         {!! Form::close() !!}
      </div>    
 </div>
@stop
@section('js')
  <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
  <script>
       $(document).ready( function() {
           $("#detmodalidad").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection