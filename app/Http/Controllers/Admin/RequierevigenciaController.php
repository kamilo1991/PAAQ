<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Requivigfut;

class RequierevigenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requivigfuts = Requivigfut::all();
        return view ('admin.requivigfuts.index',compact('requivigfuts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.requivigfuts.create');
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
            'detvigfut' => 'required',
            'slug' => 'required|unique:requivigfuts'// alt+124=|
        ]);        
        $requivigfut = Requivigfut::create($request->all());
        return redirect()->route('admin.requivigfuts.edit',$requivigfut)->with('info','La vigencia futura se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Requivigfut $requivigfut)
    {
        return view ('admin.requivigfuts.show',compact('requivigfut'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Requivigfut $requivigfut)
    {
        return view ('admin.requivigfuts.edit',compact('requivigfut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requivigfut $requivigfut)
    {
        $request->validate([
            'detvigfut' => 'required',
            'slug' => "required|unique:requivigfuts,slug,$requivigfut->id"// alt+124=|
        ]);  
        $requivigfut->update($request->all());
        return redirect()->route('admin.requivigfuts.edit',$requivigfut)->with('info','La vigencia futura se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requivigfut $requivigfut)
    {
        $requivigfut->delete();
        return redirect()->route('admin.requivigfuts.index')->with('info','La vigenciua futura se elimino con exito');
    }
}
