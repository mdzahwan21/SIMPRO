<?php

namespace Database\Seeders;

use App\Models\users;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        users::factory()
            ->count(20) // You can adjust the number of users you want to create
            ->create();
    }
}
