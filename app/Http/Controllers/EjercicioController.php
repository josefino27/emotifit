<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\EjercicioModel;

class EjercicioController extends Controller
{
    public function __construct(){

        $this->middleware('can:ejercicios.index')->only('index');
        $this->middleware('can:ejercicios.create')->only('create','store');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('ejercicios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ejercicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ejercicio = new EjercicioModel();
        $ejercicio=$this->createUpdateEjercicios($request, $ejercicio);
        // $imagenes=$request->file('imagen_ejercicio')->store('public/img');
        // $url=Storage::url($imagenes);
        return view(('ejercicios.index'), compact('ejercicio'));
    }                                                                           
    public function createUpdateEjercicios(Request $request,$ejercicio)
    {
        $ejercicio->nombre_ejercicio=$request->nombre_ejercicio;
        $ejercicio->descripcion=$request->descripcion;
        $ejercicio->id_musculo=$request->id_musculo;
        $ejercicio->imagen_ejercicio=$request->imagen_ejercicio;
        if($request->hasfile('imagen_ejercicio')){
            $ejercicio->imagen_ejercicio=$request->file('imagen_ejercicio')->store('imagenesEjercicio','public');
        }
        $ejercicio->save();
        return $ejercicio;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
        $ejercicio=EjercicioModel::where('id_ejercicio',$id)->firstOrfail();
        
        return view('ejercicios.show', compact('ejercicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ejercicio=EjercicioModel::where('id_ejercicio',$id)->firstOrfail();
        return view('ejercicios.edit', compact('ejercicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ejercicio)
    {
        $ejercicio=EjercicioModel::where('id_ejercicio',$id_ejercicio)->firstOrfail();
        $ejercicio=$this->createUpdateejercicios($request, $ejercicio);
        return redirect()
        ->route('ejercicios.index')
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
        $ejercicio=EjercicioModel::findOrfail($id);
        try{
            $ejercicio->delete();
            return redirect()
            ->route('ejercicios.index')
            ->with('danger','Registro Eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('ejercicios.index')
            ->with('warning','El Registro No Puede Ser Eliminado.');
        }
    }
}
