@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')

@section('content_header')
    <h1>Lista Clase</h1>

@section('content')
@if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card"> 
      <div class="card-header">
         <a class="btn btn-primary btn-sm float-right" href="{{route('admin.clases.create')}}">Agregar Clase</a>
      </div>

      <div class="card-body">
         <table class="table table-striped">
            <thead>
               <tr>
                 <th>ID</th>
                 <th>NOMBRE CLASE</th>
                 <th>NOMBRE FAMILIA</th>
                 <th>ACCIONES</th>
                 <th colspan="2"></th>
               </tr>
            </thead>

           <tbody>
               @foreach ($clases as $clase)
                 <tr>
                   <td>{{$clase->id}}</td>
                   <td>{{$clase->detclase}}</td>
                   <td>{{$clase->familia_id}}</td>
                   <td width="10px">
                      <a class="btn btn-primary btn-sm" href="{{route('admin.clases.edit', $clase)}}">Editar</a>
                   </td>
                   <td width="10px">
                       <form action="{{route('admin.clases.destroy',$clase)}}" method="POST">
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