@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Editar Clase</h1>
@stop

@section('content')
  @if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card">
      <div class="card-body">
         {!! Form::model($clase, ['route' => ['admin.clases.update', $clase], 'method' => 'put']) !!}

           <div class="form-group">
              {!! Form::label('detclase','NOMBRE CLASE') !!}
              {!! Form::text('detclase',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre de la clase']) !!}
               @error('detclase')
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

           <div class="form-group">
              {!! Form::label('familia_id','FAMILIA') !!}
              {!! Form::select('familia_id',$familia,null,['class' => 'form-control']) !!}
              @error('familia_id')
                   <small class="text-danger">{{$message}}</small>
               @enderror
           </div>
          

            {!! Form::submit('Actualizar Clase',['class'=> 'btn btn-primary']) !!}
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
           $("#detclase").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection