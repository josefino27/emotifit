<?php

namespace App\Http\Livewire\Admin;

use App\Models\RutinaEjercicioModel;
use Livewire\Component;

class RutinaEjercicioxUser extends Component
{
    protected $paginationTheme="bootstrap";

    public $search;
    public $id_rutina;
    public $nombre_rutina;
    public $id_user;
    public $time=0;
    public $finaliza = false;
    public $count = 0;
    public $fecha;
    public $comienza;
    public $valorInicial;
    public $ocultar;
    public $contador = 0;


        public function anterior()
    {
        $this->time--;
    }
    public function finaliza()
    {
        $this->time;
        $this->ocultar = 'hidden';
        $this->finaliza = true;

    }

    public function cancelarRutina() {

        // Luego, redirige a la nueva ruta
        return redirect()
        ->route('rutinasEjercicios.index');
    }
    protected $listeners = ['actualizarContador' => '$refresh'];

    public function siguiente()
    {
        $this->time++;
    }
    public function mount($id_rutina,$id_user,$comienza)
    {
        $this->id_rutina = $id_rutina;
        $this->id_user = $id_user;
        $this->fecha = date('Y-m-d');
        $this->comienza = $comienza;
    }
    public function render()
    {
        $rutinaEjerciciosT = RutinaEjercicioModel::join('ejercicios', 'rutinas_ejercicios.id_ejercicio', '=', 'ejercicios.id_ejercicio')
            ->join('rutinas', 'rutinas_ejercicios.id_rutina', '=', 'rutinas.id_rutina')
            ->join('series', 'rutinas_ejercicios.serie_tipo', '=', 'series.id_serie')
            ->select(
                'rutinas_ejercicios.id_rutina_ejercicio',
                'rutinas_ejercicios.repeticiones',
                'rutinas_ejercicios.duracion_segundos',
                'ejercicios.nombre_ejercicio',
                'ejercicios.descripcion',
                'ejercicios.imagen_ejercicio',
                'rutinas.id_rutina',
                'rutinas.nombre_rutina',
                'series.tipo'
            )
            ->where('rutinas.id_rutina', '=', $this->id_rutina)
            ->paginate();

    return view('livewire.admin.rutina-ejerciciox-user', compact('rutinaEjerciciosT'))->layout('rutinas-ejercicios.modal');
        //dd($rutinaEjerciciosT);
    }

}
