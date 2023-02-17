<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = "flight_airport_list";
    protected $primaryKey = 'airport_id';

    protected $fillable   = ['airport_id', 'airport_code', 'airport_name', 'airport_city', 'country', 'status'];
}
