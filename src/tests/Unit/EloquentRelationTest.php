<?php

namespace Tests\Unit;

use App\Models\Friend;
use Tests\TestCase;

class EloquentRelationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function リレーションすげーよ()
    {

        // // Friendが１のやつを取得
        // $friend = Friend::find(1);

        // // EloquentのFriend.phpで設定したメソッド名でアクセス
        // // たったこれだけで、FriendのID１に紐づく、FriendsRelationshipのデータが取得できる！！
        // $relationships = $friend->relationship;

        // // １対多の「多」を取得しているので、Collectionオブジェクトだからループできる
        // $myFriendIds = [];
        // foreach ($relationships as $myFriend) {
        //     $myFriendIds[] = $myFriend->other_friends_id; // 友だちIDだけを取得
        // }

        $myFriendIds = Friend::find(1)->relationship->pluck('other_friends_id');

        // ddで見てみよう
        dd($myFriendIds);

        $this->assertTrue(true);
    }
}
