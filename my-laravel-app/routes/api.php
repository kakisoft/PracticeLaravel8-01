<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Jobs\SendReminderEmail;

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


//================================================================
//
//================================================================
Route::get('/SendReminderEmail01', function () {
    $log = (new SendReminderEmail)->delay(10);
    dispatch($log);
    return 'ユーザー登録完了を通知するメールを送信しました。01';
});


Route::get('/SendReminderEmail02', function () {
    SendReminderEmail::dispatch("dispatch");
    return 'ユーザー登録完了を通知するメールを送信しました。02';
});

