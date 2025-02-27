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
        
/*        INSERT INTO `tbl_schedule` (`id`, `bus_id`, `origin`, `departure_date`, `departure_time`, `destination`, `arrival_date`, `arrival_time`, `sold_out`, `created_at`, `updated_at`) VALUES (NULL, '4', 'Siem Reap', '2024-06-28', '14:00:00', 'Battambang', '2024-06-28', '18:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
INSERT INTO `tbl_schedule` 
(`id`, `bus_id`, `origin`, `departure_date`, `departure_time`, `destination`, `arrival_date`, `arrival_time`, `sold_out`, `created_at`, `updated_at`) VALUES 
(NULL, '6', 'Phnom Penh - DN', '2024-12-03', '07:00:00', 'Siem Reap', '2024-12-03', '12:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Siem Reap', '2024-12-03', '13:00:00', 'Banteay Meanchey', '2024-12-03', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-03', '17:00:00', 'Battambang', '2024-12-03', '19:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Battambang', '2024-12-03', '20:30:00', 'Phnom Penh - DN', '2024-12-04', '02:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '7', 'Phnom Penh - Chhouk Meas', '2024-12-03', '07:00:00', 'Battambang', '2024-12-03', '12:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '7', 'Battambang', '2024-12-03', '13:30:00', 'Siem Reap', '2024-12-03', '17:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '7', 'Siem Reap', '2024-12-03', '18:30:00', 'Phnom Penh - Chhouk Meas', '2024-12-04', '23:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '8', 'Phnom Penh - Chhouk Meas', '2024-12-03', '07:00:00', 'Sihanouk Ville', '2024-12-03', '10:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '8', 'Sihanouk Ville', '2024-12-03', '11:00:00', 'Kompot', '2024-12-03', '14:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '8', 'Kompot', '2024-12-03', '15:00:00', 'Kep', '2024-12-03', '17:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '8', 'Kep', '2024-12-03', '18:00:00', 'Kompot', '2024-12-03', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '8', 'Kompot', '2024-12-03', '21:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-04', '01:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '9', 'Phnom Penh - Chhouk Meas', '2024-12-03', '07:00:00', 'Siem Reap', '2024-12-03', '12:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '9', 'Siem Reap', '2024-12-03', '13:00:00', 'Banteay Meanchey', '2024-12-03', '17:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '9', 'Banteay Meanchey', '2024-12-03', '18:00:00', 'Battambang', '2024-12-03', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '9', 'Battambang', '2024-12-03', '21:30:00', 'Phnom Penh - Chhouk Meas', '2024-12-04', '03:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '10', 'Phnom Penh - DN', '2024-12-03', '07:00:00', 'Sihanouk Ville', '2024-12-03', '10:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '10', 'Sihanouk Ville', '2024-12-03', '11:00:00', 'Kompot', '2024-12-03', '14:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '10', 'Kompot', '2024-12-03', '15:00:00', 'Kep', '2024-12-03', '17:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '10', 'Kep', '2024-12-03', '18:00:00', 'Kompot', '2024-12-03', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '10', 'Kompot', '2024-12-03', '21:00:00', 'Phnom Penh - DN', '2024-12-04', '24:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),

   INSERT INTO `tbl_schedule` (`id`, `bus_id`, `origin`, `departure_date`, `departure_time`, `destination`, `arrival_date`, `arrival_time`, `sold_out`, `created_at`, `updated_at`) VALUES 
(NULL, '4', 'Phnom Penh - DN', '2024-12-04', '07:00:00', 'Battambang', '2024-12-04', '13:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-04', '14:00:00', 'Banteay Meanchey', '2024-12-04', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Banteay Meanchey', '2024-12-04', '17:00:00', 'Siem Reap', '2024-12-04', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-04', '21:00:00', 'Phnom Penh - DN', '2024-12-05', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Phnom Penh - DN', '2024-12-05', '07:00:00', 'Battambang', '2024-12-05', '13:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-05', '14:00:00', 'Banteay Meanchey', '2024-12-05', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Banteay Meanchey', '2024-12-05', '17:00:00', 'Siem Reap', '2024-12-05', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-05', '21:00:00', 'Phnom Penh - DN', '2024-12-06', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Phnom Penh - DN', '2024-12-06', '07:00:00', 'Battambang', '2024-12-06', '13:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-06', '14:00:00', 'Banteay Meanchey', '2024-12-06', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Banteay Meanchey', '2024-12-06', '17:00:00', 'Siem Reap', '2024-12-06', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-06', '21:00:00', 'Phnom Penh - DN', '2024-12-07', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Phnom Penh - DN', '2024-12-07', '07:00:00', 'Battambang', '2024-12-07', '13:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-07', '14:00:00', 'Banteay Meanchey', '2024-12-07', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Banteay Meanchey', '2024-12-07', '17:00:00', 'Siem Reap', '2024-12-07', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-07', '21:00:00', 'Phnom Penh - DN', '2024-12-08', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Phnom Penh - DN', '2024-12-08', '07:00:00', 'Battambang', '2024-12-08', '13:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-08', '14:00:00', 'Banteay Meanchey', '2024-12-08', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Banteay Meanchey', '2024-12-08', '17:00:00', 'Siem Reap', '2024-12-08', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-08', '21:00:00', 'Phnom Penh - DN', '2024-12-09', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Phnom Penh - DN', '2024-12-09', '07:00:00', 'Battambang', '2024-12-09', '13:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-09', '14:00:00', 'Banteay Meanchey', '2024-12-09', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Banteay Meanchey', '2024-12-09', '17:00:00', 'Siem Reap', '2024-12-09', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-09', '21:00:00', 'Phnom Penh - DN', '2024-12-10', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Phnom Penh - DN', '2024-12-10', '07:00:00', 'Battambang', '2024-12-10', '13:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-10', '14:00:00', 'Banteay Meanchey', '2024-12-10', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Banteay Meanchey', '2024-12-10', '17:00:00', 'Siem Reap', '2024-12-10', '20:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '4', 'Siem Reap', '2024-12-10', '21:00:00', 'Phnom Penh - DN', '2024-12-11', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE());
*/

/*
INSERT INTO `tbl_schedule` (`id`, `bus_id`, `origin`, `departure_date`, `departure_time`, `destination`, `arrival_date`, `arrival_time`, `sold_out`, `created_at`, `updated_at`) VALUES 
(NULL, '5', 'Banteay Meanchey', '2024-12-04', '07:00:00', 'Phnom Penh - DN', '2024-12-04', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-04', '14:30:00', 'Banteay Meanchey', '2024-12-04', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-05', '21:30:00', 'Phnom Penh - DN', '2024-12-05', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-05', '07:00:00', 'Banteay Meanchey', '2024-12-05', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-05', '14:30:00', 'Phnom Penh - DN', '2024-12-05', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-05', '21:30:00', 'Banteay Meanchey', '2024-12-06', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-06', '07:00:00', 'Phnom Penh - DN', '2024-12-06', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-06', '14:30:00', 'Banteay Meanchey', '2024-12-06', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-06', '21:30:00', 'Phnom Penh - DN', '2024-12-07', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-07', '07:00:00', 'Banteay Meanchey', '2024-12-07', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-07', '14:30:00', 'Phnom Penh - DN', '2024-12-07', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-07', '21:30:00', 'Banteay Meanchey', '2024-12-08', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-08', '07:00:00', 'Phnom Penh - DN', '2024-12-08', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-08', '14:30:00', 'Banteay Meanchey', '2024-12-08', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-08', '21:30:00', 'Phnom Penh - DN', '2024-12-09', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-09', '07:00:00', 'Banteay Meanchey', '2024-12-09', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-09', '14:30:00', 'Phnom Penh - DN', '2024-12-09', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-09', '21:30:00', 'Banteay Meanchey', '2024-12-10', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-10', '07:00:00', 'Phnom Penh - DN', '2024-12-10', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-10', '14:30:00', 'Banteay Meanchey', '2024-12-10', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-10', '21:30:00', 'Phnom Penh - DN', '2024-12-11', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-11', '07:00:00', 'Banteay Meanchey', '2024-12-11', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-11', '14:30:00', 'Phnom Penh - DN', '2024-12-11', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-11', '21:30:00', 'Banteay Meanchey', '2024-12-12', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-12', '07:00:00', 'Phnom Penh - DN', '2024-12-12', '13:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Phnom Penh - DN', '2024-12-12', '14:30:00', 'Banteay Meanchey', '2024-12-12', '20:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '5', 'Banteay Meanchey', '2024-12-12', '21:30:00', 'Phnom Penh - DN', '2024-12-13', '04:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-04', '09:00:00', 'Banteay Meanchey', '2024-12-04', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-04', '16:30:00', 'Banteay Meanchey', '2024-12-04', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-05', '09:00:00', 'Banteay Meanchey', '2024-12-05', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-05', '16:30:00', 'Banteay Meanchey', '2024-12-05', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-06', '09:00:00', 'Banteay Meanchey', '2024-12-06', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-06', '16:30:00', 'Banteay Meanchey', '2024-12-06', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-07', '09:00:00', 'Banteay Meanchey', '2024-12-07', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-07', '16:30:00', 'Banteay Meanchey', '2024-12-07', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-08', '09:00:00', 'Banteay Meanchey', '2024-12-08', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-08', '16:30:00', 'Banteay Meanchey', '2024-12-08', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-09', '09:00:00', 'Banteay Meanchey', '2024-12-09', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-09', '16:30:00', 'Banteay Meanchey', '2024-12-09', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-10', '09:00:00', 'Banteay Meanchey', '2024-12-10', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-10', '16:30:00', 'Banteay Meanchey', '2024-12-10', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-11', '09:00:00', 'Banteay Meanchey', '2024-12-11', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-11', '16:30:00', 'Banteay Meanchey', '2024-12-11', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-12', '09:00:00', 'Banteay Meanchey', '2024-12-12', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-12', '16:30:00', 'Banteay Meanchey', '2024-12-12', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Phnom Penh - DN', '2024-12-13', '09:00:00', 'Banteay Meanchey', '2024-12-13', '15:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '6', 'Banteay Meanchey', '2024-12-13', '16:30:00', 'Banteay Meanchey', '2024-12-13', '23:00:00', '0', CURRENT_DATE(), CURRENT_DATE());
*/ 

/* 
INSERT INTO `tbl_schedule` (`id`, `bus_id`, `origin`, `departure_date`, `departure_time`, `destination`, `arrival_date`, `arrival_time`, `sold_out`, `created_at`, `updated_at`) VALUES 
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-05', '13:00:00', 'Sihanouk Ville', '2024-12-05', '16:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-04', '22:00:00', 'Siem Reap', '2024-12-05', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-05', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-05', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-05', '15:30:00', 'Battambang', '2024-12-05', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-05', '22:00:00', 'Siem Reap', '2024-12-06', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-06', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-06', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-06', '15:30:00', 'Battambang', '2024-12-06', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-06', '22:00:00', 'Siem Reap', '2024-12-07', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-07', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-07', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-07', '15:30:00', 'Battambang', '2024-12-07', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-07', '22:00:00', 'Siem Reap', '2024-12-08', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-08', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-08', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-08', '15:30:00', 'Battambang', '2024-12-08', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-08', '22:00:00', 'Siem Reap', '2024-12-09', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-09', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-09', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-09', '15:30:00', 'Battambang', '2024-12-09', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-09', '22:00:00', 'Siem Reap', '2024-12-10', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-10', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-10', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-10', '15:30:00', 'Battambang', '2024-12-10', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-10', '22:00:00', 'Siem Reap', '2024-12-11', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-11', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-11', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-11', '15:30:00', 'Battambang', '2024-12-11', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-11', '22:00:00', 'Siem Reap', '2024-12-12', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-12', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-12', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Phnom Penh - Chhouk Meas', '2024-12-12', '15:30:00', 'Battambang', '2024-12-12', '21:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Battambang', '2024-12-12', '22:00:00', 'Siem Reap', '2024-12-13', '02:00:00', '0', CURRENT_DATE(), CURRENT_DATE()),
(NULL, '12', 'Siem Reap', '2024-12-13', '13:00:00', 'Phnom Penh - Chhouk Meas', '2024-12-13', '18:30:00', '0', CURRENT_DATE(), CURRENT_DATE());
*/
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
