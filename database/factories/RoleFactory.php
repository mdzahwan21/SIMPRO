<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role' => $this->faker->randomElement(['departemen', 'dosenwali', 'mahasiswa', 'operator']),
            // Add other fields as needed
        ];
    }

    /**
     * Define a specific state for 'departemen' role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function departemen(): Factory
    {
        return $this->state([
            'role' => 'departemen',
        ]);
    }

    /**
     * Define a specific state for 'dosenwali' role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function dosenwali(): Factory
    {
        return $this->state([
            'role' => 'dosenwali',
        ]);
    }

    /**
     * Define a specific state for 'mahasiswa' role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function mahasiswa(): Factory
    {
        return $this->state([
            'role' => 'mahasiswa',
        ]);
    }

    /**
     * Define a specific state for 'operator' role.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function operator(): Factory
    {
        return $this->state([
            'role' => 'operator',
        ]);
    }
}
