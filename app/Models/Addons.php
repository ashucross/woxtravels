<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    protected $table = "addons";
    protected $primaryKey = 'id';

    protected $fillable   = ['id', 'title', 'price', 'child', 'infant', 'duration', 'description', 'destination', 'dest_type', 'child_price3', 'child_price2', 'infant_price', 'created_at', 'updated_at'];
}
