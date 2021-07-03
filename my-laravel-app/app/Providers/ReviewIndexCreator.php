<?php

namespace App\Providers;

use App\Providers\ReviewRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReviewIndexCreator
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ReviewRegistered  $event
     * @return void
     */
    public function handle(ReviewRegistered $event)
    {
        //
    }
}
