<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friend>
 */
class FriendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nickname' => fake()->name($gender = null),
            'email' => fake()->unique()->safeEmail,
            'password' => bcrypt('password'),
            'image_path' => null,
            'remember_token' => Str::random(10),
        ];
    }
}
