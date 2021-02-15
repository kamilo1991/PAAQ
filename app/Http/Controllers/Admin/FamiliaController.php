<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Segmento;
use App\Models\Familia;

class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familias = Familia::all();
        return view ('admin.familias.index',compact('familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $segmento = Segmento::pluck('detsegmento' , 'id');
        return view ('admin.familias.create', compact('segmento'));
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
            'detfamilia' => 'required',
            'segmento_id'=>'required',
            'slug' => 'required|unique:familias'// alt+124=|
        ]);        
        $familia = Familia::create($request->all());
        return redirect()->route('admin.familias.edit',$familia)->with('info','La familia se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Familia $familia)
    {
        return view('admin.familias.show',compact('familia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Familia $familia)
    {
        $familia = Familia::pluck('detsegmento','id');
        return view('admin.familias.edit',compact('familia','segmento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia $familia)
    {
        $request->validate([
            'detfamilia' => 'required',
            'segmento_id'=>'required',
            'slug' => "required|unique:familias,slug,$familia->id"// alt+124=|
        ]);  
        $familia->update($request->all());
        return redirect()->route('admin.familias.edit',$familia)->with('info','La familia se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia $familia)
    {
        $familia->delete();
        return redirect()->route('admin.familias.index')->with('info','La familia se elimino con exito');
    }
}
