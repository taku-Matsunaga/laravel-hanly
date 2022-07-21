<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signup', function (Request $request) {
    // とりあえず、ベタ書きでレスポンスする
    // レスポンスの形をswaggerと合わせる
    return response()->json([
        'id' => 1,
        'nickname' => 'ニックネーム',
        'email' => 'test@example.com',
    ]);
});

Route::middleware('auth:api')->group(function () {
    Route::get('/me', 'Api\MeController@me')->name('api.me.get');

    Route::post('/my/image', 'Api\ImageController@store')->name('api.my.image.post');

    Route::post('/my/pin', 'Api\PinController@store')->name('api.my.pin.post');

    Route::get('/friends/{friendId}', 'Api\FriendController@show')->name('api.friends.get');

    Route::get('/friends', 'Api\FriendController@list')->name('api.friends.list.get');
});
