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
            'bus_plate' => $this->faker->unique()->bothify('#######'), 
            'total_seat' => '11', 
            'description' => $this->faker->text(),
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
