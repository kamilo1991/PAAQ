@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')

@section('content_header')
    <h1>Lista de Fuentes</h1>
@stop

@section('content')
@if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card"> 
      <div class="card-header">
         <a class="btn btn-primary btn-sm float-right" href="{{route('admin.fuentes.create')}}">Agregar Fuente</a>
      </div>

      <div class="card-body">
         <table class="table table-striped">
            <thead>
               <tr>
                 <th>ID</th>
                 <th>NOMBRE DE LA FUENTE</th>
                 <th>ACCIONES</th>
                 <th colspan="2"></th>
               </tr>
            </thead>

           <tbody>
               @foreach ($fuentes as $fuente)
                 <tr>
                   <td>{{$fuente->id}}</td>
                   <td>{{$fuente->detfuente}}</td>
                   <td width="10px">
                      <a class="btn btn-primary btn-sm" href="{{route('admin.fuentes.edit', $fuente)}}">Editar</a>
                   </td>
                   <td width="10px">
                       <form action="{{route('admin.fuentes.destroy',$fuente)}}" method="POST">
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