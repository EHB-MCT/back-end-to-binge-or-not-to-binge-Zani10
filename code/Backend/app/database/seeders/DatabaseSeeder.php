<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Seed categories
        $this->call([
            CategorySeeder::class,
        ]);

        // Seed users
        User::factory()->count(10)->create();

        // Seed videos
        $this->call([
            VideoSeeder::class,
        ]);

        // Seed materials
        $this->call([
            MaterialSeeder::class,
        ]);
    }
}
