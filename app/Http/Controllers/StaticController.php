<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
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
            '_MetaTitle' => 'Commingsoon',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('commingsoon', compact('data'));
    }

    public function aboutus(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'About US',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('aboutus', compact('data'));
    }

    public function mytips(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'My Tips',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('mytips', compact('data'));
    }

    public function contactus(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'Contact US',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('contactus', compact('data'));
    }

    public function faq(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'FAQ',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('faq', compact('data'));
    }

    public function career(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'Career',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('career', compact('data'));
    }

    public function termsconditions(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'Terms Conditions',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('termsconditions', compact('data'));
    }

    public function privacypolicy(Request $request)
    {

        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'Privacy Policy',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => 'active',
        );
        return view('privacypolicy', compact('data'));
    }
}
