<?php

namespace Database\Seeders;

use App\Models\Friend;
use App\Models\FriendsRelationship;
use App\Models\Pin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Friend::factory(10)->create();
        Pin::factory(10)->create();
        FriendsRelationship::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Friend::factory(1)
        //     ->create([
        //         'nickname' => 'matsutani',
        //         'email' => 'matsutani@test.com',
        //     ])
        //     ->each(function ($friend) {
        //         // factory()の第2引数に数を指定すると、返り値がCollectionクラスになるため、ループできる

        //         // 友だち関係を作る
        //         FriendsRelationship::factory(3)->create([
        //             'own_friends_id' => $friend->id,
        //         ]);

        //         // Pinデータも作っておく
        //         Pin::factory()->create([
        //             'friends_id' => $friend->id,
        //         ]);
        //     });

        // // 友だちのいないユーザーを作成
        // Friend::factory(1)
        //     ->create([
        //         'nickname' => 'alone',
        //         'email' => 'alone@test.com',
        //     ])
        //     ->each(function ($friend) {
        //         Pin::factory()->create([
        //             'friends_id' => $friend->id,
        //         ]);
        //     });

        // // あとは適当なユーザを３人作成
        // Friend::factory(3)
        //     ->create()
        //     ->each(function ($friend) {
        //         FriendsRelationship::factory(3)->create([
        //             'own_friends_id' => $friend->id,
        //         ]);

        //         Pin::factory()->create([
        //             'friends_id' => $friend->id,
        //         ]);
        //     });
    }
}
