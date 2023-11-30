<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\dosenwali;

class DosenWaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        dosenwali::factory()
        ->count(20) // You can adjust the number of users you want to create
        ->create();
    }
}
