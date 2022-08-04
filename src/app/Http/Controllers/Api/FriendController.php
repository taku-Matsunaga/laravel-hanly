<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FriendShowRequest;
use App\Http\Resources\FriendCollection;
use App\Http\Resources\FriendResource;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param int $friendId
     * @return \App\Http\Resources\FriendResource
     */

    public function show(FriendShowRequest $request, int $friendId)
    {
        // パスパラメータは第２引数以降で取得できる

        // Eloquentを利用してPinとともに取得
        $friend = Friend::with(['pin'])->find($friendId);

        return new FriendResource($friend);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FriendCollection
     */
    public function list(Request $request)
    {
        $myId = $request->user()->id;

        $friendIds = $this->relationship->myFriends($myId)->pluck('other_friends_id')->toArray();
        $friends = $this->friend->findByIds($friendIds);

        return new FriendCollection($friends);
    }
}
