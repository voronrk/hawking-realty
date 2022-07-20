<?php

namespace App\Listeners;

use App\Events\BuildingPropertyAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Mail;
use App\Mail\PropertyAdded;

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
        $value = $event->type->value;

        try {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new PropertyAdded($value));
        } catch (Exception $e) {
            Log::error('Ошибка отправки уведомления' . PHP_EOL . $e->getMessage());
        }
        
    }
}
