<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packagesenquri extends Model
{
    use HasFactory;
    protected $table = "packagesenquris";
    protected $primaryKey = 'id';

    protected $fillable   = ['id','cname', 'email','package_id','tMonth','aMessage','tGuest','phone', 'city', 'residence'];
}
