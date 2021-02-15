<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipozona;

class TipozonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipozonas = Tipozona::all();
        return view ('admin.tipozonas.index',compact('tipozonas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tipozonas.create');
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
            'tipozona' => 'required',
            'slug' => 'required|unique:tipozonas'// alt+124=|
        ]);        
        $tipozona = Tipozona::create($request->all());
        return redirect()->route('admin.tipozonas.edit',$tipozona)->with('info','El tipo de zona se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipozona $tipozona)
    {
        return view ('admin.tipozonas.show',compact('tipozona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipozona $tipozona)
    {
        return view ('admin.tipozonas.edit',compact('tipozona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipozona $tipozona)
    {
        $request->validate([
            'tipozona' => 'required',
            'slug' => "required|unique:tipozonas,slug,$tipozona->id"// alt+124=|
        ]);  
        $tipozona->update($request->all());
        return redirect()->route('admin.tipozonas.edit',$tipozona)->with('info','El tipo de zona se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipozona $tipozona)
    {
        $tipozona->delete();
        return redirect()->route('admin.tipozonas.index')->with('info','El tipo de zona se elimino con exito');
    }
}
