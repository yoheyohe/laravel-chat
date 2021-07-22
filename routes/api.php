<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/chat',function(){
	return \App\Models\TestMessage::all();
});

use App\Events\AddChat;
Route::post('/chat',function(){
	$chat = \App\Models\TestMessage::create(request()->all());
    event((new AddChat($chat))->dontBroadcastToCurrentUser());
	return $chat;
});
