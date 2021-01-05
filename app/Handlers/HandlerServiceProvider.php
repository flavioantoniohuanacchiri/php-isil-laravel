<?php namespace App\Handlers;

use Illuminate\Support\ServiceProvider;

class HandlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Handlers\Interfaces\UserInterface', 'App\Handlers\Repository\UserRepository');
    }
}
