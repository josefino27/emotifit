<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ClaseModel;


class ClaseModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClaseModel::create([
            'nombreClase'=>'rumba',
            'cupo'=>'9',
            'fecha'=>'2033-08-20',
            'comienza'=>'10:30:00',
            'termina'=>'11:30:00',
            'descripcion'=>'Traer ropa comoda',
            'imagen'=>'portafolio/yIKJYN7cGZFtzq3ZVoYlRv3WxM21x7hJ607Gw2Hz.bin'
        ]);
        ClaseModel::create([
            'nombreClase'=>'fifa23',
            'cupo'=>'9',
            'fecha'=>'2033-08-20',
            'comienza'=>'10:30:00',
            'termina'=>'11:30:00',
            'descripcion'=>'Traer control de ps4',
            'imagen'=>'portafolio/h3LCyOpSBNpfcwlA9IS7mwFquKinBXYnoGJpazI6.jpg'
        ]);
        ClaseModel::create([
            'nombreClase'=>'yoga',
            'cupo'=>'10',
            'fecha'=>'2033-08-20',
            'comienza'=>'10:30:00',
            'termina'=>'11:30:00',
            'descripcion'=>'Traer ropa comoda',
            'imagen'=>'portafolio/yIKJYN7cGZFtzq3ZVoYlRv3WxM21x7hJ607Gw2Hz.bin'
        ]);

    }
}
