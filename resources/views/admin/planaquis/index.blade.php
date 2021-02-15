@extends('adminlte::page')

@section('title', 'Plan Aquisiciones')

@section('content_header')
    <h1>Listado Plan Aquisiciones</h1>
@stop

@section('content')
@if (session('info'))
   <div class="alert alert-success">
     <strong>{{session ('info')}}</strong>
   </div>
  @endif
   <div class="card"> 
      <div class="card-header">
         <a class="btn btn-primary btn-sm float-right" href="{{route('admin.planaquis.create')}}">Agregar Nuevo Plan Adquisicion</a>
      </div>

      <div class="card-body">
         <table class="table table-bordered">
            <thead>
               <tr>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">ID PPA</th>                                 
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Descripción del Objeto contractual</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Fecha estimada de inicio del proceso(mes)</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Duración estimada del contrato(número de mes(es))</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Modalidad de selección </th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Fuente de los recursos</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Valor total estimado</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Valor estimado en vigencia actual</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">¿Se requieren vigencias futuras?</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">¿Se requiere Protecto?</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Codigo BPIM</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">¿Se requiere POAI?</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Tipo de zona de ejecucion del Contrato</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Tipo de Adquisición o contrato</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Tipo de Proceso contractual</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Tipo de Prioridad</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Estado solicitud vigencias futuras</th>
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Datos de contacto del responsable</th> 
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">Código UNSPSC (Clasificador de Bienes y servicios)</th>                
                 <th class= "border border-gray-400 px-4 py-2 text-gray-800">ACCIONES</th>
                 <th colspan="19"></th>
               </tr>
            </thead>

           <tbody>
               @foreach ($planaqui as $planaquis)
                 <tr class="bg-gray-200"> 
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->id}}</td>                  
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->descripcioncont}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->mes_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->duracont}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->modalidad_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->fuente_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->valorestimadocont}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->valorestimadovig}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->requivigfut_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->requiproyecto}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->codbpim}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->requipoai}}</td>                   
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->tipozona_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->tipoaquicont_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->tipoprocesocont_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->tipoprioridad_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->estsolivigen_id}}</td>
                   <td class= "border border-gray-400 px-4 py-2">{{$planaquis->area_id}}</td> 
                   <td>
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Código</th>
                                                        
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($detallecodigounspscs as $detallecodigounspsc)
                            <tr>
                              <td>{{$detallecodigounspsc->producto_id}}</td>
                              
                            </tr>                            
                           @endforeach
                        </tbody>
                     </table>
                  </td>
                   <td width="10px">
                      <a class="btn btn-primary btn-sm" href="{{route('admin.planaquis.edit', $planaquis)}}">Editar</a>
                   </td>
                   <td width="10px">
                       <form action="{{route('admin.planaquis.destroy',$planaquis)}}" method="POST">
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