<?php

namespace App\Http\Controllers;

use App\Models\EjercicioModel;
use App\Models\RutinaEjercicioModel;
use App\Models\RutinaModel;
use Illuminate\Database\QueryException;
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

        $radiocheck=$request->validate([
            'dia_entreno' => 'required|array|min:1', // Al menos un día debe estar seleccionado
        ]);
        if($radiocheck['dia_entreno'] > 0){
            $rutina=$this->createUpdaterutinas($request, $rutina);
        }
        return redirect()->route('rutinas.index')->with('message','Rutina Creada Satisfactoriamente.');
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
        $rutina=RutinaModel::where('rutinas.id_rutina',$id)->firstOrfail();
        $rutina->dia_entreno=explode(',',$rutina->dia_entreno);
        //dd($rutina->dia_entreno);
        return view('rutinas.show', compact('rutina')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutina=RutinaModel::where('rutinas.id_rutina',$id)->firstOrfail();
        $rutina->dia_entreno=explode(',',$rutina->dia_entreno);
        //dd($rutina->dia_entreno);
        return view('rutinas.edit', compact('rutina'));  
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

        $rutina=RutinaModel::where('id_rutina',$id)->firstOrfail();
        $rutina=$this->createUpdaterutinas($request, $rutina);
        $rutina->dia_entreno=explode(',',$rutina->dia_entreno);
        // $rutinaEjercicios =  RutinaEjercicioModel::join('ejercicios','rutinas_ejercicio.id_ejercicio','=','ejercicios.id_ejercicio')
        // ->join('rutinas','rutinas_ejercicio.id_rutina','=','rutinas.id_rutina')
        // ->where('rutinas.id_rutina','=',$id)
        // ->orderBy("rutinas_ejercicio.id_rutina_ejercicio","asc")
        // ->paginate(10); 
        return redirect()
        ->route('rutinas.index')
        ->with('message', 'Registro Actualizado Satisfactoriamente.');
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
        $rutina=rutinaModel::findOrfail($id);
        try{
            $rutina->delete();
            return redirect()
            ->route('rutinas.index')
            ->with('danger','Registro Eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('rutinas.index')
            ->with('warning','El Registro No Puede Ser Eliminado.');
        }
    }
}
