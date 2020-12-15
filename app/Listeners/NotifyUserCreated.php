<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;

class NotifyUserCreated
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $data = array('name' => $event->user->name, 'email' => $event->user->email, 'body' => 'Bienvenido a mi sitio personal en donde comparto artículos de desarrollo web.');
 
        \Mail::send('emails.user.created', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Bienvenido a Gabriel Chávez');
            //$message->from('contacto@gabrielchavez.me');
        });
    }
}
