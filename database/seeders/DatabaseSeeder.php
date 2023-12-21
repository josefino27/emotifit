<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleSeeder::class);
        $this->call(userSeeder::class);
        $this->call(MusculoSeeder::class);
        $this->call(SerieSeeder::class);
        $this->call(EmocionSeeder::class);
        $this->call(ClaseModelSeeder::class);
        $this->call(ReservaModelSeeder::class);
        $this->call(EjercicioModelSeeder::class);
        $this->call(RutinaModelSeeder::class);
        $this->call(RutinaEjercicioModelSeeder::class);

       // ClaseModel::factory(5)->create();
       // ReservaModel::factory(5)->create();

    }
}
