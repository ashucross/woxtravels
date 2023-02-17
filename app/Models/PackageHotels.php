<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageHotels extends Model
{
    protected $table = "package_hotels";
    protected $primaryKey = 'id';

    protected $fillable   = ['id', 'package_id', 'dest_type', 'destination', 'hotel_name', 'created_at', 'updated_at'];
}
