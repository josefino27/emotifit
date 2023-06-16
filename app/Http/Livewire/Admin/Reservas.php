<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ReservaModel;
use Livewire\WithPagination;

class Reservas extends Component
{
    use WithPagination;

    public $buscar;
    public $sort='id_reserva';
    public $direction='asc';


    protected $paginationTheme="bootstrap";

    public function updatingSearch(){
        $this->resetpage();
    }

    public function render()
    {
        if(strlen($this->buscar) > 0){
            $reservas = ReservaModel::join('users','reservas.id_usuario','=','users.id')
            ->join('clases','reservas.id_clase','=','clases.id_clase')
            ->where('clases.nombreClase','like','%'.$this->buscar.'%')
            ->orderBy($this->sort,$this->direction)->paginate(10);
        }else{
            $reservas = ReservaModel::join('users','reservas.id_usuario','=','users.id')
            ->join('clases','reservas.id_clase','=','clases.id_clase')
            ->select('reservas.*','users.*','clases.*')
            ->orderBy($this->sort,$this->direction)
            ->paginate(10);
        }


        return view('livewire.admin.reservas' ,compact('reservas'))->layout('reservas.index');
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
