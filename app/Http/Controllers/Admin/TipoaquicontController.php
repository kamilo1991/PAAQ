<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipoaquicont;
class TipoaquicontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoaquiconts = Tipoaquicont::all();
        return view ('admin.tipoaquiconts.index',compact('tipoaquiconts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tipoaquiconts.create');
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
            'dettipoaquicont' => 'required',
            'slug' => 'required|unique:tipoaquiconts'// alt+124=|
        ]);        
        $tipoaquicont = Tipoaquicont::create($request->all());
        return redirect()->route('admin.tipoaquiconts.edit',$tipoaquicont)->with('info','El tipo de adquisicion contrato se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoaquicont $tipoaquicont)
    {
        return view ('admin.tipoaquiconts.show',compact('tipoaquicont'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipoaquicont $tipoaquicont)
    {
        return view ('admin.tipoaquiconts.edit',compact('tipoaquicont'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoaquicont $tipoaquicont)
    {
        $request->validate([
            'dettipoaquicont' => 'required',
            'slug' => "required|unique:tipoaquiconts,slug,$tipoaquicont->id"// alt+124=|
        ]);  
        $tipoaquicont->update($request->all());
        return redirect()->route('admin.tipoaquiconts.edit',$tipoaquicont)->with('info','El tipo de adquision contrato se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoaquicont $tipoaquicont)
    {
        $tipoaquicont->delete();
        return redirect()->route('admin.tipoaquiconts.index')->with('info','El tipo de adquisicion de contrato se elimino con exito');
    }
}
