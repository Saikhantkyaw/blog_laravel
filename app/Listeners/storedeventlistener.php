<?php

namespace App\Listeners;

use App\Models\post;
use App\Events\storedevent;
use App\Mail\poststoredmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class storedeventlistener
{ 
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(storedevent $event)
    {
        Mail::to('saikhantkyaw1551@gmail.com')->send(new poststoredmail($event->post));
    }
}
