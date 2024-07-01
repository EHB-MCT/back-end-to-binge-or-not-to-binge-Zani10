<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $woodworking = Category::where('name', 'Woodworking')->first();
        $painting = Category::where('name', 'Painting')->first();
        $gardening = Category::where('name', 'Gardening')->first();

        $users = User::all();

        $videos = [
            [
                'title' => 'How to Build a Bookshelf',
                'description' => 'Step-by-step guide to building a bookshelf.',
                'url' => 'https://www.youtube.com/embed/t4kcQtlIcxU',
                'thumbnail' => 'https://img.youtube.com/vi/t4kcQtlIcxU/hqdefault.jpg',
                'steps' => '1. Gather materials. 2. Cut wood. 3. Assemble shelves.',
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'Easy DIY Wall Art',
                'description' => 'Create beautiful wall art with simple materials.',
                'url' => 'https://www.youtube.com/embed/iCIZTXkIweg',
                'thumbnail' => 'https://img.youtube.com/vi/iCIZTXkIweg/hqdefault.jpg',
                'steps' => '1. Select canvas. 2. Paint background. 3. Add designs.',
                'category_id' => $painting->id,
            ],
            [
                'title' => 'Garden Planter Box',
                'description' => 'Build your own garden planter box.',
                'url' => 'https://www.youtube.com/embed/6vKq6J-Mxn8',
                'thumbnail' => 'https://img.youtube.com/vi/6vKq6J-Mxn8/hqdefault.jpg',
                'steps' => '1. Measure wood. 2. Cut to size. 3. Assemble box.',
                'category_id' => $gardening->id,
            ],
        ];

        foreach ($videos as $videoData) {
            Video::create([
                'user_id' => $users->random()->id,
                'title' => $videoData['title'],
                'description' => $videoData['description'],
                'url' => $videoData['url'],
                'thumbnail' => $videoData['thumbnail'],
                'steps' => $videoData['steps'],
                'category_id' => $videoData['category_id'],
            ]);
        }
    }
}
