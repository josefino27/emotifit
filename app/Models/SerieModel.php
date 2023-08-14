<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerieModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_serie';
    protected $table = 'series';
    protected $fillable = [
        'tipo'
    ];
}
