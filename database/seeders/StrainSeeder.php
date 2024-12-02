<?php

namespace Database\Seeders;

use App\Models\Strain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrainSeeder extends Seeder
{
/**
 * Run the database seeds.
 */
    public function run(): void
        {
        Strain::create([
            "naam" => "Wedding Cake",
            "soort" => "Hybrid",
            "thc" => 25,
            "cbd" => 0,
            "merk" => "Candelaar",
            "prijs" => 5,
        ]);


        Strain::factory()->count(100)->create();
    }
}
