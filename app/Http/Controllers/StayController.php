<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\HotelsData;
use App\Models\HotelFacilities;
use App\Models\HotelDestination;

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
        // update_currencies();

        ini_set('max_execution_time', '0');
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
        $countries = Countries::get();
        $cities = HotelDestination::get();
    /*     $signature = getsignature();  
        foreach($countries as $country){
            $destination = getSuggestionitems($signature['data'],$country->sortname); 
            foreach($destination['data']->destinations as $dest){
                HotelDestination::updateOrCreate(['code'=>$dest->code,'country'=>$country->sortname],[
                    'name'=>$dest->name->content ?? '',
                    'code'=>$dest->code,
                    'country'=>$country->sortname,
                ]);
            }

        }echo 'done';die; */
        /* $signature = getsignature();  
        $gethotels = getSuggestionitems($signature['data'],'IN');
            dd($gethotels); */
        /* $signature = getsignature();  
        foreach($countries as $country){
            $destination = getCountries($signature['data'],$country->sortname); 
            foreach($destination['data']->destinations as $dest){
                HotelDestination::updateOrCreate(['code'=>$dest->code,'country'=>$country->sortname],[
                    'name'=>$dest->name->content ?? '',
                    'code'=>$dest->code,
                    'country'=>$country->sortname,
                ]);
            }

        }
         echo 'yes';die; 
        if($signature['status'] == 200){
            $gethotels = getHotel($signature['data'],$pagination,$init); 
            $hotelsdata = $gethotels['data'];
            dd($hotelsdata);
        }else{
            return ([
                'status'=>$signature['status']
            ]);
        }  */
        return view('hotel', compact('data','hotelsdata','cities'));
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

      /*   $facilities = '[{
                "code": 10,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 8,
                "description": {
                    "languageCode": "ENG",
                    "content": "Bathroom"
                }
            },
            {
                "code": 10,
                "facilityGroupCode": 70,
                "facilityTypologyCode": 23,
                "description": {
                    "languageCode": "ENG",
                    "content": "Air conditioning in public areas"
                }
            },
            {
                "code": 100,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Suites"
                }
            },
            {
                "code": 100,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 26,
                "description": {
                    "languageCode": "ENG",
                    "content": "Internet access"
                }
            },
            {
                "code": 100,
                "facilityGroupCode": 70,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Supermarket"
                }
            },
            {
                "code": 100,
                "facilityGroupCode": 80,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Set menu dinner"
                }
            },
            {
                "code": 11,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 8,
                "description": {
                    "languageCode": "ENG",
                    "content": "Private external bathroom"
                }
            },
            {
                "code": 11,
                "facilityGroupCode": 70,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Fireplace"
                }
            },
            {
                "code": 11,
                "facilityGroupCode": 80,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Breakfast and dinner"
                }
            },
           
            {
                "code": 110,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Apartments"
                }
            },
            
            {
                "code": 114,
                "facilityGroupCode": 80,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Snacks"
                }
            },
           
            {
                "code": 115,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Kitchen"
                }
            },
          
            {
                "code": 12,
                "facilityGroupCode": 70,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Smoke detector"
                }
            },
            {
                "code": 12,
                "facilityGroupCode": 80,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Breakfast and lunch"
                }
            },
           
            {
                "code": 120,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Minibar"
                }
            },
            {
                "code": 120,
                "facilityGroupCode": 74,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Hairdressing salon"
                }
            },
            {
                "code": 123,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Villas"
                }
            },
            {
                "code": 124,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Disability-friendly rooms"
                }
            },
            {
                "code": 125,
                "facilityGroupCode": 40,
                "facilityTypologyCode": 18,
                "description": {
                    "languageCode": "ENG",
                    "content": "Entertainment Area"
                }
            },
            {
                "code": 125,
                "facilityGroupCode": 70,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Garden"
                }
            },
            {
                "code": 126,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Triple rooms"
                }
            },
            {
                "code": 127,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Quadruple rooms"
                }
            },
            {
                "code": 128,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Executive rooms"
                }
            },
            {
                "code": 129,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Superior rooms"
                }
            },
         
            {
                "code": 130,
                "facilityGroupCode": 40,
                "facilityTypologyCode": 18,
                "description": {
                    "languageCode": "ENG",
                    "content": "Golf course"
                }
            },
            {
                "code": 130,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Fridge"
                }
            },
            {
                "code": 130,
                "facilityGroupCode": 71,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Bar"
                }
            },
         
            {
                "code": 131,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Family rooms"
                }
            },
            {
                "code": 132,
                "facilityGroupCode": 10,
                "facilityTypologyCode": 2,
                "description": {
                    "languageCode": "ENG",
                    "content": "Twin rooms"
                }
            },
            {
                "code": 135,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Mini fridge"
                }
            },
            {
                "code": 135,
                "facilityGroupCode": 70,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Terrace"
                }
            },
          
            {
                "code": 140,
                "facilityGroupCode": 73,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Pub"
                }
            },
            {
                "code": 143,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Tea and coffee making facilities "
                }
            },
            {
                "code": 145,
                "facilityGroupCode": 40,
                "facilityTypologyCode": 18,
                "description": {
                    "languageCode": "ENG",
                    "content": "Bus/Train station"
                }
            },
            {
                "code": 145,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Washing machine"
                }
            },
            {
                "code": 147,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Ironing set"
                }
            },
           
            {
                "code": 160,
                "facilityGroupCode": 80,
                "facilityTypologyCode": 31,
                "description": {
                    "languageCode": "ENG",
                    "content": "Early bird breakfast"
                }
            },
            {
                "code": 160,
                "facilityGroupCode": 90,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Banana boating"
                }
            },
            {
                "code": 17,
                "facilityGroupCode": 91,
                "facilityTypologyCode": 15,
                "description": {
                    "languageCode": "ENG",
                    "content": "Ascott - Ascott Cares"
                }
            },
            {
                "code": 170,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 23,
                "description": {
                    "languageCode": "ENG",
                    "content": "Centrally regulated air conditioning"
                }
            },
            {
                "code": 170,
                "facilityGroupCode": 72,
                "facilityTypologyCode": 8,
                "description": {
                    "languageCode": "ENG",
                    "content": "Conference room"
                }
            },
         
            {
                "code": 20,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Shower"
                }
            },
          
            {
                "code": 200,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 26,
                "description": {
                    "languageCode": "ENG",
                    "content": "Safe"
                }
            },
            {
                "code": 200,
                "facilityGroupCode": 71,
                "facilityTypologyCode": 8,
                "description": {
                    "languageCode": "ENG",
                    "content": "Restaurant"
                }
            },
            {
                "code": 200,
                "facilityGroupCode": 80,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Breakfast served to the table"
                }
            },
         
            {
                "code": 203,
                "facilityGroupCode": 85,
                "facilityTypologyCode": 34,
                "description": {
                    "languageCode": "ENG",
                    "content": "Only Adults"
                }
            },
         
            {
                "code": 220,
                "facilityGroupCode": 20,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "lodge"
                }
            },
            {
                "code": 220,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 8,
                "description": {
                    "languageCode": "ENG",
                    "content": "Living room"
                }
            },
            {
                "code": 220,
                "facilityGroupCode": 71,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Non-smoking area"
                }
            },
            {
                "code": 220,
                "facilityGroupCode": 80,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Brunch"
                }
            },
            {
                "code": 220,
                "facilityGroupCode": 90,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Sailing"
                }
            },
            {
                "code": 225,
                "facilityGroupCode": 71,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Smoking area"
                }
            },
          
            {
                "code": 250,
                "facilityGroupCode": 80,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Vegetarian meal"
                }
            },
            {
                "code": 250,
                "facilityGroupCode": 90,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Pedal boating"
                }
            },
           
            {
                "code": 260,
                "facilityGroupCode": 90,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Table tennis"
                }
            },
            {
                "code": 261,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 22,
                "description": {
                    "languageCode": "ENG",
                    "content": "Wi-fi"
                }
            },
           
            {
                "code": 270,
                "facilityGroupCode": 70,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Room service"
                }
            },
           
            {
                "code": 280,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Bathrobes"
                }
            },
            {
                "code": 280,
                "facilityGroupCode": 70,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Laundry service"
                }
            },
            {
                "code": 281,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 12,
                "description": {
                    "languageCode": "ENG",
                    "content": "Slippers"
                }
            },
            {
                "code": 282,
                "facilityGroupCode": 60,
                "facilityTypologyCode": 3,
                "description": {
                    "languageCode": "ENG",
                    "content": "Make-up mirror"
                }
            }]';
            $fac = json_decode($facilities);
            foreach($fac as $country){
               HotelFacilities::updateOrCreate(['code'=>$country->code],[
                        'name'=>$country->description->content ?? '', 
                    ]);
                }
            dd($fac); */
        $error = '';
        $cities = HotelDestination::get();
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
        // dd($params);
        $signature = getsignature();  
        $search_hotels = []; 
        if($signature['status'] == 200){
            $gethotels = searchHotel($signature['data'],$params); 
            if($gethotels['status'] == 203){
                $error = $gethotels['message'] ?? '';
            }  else{

            
            $hotelsdata = $gethotels['data']->hotels ?? []; 
            if(!empty($hotelsdata->hotels) && count($hotelsdata->hotels) > 0){
                foreach($hotelsdata->hotels as $hotel){ 
                    $isexist = HotelsData::where('code',$hotel->code)->first();
                    if(!empty($isexist)){
                        $search_hotels[] = $isexist;
                    }elseif(empty($isexist)){
                        $details = getHoteldetail($signature['data'],$hotel);
                        // DD($details);  
                        $createdHotel = HotelsData::create([
                            'code'=>$details['data']->code ?? '',
                            'name'=>$details['data']->name ?? '',
                            'categoryName'=>$details['data']->categoryName ?? '',
                            'destinationCode'=>$details['data']->destinationCode ?? '',
                            'destinationName'=>$details['data']->destinationName ?? '',
                            'minRate'=>$details['data']->minRate ?? '',
                            'maxRate'=>$details['data']->maxRate ?? '', 
                            'currency'=>$details['data']->currency ?? '',
                            'chain'=>$details['hoteldetail']->hotel->chain->description->content ?? '',
                            'address'=>$details['hoteldetail']->hotel->address->content ?? '',
                            'postalCode'=>$details['hoteldetail']->hotel->postalCode ?? '',
                            'email'=>$details['hoteldetail']->hotel->email ?? '',
                            'phones'=>!empty($details['hoteldetail']->hotel->phones) && count($details['hoteldetail']->hotel->phones) > 0 ? serialize($details['hoteldetail']->hotel->phones) : '',
                            'ranking'=>$details['hoteldetail']->hotel->ranking ?? '',
                            'images'=>!empty($details['hoteldetail']->hotel->images) && count($details['hoteldetail']->hotel->images) > 0 ? 'http://photos.hotelbeds.com/giata'.'/'.$details['hoteldetail']->hotel->images[0]->path : '',
                            'web'=>$details['hoteldetail']->hotel->web ?? '',
                        ]); 
                        dd($details['hoteldetail']->hotel->facilities);
                        foreach($details['hoteldetail']->hotel->facilities as $fac){ 
                            HotelFacilities::updateOrCreate(['code'=>$fac->code],[
                                'hotel_id'=>$createdHotel->id, 
                                'value'=>$fac->name,
                            ]); 
                        }

                        $newhotel = HotelsData::where('id',$createdHotel->id)->first();
                        $search_hotels[] = $newhotel;
                    }
                }
            } 
        }
        }else{ 
            return ([
                'status'=>$signature['status']
            ]);
        }
        return view('search_hotel', compact('data','search_hotels','params','cities','error'));
    }

    public function getSuggestionitems(Request $request)
    {  
        $hotels = [];
        $params = $request->all() ?? ''; 
        $signature = getsignature();  
        
        $pusharr = []; 
        $options = '<option value="">Select location</option>';
        if($signature['status'] == 200){
            $gethotels = getSuggestionitems($signature['data'],$request->search); 
            $hotelsdata = $gethotels['data']->destinations ?? [];
            $destinations = []; 
            if(!empty($hotelsdata)){
                foreach($hotelsdata as $data){
                    $options .= "<option>".$data->name->content."</option>";
                    /* $destinations['value'] = $data->name->content ?? '';
                     $destinations['code'] = $data->code;
                     $pusharr[] = $destinations; */
                    }
                }
            return  response()->json([
                'options'=>$options
            ]);
        }else{
            return  response()->json([
                'options'=>$options
            ]);
           /*  return ([
                'status'=>$signature['status']
            ]); */
        } 
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
