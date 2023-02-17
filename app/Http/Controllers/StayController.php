<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StayController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'Hotel',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => 'active',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
        );
        return view('hotel', compact('data'));
    }
}
