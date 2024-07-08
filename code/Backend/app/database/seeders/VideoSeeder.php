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
                'steps' => ['Gather materials', 'Cut wood', 'Assemble shelves'],
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'Painting a Room: Tips and Tricks',
                'description' => 'Learn the best techniques for painting a room.',
                'url' => 'https://www.youtube.com/embed/iCIZTXkIweg',
                'thumbnail' => 'https://img.youtube.com/vi/iCIZTXkIweg/hqdefault.jpg',
                'steps' => ['Prepare the room', 'Apply primer', 'Paint the walls'],
                'category_id' => $painting->id,
            ],
            [
                'title' => 'DIY Garden Path',
                'description' => 'Create a beautiful garden path with these easy steps.',
                'url' => 'https://www.youtube.com/embed/6vKq6J-Mxn8',
                'thumbnail' => 'https://img.youtube.com/vi/6vKq6J-Mxn8/hqdefault.jpg',
                'steps' => ['Plan the path', 'Lay the foundation', 'Place the stones'],
                'category_id' => $gardening->id,
            ],
            [
                'title' => 'DIY Floating Shelves',
                'description' => 'Learn how to make floating shelves for your home.',
                'url' => 'https://www.youtube.com/embed/wki3wMAbtLg',
                'thumbnail' => 'https://img.youtube.com/vi/wki3wMAbtLg/hqdefault.jpg',
                'steps' => ['Cut the wood', 'Assemble the shelves', 'Mount on the wall'],
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'How to Paint a Mural',
                'description' => 'Step-by-step guide to painting a wall mural.',
                'url' => 'https://www.youtube.com/embed/L4ADLL2gAtU',
                'thumbnail' => 'https://img.youtube.com/vi/L4ADLL2gAtU/hqdefault.jpg',
                'steps' => ['Plan your design', 'Prepare the wall', 'Paint the mural'],
                'category_id' => $painting->id,
            ],
            [
                'title' => 'DIY Raised Garden Bed',
                'description' => 'Build your own raised garden bed.',
                'url' => 'https://www.youtube.com/embed/DMORpDWq-q8',
                'thumbnail' => 'https://img.youtube.com/vi/DMORpDWq-q8/hqdefault.jpg',
                'steps' => ['Choose the location', 'Build the frame', 'Fill with soil'],
                'category_id' => $gardening->id,
            ],
            [
                'title' => 'How to Build a Treehouse',
                'description' => 'Step-by-step guide to building a treehouse.',
                'url' => 'https://www.youtube.com/embed/3K3YHYope9E',
                'thumbnail' => 'https://img.youtube.com/vi/3K3YHYope9E/hqdefault.jpg',
                'steps' => ['Select the tree', 'Build the platform', 'Add the walls and roof'],
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'Painting Furniture: Tips and Techniques',
                'description' => 'Learn how to paint furniture for a fresh look.',
                'url' => 'https://www.youtube.com/embed/9HuTN4S-7wc',
                'thumbnail' => 'https://img.youtube.com/vi/9HuTN4S-7wc/hqdefault.jpg',
                'steps' => ['Sand the furniture', 'Apply primer', 'Paint with your chosen color'],
                'category_id' => $painting->id,
            ],
            [
                'title' => 'DIY Compost Bin',
                'description' => 'Create your own compost bin for the garden.',
                'url' => 'https://www.youtube.com/embed/4t59BrzTpJg',
                'thumbnail' => 'https://img.youtube.com/vi/4t59BrzTpJg/hqdefault.jpg',
                'steps' => ['Choose a container', 'Add compostable materials', 'Maintain the compost'],
                'category_id' => $gardening->id,
            ],
            [
                'title' => 'How to Build a Dog House',
                'description' => 'Build a cozy dog house for your pet.',
                'url' => 'https://www.youtube.com/embed/b-wM9XWdDFY',
                'thumbnail' => 'https://img.youtube.com/vi/b-wM9XWdDFY/hqdefault.jpg',
                'steps' => ['Plan the design', 'Cut the wood', 'Assemble the dog house'],
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'Painting Kitchen Cabinets',
                'description' => 'Refresh your kitchen by painting the cabinets.',
                'url' => 'https://www.youtube.com/embed/HeIT8gTwAP8',
                'thumbnail' => 'https://img.youtube.com/vi/HeIT8gTwAP8/hqdefault.jpg',
                'steps' => ['Remove the cabinet doors', 'Sand and prime', 'Paint and reattach'],
                'category_id' => $painting->id,
            ],
            [
                'title' => 'DIY Birdhouse',
                'description' => 'Create a birdhouse for your garden.',
                'url' => 'https://www.youtube.com/embed/fSBDCHREseE',
                'thumbnail' => 'https://img.youtube.com/vi/fSBDCHREseE/hqdefault.jpg',
                'steps' => ['Cut the wood pieces', 'Assemble the birdhouse', 'Paint and hang it'],
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'How to Create a Flower Bed',
                'description' => 'Learn how to design and plant a flower bed.',
                'url' => 'https://www.youtube.com/embed/L-MBV_X5zXA',
                'thumbnail' => 'https://img.youtube.com/vi/L-MBV_X5zXA/hqdefault.jpg',
                'steps' => ['Choose the location', 'Prepare the soil', 'Plant the flowers'],
                'category_id' => $gardening->id,
            ],
            [
                'title' => 'DIY Wall Stencil Painting',
                'description' => 'Create beautiful wall designs using stencils.',
                'url' => 'https://www.youtube.com/embed/X3nyuneMciM',
                'thumbnail' => 'https://img.youtube.com/vi/X3nyuneMciM/hqdefault.jpg',
                'steps' => ['Choose your stencil', 'Position on the wall', 'Paint over the stencil'],
                'category_id' => $painting->id,
            ],
            [
                'title' => 'How to Build a Picnic Table',
                'description' => 'Build a picnic table for outdoor dining.',
                'url' => 'https://www.youtube.com/embed/HiE6FDS7LAc',
                'thumbnail' => 'https://img.youtube.com/vi/HiE6FDS7LAc/hqdefault.jpg',
                'steps' => ['Cut the wood', 'Assemble the frame', 'Attach the tabletop and seats'],
                'category_id' => $woodworking->id,
            ],
            [
                'title' => 'How to Paint a Ceiling',
                'description' => 'Tips and tricks for painting a ceiling.',
                'url' => 'https://www.youtube.com/embed/k27EA81kEQY',
                'thumbnail' => 'https://img.youtube.com/vi/k27EA81kEQY/hqdefault.jpg',
                'steps' => ['Prepare the area', 'Apply primer', 'Paint the ceiling'],
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
