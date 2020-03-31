<?php

namespace App\Listeners;

use App\Mail\NewPostNotification;
use App\Subscribe;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ConfirmSubscribers
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $subscribes = Subscribe::whereNull('token')->get();

        foreach ($subscribes as $subscribe){
            Mail::to($subscribe->email)->send(new NewPostNotification($event->post));
        }
    }
}
