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
                'title' => 'Painting a Room: Tips and Tricks',
                'description' => 'Learn the best techniques for painting a room.',
                'url' => 'https://www.youtube.com/embed/iCIZTXkIweg',
                'thumbnail' => 'https://img.youtube.com/vi/iCIZTXkIweg/hqdefault.jpg',
                'steps' => '1. Prepare the room. 2. Apply primer. 3. Paint the walls.',
                'category_id' => $painting->id,
            ],
            [
                'title' => 'DIY Garden Path',
                'description' => 'Create a beautiful garden path with these easy steps.',
                'url' => 'https://www.youtube.com/embed/6vKq6J-Mxn8',
                'thumbnail' => 'https://img.youtube.com/vi/6vKq6J-Mxn8/hqdefault.jpg',
                'steps' => '1. Plan the path. 2. Lay the foundation. 3. Place the stones.',
                'category_id' => $gardening->id,
            ],
            [
                'title' => 'DIY Floating Shelves',
                'description' => 'Learn how to make floating shelves for your home.',
                'url' => 'https://www.youtube.com/embed/wki3wMAbtLg',
                'thumbnail' => 'https://img.youtube.com/vi/wki3wMAbtLg/hqdefault.jpg',
                'steps' => '1. Cut the wood. 2. Assemble the shelves. 3. Mount on the wall.',
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'How to Paint a Mural',
                'description' => 'Step-by-step guide to painting a wall mural.',
                'url' => 'https://www.youtube.com/embed/L4ADLL2gAtU',
                'thumbnail' => 'https://img.youtube.com/vi/L4ADLL2gAtU/hqdefault.jpg',
                'steps' => '1. Plan your design. 2. Prepare the wall. 3. Paint the mural.',
                'category_id' => $painting->id,
            ],
            [
                'title' => 'DIY Raised Garden Bed',
                'description' => 'Build your own raised garden bed.',
                'url' => 'https://www.youtube.com/embed/DMORpDWq-q8',
                'thumbnail' => 'https://img.youtube.com/vi/DMORpDWq-q8/hqdefault.jpg',
                'steps' => '1. Choose the location. 2. Build the frame. 3. Fill with soil.',
                'category_id' => $gardening->id,
            ],
            [
                'title' => 'How to Build a Treehouse',
                'description' => 'Step-by-step guide to building a treehouse.',
                'url' => 'https://www.youtube.com/embed/3K3YHYope9E',
                'thumbnail' => 'https://img.youtube.com/vi/3K3YHYope9E/hqdefault.jpg',
                'steps' => '1. Select the tree. 2. Build the platform. 3. Add the walls and roof.',
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'Painting Furniture: Tips and Techniques',
                'description' => 'Learn how to paint furniture for a fresh look.',
                'url' => 'https://www.youtube.com/embed/9HuTN4S-7wc',
                'thumbnail' => 'https://img.youtube.com/vi/9HuTN4S-7wc/hqdefault.jpg',
                'steps' => '1. Sand the furniture. 2. Apply primer. 3. Paint with your chosen color.',
                'category_id' => $painting->id,
            ],
            [
                'title' => 'DIY Compost Bin',
                'description' => 'Create your own compost bin for the garden.',
                'url' => 'https://www.youtube.com/embed/4t59BrzTpJg',
                'thumbnail' => 'https://img.youtube.com/vi/4t59BrzTpJg/hqdefault.jpg',
                'steps' => '1. Choose a container. 2. Add compostable materials. 3. Maintain the compost.',
                'category_id' => $gardening->id,
            ],
            [
                'title' => 'How to Build a Dog House',
                'description' => 'Build a cozy dog house for your pet.',
                'url' => 'https://www.youtube.com/embed/b-wM9XWdDFY',
                'thumbnail' => 'https://img.youtube.com/vi/b-wM9XWdDFY/hqdefault.jpg',
                'steps' => '1. Plan the design. 2. Cut the wood. 3. Assemble the dog house.',
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'Painting Kitchen Cabinets',
                'description' => 'Refresh your kitchen by painting the cabinets.',
                'url' => 'https://www.youtube.com/embed/HeIT8gTwAP8',
                'thumbnail' => 'https://img.youtube.com/vi/HeIT8gTwAP8/hqdefault.jpg',
                'steps' => '1. Remove the cabinet doors. 2. Sand and prime. 3. Paint and reattach.',
                'category_id' => $painting->id,
            ],
            [
                'title' => 'DIY Birdhouse',
                'description' => 'Create a birdhouse for your garden.',
                'url' => 'https://www.youtube.com/embed/fSBDCHREseE',
                'thumbnail' => 'https://img.youtube.com/vi/fSBDCHREseE/hqdefault.jpg',
                'steps' => '1. Cut the wood pieces. 2. Assemble the birdhouse. 3. Paint and hang it.',
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'How to Create a Flower Bed',
                'description' => 'Learn how to design and plant a flower bed.',
                'url' => 'https://www.youtube.com/embed/L-MBV_X5zXA',
                'thumbnail' => 'https://img.youtube.com/vi/L-MBV_X5zXA/hqdefault.jpg',
                'steps' => '1. Choose the location. 2. Prepare the soil. 3. Plant the flowers.',
                'category_id' => $gardening->id,
            ],
            [
                'title' => 'DIY Wall Stencil Painting',
                'description' => 'Create beautiful wall designs using stencils.',
                'url' => 'https://www.youtube.com/embed/X3nyuneMciM',
                'thumbnail' => 'https://img.youtube.com/vi/X3nyuneMciM/hqdefault.jpg',
                'steps' => '1. Choose your stencil. 2. Position on the wall. 3. Paint over the stencil.',
                'category_id' => $painting->id,
            ],
            [
                'title' => 'How to Build a Picnic Table',
                'description' => 'Build a picnic table for outdoor dining.',
                'url' => 'https://www.youtube.com/embed/HiE6FDS7LAc',
                'thumbnail' => 'https://img.youtube.com/vi/HiE6FDS7LAc/hqdefault.jpg',
                'steps' => '1. Cut the wood. 2. Assemble the frame. 3. Attach the tabletop and seats.',
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'How to Paint a Ceiling',
                'description' => 'Tips and tricks for painting a ceiling.',
                'url' => 'https://www.youtube.com/embed/k27EA81kEQY',
                'thumbnail' => 'https://img.youtube.com/vi/k27EA81kEQY/hqdefault.jpg',
                'steps' => '1. Prepare the area. 2. Apply primer. 3. Paint the ceiling.',
                'category_id' => $painting->id,
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
