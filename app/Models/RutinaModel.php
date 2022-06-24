<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutinaModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id-rutina';
    protected $table = 'rutinas';
    protected $fillable = [
        'nombre-rutina',
        'dia-entreno',
        'tiempo-rutina'
    ];

}
