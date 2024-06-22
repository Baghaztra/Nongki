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
        ];
    }
}
