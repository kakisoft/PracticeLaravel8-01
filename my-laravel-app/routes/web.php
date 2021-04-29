<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//==========< 8から書き方変わった？ >==========
// Route::get('/', [PostsController::class, 'index']);
Route::get('routeSample01/', function () {return 'routeSample01';});

// http://localhost:8000/
Route::get('/', [ItemController::class, 'index']);

Route::get('item/', [ItemController::class, 'index']);
Route::get('item/executeSampleQuery01', [ItemController::class, 'executeSampleQuery01']);

Route::get('playlist/', [PlaylistController::class, 'index']);

Route::get('album/', [AlbumController::class, 'index']);
Route::get('album/sampleMethod01/', [AlbumController::class, 'sampleMethod01']);
Route::get('album/addmylist/{album_id}', [AlbumController::class, 'addmylist']);

Route::get('song/', [SongController::class, 'index']);
Route::get('song/sampleMethod01/', [SongController::class, 'sampleMethod01']);
Route::get('song/addmylist/{song_id}', [SongController::class, 'addmylist']);



//============================================================================================
//
//============================================================================================
Route::get('/question01/challenge_users/save/', function () {
    return redirect('/question01/winners');
});


// 先頭「api」をまとめて書く場合、こんな感じ
Route::group(['namespace' => 'API'], function () {
    Route::get('call/me', function () {return 'GET:call/me';});  // http://localhost:8000/call/me
    Route::post('call/me', function () {return 'POST:call';});
    Route::get('challenge_users', function () {return 'GET:challenge_users';});   // http://localhost:8000/challenge_users
    Route::post('challenge_users', function (){return 'POST:challenge_users';});
});


// 先頭「api」をまとめて書き、先頭にプレフィックスを付ける場合、こんな感じ。
Route::group(['namespace' => 'API'], function () {
    //--------------------------------
    //         Question 01
    //--------------------------------
    Route::prefix('q01')->group(function () {
        Route::get('call/me', function () {return 'GET:q01/call/me';});  // http://localhost:8000/q01/call/me
        Route::post('call/me', function () {return 'POST:q01/call/me';});
        Route::get('challenge_users', function () {return 'GET:q01/challenge_users';});
        Route::post('challenge_users', function () {return 'POST:q01/challenge_users';});
    });

    //--------------------------------
    //         Question 02
    //--------------------------------
    Route::prefix('q02')->group(function () {
        Route::get('call/my/APIs'    , function () {return 'GET:q02/call/my/APIs';});
        Route::post('call/my/APIs'   , function () {return 'POST:q02/call/my/APIs';});
        Route::put('call/my/APIs'    , function () {return 'PUT:q02/call/my/APIs';});
        Route::patch('call/my/APIs'  , function () {return 'PATCH:q02/call/my/APIs';});
        Route::delete('call/my/APIs' , function () {return 'DELETE:q02/call/my/APIs';});
        Route::options('call/my/APIs', function () {return 'OPTIONS:q02/call/my/APIs';});
    });

});

