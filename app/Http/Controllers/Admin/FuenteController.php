<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fuente;

class FuenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuentes = Fuente::all();
        return view ('admin.fuentes.index',compact('fuentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.fuentes.create');
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
            'detfuente' => 'required',
            'slug' => 'required|unique:fuentes'// alt+124=|
        ]);        
        $fuente = Fuente::create($request->all());
        return redirect()->route('admin.fuentes.edit',$fuente)->with('info','La fuente se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fuente $fuente)
    {
        return view ('admin.fuentes.show',compact('fuente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuente $fuente)
    {
        return view ('admin.fuentes.edit',compact('fuente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Fuente $fuente)
    {
        $request->validate([
            'detfuente' => 'required',
            'slug' => "required|unique:fuentes,slug,$fuente->id"// alt+124=|
        ]);  
        $fuente->update($request->all());
        return redirect()->route('admin.fuentes.edit',$fuente)->with('info','La fuente se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuente $fuente)
    {
        $fuente->delete();
        return redirect()->route('admin.fuentes.index')->with('info','La fuente se elimino con exito');
    }
}
