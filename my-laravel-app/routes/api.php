<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Jobs\SendReminderEmail;
use App\Events\AccessDetection;

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
//                            Event
//================================================================
// http://localhost:8000/api/event01
Route::get('event01', function(){
    event(new AccessDetection(Str::random(10)));
    return 'event01';
});

// http://localhost:8000/api/event01-2
// instead of class you put dispatch here
Route::get('event01-2', function(){
    // event(new AccessDetection(Str::random(10)));
    AccessDetection::dispatch( Hash::make('password') );
    return 'event01-2';
});


//================================================================
//                           Queue
//================================================================
// http://localhost:8000/api/SendReminderEmail01
Route::get('/SendReminderEmail01', function () {
    $log = (new SendReminderEmail)->delay(10);
    dispatch($log);
    return 'ユーザー登録完了を通知するメールを送信しました。01';
});

// http://localhost:8000/api/SendReminderEmail02
Route::get('/SendReminderEmail02', function () {
    SendReminderEmail::dispatch("dispatch");
    return 'ユーザー登録完了を通知するメールを送信しました。02';
});

// http://localhost:8000/api/SendReminderEmail03
Route::get('/SendReminderEmail03', function () {
    SendReminderEmail::dispatch("dispatch")->onQueue('emails');
    return 'ユーザー登録完了を通知するメールを送信しました。03 - "emails" キュー ';
});

