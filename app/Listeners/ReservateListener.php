<?php

namespace App\Listeners;

use App\Events\ReservateEvent;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservateListener
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
     * @param  ReservateEvent  $event
     * @return void
     */
    public function handle(ReservateEvent $event)
    {
        $fieldValidation = $event->arr_parametros;
        $reservation = new Reservation();

        $reservation->numberPeople = $fieldValidation['quantity'];
        $reservation->price = $fieldValidation['quantity'] * $event->activity->price;
        $reservation->dateReservation = Carbon::now()->format('Y-m-d');
        $reservation->dateCompletionActivity = $fieldValidation['date'];
        $reservation->activityId = $event->activity->id;

        $reservation->save();
        $reservation->activity->popularity = $reservation->activity->popularity + 1;
        $reservation->activity->save();
        
        return $reservation;
    }
}
