<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estsolivigen;
class EstadosolicitudvigenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estsolivigens = Estsolivigen::all();
        return view ('admin.estsolivigens.index',compact('estsolivigens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.estsolivigens.create');
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
            'detstsolivigen' => 'required',
            'slug' => 'required|unique:estsolivigens'// alt+124=|
        ]);        
        $estsolivigen = Estsolivigen::create($request->all());
        return redirect()->route('admin.estsolivigens.edit',$estsolivigen)->with('info','El estado de la solicitud vigencia se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estsolivigen $estsolivigen)
    {
        return view ('admin.estsolivigens.show',compact('estsolivigen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estsolivigen $estsolivigen)
    {
        return view ('admin.estsolivigens.edit',compact('estsolivigen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estsolivigen $estsolivigen)
    {
        $request->validate([
            'detstsolivigen' => 'required',
            'slug' => "required|unique:estsolivigens,slug,$estsolivigen->id"// alt+124=|
        ]);  
        $estsolivigen->update($request->all());
        return redirect()->route('admin.estsolivigens.edit',$estsolivigen)->with('info','El estado de la solicitud vigencia se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estsolivigen $estsolivigen)
    {
        $estsolivigen->delete();
        return redirect()->route('admin.estsolivigens.index')->with('info','El estado de la solicitud vigencia se elimino con exito');
    }
}
