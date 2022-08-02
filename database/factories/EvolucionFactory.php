<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\evolucion>
 */
class EvolucionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "diagnostico"=>$this->faker->text(),
            "conducta"=>$this->faker->text(),
            "id_sucursal"=>$this->faker->randomElement([
                1
            ]),
            "id_especialidad"=>$this->faker->numberBetween($min=1, $max=20),
            "id_users"=>$this->faker->numberBetween($min=1, $max=2)
        ];
    }
}
