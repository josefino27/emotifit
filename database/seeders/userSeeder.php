<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin',
            'email' =>'pechesito1@gmail.com',
            'password'=>'$2y$10$M3AC2PqIoQIFAGAHPdRwdO3.yBxNvaxjVUAd9pNSQMLujJnWKe6uy', // password
        ])->assignRole('Admin');
        User::create([
            'name'=>'Juan',
            'email' =>'juanobando518@gmail.com',
            'password'=>'$2y$10$EeE7XcgyRqBc8eq2IzeJ/Os2OwLsohw3z5f2HIWlS5Tf6II2Sd3le', // juanobando518
        ])->assignRole('Admin');
        User::create([
            'name'=>'Stiven',
            'email' =>'stiven19782001@gmail.com',
            'password'=>'$2y$10$hykAlxq7x/D9oH6wmqmdQOAPTOHu1C7yyaHbDCaNIRUCpM7YNKvjq', // contraseña
        ])->assignRole('Admin');

        User::factory(99)->create();

    }
}
