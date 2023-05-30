<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImcModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_imc';
    protected $table = 'imc';
    protected $fillable = [
        'resultado',
        'id_usuario'
    ];

}
