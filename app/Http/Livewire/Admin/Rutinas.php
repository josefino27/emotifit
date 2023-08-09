<?php

namespace App\Http\Livewire\Admin;

use App\Models\EjercicioModel;
use App\Models\RutinaModel;
use Livewire\Component;

class Rutinas extends Component
{
    public $search;
    public $sort='id_ejercicio';
    public $sort2='id_rutina';
    public $direction='asc';

    public function render()
    {
        // $ejercicios = EjercicioModel::join('musculos','ejercicios.id_musculo','=','musculos.id')
        // ->where('nombre_ejercicio','like','%'.$this->search.'%')
        // ->orderBy($this->sort,$this->direction)
        // ->paginate(10);
        $rutina = RutinaModel::where('nombre_rutina','like','%'.$this->search.'%')
        ->orderBy($this->sort2,$this->direction)
        ->paginate(10);
        return view('livewire.admin.rutinas', compact('rutina'))->layout('rutinas.index');;

        
    
    }
}
