<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(DosenWaliSeeder::class);
        $this->call(RoleSeeder::class);
        // Add more seeders if needed
    }
}
