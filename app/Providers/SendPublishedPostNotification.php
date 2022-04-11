<?php

namespace App\Providers;

use App\Notifications\sendPostPublishedNotification;
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
        $post = $event->post;
        $website = $post->website;

        $subscribers = $website->users();

        foreach ($subscribers as $subscriber) {
            $story = $subscriber->posts->where('post_id', $post->id)->count();

            if (!count($story)) {
                $subscriber->notify(new sendPostPublishedNotification($post));

                $subscriber->post()->sync(['post_id' => $post->id]);
            }
        }
    }
}
