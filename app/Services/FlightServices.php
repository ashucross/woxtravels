<?php

namespace App\Services;
use App\Models\Flight;
use App\Models\Flightdetail;
class FlightServices {

    public function getFlightName($id)
    {
       $flightName =  Flight::where('code', $id)->first();
       return $flightName ?? '';
    }

    public function getFlightDetails($id)
    {
       $flightName =  Flightdetail::where('flight_id', $id)->first();
       return $flightName ?? '';
    }
}
