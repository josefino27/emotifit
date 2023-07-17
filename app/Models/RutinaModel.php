<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutinaModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rutina';
    protected $table = 'rutinas';
    protected $fillable = [
        'nombre_rutina',
        'dia_entreno',
        'descripcion_rutina'
    ];

}
