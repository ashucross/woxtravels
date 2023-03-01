<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsData extends Model
{
    use HasFactory;
    protected $table = "hotel_data";
    protected $primaryKey = 'id';

    protected $fillable   = [
        'code',
        'name',
        'categoryName',
        'destinationCode',
        'destinationName',
        'minRate',
        'maxRate',
        'currency',
        'chain',
        'address',
        'postalCode',
        'email',
        'phones',
        'ranking',
        'images',
        'web', 
        'noDecimalPrice', 
    ];
//ALTER TABLE `hotel_data` ADD `noDecimalPrice` INT(20) NULL AFTER `web`;

}
