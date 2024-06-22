<?php

namespace Database\Factories;

use App\Models\Corner;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CornerFasilities>
 */
class CornerFacilitiesFactory extends Factory
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
            'facility_id'=> Facility::all()->random()->id,
        ];
    }
}
