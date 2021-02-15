@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')

@section('content_header')
    <h1>Lista de Modalidades</h1>
@stop

@section('content')
@if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card"> 
      <div class="card-header">
         <a class="btn btn-primary btn-sm float-right" href="{{route('admin.modalidads.create')}}">Agregar Modalidad</a>
      </div>

      <div class="card-body">
         <table class="table table-striped">
            <thead>
               <tr>
                 <th>ID</th>
                 <th>NOMBRE DE LA MODALIDAD</th>
                 <th>ACCIONES</th>
                 <th colspan="2"></th>
               </tr>
            </thead>

           <tbody>
               @foreach ($modalidads as $modalidad)
                 <tr>
                   <td>{{$modalidad->id}}</td>
                   <td>{{$modalidad->detmodalidad}}</td>
                   <td width="10px">
                      <a class="btn btn-primary btn-sm" href="{{route('admin.modalidads.edit', $modalidad)}}">Editar</a>
                   </td>
                   <td width="10px">
                       <form action="{{route('admin.modalidads.destroy',$modalidad)}}" method="POST">
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