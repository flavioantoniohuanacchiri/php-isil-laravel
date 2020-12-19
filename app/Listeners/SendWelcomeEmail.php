<?php
 
namespace App\Listeners;
use Mail;
 
class SendWelcomeEmail
{
 
    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $data = array('name' => $event->user->name, 'email' => $event->user->email, 'body' => 'Bienvenido a mi sitio personal en donde comparto artículos de desarrollo web.');
 
        Mail::send('emails.mail', $data, function($message) use ($data) {
            $message->to($data['email'])
                    ->subject('Bienvenido a Gabriel Chávez');
            //$message->from('contacto@gabrielchavez.me');
        });
    }
}