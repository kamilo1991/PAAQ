@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Crear Nueva Clase</h1>
@stop

@section('content')
  <div class="card">
      <div class="card-body">
         {!! Form::open(['route'=>'admin.clases.store']) !!}

           <div class="form-group">
              {!! Form::label('detclase','NOMBRE CLASE') !!}
              {!! Form::text('detclase',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre de la Clase']) !!}
               @error('detclase')
                   <small class="text-danger">{{$message}}</small>
               @enderror
           </div>

           <div class="form-group">
              {!! Form::label('slug','SLUG') !!}
              {!! Form::text('slug',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Slug','readonly']) !!}
               @error('slug')
                   <small class="text-danger">{{$message}}</small>
               @enderror
           </div>

           <div class="form-group">
              {!! Form::label('familia_id','familia') !!}
              {!! Form::select('familia_id',$familia,null,['class' => 'form-control']) !!}
              @error('familia_id')
                   <small class="text-danger">{{$message}}</small>
               @enderror
           </div>

            {!! Form::submit('Crear Familia',['class'=> 'btn btn-primary']) !!}
         {!! Form::close() !!}
      </div>    
 </div>
@stop
@section('js')
  <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
  <script>
       $(document).ready( function() {
           $("#detclase").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection