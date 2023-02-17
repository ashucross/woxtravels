<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $table = "locations";
    protected $primaryKey = 'id';

    protected $fillable   = ['id', 'name', 'dest_type', 'slug', 'created_at', 'updated_at', 'dest_image', 'description', 'image_alt', 'image', 'tour_policy', 'is_active'];
}
