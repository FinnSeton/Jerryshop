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
            "naam" => $this->faker->lastName() . ' ' . $this->faker->randomElement(['Haze', 'Skunk', 'Kush', 'OG', '', '', '']) ,
            "soort" => $this->faker->randomElement(['Sativa', 'Indica', 'Hybrid']),
            "thc" => $this->faker->numberBetween(10, 30),
            "cbd" => $this->faker->randomFloat(2, 0, 5),
            "merk" => $this->faker->randomElement(['Candelaar', 'Homegrown']),
            "prijs" => $this->faker->randomFloat(2, 5, 15),
        ];
    }
}
