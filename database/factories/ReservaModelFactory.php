<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservaModel>
 */
class ReservaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'id_clase'      =>$this->faker->numberbetween(1,2),
            // 'id_usuario'    =>$this->faker->numberbetween(1,25)
        ];
    }
}
