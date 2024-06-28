<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Ticket;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ticketId = Carbon::now();
        return [
            'ticket_id' => fake()->numerify($ticketId.'######'),
            'issued_date' => now(),
            'schedule_id',
            'bus_seat_id',
            'payment_id',
            'storage_id' => 1,
            'price_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
