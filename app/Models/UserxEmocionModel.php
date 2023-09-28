<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserxEmocionModel extends Model
{
    use HasFactory;

       protected $primaryKey = 'id_emocionxusuario';
       protected $table = 'emocionxusuario';
       protected $fillable = [
            'id_emocion',
            'id_usuario'
        ];

        public function user(){
            return $this->belongsTo(User::class);
        } 
        
        public function ejercicio(){
            return $this->belongsTo(EjercicioModel::class);
        }
}
