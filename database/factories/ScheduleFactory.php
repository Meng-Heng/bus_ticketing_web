<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'bus_id' => fake()->randomDigit(),
            'origin' => fake()->state(),
            'departure_date' => fake()->date($format = 'Y-m-d', $max = '2024-07-31', $min = 'now'),
            'departure_time' => fake()->time($format = 'H:i:s'),
            'destination' => fake()->state(),
            'arrival_date' => fake()->date($format = 'Y-m-d', $max = '2024-07-31', $min = 'now'),
            'arrival_time' => fake()->time($format = 'H:i:s'),
            'sold_out' => fake()->boolean(50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
