<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisaController extends Controller
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
        $data = array(
            '_MetaTitle' => 'Visa',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => 'active',
            '_Insurance' => '',
            '_Car' => '',
        );
        return view('visa', compact('data'));
    }
}
