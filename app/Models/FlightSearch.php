<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlightSearch extends Model
{
    protected $table = "flight_search";
    protected $primaryKey = 'FS_id';

    protected $fillable   = ['FS_id', 'FS_search', 'FS_date', 'FS_airlines', 'FS_price', 'FS_departure', 'FS_arrival', 'FS_stops', 'FS_departLocation', 'FS_arrivalLocation', 'FS_duration', 'FS_flightInformation', 'FS_faredetailrule', 'FS_baggesinformation', 'FS_cancelchangerule', 'FS_returndate', 'FS_returnairlines', 'FS_returndeparture', 'FS_returnarrival', 'FS_returnstops', 'FS_returndepartLocation', 'FS_returnarrivalLocation', 'FS_returnduration', 'FS_returnflightInformation', 'FS_returnfaredetailrule', 'FS_returnbaggesinformation', 'FS_returncancelchangerule', 'FS_return', 'FS_sessionid', 'FS_created'];
}
