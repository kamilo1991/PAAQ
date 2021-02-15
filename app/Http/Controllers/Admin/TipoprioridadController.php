<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipoprioridad;
class TipoprioridadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoprioridads = Tipoprioridad::all();
        return view ('admin.tipoprioridads.index',compact('tipoprioridads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tipoprioridads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'detprioridad' => 'required',
            'slug' => 'required|unique:tipoprioridads'// alt+124=|
        ]);        
        $tipoprioridad = Tipoprioridad::create($request->all());
        return redirect()->route('admin.tipoprioridads.edit',$tipoprioridad)->with('info','El tipo de prioridad se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoprioridad $tipoprioridad)
    {
        return view ('admin.tipoprioridads.show',compact('tipoprioridad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipoprioridad $tipoprioridad)
    {
        return view ('admin.tipoprioridads.edit',compact('tipoprioridad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoprioridad $tipoprioridad)
    {
        $request->validate([
            'detprioridad' => 'required',
            'slug' => "required|unique:tipoprioridads,slug,$tipoprioridad->id"// alt+124=|
        ]);  
        $tipoprioridad->update($request->all());
        return redirect()->route('admin.tipoprioridads.edit',$tipoprioridad)->with('info','El tipo de prioridad se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoprioridad $tipoprioridad)
    {
        $tipoprioridad->delete();
        return redirect()->route('admin.tipoprioridads.index')->with('info','El tipo de prioridad se elimino con exito');
    }
}
