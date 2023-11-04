<?php

namespace App\Http\Livewire\Admin;

use App\Models\Emocionxusuario as ModelsEmocionxusuario;
use Livewire\Component;
use Livewire\WithPagination;

class Emocionxusuario extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $search;
    public $sort='id_emocionxusuario';
    public $direction='asc';

    public function updatingSearch(){
        $this->resetpage();
    }
    public function render()
    {
        
        $emocionxusuario = ModelsEmocionxusuario::join('users','emocionxusuario.id_usuario','=','users.id')
        ->join('emocion','emocionxusuario.id_emocion','=','emocion.id_emocion')
        ->select('emocionxusuario.*','users.name','emocion.nombre_emocion')
        ->where('nombre_emocion','like','%'.$this->search.'%')
        ->orwhere('name','like','%'.$this->search.'%')
        ->orderby($this->sort,$this->direction)->paginate(10);;
        return view('livewire.admin.emocionxusuario', compact('emocionxusuario'))->layout('emocionxusuario.index');
        //return dd($emocionxusuario);
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
