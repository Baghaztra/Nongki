<?php

namespace Database\Factories;

use App\Models\Corner;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CornerCategories>
 */
class CornerCategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'corner_id'=> Corner::all()->random()->id,
            'category_id'=> Category::all()->random()->id,
        ];
    }
}
