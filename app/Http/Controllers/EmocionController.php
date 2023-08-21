<?php

namespace App\Http\Controllers;

use App\Models\EmocionModel;
use Illuminate\Http\Request;

class EmocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emociones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emociones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emocion=new EmocionModel();
        $emocion=$this->createUpdateEmociones($request, $emocion);
        return redirect()
        ->route('emocion.index')
        ->with('message','Registro Creado Satisfactoriamente.');
    }

    public function createUpdateEmociones(Request $request, $emocion){

        $emocion->nombre_emocion = $request->nombre_emocion;
        $emocion->save();
        return $emocion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emocion = EmocionModel::where('id_emocion',$id)->firstOrfail();
        return view('emociones.show', compact('emocion'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emocion = EmocionModel::where('id_emocion',$id)->firstOrfail();
        return view('emociones.edit', compact('emocion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $emocion = EmocionModel::where('id_emocion',$id)->firstOrfail();
        $emocion = $this->createUpdateEmociones($request, $emocion);
        return redirect()
        ->route('emocion.index')
        ->with('message','Registro Actualizado Satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
