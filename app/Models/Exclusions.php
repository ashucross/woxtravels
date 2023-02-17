<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exclusions extends Model
{
    protected $table = "exclusions";
    protected $primaryKey = 'id';

    protected $fillable   = ['id', 'name', 'user_id', 'created_at', 'updated_at'];
}
