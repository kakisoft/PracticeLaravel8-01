<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Repositories\User\SongRepositoryInterface;
use App\Repositories\Interfaces\SongRepositoryInterface;
use App\Repositories\SongRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // // User
        // $this->app->bind(
        //     \App\Repositories\User\UserRepositoryInterface::class,
        //     \App\Repositories\User\UserRepository::class
        // );

        // Song
        $this->app->bind(
            SongRepositoryInterface::class,
            SongRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
