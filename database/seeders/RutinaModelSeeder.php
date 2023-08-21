<?php

namespace Database\Seeders;

use App\Models\RutinaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RutinaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RutinaModel::create([
            'nombre_rutina'=>'pecho',
            'dia_entreno'=>'lunes,miercoles,viernes',
            'descripcion_rutina'=>'pecho fuerte'

        ]);
    }
}
