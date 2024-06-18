<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_storage')->insert([
            'id' => 1,
            'luggage' => "2",
            'measurement' => 'KG',
            'start_date' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
