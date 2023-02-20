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
        $hotelsdata = [];
        $init = 1;
        $pagination = 12;
        $signature = getsignature();  
        
        if($signature['status'] == 200){
            $gethotels = getHotel($signature['data'],$pagination,$init); 
            $hotelsdata = $gethotels['data'];
        }else{
            return ([
                'status'=>$signature['status']
            ]);
        } 
        return view('hotel', compact('data','hotelsdata'));
    }
    public function loadMoredata(Request $request){
        $pagination = $request->pagination;
        $init = $request->init;
        $signature = getsignature();  
        if($signature['status'] == 200){
            $gethotels = getHotel($signature['data'],$pagination,$init); 
            $hotelsdata = $gethotels['data'];
            $html = view('loadHotels', compact('hotelsdata'))->render();
            return response()->json([
                'status'=>200,
                'html'=>$html
            ]);
        } 
    }

    public function search_hotel(Request $request)
    { 
        $data = array(
            '_MetaTitle' => 'Search Hotels',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => 'active',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
        );
        $hotels = [];
        $params = $request->all() ?? '';
        // dd($params);
        $signature = getsignature();  
        
        if($signature['status'] == 200){
            $gethotels = searchHotel($signature['data']);  
            $hotelsdata = $gethotels['data']->hotels ?? []; 
        }else{
            return ([
                'status'=>$signature['status']
            ]);
        }
        return view('search_hotel', compact('data','hotelsdata','params'));
    }
    public function hotelDetails(Request $request)
    {
        $data = array(
            '_MetaTitle' => 'Hotel Detail',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => 'active',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
        );
        return view('hotelDetails', compact('data'));
    }
    public function book_now(Request $request)
    {
        $data = array(
            '_MetaTitle' => 'Book Now',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => 'active',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
        );
        return view('book_now', compact('data'));
    }
}
