<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Woodworking']);
        Category::create(['name' => 'Painting']);
        Category::create(['name' => 'Gardening']);
    }
}
