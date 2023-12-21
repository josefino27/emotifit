<?php

namespace Database\Seeders;

use App\Models\ReservaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ReservaModel::factory(5)->create();
        ReservaModel::create([
            'id_clase'=>'1',
            'id_usuario'=>'1'
        ]);
        ReservaModel::create([
            'id_clase'=>'2',
            'id_usuario'=>'1'
        ]);
        ReservaModel::create([
            'id_clase'=>'3',
            'id_usuario'=>'2'
        ]);
    }
}
