<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NutricionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        return view('nutricion.index');

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
        $altura=$request->altura;
        $peso=$request->peso;
        $alt2=$altura/100;
        $altura=$alt2*$alt2;
        $imc=$peso/$altura;
        
        if($imc>=30){
            $m = "Obesidad";
         }if($imc>=25 && $imc<30){
            $m = "sobrepeso";
         }
         if($imc>18.5 && $imc<25){
             $m="peso ideal";
         }
         if($imc<=18.5){
             $m="bajo de peso";
         }
        return view('nutricion.index',['imc'=>$imc,'m'=>$m]);
    
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