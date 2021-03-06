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

//----------------
//  simple test
//----------------
// http://localhost:8000/api/hello
Route::get('hello/', function () {
        return 'api - hello';
    }
);


//================================================================
//                           Sample
//================================================================

// // Route::resource を使う場合
// use App\Http\Controllers\SampleController;
// Route::resource('sample', SampleController::class);

Route::get('sample/',           [\App\Http\Controllers\SampleController::class, 'index']  )->name('index');
Route::get('sample/create',     [\App\Http\Controllers\SampleController::class, 'create'] )->name('create');
Route::post('sample/store',     [\App\Http\Controllers\SampleController::class, 'store']  )->name('store');
Route::get('sample/show',       [\App\Http\Controllers\SampleController::class, 'show']   )->name('show');
Route::get('sample/edit',       [\App\Http\Controllers\SampleController::class, 'edit']   )->name('edit');
Route::put('sample/update',     [\App\Http\Controllers\SampleController::class, 'update'] )->name('update');
Route::delete('sample/destroy', [\App\Http\Controllers\SampleController::class, 'destroy'])->name('destroy');
Route::delete('sample/delete',  [\App\Http\Controllers\SampleController::class, 'delete'] )->name('delete');

/*
http://localhost:8000/api/sample
http://localhost:8000/api/sample/create
*/

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

//////////////////
// SampleAction
//////////////////

// http://localhost:8000/api/sample/sampleAction01/20211231
Route::get('sample/sampleAction01/{date}',  [\App\Http\Controllers\SampleController::class, 'sampleAction01'] )->name('sampleAction01');



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

