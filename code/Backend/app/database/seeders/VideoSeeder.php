<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;
use App\Models\Category;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $woodworking = Category::where('name', 'Woodworking')->first();
        $painting = Category::where('name', 'Painting')->first();
        $gardening = Category::where('name', 'Gardening')->first();

        Video::create([
            'title' => 'How to Build a Bookshelf',
            'description' => 'Step-by-step guide to building a bookshelf.',
            'url' => 'https://youtu.be/t4kcQtlIcxU',
            'category_id' => $woodworking->id
        ]);

        Video::create([
            'title' => 'Painting a Room: Tips and Tricks',
            'description' => 'Learn the best techniques for painting a room.',
            'url' => 'https://youtu.be/iCIZTXkIweg',
            'category_id' => $painting->id
        ]);

        Video::create([
            'title' => 'DIY Garden Path',
            'description' => 'Create a beautiful garden path with these easy steps.',
            'url' => 'https://youtu.be/6vKq6J-Mxn8',
            'category_id' => $gardening->id
        ]);
    }
}

