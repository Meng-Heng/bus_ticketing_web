<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $startDate = Carbon::now()->subDays(15);
        // $endDate = Carbon::now()->subDays(15);
        // $startTime = ["09:00:00", "10:00:00", "13:00:00","14:00:00","17:00:00","18:00:00","22:00:00","23:00:00"];

        // $startTime = Carbon::now()->startOfDay()->setTime(10,0);
        // $locations = ['Phnom Penh',  'Siem Reap', 'Sihanouk Ville', 'Kompot', 'Kep', 'Battambang', 'Prey Veng'];
        // $seatCount = [36, 14, 11];            // Seats on a bus
        // $busCount = ["4", "6", "8", "9", "10", "11", "12", "13"];         // Bus ID

        // How to do a loop:
        // 1. Loop 1 day 
        // 2. For the amount of seatCount of busCount
        // 3. seatCount = done, go to the next busCount with a different seatCount
        // 4. With the next busCount & seatCount, locations must also change
        // 5. 

        // Possible solutions: time as an array, busCount and seatCount as two arrays

        // Manual Loop
        // for($date = $startDate; $date=Ite($endDate); $date->addDay()) {
        //     for($i=0; $i<$busCount.length(); $i++) {
        //         for($j=0; $j<$locations.length(); $j++) {
        //             Schedule::factory()->create([
        //                 'bus_id' => $busCount($i),
        //                 'origin' => $locations[$j],
        //                 'departure_date' => $startDate->copy()->addDays()->format('Y-m-d'),
        //                 'departure_time' => $startTime[],
        //                 'destination' => $locations[$j],
        //                 'arrival_date' => $startDate->copy()->addDays()->format('Y-m-d'),
        //                 'arrival_time' => '14:00:00'
        //             ]);
        //         }
        // }
        // }
       
        // for($i=1; $i<=$seatCount; $i++) {
        //         Schedule::factory()->create([
        //             'bus_id' => $busCount,
        //             'origin' => $locations[0],
        //             'departure_date' => $startDate->copy()->addDays()->format('Y-m-d'),
        //             'departure_time' => '23:30:00',
        //             'destination' => $locations[1],
        //             'arrival_date' => '2024-06-21',
        //             'arrival_time' => '04:30:00'
        //         ]);
        // }

        /*
            SQL
        */
        
//         INSERT INTO `tbl_schedule` (`id`, `bus_id`, `origin`, `departure_date`, `departure_time`, `destination`, `arrival_date`, `arrival_time`, `sold_out`, `created_at`, `updated_at`) VALUES (NULL, '4', 'Siem Reap', '2024-06-28', '14:00:00', 'Battambang', '2024-06-28', '18:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '4', 'Battambang', '2024-06-28', '22:00:00', 'Phnom Penh', '2024-06-29', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '6', 'Phnom Penh', '2024-06-28', '09:00:00', 'Kompot', '2024-06-28', '12:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '6', 'Kompot', '2024-06-28', '13:00:00', 'Kep', '2024-06-28', '15:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '6', 'Kep', '2024-06-28', '17:00:00', 'Kompot', '2024-06-28', '19:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '6', 'Kompot', '2024-06-28', '22:00:00', 'Sihanouk Ville', '2024-06-29', '01:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '8', 'Phnom Penh', '2024-06-28', '09:00:00', 'Sihanouk Ville', '2024-06-28', '12:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '8', 'Sihanouk Ville', '2024-06-28', '13:00:00', 'Kompot', '2024-06-28', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '8', 'Kompot', '2024-06-28', '17:00:00', 'Kep', '2024-06-28', '19:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '8', 'Kep', '2024-06-28', '22:00:00', 'Phnom Penh', '2024-06-29', '01:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '9', 'Phnom Penh', '2024-06-28', '10:00:00', 'Siem Reap', '2024-06-28', '15:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '9', 'Siem Reap', '2024-06-28', '17:00:00', 'Battambang', '2024-06-28', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '9', 'Battambang', '2024-06-28', '22:00:00', 'Siem Reap', '2024-06-29', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '10', 'Phnom Penh', '2024-06-28', '09:00:00', 'Battambang', '2024-06-28', '14:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '10', 'Battambang', '2024-06-28', '17:00:00', 'Phnom Penh', '2024-06-29', '22:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '10', 'Phnom Penh', '2024-06-28', '23:00:00', 'Siem Reap', '2024-06-29', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '11', 'Phnom Penh', '2024-06-28', '10:00:00', 'Kep', '2024-06-28', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '11', 'Kep', '2024-06-28', '14:00:00', 'Kompot', '2024-06-28', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '11', 'Kompot', '2024-06-28', '17:00:00', 'Phnom Penh', '2024-06-28', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '11', 'Phnom Penh', '2024-06-28', '22:00:00', 'Kep', '2024-06-29', '01:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '12', 'Phnom Penh', '2024-06-28', '09:00:00', 'Prey Veng', '2024-06-28', '12:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '12', 'Prey Veng', '2024-06-28', '13:00:00', 'Phnom Penh', '2024-06-28', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '12', 'Phnom Penh', '2024-06-28', '17:00:00', 'Prey Veng', '2024-06-28', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '12', 'Prey Veng', '2024-06-28', '22:00:00', 'Phnom Penh', '2024-06-29', '01:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '12', 'Phnom Penh', '2024-06-28', '10:00:00', 'Kompot', '2024-06-28', '13:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '12', 'Kompot', '2024-06-28', '14:00:00', 'Sihanouk Ville', '2024-06-28', '17:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '12', 'Sihaknouk Ville', '2024-06-28', '18:00:00', 'Kompot', '2024-06-28', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
// (NULL, '12', 'Kompot', '2024-06-28', '22:00:00', 'Kep', '2024-06-29', '24:00:00', '0', CURRENT_DATE(), CURRENT_DATE())


        /*
            Too random of the time and destinations
        */

        /*
        $faker = Faker::create();
        $bus_ids = ["4", "6", "8", "9", "10", "11", "12"];
        $origins = ['Siem Reap', 'Battambang', 'Phnom Penh', 'Kompot', 'Kep', 'Sihanouk Ville', 'Prey Veng'];
        $destinations = ['Battambang', 'Phnom Penh', 'Kompot', 'Kep', 'Sihanouk Ville', 'Prey Veng'];
        
        $departure_date = Carbon::now()->startOfDay();
        
        for ($i = 0; $i < 4; $i++) {
            $origin = $origins[array_rand($origins)];
            $destination = $destinations[array_rand($destinations)];
            
            // Ensure destination is not the same as origin
            while ($destination === $origin) {
                $destination = $destinations[array_rand($destinations)];
            }
            
            $departure_time = $faker->time($format = 'H:i:s', $max = 'now');
            $arrival_date = $departure_date->copy()->addDays(rand(0, 1));
            $arrival_time = $faker->time($format = 'H:i:s', $max = 'now');

            DB::table('tbl_schedule')->insert([
                'bus_id' => $bus_ids[array_rand($bus_ids)],
                'origin' => $origin,
                'departure_date' => $departure_date->toDateString(),
                'departure_time' => $departure_time,
                'destination' => $destination,
                'arrival_date' => $arrival_date->toDateString(),
                'arrival_time' => $arrival_time,
                'sold_out' => $faker->boolean($chanceOfGettingTrue = 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Increment the departure date by one day for the next iteration
            $departure_date->addDay();
        }
            */
}
}
