<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutinaEjercicioModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rutina_ejercicio';
    protected $table = 'rutinas_ejercicios';
    protected $fillable = [
        'id_rutina',
        'id_ejercicio',
        'serie_tipo',
        'repeticiones',
        'duracion_segundos',
    ];

    public function ejercicio(){
        return $this->belongsTo(EjercicioModel::class);
    }

    public function rutina(){
        return $this->belongsTo(RutinaModel::class);
    }
}
