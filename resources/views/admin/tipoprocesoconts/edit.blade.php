@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Editar Tipo de Proceso Contratual</h1>
@stop

@section('content')
  @if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card">
      <div class="card-body">
         {!! Form::model($tipoprocesocont, ['route' => ['admin.tipoprocesoconts.update', $tipoprocesocont], 'method' => 'put']) !!}

           <div class="form-group">
              {!! Form::label('dettipoprocesocont','NOMBRE DEL TIPO DE PROCESO CONTRATUAL') !!}
              {!! Form::text('dettipoprocesocont',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre del Tipo Proceso Contratual']) !!}
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

            {!! Form::submit('Actualizar Tipo de Proceso Contratual',['class'=> 'btn btn-primary']) !!}
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
           $("#dettipoprocesocont").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection