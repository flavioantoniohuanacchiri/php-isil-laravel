<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $name, $body
    )
    {
        $this->name = $name;
        $this->body = $body;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->name;
        $body = $this->body;
        //return "<p>Hola Soy Flavio</p>";
        return $this->view('emails.user.created', compact("name", "body"));
    }
}