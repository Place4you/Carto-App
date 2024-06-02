<?php

namespace App\Listeners;

use App\Events\OurExampleEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OurExampleListener
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
     * @param  \App\Events\OurExampleEvent  $event
     * @return void
     */
    public function handle(OurExampleEvent $event)
    {
     Log::debug("This {$event->username} is {$event->action}");
    }
}
