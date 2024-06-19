<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bus_seat;
use DB;
use Illuminate\Database\Factory\SeatFactory;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // This seeder does not work
        $seatCounts = 5;

        for($i=1; $i<=$seatCounts; $i++) {
            if ($i == 3 && $i == 1) {
                continue;
            } 
            Seat::factory()->create([
                'seat_number' => 'G'.$i,
                'seat_type' => $i % 2 == 0 ? 'Aisle' : 'Window'
            ]);
        }

        /*
            SQL
            INSERT INTO `tbl_bus_seat` (`id`, `bus_id`, `seat_number`, `seat_type`, `storage_id`, `price_id`, `status`, `created_at`, `updated_at`) VALUES 
            (NULL, '4', 'G2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '4', 'G4', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '4', 'H2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '4', 'H4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '4', 'H5', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '4', 'I1', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '4', 'I2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '4', 'I4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '4', 'I5', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '4', 'J1', 'Window', '1', '1', 'Available', NULL, NULL);
        */

    }
}
