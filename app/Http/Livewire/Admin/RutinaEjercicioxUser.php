<?php

namespace App\Http\Livewire\Admin;

use App\Models\RutinaEjercicioModel;
use App\Models\RutinaModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RutinaEjercicioxUser extends Component
{
    protected $paginationTheme="bootstrap";

    public $search;
    public $id_user;
    public $show = 'hide';
    public $showT = 'hide';
    public $time=0;
    public $finaliza = false;
    public $count = 0;


    public function siguiente()
    {
        $this->show = 'show';
         $this->time++;
    }
        public function anterior()
    {
        $this->time--;
    }
    public function finaliza()
    {
        $this->time;
        $this->finaliza = true;

    }

    public function redireccionar() {
        //$id_rutina=RutinaModel::select('id_rutina')->where('nombre_rutina',$this->search)->get();

        dd((int)($this->id_user));
        // Luego, redirige a la nueva ruta
        // return redirect()
        // ->route('rutinasEjercicios.store')
        // ->with('message', 'Finalizaste la rutina de ejercicio Satisfactoriamente.');
    }

    public function cancelarRutina() {

        // Luego, redirige a la nueva ruta
        return redirect()
        ->route('rutinasEjercicios.index');
    }


    public function mount($nombre_rutina,$id_user)
    {
        $this->search = $nombre_rutina;
        $this->id_user = $id_user;
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
                'rutinas.nombre_rutina',
                'series.tipo'
            )
            ->where('rutinas.nombre_rutina', 'like', '%' . $this->search . '%')
            ->paginate();
        return view('livewire.admin.rutina-ejerciciox-user', compact('rutinaEjerciciosT'))->layout('rutinas-ejercicios.modal');
        //dd($rutinaEjerciciosT);
    }

}
