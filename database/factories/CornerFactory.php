<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Corner>
 */
class CornerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(2),
            'location' => 'https://maps.google.com/?q=' . fake()->latitude . ',' . fake()->longitude,
            'detail' => fake()->paragraph(),
            'jam_buka' => fake()->time('H:i'),
            'jam_tutup' => fake()->time('H:i'),
            'hari_buka' => fake()->randomElements(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'], rand(1, 7)),
            'harga_min' => fake()->numberBetween(10, 50) * 1000,
            'harga_max' => fake()->numberBetween(50, 100) * 1000,
        ];
    }
}
