@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Editar Familia</h1>
@stop

@section('content')
  @if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card">
      <div class="card-body">
         {!! Form::model($familia, ['route' => ['admin.familias.update', $familia], 'method' => 'put']) !!}

           <div class="form-group">
              {!! Form::label('detfamilia','NOMBRE FAMILIA') !!}
              {!! Form::text('detfamilia',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre de la familia']) !!}
               @error('detfamilia')
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
              {!! Form::label('segmento_id','SEGMENTO') !!}
              {!! Form::select('segmento_id',$segmento,null,['class' => 'form-control']) !!}
              @error('segmento_id')
                   <small class="text-danger">{{$message}}</small>
               @enderror
           </div>
          

            {!! Form::submit('Actualizar Familia',['class'=> 'btn btn-primary']) !!}
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
           $("#detfamilia").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection