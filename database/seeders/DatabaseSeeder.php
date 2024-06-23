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
        
        $pojok = 100;

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '1',
        ]);

        Corner::factory($pojok)->create();
        // Facility::factory(10)->create();
        // Category::factory(10)->create();

        Category::factory()->create([
            'name' => 'Working space',
        ]);
        Category::factory()->create([
            'name' => 'Cafe',
        ]);
        Category::factory()->create([
            'name' => 'Taman',
        ]);
        Facility::factory()->create([
            'name' => 'Wifi',
        ]);
        Facility::factory()->create([
            'name' => 'Toilet',
        ]);
        Facility::factory()->create([
            'name' => 'Parkir',
        ]);
        Facility::factory()->create([
            'name' => 'Listrik',
        ]);
        Facility::factory()->create([
            'name' => 'Meeting room',
        ]);
        Facility::factory()->create([
            'name' => 'AC',
        ]);
        Facility::factory()->create([
            'name' => 'Studio',
        ]);
        Facility::factory()->create([
            'name' => 'Ruang baca',
        ]);
        Facility::factory()->create([
            'name' => 'Ruang belajar',
        ]);
        Facility::factory()->create([
            'name' => 'Mushala',
        ]);
        Facility::factory()->create([
            'name' => 'Proyektor',
        ]);
        Facility::factory()->create([
            'name' => 'Sound system',
        ]);
        Facility::factory()->create([
            'name' => 'Smooking area',
        ]);

        
        // minimal 1 fasilitas untuk tiap corner 
        for ($i=1; $i <= $pojok; $i++) { 
            CornerFacilities::factory()->create([
                'facility_id' => Facility::all()->random()->id,
                'corner_id' => $i,
            ]);
        }
        CornerFacilities::factory(500)->create();
        
        // minimal 1 category untuk tiap corner 
        for ($i=1; $i <= $pojok; $i++) { 
            CornerCategories::factory()->create([
                'category_id' => Category::all()->random()->id,
                'corner_id' => $i,
            ]);
        }
        CornerCategories::factory(100)->create();

        // minimal 1 gambar untuk tiap corner 
        for ($i=1; $i <= $pojok; $i++) { 
            Image::factory()->create([
                'path' => '/images/'.['dummy1.jpg', 'dummy2.jpg', 'dummy3.jpg'][rand(0, 2)],
                'corner_id' => $i,
            ]);
        }
        Image::factory(10)->create();
        
        // Rekomendasi dari user
        Recomendation::factory(20)->create();
    }
}
