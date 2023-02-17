<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsuranceController extends Controller
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
            '_MetaTitle' => 'Insurance',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => 'active',
            '_Car' => '',
        );
        return view('insurance', compact('data'));
    }
}
