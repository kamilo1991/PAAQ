<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mes;

class MesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mes = Mes::all();
        return view ('admin.mes.index',compact('mes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('admin.mes.create');
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
            'nommes' => 'required',
            'slug' => 'required|unique:mes'// alt+124=|
        ]);        
        $me = Mes::create($request->all());
        return redirect()->route('admin.mes.edit',$me)->with('info','El Mes se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mes $me)
    {
        //
        return view ('admin.mes.show',compact('me'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mes $me)
    {
        //
        return view ('admin.mes.edit',compact('me'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Mes $me)
    {
        //
        $request->validate([
            'nommes' => 'required',
            'slug' => "required|unique:mes,slug,$me->id"// alt+124=|
        ]);  
        $me->update($request->all());
        return redirect()->route('admin.mes.edit',$me)->with('info','El Mes se actializo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mes $me)
    {
        // 
        $me->delete();
        return redirect()->route('admin.mes.index')->with('info','El Mes se elimino con exito');
    }
}
