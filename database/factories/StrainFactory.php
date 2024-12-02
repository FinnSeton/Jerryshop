<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Strain>
 */
class StrainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "naam" => fake()->name,
            "soort" => "Hybrid",
            "thc" => fake()->biasedNumberBetween(0,30),
            "cbd" => 0,
            "merk" => "Candelaar",
            "prijs" => fake()->biasedNumberBetween(5,30),
        ];
    }
}
