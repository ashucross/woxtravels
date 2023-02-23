<?php
use App\Models\Airport;
use Illuminate\Support\Facades\DB;
function getsignature(){
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $signature = hash("sha256", $apiKey.$Secret.time());
    $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/status";
    try{
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json' , 'Api-key:'.$apiKey.'', 'X-Signature:'.$signature.'']
        ));
        $resp = curl_exec($curl);
        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                return ([
                    'status'=>200,
                    'data'=>$signature,
                    'message'=>'success',
                ]);
                break;
                default:
                return ([
                    'status'=>$http_code,
                    'message'=>$resp,
                ]);
            }
        }
        curl_close($curl);
    } catch (Exception $ex) {
        return ([
            'status'=>'error',
            'message'=>"Error while sending request, reason: %s\n",$ex->getMessage()
        ]);
    }
}

function getSuggestionitems($data,$country){
    $signature = $data;
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $endpoint = "https://api.test.hotelbeds.com/hotel-content-api/1.0/locations/destinations?fields=all&countryCodes=".$country."&language=ENG&from=1&to=1000&useSecondaryLanguage=false";
    try{
        $curl = curl_init();
        curl_setopt_array($curl, array(
            // CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json' , 'Api-key:'.$apiKey.'', 'X-Signature:'.$signature.'']
        ));
        $resp = curl_exec($curl);
        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                $hotels = json_decode($resp);
                return ([
                    'status'=>200,
                    'data'=>$hotels
                ]);
                break;
                default:
                return ([
                    'status'=>$http_code,
                    'data'=>''
                ]);
            }
        }
        curl_close($curl);
    } catch (Exception $ex) {
        return ([
            'status'=>'error',
            'message'=>"Error while sending request, reason: %s\n",$ex->getMessage()
        ]);
    }
}

    function getHotel($data,$pagination,$init){
        $signature = $data;
        $apiKey = env('HOTEL_API_KEY');
        $Secret = env('HOTEL_SECRET_KEY');
        $endpoint = "https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels?fields=all&language=ENG&from=".$init."&to=".$pagination."&useSecondaryLanguage=false";
        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
                // CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $endpoint,
                CURLOPT_HTTPHEADER => ['Accept:application/json' , 'Api-key:'.$apiKey.'', 'X-Signature:'.$signature.'']
            ));
            $resp = curl_exec($curl);
            if (!curl_errno($curl)) {
                switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                    case 200:  # OK
                    $hotels = json_decode($resp);
                    return ([
                        'status'=>200,
                        'data'=>$hotels
                    ]);
                    break;
                    default:
                    return ([
                        'status'=>$http_code,
                        'data'=>''
                    ]);
                }
            }
            curl_close($curl);
        } catch (Exception $ex) {
            return ([
                'status'=>'error',
                'message'=>"Error while sending request, reason: %s\n",$ex->getMessage()
            ]);
        }
    }
    // public/assets/images/airline/
    function getFileName($fileName){

        $path = base_path('/public/assets/images/airline');
        $files = File::allFiles($path);
        $output ='';
        foreach($files as $file){
            $file1 = pathinfo($file);
            if($file1['filename'] == $fileName){
                $output = $file1['basename'];
            }
        }
        if($output){
            return url('/public/assets/images/airline').'/'.$output;
        }
         return $output;
    }


    function getCountryName($country,$city){
        $airports = DB::table('airports')->where(['country_code'=>$country,'city_code'=>$city])->first();
        return $airports;
    }
    function getdestinationName($code){
        $destiantion = DB::table('hotel_destinations')->where(['code'=>$code,])->first();
        return $destiantion->name ?? '';
    }

    function getHoteldetail($data,$hotel=null){
        $signature = $data;
        $apiKey = env('HOTEL_API_KEY');
        $Secret = env('HOTEL_SECRET_KEY');
        $endpoint = "https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels/".$hotel->code."/details?language=ENG&useSecondaryLanguage=False";

        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $endpoint,
                CURLOPT_HTTPHEADER => ['Accept:application/json' , 'Api-key:'.$apiKey.'', 'X-Signature:'.$signature.'','Content-Type:application/json'],
            ));
            $resp = curl_exec($curl);
            if (!curl_errno($curl)) {
                switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                    case 200:  # OK
                    $hoteldetail = json_decode($resp);
                    return ([
                        'status'=>200,
                        'data'=>$hotel,
                        'hoteldetail'=>$hoteldetail,
                    ]);
                    break;
                    default:
                    return ([
                        'status'=>$http_code,
                        'data'=>'',
                        'hoteldetail'=>'',
                    ]);
                }
            }
            curl_close($curl);
        } catch (Exception $ex) {
            return ([
                'status'=>'error',
                'message'=>"Error while sending request, reason: %s\n",$ex->getMessage()
            ]);
        }
    }

    function searchHotel($data,$params=null){
        $signature = $data;
        $apiKey = env('HOTEL_API_KEY');
        $Secret = env('HOTEL_SECRET_KEY');
        $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/hotels";
       /*  $post = [
            'stay' => ([
                "checkIn"=> "2023-06-15",
                "checkOut"=> "2023-06-16"
            ]),
            "occupancies"=> array([
                "rooms"=> 1,
                "adults"=> 1,
                "children"=> 0
            ]),
            "destination"=> ([
                "code"=> "MCO"
            ])
        ]; */
        $dates = explode('-',$params['checkin']);
        $post = [
            'stay' => ([
                "checkIn"=> date('Y-m-d',strtotime($dates[0])),
                "checkOut"=>  date('Y-m-d',strtotime($dates[1]))
            ]),
            "occupancies"=> array([
                "rooms"=> (int)$params['rooms'],
                "adults"=> (int)$params['adult'],
                "children"=> (int)$params['child']
            ]),
            "destination"=> ([
                "code"=> $params['location']
            ])
        ];


        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $endpoint,
                CURLOPT_HTTPHEADER => ['Accept:application/json' , 'Api-key:'.$apiKey.'', 'X-Signature:'.$signature.'','Content-Type:application/json'],
                CURLOPT_POSTFIELDS => json_encode($post)
            ));
            $resp = curl_exec($curl);
            if (!curl_errno($curl)) {
                switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                    case 200:  # OK
                    $hotels = json_decode($resp);
                    return ([
                        'status'=>200,
                        'data'=>$hotels
                    ]);
                    break;
                    default:
                    return ([
                        'status'=>$http_code,
                        'data'=>''
                    ]);
                }
            }
            curl_close($curl);
        } catch (Exception $ex) {
            return ([
                'status'=>'error',
                'message'=>"Error while sending request, reason: %s\n",$ex->getMessage()
            ]);
        }
    }




function bookingsDetails($data){
	// dd($data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][0]["travelerType"]);
	$travelers = [];
	foreach($data["flight_details"]["data"]["travelers"] as $key=>$passenger){
		$travelers[]=[
			'fullname' => $passenger["name"]["firstName"]  .' '.$passenger["name"]["lastName"],
			'gender'=> $passenger["gender"],
			'dob'=>$passenger["dateOfBirth"],
			'type' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["travelerType"],
			'price' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["price"]["total"],
			'currency' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["price"]["currency"],
			'fareOption' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareOption"],
			'cabin'=> $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["cabin"] ?? Null,
			'class'=> $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["class"] ?? Null,
			'luggage'=> $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? Null,
			'luggage_unit'=> $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["includedCheckedBags"]["weightUnit"]
		];
	}
	// dd($data["flight_details"]["data"]["flightOffers"][0]["itineraries"]);
	$oneWayroute =[];
	$twoWayroute =[];

	$tour =count($data["flight_details"]["data"]["flightOffers"][0]["itineraries"]);
	foreach($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"] as $routes){
		$depcityCode = $routes[ "departure"]["iataCode"];
		$arrcityCode = $routes[ "arrival"]["iataCode"];
	 $depcountry=  getCountryName($data["flight_details"]["dictionaries"]["locations"][$depcityCode]["countryCode"],  $depcityCode);
	 $arrcountry=  getCountryName($data["flight_details"]["dictionaries"]["locations"][$arrcityCode]["countryCode"],  $arrcityCode);
	 $oneWayroute[]=[
             'dep_time'=>$routes[ "departure"]["at"],
			 'arrival_time'=>$routes[ "arrival"]["at"],
			 'dep_city_code'=>$depcountry->city_code,
			'dep_city_name'=>$depcountry->city_name,
			'dep_airport_name'=>$depcountry->airport_name,
			'dep_country_code'=>$depcountry->country_code,
			'dep_country_name'=>$depcountry->country_name,
			'arr_city_code'=>$arrcountry->city_code,
			'arr_city_name'=>$arrcountry->city_name,
			'arr_airport_name'=>$arrcountry->airport_name,
			'arr_country_code'=>$arrcountry->country_code,
			'arr_country_name'=>$arrcountry->country_name,
		];
	}



	$segments = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"];
     $dep_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"]["iataCode"];
	 $dep_country_code = $data["flight_details"]["dictionaries"]["locations"][$dep_city_code]["countryCode"];
	 if(count($segments) > 1){
		$arrivalAt = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][count($segments) -1];
        $oneWayarrival = $arrivalAt[ "arrival"]["at"];
		$oneway_city_code = $arrivalAt[ "arrival"]["iataCode"];
		$oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
		$onway_terminal = $arrivalAt[ "arrival"]["terminal"] ?? 'Not given';
		$flight_number= $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][count($segments) -1]['number'];
	}else{
		$oneWayarrival = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0][ "arrival"]["at"];
		$oneway_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0][ "arrival"]["iataCode"];
		$oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
		 $onway_terminal = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0][ "arrival"]["terminal"] ?? 'Not Give';
		 $flight_number= $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]['number'];
		}

	$data['depature_date']= [
		'oneway'=>$data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"][ "at"],
		'oneway_ret'=>$oneWayarrival,

	];


	$file =  getFileName($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["carrierCode"]);
  	$dep_oneway = getCountryName($dep_country_code,  $dep_city_code);
	$dep_arrival =getCountryName($oneway_country_code,  $oneway_city_code);
	 $data['oneway']=[
	 	'dep_city_name'=>$dep_oneway->city_name,
		 'dep_city_code'=>$dep_oneway->city_code,
		 'dep_airport_name'=>$dep_oneway->airport_name,
		 'dep_terminal'=>$data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"][ "terminal"] ?? 'Not Give',
		 'arrival_city_code'=>$dep_arrival->city_code,
		 'arrival_city_name'=>$dep_arrival->city_name,
		 'arrival_airport_name'=>$dep_arrival->airport_name,
		 'arrival_terminal'=>$onway_terminal,
		 'flight_number'=>$flight_number,
		 'image'=>$file,
		 'depature_carrierCode'=>$data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["carrierCode"],
		  'one_way_route'=> 	 $oneWayroute

	];
	if($tour > 1){
		$segments = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"];
     $dep_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["departure"]["iataCode"];
	 $dep_country_code = $data["flight_details"]["dictionaries"]["locations"][$dep_city_code]["countryCode"];
	 if(count($segments) > 1){
		$arrivalAt = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][count($segments) -1];
        $oneWayarrival = $arrivalAt[ "arrival"]["at"];
		$oneway_city_code = $arrivalAt[ "arrival"]["iataCode"];
		$oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
		$onway_terminal = $arrivalAt[ "arrival"]["terminal"] ?? 'Not given';
		$flight_number= $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][count($segments) -1]['number'];
	}else{
		$oneWayarrival = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0][ "arrival"]["at"];
		$oneway_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0][ "arrival"]["iataCode"];
		$oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
		 $onway_terminal = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0][ "arrival"]["terminal"] ?? 'Not Give';
		 $flight_number= $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]['number'];
	}
		foreach($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"] as $routes){
			$depcityCode = $routes[ "departure"]["iataCode"];
			$arrcityCode = $routes[ "arrival"]["iataCode"];
		 $depcountry=  getCountryName($data["flight_details"]["dictionaries"]["locations"][$depcityCode]["countryCode"],  $depcityCode);
		 $arrcountry=  getCountryName($data["flight_details"]["dictionaries"]["locations"][$arrcityCode]["countryCode"],  $arrcityCode);
		 $twoWayroute[]=[
				 'dep_time'=>$routes[ "departure"]["at"],
				 'arrival_time'=>$routes[ "arrival"]["at"],
				 'dep_city_code'=>$depcountry->city_code,
				'dep_city_name'=>$depcountry->city_name,
				'dep_airport_name'=>$depcountry->airport_name,
				'dep_country_code'=>$depcountry->country_code,
				'dep_country_name'=>$depcountry->country_name,

				'arr_city_code'=>$arrcountry->city_code,
				'arr_city_name'=>$arrcountry->city_name,
				'arr_airport_name'=>$arrcountry->airport_name,
				'arr_country_code'=>$arrcountry->country_code,
				'arr_country_name'=>$arrcountry->country_name,
			];
		}
		$file =  getFileName($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["carrierCode"]);
  	$dep_oneway = getCountryName($dep_country_code,  $dep_city_code);
	$dep_arrival =getCountryName($oneway_country_code,  $oneway_city_code);
	 $data['twoway']=[
	 	'dep_city_name'=>$dep_oneway->city_name,
		 'dep_city_code'=>$dep_oneway->city_code,
		 'dep_airport_name'=>$dep_oneway->airport_name,
		 'dep_terminal'=>$data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["departure"][ "terminal"] ?? 'Not Give',
		 'arrival_city_code'=>$dep_arrival->city_code,
		 'arrival_city_name'=>$dep_arrival->city_name,
		 'arrival_airport_name'=>$dep_arrival->airport_name,
		 'arrival_terminal'=>$onway_terminal,
		 'flight_number'=> $flight_number,
		 'image'=>$file,
		 'depature_carrierCode'=>$data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["carrierCode"],
		  'two_way_route'=> 	 $twoWayroute

	];
	}

	$data['trip'] =$tour;
	$data['passengers'] = $travelers;
   $data['booking_id'] =$data["flight_details"]["data"]['id'];
    $data['booking_code']=$data["flight_details"]["data"]["associatedRecords"][0]["reference"];
	return $data;

}


function addBookingsDetails($data){
// dd($data);
    $output['agent_id'] = null;;
	$output['user_id'] = Null;
	// $output['user_id'] = auth('web')->user() ? auth()->user()->id :Null;
	$output['depart_flight'] = $data["oneway"]["dep_city_code"].'-'.$data["oneway"]["arrival_city_name"];
	$output['source']= $data["oneway"]["dep_city_name"];
	$output['destination']= $data["oneway"]["arrival_city_name"];
	$output['from_date']=$data["oneway"]["one_way_route"][0]["dep_time"];
	$output['depart_date']=$data["oneway"]["one_way_route"][0]["dep_time"];
	$output['to_date']=($data["trip"] > 1) ? $data["twoway"]["two_way_route"][0]["dep_time"] :Null;
	$output['return_date']=($data["trip"] > 1) ? $data["twoway"]["two_way_route"][0]["dep_time"] :Null;
	$output['return_flight'] = ($data["trip"] > 1)? $data["oneway"]["arrival_city_name"].'-'.$data["oneway"]["dep_city_code"] :Null;
	$output['booking_response'] = json_encode($data,true);
	$output['ticket_status'] = ($data["flight_details"]["data"]["ticketingAgreement"]["option"] == "CONFIRM") ? 1:0;
	$output['pnr'] = $data["booking_code"];
	$output['status'] = 0;
	$output['type']= null;
	// $output['type']= auth()->guard('agents')->user() ? 'b2b':'b2c';
	return $output;
}


function addDataSession($data){
    $datas =[];
 foreach($data["data"] as $key=>$item){
      $item["total_price"] =$item["price"]["total"];
      $item["air_craft"] = $item["itineraries"][0]["segments"][0]["carrierCode"];
      $item['oneway_stop'] = (count($item["itineraries"][0]["segments"]) - 1);
      $item['twoway_stop'] = (count($item["itineraries"]) > 1) ? (count($item["itineraries"][1]["segments"]) - 1) : Null;
      $item["trip"] = count($item["itineraries"]);
       $datas[] = $item;
 }
  $data['meta']=$data["meta"];
  $collection = collect($datas);

 $data["dictionaries"] = $data["dictionaries"];
 $arrValues = $collection->sortBy(['total_price'=>'asc'])->toArray();
 $data["data"] = array_values($arrValues);
 return $data;
}



function getinitalAirpot(){
    $airports = DB::table('airports')->where(['country_code'=> 'IN','top_cities' => 1])->get();
    return $airports;
}
