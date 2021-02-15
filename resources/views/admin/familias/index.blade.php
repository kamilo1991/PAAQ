@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')

@section('content_header')
    <h1>Lista Familia</h1>
@stop

@section('content')
@if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card"> 
      <div class="card-header">
         <a class="btn btn-primary btn-sm float-right" href="{{route('admin.familias.create')}}">Agregar Familia</a>
      </div>

      <div class="card-body">
         <table class="table table-striped">
            <thead>
               <tr>
                 <th>ID</th>
                 <th>NOMBRE FAMILIA</th>
                 <th>NOMBRE SEGMENTO</th>
                 <th>ACCIONES</th>
                 <th colspan="2"></th>
               </tr>
            </thead>

           <tbody>
               @foreach ($familias as $familia)
                 <tr>
                   <td>{{$familia->id}}</td>
                   <td>{{$familia->detfamilia}}</td>
                   <td>{{$familia->segmento_id}}</td>
                   <td width="10px">
                      <a class="btn btn-primary btn-sm" href="{{route('admin.familias.edit', $familia)}}">Editar</a>
                   </td>
                   <td width="10px">
                       <form action="{{route('admin.familias.destroy',$familia)}}" method="POST">
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