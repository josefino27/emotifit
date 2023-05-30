<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    public $buscar;
    public $sort='id';
    public $direction='asc';


    protected $paginationTheme="bootstrap";

    public function updatingSearch(){
        $this->resetpage();
    }

    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function render()
    {
        if(strlen($this->buscar) > 0){
            $users = User::where('name','like','%'.$this->buscar.'%')
            ->orderBy($this->sort,$this->direction)->paginate(10);
        }else{
            $users = User::orderBy($this->sort,$this->direction)->paginate(5);
        }


        return view('livewire.admin.user-index' ,compact('users'))->layout('users.index');
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