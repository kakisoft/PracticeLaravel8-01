<?php

namespace App\Providers;

use App\Providers\PublishProcessor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageSubscriber
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
     * @param  PublishProcessor  $event
     * @return void
     */
    public function handle(PublishProcessor $event)
    {
        //
    }
}
