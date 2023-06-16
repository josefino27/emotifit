<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaseModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // respuesta para api
        // $clases=ClaseModel::all();
        // $response = response()->json($clases,Response::HTTP_OK);
        // $response->header('Access-Control-Allow-Origin', '*');
        // $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS');
        // $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    
        // return $response;
        $clases=ClaseModel::select('*')->orderBy('id_clase','ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->buscar)){
            $clases=$clases->where('id_clase', 'like', '%'.$request->buscar.'%')
            ->orWhere('nombreClase','like', '%'.$request->buscar.'%')
            ->orWhere('cupo','like', '%'.$request->buscar.'%')
            ->orWhere('descripcion','like', '%'.$request->buscar.'%');
        }
        $clases=$clases->paginate($limit)->appends($request->all());
        return view('clases.index', compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clase=new ClaseModel();
        $clase=$this->createUpdateClases($request, $clase);
        return redirect()
        ->route('clases.index')
        ->with('message','Registro Creado Satisfactoriamente.');
    }
    public function createUpdateClases(Request $request,$clase)
    {
        $clase->nombreClase=$request->nombreClase;
        $clase->cupo=$request->cupo;
        $clase->fecha=$request->fecha;
        $clase->comienza=$request->comienza;
        $clase->termina=$request->termina;
        $clase->descripcion=$request->descripcion;
        if($request->hasfile('imagen')){$clase->imagen=$request->file('imagen')->store('portafolio','public');}
        $clase->save();
        return $clase;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clase=ClaseModel::where('id_clase',$id)->firstOrfail();
        return view('clases.show', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clase=ClaseModel::where('id_clase',$id)->firstOrfail();
        return view('clases.edit', compact('clase'));
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
        $clase=ClaseModel::where('id_clase',$id)->firstOrfail();
        $clase=$this->createUpdateClases($request, $clase);
        return redirect()
        ->route('clases.index')
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
        $clase=ClaseModel::findOrfail($id);
        try{
            $clase->delete();
            return redirect()
            ->route('clases.index')
            ->with('danger','Registro Eliminado.');
        }catch(QueryException $e){
            return redirect()
            ->route('clases.index')
            ->with('warning','El Registro No Puede Ser Eliminado.');
        }
    }
}