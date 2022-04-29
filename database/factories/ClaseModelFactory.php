<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClaseModel>
 */
class ClaseModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreClase'   => $this->faker->name,
            'cupo'          => $this->faker->numberBetween(1,30),
            // between permite especificar tambien numeros,fechas y horas
            'horario'       => $this->faker->datetimeBetween('2022-05-00 06:00:00','2022-6-0 18:00:00')
        ];
    }
}
