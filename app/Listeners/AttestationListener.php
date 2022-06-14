<?php

namespace App\Listeners;

use App\Events\ArrearEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AttestationListener
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
     * @param  \App\Events\ArrearEvent  $event
     * @return void
     */
    public function handle(ArrearEvent $event)
    {
        //
    }
}
