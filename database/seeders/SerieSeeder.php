<?php

namespace Database\Seeders;

use App\Models\SerieModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SerieModel::create([
            'tipo'=>'repeticiones'
        ]);
        SerieModel::create([
            'tipo'=>'tiempo'
        ]);
    }
}
