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

Route::get('playlist/', [PlaylistController::class, 'index']);

Route::get('album/', [AlbumController::class, 'index']);
Route::get('album/sampleMethod01/', [AlbumController::class, 'sampleMethod01']);
Route::get('album/addmylist/{album_id}', [AlbumController::class, 'addmylist']);

Route::get('song/', [SongController::class, 'index']);
Route::get('song/sampleMethod01/', [SongController::class, 'sampleMethod01']);
Route::get('song/addmylist/{song_id}', [SongController::class, 'addmylist']);

