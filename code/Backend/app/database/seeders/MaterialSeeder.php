<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        Material::create([
            'video_id' => 1,
            'name' => 'Wood Planks',
            'quantity' => '10 pieces',
        ]);

        Material::create([
            'video_id' => 2,
            'name' => 'Paint',
            'quantity' => '2 liters',
        ]);

        Material::create([
            'video_id' => 3,
            'name' => 'Wood Screws',
            'quantity' => '50 pieces',
        ]);
    }
}
