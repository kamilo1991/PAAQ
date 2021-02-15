<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Planaqui;
use App\Models\Dependencia;
use App\Models\Area;
use App\Models\Modalidad;
use App\Models\Requierevigencia;
use App\Models\Mes;
use App\Models\Fuente;
use App\Models\Estadosolicitudvigencia;
use App\Models\Tipozona;
use App\Models\Tipoprioridad;
use App\Models\Tipoaquicont;
use App\Models\Tipoprocesocont;
use App\Models\Detcodunspsc;
use App\Models\Producto;
use App\Models\Clase;
use App\Models\Estsolivigen;
use App\Models\Familia;
use App\Models\Segmento;

class PlanaquisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planaqui = Planaqui::all(); 
        $detallecodigounspscs = Detcodunspsc::all(); 
        $productos = Producto::all();       
        return view ('admin.planaquis.index',compact('planaqui','detallecodigounspscs','productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detallecodigounspscs = Detcodunspsc::pluck('producto_id' ,'planaquis_id', 'id');
        return view ('admin.detallecodigounspscs.create', compact('detallecodigounspscs'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::pluck('descripcioncont','mes_id','duracont','modalidad_id','fuente_id','valorestimadocont','valorestimadovig','requivigfut_id','requiproyecto','codbpim','requipoai','tipozona_id','tipoaquicont_id','tipoprocesocont_id','tipoprioridad_id','estsolivigen_id','area_id','detcodunspsc_id','id');
        return view('admin.planaquis.edit',compact('mes','modalidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
