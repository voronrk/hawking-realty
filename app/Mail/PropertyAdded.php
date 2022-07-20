<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $property = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($property)
    {
            $this->property = $property;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email');
    }
}
