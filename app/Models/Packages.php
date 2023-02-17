<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table = "packages";
    protected $primaryKey = 'id';

    protected $fillable   = ['id', 'type', 'destination', 'package_name', 'tour_code', 'package_image_alt', 'package_image', 'banner_image_m', 'package_overview', 'package_validity', 'package_enddate', 'no_of_nights', 'details_day_night', 'no_of_days', 'support_no', 'sales_price', 'offer_price', 'city', 'discount', 'price_details', 'price_on_request', 'price_summary', 'package_inclusions', 'package_topinclusions', 'package_theme', 'package_exclusions', 'package_tourpolicy', 'pdf', 'meta_search', 'status', 'slug', 'user_id', 'sort_order', 'is_popular', 'created_at', 'updated_at', 'onward_flight', 'return_flight', 'addon', 'package_type', 'flight_type', 'flightname', 'dep_city', 'arv_city', 'dep_time', 'arv_time'];
}
