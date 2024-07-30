<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rutinaEjercicioxUserModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rutinaEjercicioxUser';
    protected $table = 'rutina_ejerciciox_user';
    protected $fillable = [
        'id_rutina',
        'id_usuario',
        'fecha',
        'comienza',
        'termina',
    ];

    public function rutinas(){
        return $this->belongsTo(RutinaModel::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
