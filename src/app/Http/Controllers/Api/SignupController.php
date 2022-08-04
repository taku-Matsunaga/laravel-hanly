<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SignupRequest;
use App\Models\Friend;
use Illuminate\Http\Request;

class SignupController extends Controller
{

    protected $friend;

    public function __construct(Friend $friend)
    {
        $this->friend = $friend;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Http\Requests\Api\SignupRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(SignupRequest $request)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $nickname = $request->input('nickname');

        // // Eloquentを使って、DBに保存します
        // $stored = Friend::create([
        //     'email' => $email,
        //     'password' => bcrypt($password),
        //     'nickname' => $nickname,
        // ]);

        $stored = $this->friend->store(
            $request->input('email'),
            $request->input('password'),
            $request->input('nickname')
        );

        // とりあえず、そのままレスポンスします（後ほど整形します）
        return response()->json($stored);
    }
}
