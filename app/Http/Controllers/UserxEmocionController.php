<?php

namespace App\Http\Controllers;

use App\Models\EmocionModel;
use App\Models\UserxEmocionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserxEmocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("emocionxusuario.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emocionArray = [];
        $user = Auth::user();
        $emociones = EmocionModel::all();
        return view('emocionxusuario.create',compact('emociones','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emocionxUsuario = new UserxEmocionModel();
        $emocionxUsuario=$this->createUpdateEmocionxUsuario($request, $emocionxUsuario);
        return redirect()
        ->route('userxemocion.index')
        ->with('message','Registro Creado Satisfactoriamente.');
    }

    public function createUpdateEmocionxUsuario(Request $request, $emocionxUsuario){

        $emocionxUsuario->id_emocion = $request->emociones;
        $emocionxUsuario->id_usuario = $request->user_id;
        $emocionxUsuario->save();
        return $emocionxUsuario;

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
