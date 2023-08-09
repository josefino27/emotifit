<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmocionModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_emocion';
    protected $table = 'emocion';
    protected $fillable = [
        'id_emocion',
        'nombre_emocion'
    ];
}
