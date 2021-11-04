<?php

namespace App\Listeners;

use App\Events\FindActivityEvent;
use App\Models\Activity;
use Carbon\Carbon;

class FindActivityListener
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
     * @param  FindActivityEvent  $event
     * @return void
     */
    public function handle(FindActivityEvent $event)
    {
        $fieldValidation = $event->arr_parametros;
        $date = $fieldValidation['date'];
        return Activity::whereDate('startAvailableDate', '<=', $date)
            ->whereDate('endAvailableDate', '>=', $date)
            ->orderBy('popularity', 'desc')
            ->get();
    }
}
