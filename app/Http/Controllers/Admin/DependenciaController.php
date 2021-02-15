<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dependencia;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dependencias = Dependencia::all();
        return view ('admin.dependencias.index',compact('dependencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.dependencias.create');
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
        $request->validate([
            'nomdependencia' => 'required',
            'slug' => 'required|unique:dependencias'// alt+124=|
        ]);        
        $dependencia = Dependencia::create($request->all());
        return redirect()->route('admin.dependencias.edit',$dependencia)->with('info','La dependencia se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dependencia $dependencia)
    {
        //
        return view ('admin.dependencias.show',compact('dependencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependencia $dependencia)
    {
        //
        return view ('admin.dependencias.edit',compact('dependencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dependencia $dependencia)
    {
        //
        $request->validate([
            'nomdependencia' => 'required',
            'slug' => "required|unique:dependencias,slug,$dependencia->id"// alt+124=|
        ]);  
        $dependencia->update($request->all());
        return redirect()->route('admin.dependencias.edit',$dependencia)->with('info','La dependencia se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependencia $dependencia)
    {
        // 
        $dependencia->delete();
        return redirect()->route('admin.dependencias.index')->with('info','La dependencia se elimino con exito');
    }
}
