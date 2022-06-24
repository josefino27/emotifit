<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusculoModel;

class MusculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('musculos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('musculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $musculo= new MusculoModel();
        $musculo=$this->createUpdateMusculos($request, $musculo);
 
        return redirect()->route('musculos.index')->with('message','Registro Creado Satisfactoriamente.');
    }
    public function createUpdateMusculos(Request $request,$musculo)
    {
        $musculo->nombre=$request->nombre;
        $musculo->save();
        return $musculo;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musculo=MusculoModel::where('id',$id)->firstOrfail();
        return view('musculos.show', compact('musculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $musculo=MusculoModel::where('id',$id)->firstOrfail();
        return view('musculos.edit', compact('musculo'));
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
        $musculo=MusculoModel::where('id',$id)->firstOrfail();
        $musculo=$this->createUpdateMusculos($request, $musculo);
        return redirect()
        ->route('musculos.index')
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
        $musculo=MusculoModel::findOrfail($id);
        try{
            $musculo->delete();
            return redirect()
            ->route('musculos.index')
            ->with('danger','Registro Eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('musculos.index')
            ->with('warning','El Registro No Puede Ser Eliminado.');
        }
    }
}
