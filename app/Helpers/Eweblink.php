<?php


use App\Models\Curren_Cies;
use Illuminate\Support\Facades\DB;
use App\Models\Airport;

// Creating amadeus token
function token($_APIPROVIDER)
{
    if ($_APIPROVIDER == 'amadeus') {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://test.api.amadeus.com/v1/security/oauth2/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id=kQ8QvQGMS9WKLjN9xXLpNutDGbA1tYwE&client_secret=S9dJS4uesj1sqAWS&grant_type=client_credentials',
            // CURLOPT_POSTFIELDS => 'client_id=2ZMwEqSDgc9EReVyeLW6UqqPZyhLJbRv&client_secret=j8a8QhAi4eYrtZyL&grant_type=client_credentials',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $accessresponse = json_decode($response, true);
        return $accessresponse;
    } else {
        return false;
    }
}


function bookingsDetails($data)
{
    // dd($data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][0]["travelerType"]);
    $travelers = [];
    foreach ($data["flight_details"]["data"]["travelers"] as $key => $passenger) {
        $travelers[] = [
            'fullname' => $passenger["name"]["firstName"]  . ' ' . $passenger["name"]["lastName"],
            'gender' => $passenger["gender"],
            'dob' => $passenger["dateOfBirth"],
            'type' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["travelerType"],
            'price' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["price"]["total"],
            'currency' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["price"]["currency"],
            'fareOption' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareOption"],
            'cabin' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["cabin"] ?? Null,
            'class' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["class"] ?? Null,
            'luggage' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["includedCheckedBags"]["weight"] ?? Null,
            'luggage_unit' => $data["flight_details"]["data"]["flightOffers"][0]["travelerPricings"][$key]["fareDetailsBySegment"][0]["includedCheckedBags"]["weightUnit"]
        ];
    }
    // dd($data["flight_details"]["data"]["flightOffers"][0]["itineraries"]);
    $oneWayroute = [];
    $twoWayroute = [];

    $tour = count($data["flight_details"]["data"]["flightOffers"][0]["itineraries"]);
    foreach ($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"] as $routes) {
        $depcityCode = $routes["departure"]["iataCode"];
        $arrcityCode = $routes["arrival"]["iataCode"];
        $depcountry =  getCountryName($data["flight_details"]["dictionaries"]["locations"][$depcityCode]["countryCode"],  $depcityCode);
        $arrcountry =  getCountryName($data["flight_details"]["dictionaries"]["locations"][$arrcityCode]["countryCode"],  $arrcityCode);
        $oneWayroute[] = [
            'dep_time' => $routes["departure"]["at"],
            'arrival_time' => $routes["arrival"]["at"],
            'dep_city_code' => $depcountry->city_code,
            'dep_city_name' => $depcountry->city_name,
            'dep_airport_name' => $depcountry->airport_name,
            'dep_country_code' => $depcountry->country_code,
            'dep_country_name' => $depcountry->country_name,
            'arr_city_code' => $arrcountry->city_code,
            'arr_city_name' => $arrcountry->city_name,
            'arr_airport_name' => $arrcountry->airport_name,
            'arr_country_code' => $arrcountry->country_code,
            'arr_country_name' => $arrcountry->country_name,
        ];
    }



    $segments = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"];
    $dep_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"]["iataCode"];
    $dep_country_code = $data["flight_details"]["dictionaries"]["locations"][$dep_city_code]["countryCode"];
    if (count($segments) > 1) {
        $arrivalAt = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][count($segments) - 1];
        $oneWayarrival = $arrivalAt["arrival"]["at"];
        $oneway_city_code = $arrivalAt["arrival"]["iataCode"];
        $oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
        $onway_terminal = $arrivalAt["arrival"]["terminal"] ?? 'Not given';
        $flight_number = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][count($segments) - 1]['number'];
    } else {
        $oneWayarrival = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["arrival"]["at"];
        $oneway_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["arrival"]["iataCode"];
        $oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
        $onway_terminal = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["arrival"]["terminal"] ?? 'Not Give';
        $flight_number = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]['number'];
    }

    $data['depature_date'] = [
        'oneway' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"]["at"],
        'oneway_ret' => $oneWayarrival,

    ];


    $file =  getFileName($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["carrierCode"]);
    $dep_oneway = getCountryName($dep_country_code,  $dep_city_code);
    $dep_arrival = getCountryName($oneway_country_code,  $oneway_city_code);
    $data['oneway'] = [
        'dep_city_name' => $dep_oneway->city_name,
        'dep_city_code' => $dep_oneway->city_code,
        'dep_airport_name' => $dep_oneway->airport_name,
        'dep_terminal' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["departure"]["terminal"] ?? 'Not Give',
        'arrival_city_code' => $dep_arrival->city_code,
        'arrival_city_name' => $dep_arrival->city_name,
        'arrival_airport_name' => $dep_arrival->airport_name,
        'arrival_terminal' => $onway_terminal,
        'flight_number' => $flight_number,
        'image' => $file,
        'depature_carrierCode' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][0]["segments"][0]["carrierCode"],
        'one_way_route' =>      $oneWayroute

    ];
    if ($tour > 1) {
        $segments = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"];
        $dep_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["departure"]["iataCode"];
        $dep_country_code = $data["flight_details"]["dictionaries"]["locations"][$dep_city_code]["countryCode"];
        if (count($segments) > 1) {
            $arrivalAt = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][count($segments) - 1];
            $oneWayarrival = $arrivalAt["arrival"]["at"];
            $oneway_city_code = $arrivalAt["arrival"]["iataCode"];
            $oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
            $onway_terminal = $arrivalAt["arrival"]["terminal"] ?? 'Not given';
            $flight_number = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][count($segments) - 1]['number'];
        } else {
            $oneWayarrival = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["arrival"]["at"];
            $oneway_city_code = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["arrival"]["iataCode"];
            $oneway_country_code = $data["flight_details"]["dictionaries"]["locations"][$oneway_city_code]["countryCode"];
            $onway_terminal = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["arrival"]["terminal"] ?? 'Not Give';
            $flight_number = $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]['number'];
        }
        foreach ($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"] as $routes) {
            $depcityCode = $routes["departure"]["iataCode"];
            $arrcityCode = $routes["arrival"]["iataCode"];
            $depcountry =  getCountryName($data["flight_details"]["dictionaries"]["locations"][$depcityCode]["countryCode"],  $depcityCode);
            $arrcountry =  getCountryName($data["flight_details"]["dictionaries"]["locations"][$arrcityCode]["countryCode"],  $arrcityCode);
            $twoWayroute[] = [
                'dep_time' => $routes["departure"]["at"],
                'arrival_time' => $routes["arrival"]["at"],
                'dep_city_code' => $depcountry->city_code,
                'dep_city_name' => $depcountry->city_name,
                'dep_airport_name' => $depcountry->airport_name,
                'dep_country_code' => $depcountry->country_code,
                'dep_country_name' => $depcountry->country_name,

                'arr_city_code' => $arrcountry->city_code,
                'arr_city_name' => $arrcountry->city_name,
                'arr_airport_name' => $arrcountry->airport_name,
                'arr_country_code' => $arrcountry->country_code,
                'arr_country_name' => $arrcountry->country_name,
            ];
        }
        $file =  getFileName($data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["carrierCode"]);
        $dep_oneway = getCountryName($dep_country_code,  $dep_city_code);
        $dep_arrival = getCountryName($oneway_country_code,  $oneway_city_code);
        $data['twoway'] = [
            'dep_city_name' => $dep_oneway->city_name,
            'dep_city_code' => $dep_oneway->city_code,
            'dep_airport_name' => $dep_oneway->airport_name,
            'dep_terminal' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["departure"]["terminal"] ?? 'Not Give',
            'arrival_city_code' => $dep_arrival->city_code,
            'arrival_city_name' => $dep_arrival->city_name,
            'arrival_airport_name' => $dep_arrival->airport_name,
            'arrival_terminal' => $onway_terminal,
            'flight_number' => $flight_number,
            'image' => $file,
            'depature_carrierCode' => $data["flight_details"]["data"]["flightOffers"][0]["itineraries"][1]["segments"][0]["carrierCode"],
            'two_way_route' =>      $twoWayroute

        ];
    }

    $data['trip'] = $tour;
    $data['passengers'] = $travelers;
    $data['booking_id'] = $data["flight_details"]["data"]['id'];
    $data['booking_code'] = $data["flight_details"]["data"]["associatedRecords"][0]["reference"];
    return $data;
}


function addBookingsDetails($data)
{
    // dd($data);
    $output['agent_id'] = null;;
    $output['user_id'] = Null;
    // $output['user_id'] = auth('web')->user() ? auth()->user()->id :Null;
    $output['depart_flight'] = $data["oneway"]["dep_city_code"] . '-' . $data["oneway"]["arrival_city_name"];
    $output['source'] = $data["oneway"]["dep_city_name"];
    $output['destination'] = $data["oneway"]["arrival_city_name"];
    $output['from_date'] = $data["oneway"]["one_way_route"][0]["dep_time"];
    $output['depart_date'] = $data["oneway"]["one_way_route"][0]["dep_time"];
    $output['to_date'] = ($data["trip"] > 1) ? $data["twoway"]["two_way_route"][0]["dep_time"] : Null;
    $output['return_date'] = ($data["trip"] > 1) ? $data["twoway"]["two_way_route"][0]["dep_time"] : Null;
    $output['return_flight'] = ($data["trip"] > 1) ? $data["oneway"]["arrival_city_name"] . '-' . $data["oneway"]["dep_city_code"] : Null;
    $output['booking_response'] = json_encode($data, true);
    $output['ticket_status'] = ($data["flight_details"]["data"]["ticketingAgreement"]["option"] == "CONFIRM") ? 1 : 0;
    $output['pnr'] = $data["booking_code"];
    $output['status'] = 0;
    $output['type'] = null;
    // $output['type']= auth()->guard('agents')->user() ? 'b2b':'b2c';
    return $output;
}


function addDataSession($data)
{
    $datas = [];
    foreach ($data["data"] as $key => $item) {
        $item["total_price"] = $item["price"]["total"];
        $item["air_craft"] = $item["itineraries"][0]["segments"][0]["carrierCode"];
        $item['oneway_stop'] = (count($item["itineraries"][0]["segments"]) - 1);
        $item['twoway_stop'] = (count($item["itineraries"]) > 1) ? (count($item["itineraries"][1]["segments"]) - 1) : Null;
        $item["trip"] = count($item["itineraries"]);
        $datas[] = $item;
    }
    $data['meta'] = $data["meta"];
    $collection = collect($datas);

    $data["dictionaries"] = $data["dictionaries"];
    $arrValues = $collection->sortBy(['total_price' => 'asc'])->toArray();
    $data["data"] = array_values($arrValues);
    return $data;
}



function getinitalAirpot()
{
    $airports = DB::table('airports')->where(['country_code' => 'IN', 'top_cities' => 1])->get();
    return $airports;
}




/*** get bookin details  */
function getBookingDetiils($data)
{

    $id = $data;
    //   $url =  'https://test.api.amadeus.com/v1/booking/flight-orders/'.$id;
    $output = getInformation($id);
    $count = count($output['data']['flightOffers'][0]['itineraries']);
    if ($count > 1) {
        $out =  singleTripDetails($output);
    }
    $out =  roundTrip($output);
    return $out;
}

function getPaymentDetiils($data)
{
    dd($data);
}

function getInformation($id)
{
    $_TOKEN = token('amadeus');
    $Token = $_TOKEN['access_token'];
    // dd($Token)
    $curlF = curl_init();
    curl_setopt_array($curlF, array(
        CURLOPT_URL => 'https://test.api.amadeus.com/v1/booking/flight-orders/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $Token . ''
        ),
    ));

    $response = curl_exec($curlF);

    $jsonResponse = json_decode($response, true);
    curl_close($curlF);
    return  $jsonResponse;
}
function searchResults($data)
{

    $collection = collect([]);
    dd($data);
}

function singleTripDetails($outputs)
{
    // $carriercode = $output["segments"][0]['carrierCode'];
    // $depaturecountry = getCountryName($outputs['dictionaries']['locations'][$output["segments"][0]['departure']['iataCode']]["countryCode"],$output["segments"][0]['departure']['iataCode']);
    // $file = getFileName($carriercode);
    // //  $tt  = $outputs['dictionaries']['carriers'][$carriercode];
    // // dd($tt);
    //   $datas[]=[
    // 	  'file'=>$file,
    // 	//   'duration'=>strtolower(str_replace('H','H     ',substr($output['itineraries'][0]["duration"], 2))),
    // 	  'depature'=>[
    // 		  'country'=> $depaturecountry->country_name,
    // 		  'city'=>$depaturecountry->city_name,
    // 		  'time'=> date('H:i', strtotime($output["segments"][0]['departure']['at'])),
    // 		  'date'=> date('M-d-Y', strtotime($output["segments"][0]['departure']['at'])),
    // 		  'flight'=>$output["segments"][0]['carrierCode'] .'-'. $output["segments"][0]['number'],
    // 		  'status'=>$output["segments"][0]['bookingStatus']
    // 	  ]

    //   ];
}
function  roundTrip($outputs)
{
    foreach ($outputs['data']['flightOffers'][0]['itineraries'] as $key => $output) {
        $carriercode = $output["segments"][0]['carrierCode'];
        $depaturecountry = getCountryName($outputs['dictionaries']['locations'][$output["segments"][0]['departure']['iataCode']]["countryCode"], $output["segments"][0]['departure']['iataCode']);
        $file = getFileName($carriercode);
        //  $tt  = $outputs['dictionaries']['carriers'][$carriercode];
        // dd($tt);
        $datas[] = [
            'file' => $file,
            //   'duration'=>strtolower(str_replace('H','H     ',substr($output['itineraries'][0]["duration"], 2))),
            'depature' => [
                'country' => $depaturecountry->country_name,
                'city' => $depaturecountry->city_name,
                'time' => date('H:i', strtotime($output["segments"][0]['departure']['at'])),
                'date' => date('M-d-Y', strtotime($output["segments"][0]['departure']['at'])),
                'flight' => $output["segments"][0]['carrierCode'] . '-' . $output["segments"][0]['number'],
                'status' => $output["segments"][0]['bookingStatus']
            ]

        ];
    }
    // dd($outputs);die;
    $datas['travelersDetails'] = $outputs['data']['travelers'];
    foreach ($outputs['data']['flightOffers'][0]['travelerPricings'] as $key => $traveller) {

        // dd($outputs['data']['travelers'][$key], $traveller);
        $passengers[] = [
            'first_name' => $outputs['data']['travelers'][$key]['name']['firstName'],
            'last_name'  => $outputs['data']['travelers'][$key]['name']['lastName'],
            'gender' => $outputs['data']['travelers'][$key]['gender'],
            'type' => $traveller['travelerType'],
        ];
    }

    $datas['passengers'] = $passengers;
    return $datas;
    //	<span>{{ $arrivalcountryDetails->country_name}}  ({{ $arrivalcountryDetails->city_name}})

}

function meta_key()
{
    $data = array(
        '_MetaTitle' => 'WOX Travel & Tour - Book Cheapest air tickets',
        '_MetaKeywords' => '',
        '_MetaDescription' => '',
        '_Flight' => 'active',
        '_Hotel' => '',
        '_Packages' => '',
        '_Visa' => '',
        '_Insurance' => '',
        '_Car' => '',
    );
    return $data;
}

function displayAlert()
{
    if (Session::has('message')) {
        list($type, $message) = explode('|', Session::get('message'));

        $type = $type == 'error' ?: 'danger';
        $type = $type == 'message' ?: 'info';

        return sprintf('<div class="alert alert-%s">%s</div>', $type, $message);
    }

    return '';
}


// public/assets/images/airline/
function getFileName($fileName)
{

    $path = base_path('/public/assets/images/airline');
    $files = File::allFiles($path);
    $output = '';
    foreach ($files as $file) {
        $file1 = pathinfo($file);
        if ($file1['filename'] == $fileName) {
            $output = $file1['basename'];
        }
    }
    if ($output) {
        return url('/public/assets/images/airline') . '/' . $output;
    }
    return $output;
}
