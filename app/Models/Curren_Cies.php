<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curren_Cies extends Model
{
    use HasFactory;
    protected $table = 'updated_currencies';
    protected $fillable = ['code','value'];
}
