<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutinaEjercicioModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rutina_ejercicio';
    protected $table = 'rutinas_ejercicio';
    protected $fillable = [
        'id_rutina',
        'id_ejercicio',
        'intervalo_descanso',
        'id_rutina',
        'id_ejercicio'
    ];
}
