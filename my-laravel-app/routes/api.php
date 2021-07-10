<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Jobs\SendReminderEmail;
use App\Events\AccessDetection;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SongController;
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
//                           Sample
//================================================================

// // Route::resource を使う場合
// use App\Http\Controllers\SampleController;
// Route::resource('sample', SampleController::class);

Route::get('sample/',        [\App\Http\Controllers\SampleController::class, 'index']);
Route::get('sample/create',  [\App\Http\Controllers\SampleController::class, 'create']);
Route::get('sample/store',   [\App\Http\Controllers\SampleController::class, 'store']);
Route::get('sample/show',    [\App\Http\Controllers\SampleController::class, 'show']);
Route::get('sample/edit',    [\App\Http\Controllers\SampleController::class, 'edit']);
Route::get('sample/update',  [\App\Http\Controllers\SampleController::class, 'update']);
Route::get('sample/destroy', [\App\Http\Controllers\SampleController::class, 'destroy']);
Route::get('sample/delete',  [\App\Http\Controllers\SampleController::class, 'delete']);


/*
php artisan make:model Sample --migration
php artisan migrate
*/

/*
https://laravel.com/docs/8.x/controllers

|  Verb       |  URI                    |  Action   |  Route Name      |
|:------------|:------------------------|:----------|:-----------------|
|  GET        |  /sample                |  index    |  sample.index    |
|  GET        |  /sample/create         |  create   |  sample.create   |
|  POST       |  /sample                |  store    |  sample.store    |
|  GET        |  /sample/{sample}       |  show     |  sample.show     |
|  GET        |  /sample/{sample}/edit  |  edit     |  sample.edit     |
|  PUT/PATCH  |  /sample/{sample}       |  update   |  sample.update   |
|  DELETE     |  /sample/{sample}       |  destroy  |  sample.destroy  |


*/


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

