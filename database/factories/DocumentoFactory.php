<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\documento>
 */
class DocumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nombre"=>$this->faker->name(),
            "url"=>$this->faker->url(),
            "id_informe"=>$this->faker->numberBetween($min=1, $max=20)
        ];
    }
}
