<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Segmento;

class SegmentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $segmentos = Segmento::all();
        return view ('admin.segmentos.index',compact('segmentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.segmentos.create');
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
            'detsegmento' => 'required',
            'slug' => 'required|unique:segmentos'// alt+124=|
        ]);        
        $segmento = Segmento::create($request->all());
        return redirect()->route('admin.segmentos.edit',$segmento)->with('info','EL Segmento se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Segmento $segmento)
    {
        return view ('admin.segmentos.show',compact('segmento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Segmento $segmento)
    {
        return view ('admin.segmentos.edit',compact('segmento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Segmento $segmento)
    {
        $request->validate([
            'detsegmento' => 'required',
            'slug' => "required|unique:segmentos,slug,$segmento->id"// alt+124=|
        ]);  
        $segmento->update($request->all());
        return redirect()->route('admin.segmentos.edit',$segmento)->with('info','El segmento se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Segmento $segmento)
    {
        $segmento->delete();
        return redirect()->route('admin.segmentos.index')->with('info','El segmento se elimino con exito');
    }
}
