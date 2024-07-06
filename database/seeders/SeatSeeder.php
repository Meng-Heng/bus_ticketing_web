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
            (NULL, '1', 'A1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'A2', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '1', 'A4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'A5', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'B1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'B2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'B4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'B5', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'C1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'C2', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '1', 'C4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'C5', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'D1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'D2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'D4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'D5', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'E1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'E2', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '1', 'E4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'E5', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'F1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'F2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'F4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'F5', 'Window', '1', '1', 'Available', NULL, NULL),
            (NULL, '1', 'G1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'G2', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '1', 'G4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'G5', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'H1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'H2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'H4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'H5', 'Window', '1', '1', 'Available', NULL, NULL),
            (NULL, '1', 'I1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'I2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'I3', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'I4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '1', 'I5', 'Window', '1', '1', 'Available', NULL, NULL),
            (NULL, '2', 'A1', 'Front', '1', '1', 'Available', NULL, NULL), 
            (NULL, '2', 'A2', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '2', 'A4', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '2', 'A5', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '2', 'B1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '2', 'B2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '2', 'B3', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '2', 'C1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '2', 'C2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '2', 'C3', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '2', 'C4', 'Window', '1', '1', 'Available', NULL, NULL),
            (NULL, '3', 'A1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '3', 'A2', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '3', 'B1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '3', 'B2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '3', 'C1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '3', 'C2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '3', 'C4', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '3', 'D1', 'Window', '1', '1', 'Available', NULL, NULL), 
            (NULL, '3', 'D2', 'Aisle', '1', '1', 'Available', NULL, NULL), 
            (NULL, '3', 'D4', 'Window', '1', '1', 'Available', NULL, NULL),
            (NULL, '3', 'E1', 'Window', '1', '1', 'Available', NULL, NULL),
            (NULL, '3', 'E2', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '3', 'E4', 'Aisle', '1', '1', 'Available', NULL, NULL),
            (NULL, '3', 'E5', 'Window', '1', '1', 'Available', NULL, NULL);
        */

    }
}
