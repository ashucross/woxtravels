<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inclusion extends Model
{
    protected $table = "inclusions";
    protected $primaryKey = 'id';

    protected $fillable   = ['id', 'name', 'user_id', 'created_at', 'updated_at'];
}
