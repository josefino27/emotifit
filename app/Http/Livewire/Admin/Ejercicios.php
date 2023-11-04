<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\EjercicioModel;
use Livewire\WithPagination;

class Ejercicios extends Component
{
    use WithPagination;

    public $search;
    public $sort='id_ejercicio';
    public $direction='asc';


    protected $paginationTheme="bootstrap";

    public function updatingSearch(){
        $this->resetpage();
    }

    public function render()
    {
        $ejercicios = EjercicioModel::join('musculos','ejercicios.id_musculo','=','musculos.id')
        ->where('nombre_ejercicio','like','%'.$this->search.'%')
        ->orderBy($this->sort,$this->direction)
        ->paginate(10);

        return view('livewire.admin.ejercicios' ,compact('ejercicios'))->layout('ejercicios.index');
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
