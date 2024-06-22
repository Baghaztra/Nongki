<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Corner;
use App\Models\CornerCategories;
use App\Models\CornerFacilities;
use App\Models\Facility;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Corner::factory(10)->create();
        Facility::factory(10)->create();
        Category::factory(10)->create();
        CornerFacilities::factory(10)->create();
        CornerCategories::factory(10)->create();
    }
}
