<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaseModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use DateTime;

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
        $clases = ClaseModel::select('*')->orderBy('id_clase', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 5;

        if (isset($request->buscar)) {
            $clases = $clases->where('id_clase', 'like', '%' . $request->buscar . '%')
                ->orWhere('nombreClase', 'like', '%' . $request->buscar . '%')
                ->orWhere('cupo', 'like', '%' . $request->buscar . '%')
                ->orWhere('descripcion', 'like', '%' . $request->buscar . '%');
        }
        $clases = $clases->paginate($limit)->appends($request->all());

    // ASIGNAR LOS EVENTOS AL CALENDARIO
        $eventos = [];
        foreach ($clases as $clase) {
            $evento = [
                'title' => $clase->nombreClase,
                'start' => $clase->fecha.'T'.$clase->comienza,
                'end' => $clase->fecha.'T'.$clase->termina,
                
            ];
            array_push($eventos, $evento);
        }
        return view('clases.index', compact('clases','eventos'));
        //return response()->json($eventos);
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
        $clase = new ClaseModel();

        $clase = $this->createUpdateClases($request, $clase);
        // return redirect()
        //     ->route('clases.index')
        //     ->with('message', 'Registro Creado Satisfactoriamente.');
        return dd($clase);
    }
    public function createUpdateClases(Request $request, $clase)
    {   
        $clasearray = []; // Asegúrate de que $clasearray esté definido
        $inicio = new DateTime($request->comienza); // Suponiendo que $request->comienza es una hora en formato H:i
        $fin = new DateTime($request->termina); // Suponiendo que $request->termina es una hora en formato H:i

        while ($inicio < $fin) {
            $clase = new ClaseModel(); // Crear una nueva instancia en cada iteración
            
            $hora_actual = $inicio->format('H:i');
            $clase->nombreClase = $request->nombreClase;
            $clase->cupo = $request->cupo;
            $clase->fecha = $request->fecha;
            $clase->comienza = $hora_actual;
            
            // Calcular la hora de terminación
            $clase_termina = clone $inicio;
            $clase_termina->modify('+' . $request->rango_horas . ' hours');
            
            // Si la clase termina después del fin de la disponibilidad, ajustarla
            if ($clase_termina > $fin) {
                $clase_termina = $fin;
            }
            
            $clase->termina = $clase_termina->format('H:i');
            $clase->descripcion = $request->descripcion;
            
            if ($request->hasfile('imagen')) {
                $clase->imagen = $request->file('imagen')->store('portafolio', 'public');
            }
            
            // Agregar la clase al array
            array_push($clasearray, $clase);
            
            // Avanzar al siguiente intervalo
            $inicio = clone $clase_termina;
        }

        //$clase->save();
        return $clasearray;
        //return dd($clase->imagen);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clase = ClaseModel::where('id_clase', $id)->firstOrfail();
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
        $clase = ClaseModel::where('id_clase', $id)->firstOrfail();
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
        $clase = ClaseModel::where('id_clase', $id)->firstOrfail();
        $clase = $this->createUpdateClases($request, $clase);
        return redirect()
            ->route('clases.index')
            ->with('message', 'Registro Actualizado Satisfactoriamente.');
        //return dd($clase);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clase = ClaseModel::findOrfail($id);
        try {
            $clase->delete();
            return redirect()
                ->route('clases.index')
                ->with('danger', 'Registro Eliminado.');
        } catch (QueryException $e) {
            return redirect()
                ->route('clases.index')
                ->with('warning', 'El Registro No Puede Ser Eliminado.');
        }
    }
}
