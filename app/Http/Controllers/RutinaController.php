<?php

namespace App\Http\Controllers;

use App\Models\EjercicioModel;
use App\Models\RutinaModel;
use Illuminate\Http\Request;

class RutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rutinas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ejercicios = EjercicioModel::all(); 
        return view('rutinas.create',compact('ejercicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rutina = new RutinaModel();
        $rutina=$this->createUpdaterutinas($request, $rutina);
        return view(('rutinas.index'), compact('rutina'));
    }
    public function createUpdaterutinas(Request $request,$rutina)
    {
        $rutina->nombre_rutina=$request->nombre_rutina;
        $rutina->dia_entreno=join(",",$request->dia_entreno);
        $rutina->descripcion_rutina=$request->descripcion_rutina;
        $rutina->save();
        return $rutina;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
