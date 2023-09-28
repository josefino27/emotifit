<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserxEmocionModel;
use Livewire\Component;
use Livewire\WithPagination;

class UserxEmocion extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $buscar;
    public $sort='id_emocionxusuario';
    public $direction='asc';

    public function render()
    {
        
        $emocionxusuario = UserxEmocionModel::orderby($this->sort,$this->direction)->paginate(10);;
        return view('livewire.admin.userx-emocion', compact('emocionxusuario'))->layout('userx-emocion.index');
    }
}
