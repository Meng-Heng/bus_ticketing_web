<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bus_seat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus_seat>
 */
class BusSeatFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bus_id' => '4',
            'seat_number' => fake()->numberBetween(1,5),
            'seat_type' => 'Window',
            'storage_id' => '1',
            'price_id' => "1",
            'status' => "Available",
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
