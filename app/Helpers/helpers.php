<?php

use App\Models\Airport;
use App\Models\Curren_Cies;
use Illuminate\Support\Facades\DB;

function getsignature()
{
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $signature = hash("sha256", $apiKey . $Secret . time());
    $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/status";
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json', 'Api-key:' . $apiKey . '', 'X-Signature:' . $signature . '']
        ));
        $resp = curl_exec($curl);
        // dd($resp);
        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    return ([
                        'status' => 200,
                        'data' => $signature,
                        'message' => 'success',
                    ]);
                    break;
                default:
                    return ([
                        'status' => $http_code,
                        'message' => $resp,
                    ]);
            }
        }
        curl_close($curl);
    } catch (Exception $ex) {
        return ([
            'status' => 'error',
            'message' => "Error while sending request, reason: %s\n", $ex->getMessage()
        ]);
    }
}

function update_currencies()
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "https://api.freecurrencyapi.com/v1/latest?apikey=bqutIM0X1TYXpjlugWfUT7XOntr32Ty2vnsExwXC",
    ));
    $resp = curl_exec($curl);
    $currencies = json_decode($resp);
    $currencies = (array) $currencies->data;
    if(!empty($currencies)){
        foreach($currencies as $key => $curr){
            $exists = Curren_Cies::where('code',$key)->first();
            if($exists){
                Curren_Cies::where('code',$key)->update([
                    'code'=>$key,
                    'value'=> $curr
                ]);
            } else{
                Curren_Cies::create([
                    'code'=>$key,
                    'value'=> $curr
                ]);
            }
        }
    }
    echo 'currencies updated';die;
}

function getSuggestionitems($data, $country)
{
    $signature = $data;
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $endpoint = "https://api.test.hotelbeds.com/hotel-content-api/1.0/locations/destinations?fields=all&countryCodes=" . $country . "&language=ENG&from=1&to=1000&useSecondaryLanguage=false";
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            // CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json', 'Api-key:' . $apiKey . '', 'X-Signature:' . $signature . '']
        ));
        $resp = curl_exec($curl);
        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    $hotels = json_decode($resp); 
                    return ([
                        'status' => 200,
                        'data' => $hotels
                    ]);
                    break;
                default:
                    return ([
                        'status' => $http_code,
                        'data' => ''
                    ]);
            }
        }
        curl_close($curl);
    } catch (Exception $ex) {
        return ([
            'status' => 'error',
            'message' => "Error while sending request, reason: %s\n", $ex->getMessage()
        ]);
    }
}

function getHotel($data, $pagination, $init)
{
    $signature = $data;
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $endpoint = "https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels?fields=all&language=ENG&from=" . $init . "&to=" . $pagination . "&useSecondaryLanguage=false";
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            // CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json', 'Api-key:' . $apiKey . '', 'X-Signature:' . $signature . '']
        ));
        $resp = curl_exec($curl);
        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    $hotels = json_decode($resp);
                    return ([
                        'status' => 200,
                        'data' => $hotels
                    ]);
                    break;
                default:
                    return ([
                        'status' => $http_code,
                        'data' => ''
                    ]);
            }
        }
        curl_close($curl);
    } catch (Exception $ex) {
        return ([
            'status' => 'error',
            'message' => "Error while sending request, reason: %s\n", $ex->getMessage()
        ]);
    }
}


function getCountryName($country, $city)
{
    $airports = DB::table('airports')->where(['country_code' => $country, 'city_code' => $city])->first();
    return $airports;
}
function getdestinationName($code)
{
    $destiantion = DB::table('hotel_destinations')->where(['code' => $code,])->first();
    return $destiantion->name ?? '';
}

function getHoteldetail($data, $hotel = null)
{
    $signature = $data;
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $endpoint = "https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels/" . $hotel->code . "/details?language=ENG&useSecondaryLanguage=False";

    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json', 'Api-key:' . $apiKey . '', 'X-Signature:' . $signature . '', 'Content-Type:application/json'],
        ));
        $resp = curl_exec($curl);
        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    $hoteldetail = json_decode($resp);
                    return ([
                        'status' => 200,
                        'data' => $hotel,
                        'hoteldetail' => $hoteldetail,
                    ]);
                    break;
                default:
                    return ([
                        'status' => $http_code,
                        'data' => '',
                        'hoteldetail' => '',
                    ]);
            }
        }
        curl_close($curl);
    } catch (Exception $ex) {
        return ([
            'status' => 'error',
            'message' => "Error while sending request, reason: %s\n", $ex->getMessage()
        ]);
    }
}

function searchHotel($data, $params = null)
{
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
    $dates = explode('-', $params['checkin']);
    $post = [
        'stay' => ([
            "checkIn" => date('Y-m-d', strtotime($dates[0])),
            "checkOut" =>  date('Y-m-d', strtotime($dates[1]))
        ]),
        "occupancies" => array([
            "rooms" => (int)$params['rooms'],
            "adults" => (int)$params['adult'],
            "children" => (int)$params['child']
        ]),
        "destination" => ([
            "code" => $params['location']
        ])
    ];


    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json', 'Api-key:' . $apiKey . '', 'X-Signature:' . $signature . '', 'Content-Type:application/json'],
            CURLOPT_POSTFIELDS => json_encode($post)
        ));
        $resp = curl_exec($curl);
        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 400:  # Fail
                    $hotels = json_decode($resp);
                    return ([
                        'status' => 203,
                        'data' => '',
                        'message' => $hotels->error->message ?? '',
                    ]);
                    break;
                case 200:  # OK
                    $hotels = json_decode($resp);
                    return ([
                        'status' => 200,
                        'data' => $hotels
                    ]);
                    break;
                default:
                    return ([
                        'status' => $http_code,
                        'data' => ''
                    ]);
            }
        }
        curl_close($curl);
    } catch (Exception $ex) {
        return ([
            'status' => 'error',
            'message' => "Error while sending request, reason: %s\n", $ex->getMessage()
        ]);
    }
}



