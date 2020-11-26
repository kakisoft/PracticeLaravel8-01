<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Song
        $this->app->bind(
            \App\Repositories\Interfaces\SongRepositoryInterface::class,
            \App\Repositories\SongRepository::class
        );
    }
}