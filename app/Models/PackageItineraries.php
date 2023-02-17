<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageItineraries extends Model
{
    protected $table = "package_itineraries";
    protected $primaryKey = 'id';

    protected $fillable   = ['id', 'package_id', 'title', 'details', 'itinerary_image', 'foodtype', 'created_at', 'updated_at'];
}
