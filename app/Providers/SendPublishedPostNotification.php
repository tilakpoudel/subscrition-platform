<?php

namespace App\Providers;

use App\Providers\PostPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPublishedPostNotification
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
     * @param  \App\Providers\PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        $website = $this->event->website;

        $subscribers = $website->users;

        dd($subscribers);
    }
}
