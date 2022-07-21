<?php

namespace Database\Factories;

use App\Models\Friend;
use App\Models\FriendsRelationship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FriendsRelationship>
 */
class FriendsRelationshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'own_friends_id' => Friend::all()->random()->id,
            'other_friends_id' => Friend::all()->random()->id,
        ];
    }
}
