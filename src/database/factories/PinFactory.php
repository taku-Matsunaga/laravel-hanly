<?php

namespace Database\Factories;

use App\Models\Friend;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pin>
 */
class PinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'friends_id' => Friend::factory()->create()->id,
            'latitude' => fake()->latitude($min = 20, $max = 45),
            'longitude' => fake()->longitude($min = 122, $max = 153),
        ];
    }
}
