<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['departemen', 'mahasiswa', 'dosen', 'operator'];
        $role = $this->faker->randomElement($roles);
        $id_1 = $this->faker->randomNumber(5);
        $id_2 = $this->faker->randomNumber(5);
        $id_3 = $this->faker->randomNumber(5);

        // Menggunakan sprintf untuk memastikan leading zeros tetap ada
        $id = sprintf("%05d%05d%05d", $id_1, $id_2, $id_3);
        return [
            'id' => $id,
            'name' => $this->faker->name(),
            'role' => $role,
            'email' => strtolower($this->faker->firstName) . "@$role.com",
            'password' => '12345',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];

    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
