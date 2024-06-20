<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run()
    {
        Video::create([
            'title' => 'Test Video 1',
            'description' => 'This is a test video description 1.',
            'url' => 'https://www.example.com/video1',
            'category_id' => 1, // Zorg ervoor dat je een bestaande categorie-id gebruikt.
            'user_id' => 1, // Zorg ervoor dat je een bestaande user-id gebruikt.
        ]);

        Video::create([
            'title' => 'Test Video 2',
            'description' => 'This is a test video description 2.',
            'url' => 'https://www.example.com/video2',
            'category_id' => 1, // Zorg ervoor dat je een bestaande categorie-id gebruikt.
            'user_id' => 1, // Zorg ervoor dat je een bestaande user-id gebruikt.
        ]);
    }
}

