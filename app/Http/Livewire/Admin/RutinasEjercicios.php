<?php

namespace App\Http\Livewire\Admin;

use App\Models\RutinaEjercicioModel;
use App\Models\RutinaModel;
use Livewire\Component;
use Livewire\WithPagination;


class RutinasEjercicios extends Component
{
    use WithPagination;
    public $search;
    public $sort='rutinas_ejercicios.id_rutina_ejercicio';
    public $direction='asc';
    public $select_ejercicio = 'rutinas_ejercicios.id_ejercicio';
    public $select_serie = 'rutinas_ejercicios.serie_tipo';
    public $time=0;
    protected $paginationTheme="bootstrap";
    public $count = 0;
    public $finaliza = false;
    public $show = 'hide';
    public $showT = 'hide';

    public $selectedRutina = "";

    public function updatedSelectedRutina($value)
    {
       $this->search = $value;
    }
    public function updatedPage()
    {
        $this->showT = 'show';
    }

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

        // Luego, redirige a la nueva ruta
        return redirect()
        ->route('rutinaEjercicioxUser.index')
        ->with('message', 'Finalizaste la rutina de ejercicio Satisfactoriamente.');
    }

    public function render()
    {
    $rutinas= RutinaModel::all();
    $rutinaEjercicios = RutinaEjercicioModel::join('ejercicios','rutinas_ejercicios.id_ejercicio','=','ejercicios.id_ejercicio')
    ->join('rutinas','rutinas_ejercicios.id_rutina','=','rutinas.id_rutina')
    ->join('series','rutinas_ejercicios.serie_tipo','=','series.id_serie')
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
    ->where('rutinas.nombre_rutina','like','%'.$this->search.'%')
    ->orderBy($this->sort,$this->direction)
    ->paginate(3);


    return view('livewire.admin.rutinas-ejercicios',compact('rutinaEjercicios', 'rutinas'))->layout('rutinas-ejercicios.index');
        //return dd($rutinaEjercicios);
}

    public function order($sort){
        if($this->sort == $sort){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            };

        }else{
            $this->sort=$sort;
            $this->direction = 'asc';
        };
    }
}
