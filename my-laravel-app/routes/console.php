<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Command クラスを使わず、クロージャ―で Command を追加するパターン
//   COMMAND : php artisan hello:closure
Artisan::command('hello:closure', function () {
    $this->comment('Hello closure command');
})->describe('サンプルコマンド（クロージャ）');