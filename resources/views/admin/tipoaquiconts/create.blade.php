@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')



@section('content_header')
    <h1>Crear Nuevo Tipo Adquisicion del Contrato</h1>
@stop

@section('content')
  <div class="card">
      <div class="card-body">
         {!! Form::open(['route'=>'admin.tipoaquiconts.store']) !!}

           <div class="form-group">
              {!! Form::label('dettipoaquicont','NOMBRE DEL TIPO DE ADQUISICION DE CONTRATO') !!}
              {!! Form::text('dettipoaquicont',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre del Tipo Adquisicion del Contrato']) !!}
               @error('dettipoaquicont')
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

            {!! Form::submit('Crear Tipo Adquisicion Contrato',['class'=> 'btn btn-primary']) !!}
         {!! Form::close() !!}
      </div>    
 </div>
@stop
@section('js')
  <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
  <script>
       $(document).ready( function() {
           $("#dettipoaquicont").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
   </script>
@endsection