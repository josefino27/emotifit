<?php

namespace Database\Seeders;

use App\Models\EmocionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmocionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmocionModel::create([
            'nombre_emocion'=>'Estrés',
        ]);
        EmocionModel::create([
            'nombre_emocion'=>'Alegría',
        ]);
        EmocionModel::create([
            'nombre_emocion'=>'Tristeza',
        ]);
        EmocionModel::create([
            'nombre_emocion'=>'Enojo',
        ]);
        EmocionModel::create([
            'nombre_emocion'=>'Ansiedad',
        ]);
    }
}
