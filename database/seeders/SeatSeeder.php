<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bus_seat;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seatCounts = 5;

        for($i=0; $i<$seatCounts; $i++) {
            if ($i == 3 && $i == 1) {
                continue;
            } 
            Seat::factory(10)->create([
                'seat_number' => 'G'.$i,
                'seat_type' => $i % 2 == 0 ? 'Aisle' : 'Window'
            ]);
        }
    }
}
