<?php

namespace App\Http\Controllers;

use App\Models\EjercicioModel;
use App\Models\RutinaEjercicioModel;
use App\Models\RutinaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RutinasEjercicios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("rutinas-ejercicios.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $ejercicios = EjercicioModel::all(); 
        // return view('rutinas-ejercicios.create',compact('ejercicios'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rutinaEjercicio = new RutinaEjercicioModel();
        $rutinaEjercicio = $this->createUpdateRutinasEjercicios($request,$rutinaEjercicio);
        $ejercicios = EjercicioModel::all(); 
        $rutinaEjercicios =  RutinaEjercicioModel::join('ejercicios','rutinas_ejercicio.id_ejercicio','=','ejercicios.id_ejercicio')
        ->join('rutinas','rutinas_ejercicio.id_rutina','=','rutinas.id_rutina')
        ->where('rutinas.id_rutina','=',$rutinaEjercicio->id_rutina)
        ->orderBy("rutinas_ejercicio.id_rutina_ejercicio","asc")
        ->paginate(10); 

        return view('rutinas-ejercicios.create', compact('rutinaEjercicios','ejercicios'));

    }
    public function createUpdateRutinasEjercicios(Request $request,$rutinaEjercicio){

        $rutinaEjercicio->id_rutina=$request->id_rutina;
        $rutinaEjercicio->id_ejercicio=$request->id_ejercicio;
        $rutinaEjercicio->repeticiones=$request->repeticiones;
        $rutinaEjercicio->series=$request->series;
        $rutinaEjercicio->save();
        return $rutinaEjercicio;

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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rutinaEjercicio=RutinaEjercicioModel::findOrfail($id);
        // try{
        //     $rutina->delete();
        //     return redirect()
        //     ->route('rutinasEjercicios.create')
        //     ->with('danger','Registro Eliminado.');
        // // }catch(QueryException $e){
        //     return redirect()
        //     ->route('rutinasEjercicios.create')
        //     ->with('warning','El Registro No Puede Ser Eliminado.');
        // }
        dd($rutinaEjercicio);
        
    }
}
