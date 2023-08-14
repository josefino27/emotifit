<?php

namespace App\Http\Livewire\Admin;

use App\Models\RutinaEjercicioModel;
use App\Models\RutinaModel;
use Livewire\Component;
use Livewire\WithPagination;


class RutinasEjercicios extends Component
{
    public $search;
    public $sort='rutinas.id_rutina';
    public $direction='asc';
    protected $paginationTheme="bootstrap";


    public $selectedRutina = "";
    
    public function updatedSelectedRutina($value)
    {
       $this->search = $value;
    }

    public function render()
    {
    $rutinas= RutinaModel::all();
    $rutinaEjercicios = RutinaEjercicioModel::join('ejercicios','rutinas_ejercicios.id_ejercicio','=','ejercicios.id_ejercicio')
    ->join('rutinas','rutinas_ejercicios.id_rutina','=','rutinas.id_rutina')
    ->join('series','rutinas_ejercicios.serie_tipo','=','series.id_serie')
    ->where('rutinas.nombre_rutina','like','%'.$this->search.'%')
    ->orderBy($this->sort,$this->direction)
    ->paginate(10);
    return view('livewire.admin.rutinas-ejercicios',compact('rutinaEjercicios','rutinas'))->layout('rutinas-ejercicios.index');
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
