<?php

namespace Database\Factories;

use App\Models\Corner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $img = ['dummy1.jpg', 'dummy2.jpg', 'dummy3.jpg'][rand(0, 2)];
        return [
            'path' => 'images/'.$img,
            'corner_id' => Corner::all()->random()->id
        ];
    }
}
