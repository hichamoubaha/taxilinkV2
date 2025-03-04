<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they don't exist
        Role::firstOrCreate(['name' => 'passenger']);
        Role::firstOrCreate(['name' => 'driver']);
    }
}