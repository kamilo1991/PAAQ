<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clase;
use App\Models\Familia;
class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clases = Clase::all();
        return view ('admin.clases.index',compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familia = Familia::pluck('detfamilia' , 'id');
        return view ('admin.clases.create', compact('familia'));
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
            'detclase' => 'required',
            'familia_id'=>'required',
            'slug' => 'required|unique:clases'// alt+124=|
        ]);        
        $clase = Clase::create($request->all());
        return redirect()->route('admin.clases.edit',$clase)->with('info','La clase se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        return view('admin.clases.show',compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        $clase = Clase::pluck('detfamilia' , 'id');
        return view('admin.clases.edit',compact('clase','familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Clase $clase)
    {
        $request->validate([
            'detclase' => 'required',
            'familia_id'=>'required',
            'slug' => "required|unique:clases,slug,$clase->id"// alt+124=|
        ]);  
        $clase->update($request->all());
        return redirect()->route('admin.clases.edit',$clase)->with('info','La clase se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        $clase->delete();
        return redirect()->route('admin.clases.index')->with('info','La clse se elimino con exito');
    }
}
