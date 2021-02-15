<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Dependencia;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view ('admin.areas.index',compact('areas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencia = Dependencia::pluck('nomdependencia' , 'id');
        return view ('admin.areas.create', compact('dependencia'));
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
            'nomarea' => 'required',
            'dependencia_id'=>'required',
            'slug' => 'required|unique:areas'// alt+124=|
        ]);        
        $area = Area::create($request->all());
        return redirect()->route('admin.areas.edit',$area)->with('info','el area se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return view('admin.areas.show',compact('area'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $area = Area::pluck('nomdependencia' , 'id');
        return view('admin.areas.edit',compact('area','dependencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'nomarea' => 'required',
            'dependencia_id'=>'required',
            'slug' => "required|unique:areas,slug,$area->id"// alt+124=|
        ]);  
        $area->update($request->all());
        return redirect()->route('admin.areas.edit',$area)->with('info','el area se actializo con exito');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        
        $area->delete();
        return redirect()->route('admin.areas.index')->with('info','La dependencia se elimino con exito');
    }
}