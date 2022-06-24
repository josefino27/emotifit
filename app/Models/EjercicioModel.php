<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EjercicioModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id-ejercicio';
    protected $table = 'ejercicios';
    protected $fillable = [
        'nombre-ejercicio',
        'descripcion',
        'id-musculo'
    ];
}
