@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Editar la Modalidad</h1>
@stop

@section('content')
  @if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card">
      <div class="card-body">
         {!! Form::model($modalidad, ['route' => ['admin.modalidads.update', $modalidad], 'method' => 'put']) !!}

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

            {!! Form::submit('Actualizar la Modalidad',['class'=> 'btn btn-primary']) !!}
         {!! Form::close() !!}
      </div>    
 </div>
@stop
@section('css')
  <link rel="stylesheet" href="">
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