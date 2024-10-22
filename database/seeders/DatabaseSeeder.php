<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Price Seeder
        // $this->call(PriceSeeder::class);

        // Storage Seeder
        // $this->call(StorageSeeder::class);

        // Bus Seeder
        $this->call(BusSeeder::class);

        // Bus Seat Seeder
        // $this->call(SeatSeeder::class);

        // Schedule Seeder
        // $this->call(ScheduleSeeder::class);

        // User Seeder
        // $this->call(UserSeeder::class);

        // Staff Seeder
        // $this->call(StaffSeeder::class);

        // Ticket Seeder
        // $this->call(TicketSeeder::class);

        // Payment Seeder
        // $this->call(PaymentSeeder::class);

        // Review Seeder
        // $this->call(ReviewSeeder::class);
    }
}
