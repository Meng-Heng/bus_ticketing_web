<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            SQL
            INSERT INTO `tbl_permission` (`id`, `permission`, `description`, `created_at`, `updated_at`) VALUES
            (1, 'Users, Staff, and Reviews', 'CRUDs method on staff and user information', NULL, NULL),
            (2, 'Stock', 'Manage Storage, Price, and Bus', NULL, NULL),
            (3, 'Schedule', 'Manage Bus seats and Bus schedule', NULL, NULL),
            (4, 'Sales', 'Manage Ticket and Payment', NULL, NULL),
            (5, 'Permission', 'Manage all permission', NULL, NULL),
            (6, 'User Permission', 'Assign permission to any user', NULL, NULL);
        */
    }
}
