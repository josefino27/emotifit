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

        User::factory(99)->create();
        
    }
}
