<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;
use App\Models\Corner;
use App\Models\Category;
use App\Models\Facility;
use App\Models\Recomendation;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CornerCategories;
use App\Models\CornerFacilities;

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

        // minimal 1 gambar untuk tiap corner 
        for ($i=1; $i <= 10; $i++) { 
            Image::factory()->create([
                'path' => ['dummy1.jpg', 'dummy2.jpg', 'dummy3.jpg'][rand(0, 2)],
                'corner_id' => $i,
            ]);
        }
        Image::factory(10)->create();
        
        // Feedback
        Recomendation::factory(20)->create();
    }
}
