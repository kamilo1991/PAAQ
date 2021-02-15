<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipoprocesocont;
class TipoprocesocontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoprocesoconts = Tipoprocesocont::all();
        return view ('admin.tipoprocesoconts.index',compact('tipoprocesoconts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.tipoprocesoconts.create');
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
            'dettipoprocesocont' => 'required',
            'slug' => 'required|unique:tipoprocesoconts'// alt+124=|
        ]);        
        $tipoprocesocont = Tipoprocesocont::create($request->all());
        return redirect()->route('admin.tipoprocesoconts.edit',$tipoprocesocont)->with('info','El tipo de proceso contratual se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tipoprocesocont $tipoprocesocont)
    {
        return view ('admin.tipoprocesoconts.show',compact('tipoprocesocont'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipoprocesocont $tipoprocesocont)
    {
        return view ('admin.tipoprocesoconts.edit',compact('tipoprocesocont'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoprocesocont  $tipoprocesocont)
    {
        $request->validate([
            'dettipoprocesocont' => 'required',
            'slug' => "required|unique:tipoprocesoconts,slug,$tipoprocesocont->id"// alt+124=|
        ]);  
        $tipoprocesocont->update($request->all());
        return redirect()->route('admin.tipoprocesoconts.edit',$tipoprocesocont)->with('info','El tipo de proceso contratual se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipoprocesocont  $tipoprocesocont)
    {
        $tipoprocesocont->delete();
        return redirect()->route('admin.tipoprocesoconts.index')->with('info','El tipo de proceso contratual se elimino con exito');
    }
}
