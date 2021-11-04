<?php

namespace App\Listeners;

use App\Events\ValidationReservateEvent;
use App\Models\Activity;

class ValidationReservateListener
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
     * @param  ValidationReservateEvent  $event
     * @return void
     */
    public function handle(ValidationReservateEvent $event)
    {
        $fieldValidation = $event->arr_parametros;
        $textError = [];
        $activity = null;

        if(!isset($fieldValidation['date'])) {
            array_push($textError, 'date required');
        } else {
            if (!\DateTime::createFromFormat('Y-m-d',$fieldValidation['date'] )) {
                array_push($textError, 'date format invalid');
            }
        }

        if(!isset($fieldValidation['quantity'])) {
            array_push($textError, 'quantity required');
        } else {
            if (!is_numeric($fieldValidation['quantity'])) {
                array_push($textError, 'quantity invalid');
            }
        }

        if(!isset($fieldValidation['activityId'])) {
            array_push($textError, 'activityId required');
        } else if(isset($fieldValidation['date'])) {
            $activity = Activity::where('id', $fieldValidation['activityId'])
                ->whereDate('startAvailableDate', '<=', $fieldValidation['date'])
                ->whereDate('endAvailableDate', '>=', $fieldValidation['date'])
                ->first();
            if (!$activity) {
                array_push($textError, 'activityId invalid');
            }
        }

        return [
            "success" => empty($textError),
            "errors" => implode(", ", $textError),
            "activity" => $activity
        ];
    }
}
