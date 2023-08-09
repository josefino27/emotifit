<?php

namespace App\Http\Livewire\Admin;

use App\Models\RutinaEjercicioModel;
use App\Models\RutinaModel;
use Livewire\Component;

class RutinasEjercicios extends Component
{
    public $search;
    public $sort='rutinas.id_rutina';
    public $direction='asc';

    public function render()
    {
    //     $rutina=RutinaModel::latest()->first();
    //     $ejercicios = RutinaEjercicioModel::join('ejercicios','rutinas_ejercicio.id_ejercicio','=','ejercicios.id_ejercicio')
    //     ->join('rutinas','rutinas_ejercicio.id_rutina','=','rutinas.id_rutina')
    //     ->where('rutinas.id_rutina','=',$this->search)
    //     ->orderBy($this->sort,$this->direction)
    //     ->paginate(10);

    //     return view('livewire.admin.rutinas-ejercicios',compact('ejercicios'))->layout('rutinas-ejercicios.create');

    $rutinaEjercicios = RutinaEjercicioModel::all();
    return view('livewire.admin.rutinas-ejercicios',compact('rutinaEjercicios'))->layout('rutinas-ejercicios.index');
    }
}
