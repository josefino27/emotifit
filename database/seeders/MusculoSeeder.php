<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MusculoModel;

class MusculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MusculoModel::create([
            'nombre'=>'pectoral'
        ]);
        MusculoModel::create([
            'nombre'=>'espalda'
        ]);
        MusculoModel::create([
            'nombre'=>'brazos'
        ]);
        MusculoModel::create([
            'nombre'=>'gluteos'
        ]);
        MusculoModel::create([
            'nombre'=>'piernas'
        ]);
    }
}
