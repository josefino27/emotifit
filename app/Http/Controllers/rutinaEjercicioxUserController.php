<?php

namespace App\Http\Controllers;

use App\Models\rutinaEjercicioxUserModel;
use App\Models\RutinaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class rutinaEjercicioxUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rutinaEjercicioxUser = new rutinaEjercicioxUserModel();
        $rutinaEjercicioxUser=$this->createUpdateRutinaejercicioxUser($request, $rutinaEjercicioxUser);
        return redirect()->route('rutinas.index')->with('message','Rutina Realizada Satisfactoriamente.');
        //dd($request);
    }
    public function createUpdateRutinaejercicioxUser(Request $request,$rutinaEjercicioxUser)
    {
        $rutinaEjercicioxUser->id_rutina=$request->id_rutina;
        $rutinaEjercicioxUser->id_usuario=$request->id_user;
        $rutinaEjercicioxUser->fecha=$request->fecha;
        $rutinaEjercicioxUser->comienza=$request->comienza;
        $rutinaEjercicioxUser->termina=$request->termina;
        $rutinaEjercicioxUser->save();
        return $rutinaEjercicioxUser;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_rutina)
    {
        $id_user=Auth::user()->id;
        $comienza = date('H:i:s');
        return view('rutinas-ejercicios.modal', compact('id_rutina','id_user','comienza'));
        //dd($nombre_rutina);
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
