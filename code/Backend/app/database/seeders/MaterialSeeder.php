<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Video;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        $video1 = Video::where('title', 'How to Build a Bookshelf')->first();
        $video2 = Video::where('title', 'Painting a Room: Tips and Tricks')->first();
        $video3 = Video::where('title', 'DIY Garden Path')->first();

        Material::create([
            'video_id' => $video1->id,
            'name' => 'Wood Planks',
            'quantity' => 10
        ]);

        Material::create([
            'video_id' => $video1->id,
            'name' => 'Nails',
            'quantity' => 50
        ]);

        Material::create([
            'video_id' => $video2->id,
            'name' => 'Paint',
            'quantity' => 2
        ]);

        Material::create([
            'video_id' => $video2->id,
            'name' => 'Paint Brushes',
            'quantity' => 3
        ]);

        Material::create([
            'video_id' => $video3->id,
            'name' => 'Paving Stones',
            'quantity' => 20
        ]);

        Material::create([
            'video_id' => $video3->id,
            'name' => 'Sand',
            'quantity' => 5
        ]);
    }
}
