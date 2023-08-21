<?php

namespace Database\Seeders;

use App\Models\EjercicioModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EjercicioModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EjercicioModel::create([
                'nombre_ejercicio'=>'flexion',
                'descripcion'=>'Apoyando las manos en el suelo a la altura de los hombros y estirando las piernas hacia atrás. Abdomen tenso. Comienza a bajar lentamente el cuerpo hacia el suelo flexionando los codos.',
                'id_musculo'=>'1',
                'imagen_ejercicio'=>'imagenesEjercicio/WMyl2B56EwlNExomHkLwnJvYH0jEQLxnLGBQa4TM.png'

        ]);
    }
}
