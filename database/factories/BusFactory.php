<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique->numberBetween(1, 10), // Assuming you have 10 
            'bus_plate' => $this->faker->unique()->bothify('#######'), 
            'total_seat' => $this->faker->numberBetween(2,11,39), // Random price between 11 and 39
            'description' => $this->faker->text(),
            'is_active' => $this->faker->numberBetween(1,0,1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
