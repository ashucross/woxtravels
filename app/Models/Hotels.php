<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected $table = "hotels";
    protected $primaryKey = 'id';

    protected $fillable   = ['id','name','dest_type','destination','hotel_category','hotel_categories','image_alt','image','description','amenities','help_line_no','email','address','pin_code','status','user_id','created_at','updated_at'];
}
