<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ValidationFindActivityEvent::class => [
            \App\Listeners\ValidationFindActivityListener::class,
        ],
        \App\Events\FindActivityEvent::class => [
            \App\Listeners\FindActivityListener::class,
        ],
        \App\Events\ValidationReservateEvent::class => [
            \App\Listeners\ValidationReservateListener::class,
        ],
        \App\Events\ReservateEvent::class => [
            \App\Listeners\ReservateListener::class,
        ],
    ];
}
