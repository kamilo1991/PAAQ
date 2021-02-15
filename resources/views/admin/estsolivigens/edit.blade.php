@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Editar el Estado Solucitud Vigencia</h1>
@stop

@section('content')
  @if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card">
      <div class="card-body">
         {!! Form::model($estsolivigen, ['route' => ['admin.estsolivigens.update', $estsolivigen], 'method' => 'put']) !!}

           <div class="form-group">
              {!! Form::label('detstsolivigen','NOMBRE DEL ESTADO SOLICITUD VIGENCIA') !!}
              {!! Form::text('detstsolivigen',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre del Estado Solicitud Vigencia']) !!}
               @error('detvigfut')
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

            {!! Form::submit('Actualizar el Estado Solicitud Vigencia',['class'=> 'btn btn-primary']) !!}
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
           $("#detstsolivigen").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection