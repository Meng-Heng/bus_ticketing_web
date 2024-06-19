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
            // 'bus_id' => \App\Models\Bus::factory(),
            'bus_id' => 4,
            'origin' => 'Phnom Penh',
            'departure_date' => fake()->date('Y-m-d'),
            'departure_time' => '10:00:00',
            'destination' => 'Siem Reap',
            'arrival_date' => fake()->date(),
            'arrival_time' => '',
            'sold_out' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
