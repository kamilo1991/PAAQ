<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modalidad;
class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidads = Modalidad::all();
        return view ('admin.modalidads.index',compact('modalidads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.modalidads.create');
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
            'detmodalidad' => 'required',
            'slug' => 'required|unique:modalidads'// alt+124=|
        ]);        
        $modalidad = Modalidad::create($request->all());
        return redirect()->route('admin.modalidads.edit',$modalidad)->with('info','La modalidad se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Modalidad $modalidad)
    {
        return view ('admin.modalidads.show',compact('modalidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Modalidad $modalidad)
    {
        return view ('admin.modalidads.edit',compact('modalidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modalidad $modalidad)
    {
        $request->validate([
            'detmodalidad' => 'required',
            'slug' => "required|unique:modalidads,slug,$modalidad->id"// alt+124=|
        ]);  
        $modalidad->update($request->all());
        return redirect()->route('admin.modalidads.edit',$modalidad)->with('info','La modalidad se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modalidad $modalidad)
    {
        $modalidad->delete();
        return redirect()->route('admin.modalidads.index')->with('info','La modalidad se elimino con exito');
    }
}
