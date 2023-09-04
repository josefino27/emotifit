<?php

namespace App\Http\Controllers;

use App\Models\EjercicioModel;
use App\Models\RutinaEjercicioModel;
use App\Models\RutinaModel;
use App\Models\SerieModel;
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
        $ejercicios = EjercicioModel::all(); 
        $rutinas = RutinaModel::all();
        $series = SerieModel::all();
        return view('rutinas-ejercicios.create',compact('ejercicios','rutinas','series'));

        //dd($ejercicios);
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
        return redirect()->route('rutinasEjercicios.index')
        ->with('message','Registro Creado Satisfactoriamente.');
    }
    public function createUpdateRutinasEjercicios(Request $request,$rutinaEjercicio){

        $rutinaEjercicio->id_rutina=$request->id_rutina;
        $rutinaEjercicio->id_ejercicio=$request->id_ejercicio;
        $rutinaEjercicio->serie_tipo=$request->id_serie;
        $rutinaEjercicio->repeticiones=$request->repeticiones;
        $rutinaEjercicio->duracion_segundos=$request->duracion_segundos;
        $rutinaEjercicio->save();
        //dd($rutinaEjercicio);
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
        $rutinaEjercicios = RutinaEjercicioModel::join('rutinas','rutinas_ejercicios.id_rutina','=','rutinas.id_rutina')
        ->join('ejercicios','rutinas_ejercicios.id_ejercicio','=','ejercicios.id_ejercicio')
        ->join('series','rutinas_ejercicios.serie_tipo','=','series.id_serie')
        ->where('id_rutina_ejercicio', $id)->firstOrFail();
        //$rutinaEjercicios = RutinaEjercicioModel::where('id_rutina_ejercicio', $id)->firstOrFail();
        $rutinas = RutinaModel::where('id_rutina',$rutinaEjercicios->id_rutina)->firstOrFail();
        //$rutinas = RutinaModel::all();
        // $ejercicio = EjercicioModel::where('id_ejercicio',$rutinaEjercicios->id_ejercicio)->firstOrFail();
        $ejercicios = EjercicioModel::where('id_ejercicio','!=',$rutinaEjercicios->id_ejercicio);
        // $serie = SerieModel::where('id_serie',$rutinaEjercicios->serie_tipo)->firstOrFail();
        $series = SerieModel::where('id_serie','!=',$rutinaEjercicios->serie_tipo)->firstOrFail();
        return view('rutinas-ejercicios.show',compact('rutinaEjercicios','ejercicios','rutinas','series'));
        //dd($series,$rutinaEjercicios,$rutinas);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutinaEjercicios = RutinaEjercicioModel::join('rutinas','rutinas_ejercicios.id_rutina','=','rutinas.id_rutina')
        ->join('ejercicios','rutinas_ejercicios.id_ejercicio','=','ejercicios.id_ejercicio')
        ->join('series','rutinas_ejercicios.serie_tipo','=','series.id_serie')
        ->where('id_rutina_ejercicio', $id)->firstOrFail();
        //$rutinaEjercicios = RutinaEjercicioModel::where('id_rutina_ejercicio', $id)->firstOrFail();
        $rutinas = RutinaModel::where('id_rutina',$rutinaEjercicios->id_rutina)->firstOrFail();
        //$rutinas = RutinaModel::all();
        // $ejercicio = EjercicioModel::where('id_ejercicio',$rutinaEjercicios->id_ejercicio)->firstOrFail();
        $ejercicios = EjercicioModel::where('id_ejercicio','!=',$rutinaEjercicios->id_ejercicio);
        // $serie = SerieModel::where('id_serie',$rutinaEjercicios->serie_tipo)->firstOrFail();
        $series = SerieModel::where('id_serie','!=',$rutinaEjercicios->serie_tipo)->firstOrFail();
        return view('rutinas-ejercicios.edit',compact('rutinaEjercicios','ejercicios','rutinas','series'));
        //dd($series,$rutinaEjercicios,$rutinas);
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
        
        $rutinaEjercicios=RutinaEjercicioModel::where('id_rutina_ejercicio',$id)->firstOrfail();
        $rutinaEjercicios=$this->createUpdateRutinasEjercicios($request, $rutinaEjercicios);
        return redirect()->route('rutinasEjercicios.index')
        ->with('message','Registro Actualizado Satisfactoriamente.');
        //dd($rutinaEjercicios);
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
        try{
            $rutinaEjercicio->delete();
            return redirect()
            ->route('rutinasEjercicios.index')
            ->with('danger','Registro Eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('rutinasEjercicios.index')
            ->with('warning','El Registro No Puede Ser Eliminado.');
        }
        //dd($rutinaEjercicio);
        
    }
}
