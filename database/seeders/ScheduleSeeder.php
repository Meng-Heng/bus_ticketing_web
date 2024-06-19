<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::now(); 
        // $startTime = Carbon::now()->startOfDay()->setTime(10,0);
        $locations = ['Phnom Penh',  'Siem Reap', 'Sihaknouk Ville', 'Kompot', 'Kep', 'Battambang', 'Prey Veng'];
        $seatCount = 36;            // Seats on a bus
        $busCount = 4;                  // Bus ID

        // How to do a loop:
        // 1. Loop 1 day 
        // 2. For the amount of seatCount of busCount
        // 3. seatCount = done, go to the next busCount with a different seatCount
        // 4. With the next busCount & seatCount, locations must also change
        // 5. 

        // Possible solutions: time as an array, busCount and seatCount as two arrays

        // Manual Loop
        for($i=1; $i<=$seatCount; $i++) {
                Schedule::factory()->create([
                    'bus_id' => $busCount,
                    'origin' => $locations[0],
                    'departure_date' => $startDate->copy()->addDays()->format('Y-m-d'),
                    'departure_time' => '23:30:00',
                    'destination' => $locations[1],
                    'arrival_date' => '2024-06-21',
                    'arrival_time' => '04:30:00'
                ]);
        }
        
        
    }
}
