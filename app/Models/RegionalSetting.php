<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalSetting extends Model
{
    use HasFactory;
    protected $table = "regional_settings";
    protected $primaryKey = 'id';

    protected $fillable   = ['ip','language','country','currency'];
}
