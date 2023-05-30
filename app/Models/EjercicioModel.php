<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EjercicioModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_ejercicio';
    protected $table = 'ejercicios';
    protected $fillable = [
        'nombre_ejercicio',
        'descripcion',
        'id_musculo',
        'imagen_ejercicio'
    ];
}
