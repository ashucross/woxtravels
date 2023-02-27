<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\EmailLoginTrail;
class EmailLoginController extends Controller
{
    use EmailLoginTrail;
}
