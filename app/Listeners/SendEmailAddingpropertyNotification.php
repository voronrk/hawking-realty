<?php

namespace App\Listeners;

use App\Events\BuildingPropertyAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailAddingpropertyNotification
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
     * @param  \App\Events\BuildingPropertyAdded  $event
     * @return void
     */
    public function handle(BuildingPropertyAdded $event)
    {
        echo "<pre>";
        echo print_r($event->type, true);
        echo "</pre>";
        die();
    }
}
