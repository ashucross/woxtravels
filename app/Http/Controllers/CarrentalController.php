<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrentalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        
    }
    public function index(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'Car Rental',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('carrentals', compact('data'));
    }
}
