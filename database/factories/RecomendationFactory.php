<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recomendation>
 */
class RecomendationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'title' => fake()->sentence(),
            'detail' => fake()->paragraph(),
            'location' => 'https://maps.google.com/?q=' . fake()->latitude . ',' . fake()->longitude,
        ];
    }
}
