<?php

namespace App\Http\Controllers;

use App\Models\ClaseModel;
use App\Models\ReservaModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class reservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservas.index');
    }

    public function mostrarClases(){
        return 'clases disponibles';
    }

    function noAdmin(){
        return 'no tienes acceso a las clases disponibles';
    }

    public function recibirParametros($id){
        return "id recibido es: ".$id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserva = new ReservaModel();
        $clase = ClaseModel::find($request->id_clase);
        if($clase->cupo === 0){
             return redirect()->route('clases.index')->with('warning','No hay mas cupos disponibles');
        }else{

            $clase->cupo = $clase->cupo - 1;
            $reserva = $this->createUpdateReserva($request,$reserva);
            $clase->save();
            return redirect()->route('reservas.index')->with('message','Reserva Creada Satisfactoriamente.');

        }
       
    }

    public function createUpdateReserva(Request $request,$reserva){

        $reserva->id_clase = $request->id_clase;
        $reserva->id_usuario = $request->id_usuario;
        $reserva->save();
        return $reserva;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $reserva=ReservaModel::join('users','reservas.id_usuario','=','users.id')
        ->join('clases','reservas.id_clase','=','clases.id_clase')
        ->where('reservas.id_reserva',$id)->firstOrfail();
        return view('reservas.show', compact('reserva'));
    }
    public function reservarClase($id)
    {
        
        $reserva=ReservaModel::where('id_clase',$id)->firstOrfail();
        return view('reservas.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva=ReservaModel::join('users','reservas.id_usuario','=','users.id')
        ->join('clases','reservas.id_clase','=','clases.id_clase')
        ->where('reservas.id_reserva',$id)->firstOrfail();
        // dd($reserva);
        return view('reservas.edit', compact('reserva'));    
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
        try{
            $reserva=ReservaModel::join('users','reservas.id_usuario','=','users.id')
            ->join('clases','reservas.id_clase','=','clases.id_clase')
            ->where('reservas.id_reserva',$id)->firstOrfail();
            $clase = ClaseModel::find($reserva->id_clase);
            $reserva->delete();
            $clase->cupo = $clase->cupo+1;
            $clase->save();
            return redirect()
            ->route('reservas.index')
            ->with('danger','Reserva Eliminada.');
        }catch(QueryException $e){
            return redirect()
            ->route('reservas.index')
            ->with('warning','La Reserva No Puede Ser Eliminada.');
        }
    }
}
