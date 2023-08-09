<?php

namespace App\Http\Livewire\Admin;

use App\Models\EmocionModel;
use Livewire\Component;
use Livewire\WithPagination;

class Emocion extends Component
{
    use WithPagination;

    public $search;
    public $sort='id_emocion';
    public $direction='asc';

    protected $paginationTheme="bootstrap";

    public function updatingSearch(){
        $this->resetpage();
    }
    public function render()
    {
        $emociones = EmocionModel::where('nombre_emocion','like','%'.$this->search.'%')
        ->orderby($this->sort,$this->direction)
        ->paginate(3);
        return view('livewire.admin.emocion', compact('emociones'))->layout('emocion.index');
    }
}
