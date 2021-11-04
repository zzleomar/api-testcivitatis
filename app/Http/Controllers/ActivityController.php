<?php

namespace App\Http\Controllers;
use App\Events\ValidationFindActivityEvent;
use App\Events\FindActivityEvent;
use App\Events\ValidationReservateEvent;
use App\Events\ReservateEvent;

use Illuminate\Http\Request;
class ActivityController extends Controller
{
    public function searchActivy(Request $request)
    {
        $arr_parametros=$request->request->all();
        $validationFindActivity = event(
            new ValidationFindActivityEvent($arr_parametros),
            $request);

    
        if ($validationFindActivity[0]["success"]) {
            $findActivity = event(
                new FindActivityEvent($arr_parametros),
                $request);
            return response()->json(["data" => $findActivity[0]], 200);
        }

        return response()->json(["errors" => $validationFindActivity], 500);
    }

    public function reservate(Request $request)
    {
        $arr_parametros=$request->request->all();
        $validationReservate = event(
            new ValidationReservateEvent($arr_parametros),
            $request);

    
        if ($validationReservate[0]["success"]) {
            $Reservate = event(
                new ReservateEvent($arr_parametros, $validationReservate[0]["activity"]),
                $request);
            return response()->json(["data" => $Reservate[0]], 200);
        }

        return response()->json(["errors" => $validationReservate], 500);
    }

}
