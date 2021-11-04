<?php

namespace App\Events;

class ReservateEvent extends Event
{
    public $arr_parametros;
    public $activity;

    public function __construct($arr_parametros, $activity)
    {
        $this->arr_parametros = $arr_parametros;
        $this->activity = $activity;
    }
}
