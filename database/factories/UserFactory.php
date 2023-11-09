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
        $roles = ['dosen_wali', 'departemen', 'operator', 'mahasiswa'];
        $role = $this->faker->randomElement($roles);

        return [
            'name' => $this->faker->name(),
            'email' => strtolower($this->faker->firstName) . "@$role.com",
            'email_verified_at' => now(),
            'password' => '12345',
            'remember_token' => Str::random(10),
            'role' => $role,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
