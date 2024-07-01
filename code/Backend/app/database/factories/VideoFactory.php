<?php

use App\Models\Video;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'url' => 'https://www.youtube.com/embed/' . $this->faker->uuid,
            'thumbnail' => $this->faker->imageUrl(640, 480, 'cats'),
            'steps' => $this->faker->paragraphs(3, true),
        ];
    }
}
