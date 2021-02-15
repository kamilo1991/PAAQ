@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')

@section('content_header')
    <h1>Lista Tipo Proceso Contratual</h1>
@stop

@section('content')
@if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card"> 
      <div class="card-header">
         <a class="btn btn-primary btn-sm float-right" href="{{route('admin.tipoprocesoconts.create')}}">Agregar Tipo Proceso Contratual</a>
      </div>

      <div class="card-body">
         <table class="table table-striped">
            <thead>
               <tr>
                 <th>ID</th>
                 <th>NOMBRE TIPO DE PROCESO CONTRATUAL</th>
                 <th>ACCIONES</th>
                 <th colspan="2"></th>
               </tr>
            </thead>

           <tbody>
               @foreach ($tipoprocesoconts as $tipoprocesocont)
                 <tr>
                   <td>{{$tipoprocesocont->id}}</td>
                   <td>{{$tipoprocesocont->dettipoprocesocont}}</td>
                   <td width="10px">
                      <a class="btn btn-primary btn-sm" href="{{route('admin.tipoprocesoconts.edit',$tipoprocesocont)}}">Editar</a>
                   </td>
                   <td width="10px">
                       <form action="{{route('admin.tipoprocesoconts.destroy',$tipoprocesocont)}}" method="POST">
                          @csrf
                           @method('delete')
                           <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                       </form>
                   </td>
                 </tr>
               @endforeach
           </tbody> 
         </table>       
      </div>      
   </div>
@stop