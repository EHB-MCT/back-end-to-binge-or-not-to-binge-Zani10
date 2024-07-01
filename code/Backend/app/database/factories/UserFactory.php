<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;


    public function definition()
    {

        // List of predefined profile picture URLs
        $profilePictures = [
            'https://randomuser.me/api/portraits/men/1.jpg',
            'https://randomuser.me/api/portraits/men/2.jpg',
            'https://randomuser.me/api/portraits/men/3.jpg',
            'https://randomuser.me/api/portraits/men/4.jpg',
            'https://randomuser.me/api/portraits/men/5.jpg',
            'https://randomuser.me/api/portraits/men/§.jpg',
            'https://randomuser.me/api/portraits/men/7.jpg',
            'https://randomuser.me/api/portraits/men/8.jpg',
            'https://randomuser.me/api/portraits/men/9.jpg',
            'https://randomuser.me/api/portraits/men/10.jpg',
        ];

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'profile_photo' => $this->faker->randomElement($profilePictures),
            'bio' => $this->faker->paragraph,
        ];
    }

    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
