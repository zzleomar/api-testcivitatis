<?php

namespace App\Listeners;

use App\Events\ValidationFindActivityEvent;

class ValidationFindActivityListener
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
     * @param  ValidationFindActivityEvent  $event
     * @return void
     */
    public function handle(ValidationFindActivityEvent $event)
    {
        $fieldValidation = $event->arr_parametros;
        $textError = [];

        if(!isset($fieldValidation['date'])) {
            array_push($textError, 'date required');
        } else {
            if (!\DateTime::createFromFormat('Y-m-d',$fieldValidation['date'] )) {
                array_push($textError, 'date format invalid');
            }
        }

        return [
            "success" => empty($textError),
            "errors" => implode(", ", $textError)
        ];
    }
}
