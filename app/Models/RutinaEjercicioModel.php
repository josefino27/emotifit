<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutinaEjercicioModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id-rutina-ejercicio';
    protected $table = 'rutinas-ejercici';
    protected $fillable = [
        'id-rutina',
        'id-ejercicio',
        'intervalo-descanso',
        'id-rutina',
        'id-ejercicio'
    ];
}
