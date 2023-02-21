<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $table = "booking_details";
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'depart_flight',
        'source',
        'destination',
        'from_date',
        'depart_date',
        'to_date',
        'return_date',
        'return_flight',
        'booking_response',
        'ticket_status',
        'pnr',
        'status',
        'email',
        'mobile',
        'type',
            'id', 'created_at', 'updated_at','agent_id'
        ];

        public $sortable = ['id', 'created_at', 'updated_at'];
}
