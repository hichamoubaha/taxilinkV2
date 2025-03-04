<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
{
    // Vérification et création des rôles
    $roles = ['admin', 'driver', 'passenger'];
    foreach ($roles as $role) {
        if (!Role::where('name', $role)->exists()) {
            Role::create(['name' => $role]);
        }
    }

    // Vérification et création d'un admin par défaut
    if (!User::where('email', 'admin@taxilink.com')->exists()) {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@taxilink.com',
            'password' => bcrypt('admin1234'),
        ]);
        $admin->assignRole('admin');
    }
}
}
