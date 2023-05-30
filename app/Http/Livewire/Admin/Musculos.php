<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\MusculoModel;
use Livewire\WithPagination;

class Musculos extends Component
{
    use WithPagination;

    public $search;
    public $sort='id';
    public $direction='asc';


    protected $paginationTheme="bootstrap";

    public function updatingSearch(){
        $this->resetpage();
    }
    public function render()
    {
        $musculos = MusculoModel::where('nombre','like','%'.$this->search.'%')
        ->orderBy($this->sort,$this->direction)
        ->paginate();

        return view('livewire.admin.musculos' ,compact('musculos'))->layout('musculos.index');
    }
}
