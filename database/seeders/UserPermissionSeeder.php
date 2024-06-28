<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            SQL
                INSERT INTO `tbl_user_permission` 
                (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) 
                VALUES 
                (NULL, '1', '6', CURRENT_DATE(), CURRENT_DATE()), 
                (NULL, '1', '5', CURRENT_DATE(), CURRENT_DATE()), 
                (NULL, '1', '4', CURRENT_DATE(), CURRENT_DATE()), 
                (NULL, '2', '2', CURRENT_DATE(), CURRENT_DATE()), 
                (NULL, '3', '3', CURRENT_DATE(), CURRENT_DATE()), 
                (NULL, '4', '1', CURRENT_DATE(), CURRENT_DATE());
        */
    }
}
