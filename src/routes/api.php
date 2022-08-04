<?php

use App\Http\Controllers\Api\MeController;
use App\Http\Controllers\Api\SignupController;
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

Route::post('/signup', [SignupController::class, "signup"])->name('api.signup.post');

Route::middleware('auth:api')->group(function () {
    Route::get('/me', [MeController::class, "me"])->name('api.me.get');

    Route::post('/my/image', 'Api\ImageController@store')->name('api.my.image.post');

    Route::post('/my/pin', 'Api\PinController@store')->name('api.my.pin.post');

    Route::get('/friends/{friendId}', 'Api\FriendController@show')->name('api.friends.get');

    Route::get('/friends', 'Api\FriendController@list')->name('api.friends.list.get');
});

