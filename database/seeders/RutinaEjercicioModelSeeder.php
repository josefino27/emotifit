<?php

namespace Database\Seeders;

use App\Models\RutinaEjercicioModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RutinaEjercicioModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RutinaEjercicioModel::create([
        'id_rutina'=>'1',
        'id_ejercicio'=>'1',
        'serie_tipo'=>'1',
        'repeticiones'=>'10',
        'duracion_segundos'=>NULL,

        ]);
    }
}
