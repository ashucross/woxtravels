<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelDestination extends Model
{
    use HasFactory;
    protected $table = 'hotel_destinations';
    protected $fillable = ['name','code','country'];
}
