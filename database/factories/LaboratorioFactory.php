<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\laboratorio>
 */
class LaboratorioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "tipo"=>$this->faker->word(),
            "id_responsable"=>$this->faker->numberBetween($min=1, $max=2),
            "id_documento"=>$this->faker->numberBetween($min=1, $max=20),
           
        ];
    }
}
