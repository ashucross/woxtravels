<?php

use App\Models\Airport;
use App\Models\Countries;
use App\Models\Curren_Cies;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Twilio\Rest\Client;

function sendWhatsAppMessage(string $message, string $recipient)
{
    $twilio_whatsapp_number = env('TWILIO_WHATSAPP_NUMBER');
    $account_sid = env("TWILIO_SID");
    $auth_token = env("TWILIO_AUTH_TOKEN");
    $client = new Client($account_sid, $auth_token);
    $res = $client->messages
        ->create(
            'whatsapp:' . $recipient, // to
            [
                "from" => 'whatsapp:' . $twilio_whatsapp_number,
                "body" => $message
            ]
        );
    return $res;
}

function listenToReplies(Request $request)
{
    $from = $request->input('From');
    $body = $request->input('Body');

    $client = new \GuzzleHttp\Client();
    try {
        $response = $client->request('GET', "https://api.github.com/users/$body");
        $githubResponse = json_decode($response->getBody());
        if ($response->getStatusCode() == 200) {
            $message = "*Name:* $githubResponse->name\n";
            $message .= "*Bio:* $githubResponse->bio\n";
            $message .= "*Lives in:* $githubResponse->location\n";
            $message .= "*Number of Repos:* $githubResponse->public_repos\n";
            $message .= "*Followers:* $githubResponse->followers devs\n";
            $message .= "*Following:* $githubResponse->following devs\n";
            $message .= "*URL:* $githubResponse->html_url\n";
            sendWhatsAppMessage($message, $from);
        } else {
            sendWhatsAppMessage($githubResponse->message, $from);
        }
    } catch (RequestException $th) {
        $response = json_decode($th->getResponse()->getBody());
        sendWhatsAppMessage($response->message, $from);
    }
    return;
}


function getsignature()
{
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $signature = hash("sha256", $apiKey . $Secret . time());
    $endpoint =  env('HOTEL_API_URL1') . "status";
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

function getcountries()
{
    $countries = Countries::get();
    return $countries;
}
function getcurrencies()
{
    $currencies = Curren_Cies::get();
    return $currencies;
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
    if (!empty($currencies)) {
        foreach ($currencies as $key => $curr) {
            $exists = Curren_Cies::where('code', $key)->first();
            if ($exists) {
                Curren_Cies::where('code', $key)->update([
                    'code' => $key,
                    'value' => $curr
                ]);
            } else {
                Curren_Cies::create([
                    'code' => $key,
                    'value' => $curr
                ]);
            }
        }
    }
    echo 'currencies updated';
    die;
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
    // var_dump($country);
    $airports = DB::table('airports')->where(['country_code' => $country, 'city_code' => $city])->first();
    return $airports ?? '';
}
function getdestinationName($code)
{
    $destiantion = DB::table('hotel_destinations')->where(['code' => $code,])->first();
    return $destiantion->name ?? '';
}

function getHoteldetail($hotel = null)
{
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $endpoint = "https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels/" . $hotel->code . "/details?language=ENG&useSecondaryLanguage=False";

    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json', 'Api-key:' . $apiKey . '', 'X-Signature:' .  getsignature()['data']  . '', 'Content-Type:application/json'],
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


function getHotelList($destination, $start, $end)
{
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('HOTEL_API_URL2') . 'hotels?fields=all&destinationCode=' . $destination . '&language=ENG&from=' . $start . '&to=' .  $end . '&useSecondaryLanguage=false',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type:application/json',
                'Accept: application/json',
                'Api-key:' . $apiKey . '',
                'X-Signature:' . getsignature()['data'] . '',
                'Accept-Encoding:gzip'
            ),
        ));
        $resp = curl_exec($curl);
        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    $hotel = json_decode($resp);
                    return ([
                        'status' => 200,
                        'data' => $hotel,
                    ]);
                    break;
                default:
                    return ([
                        'status' => $http_code,
                        'data' => '',
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

// function searchHotel( $params = null)
// {

//     $apiKey = env('HOTEL_API_KEY');
//     $Secret = env('HOTEL_SECRET_KEY');
//     $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/hotels";
//     // $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/hotels";

//     // $dates = explode('-', $params['checkin']);
//     $post = [
//         'stay' => ([
//             "checkIn" => date('Y-m-d', strtotime($params['checkIn'])),
//             "checkOut" =>  date('Y-m-d', strtotime($params['checkOut']))
//         ]),
//         "occupancies" => array([
//             "rooms" => (int)$params['rooms'],
//             "adults" => (int)$params['adult'],
//             "children" => (int)$params['child']
//         ]),
//         "hotels" => ([
//             "hotel" =>
//             [
//                 (int)$params['hotel_code']
//             ]
//         ]),
//         // "destination" => ([
//         //     "code" => 'DEL'
//         // ]),
//     ];
//     // dd($post);
//     try {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_POST => true,
//             CURLOPT_RETURNTRANSFER => 1,
//             CURLOPT_URL => $endpoint,
//             CURLOPT_HTTPHEADER => ['Accept:application/json', 'Api-key:' . $apiKey . '', 'X-Signature:' . getsignature()['data'] . '', 'Content-Type:application/json'],
//             CURLOPT_POSTFIELDS => json_encode($post)
//         ));
//         $resp = curl_exec($curl);
//         // dd($resp);
//         if (!curl_errno($curl)) {
//             switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
//                 case 400:  # Fail
//                 $hotels = json_decode($resp);
//                 return ([
//                     'status' => 203,
//                     'data' => '',
//                     'message' => $hotels->error->message ?? '',
//                 ]);
//                 break;
//                 case 200:  # OK
//                 dd($resp);
//                     $hotels = json_decode($resp);
//                     return ([
//                         'status' => 200,
//                         'data' => $hotels
//                     ]);
//                     break;
//                 default:

//                     return ([
//                         'status' => $http_code,
//                         'data' => ''
//                     ]);
//             }
//         }
//         curl_close($curl);
//     } catch (Exception $ex) {
//         return ([
//             'status' => 'error',
//             'message' => "Error while sending request, reason: %s\n", $ex->getMessage()
//         ]);
//     }
// }
function searchHotel( $params = null)
{
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/hotels";
    // $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/hotels";

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
        ]),
        "filter" => ([
            "maxHotels" => 53
        ]),

    ];
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => ['Accept:application/json', 'Api-key:' . $apiKey . '', 'X-Signature:' . getsignature()['data'] . '', 'Content-Type:application/json'],
            CURLOPT_POSTFIELDS => json_encode($post)
        ));
        $resp = curl_exec($curl);
        // dd($resp);
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



function getHotelImage($hotelCode, $data)
{
    $signature = $data;
    $apiKey = env('HOTEL_API_KEY');
    $Secret = env('HOTEL_SECRET_KEY');
    // Set up the API endpoint and request parameters
    $url = "https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels/{$hotelCode}/details";

    try {
        // Set up the cURL request
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            // CURLOPT_URL => $url . "?" . http_build_query($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                'Api-key:' . $apiKey . '',
                'X-Signature:' . $signature . ''
            ),
        ));

        // Execute the cURL request and get the response
        $response = curl_exec($curl);
        // dd($response)
        // Check for errors
        if (curl_errno($curl)) {
            echo "cURL error: " . curl_error($curl);
        }

        // Close the cURL request
        curl_close($curl);

        if (!curl_errno($curl)) {
            switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
                case 400:  # Fail
                    $responseData = json_decode($response, true);
                    return ([
                        'status' => 203,
                        'data' => '',
                        'message' => $responseData->error->message ?? '',
                    ]);
                    break;
                case 200:  # OK
                    $responseData = json_decode($response, true);
                    return ([
                        'status' => 200,
                        'data' => $responseData
                    ]);
                    break;
                default:
                    return ([
                        'status' => $http_code,
                        'data' => ''
                    ]);
            }
        }
    } catch (Exception $ex) {
        return ([
            'status' => 'error',
            'message' => "Error while sending request, reason: %s\n", $ex->getMessage()
        ]);
    }
}


function checkrates($rate_key)
{
    $apiKey = env('HOTEL_API_KEY');
    $sharedSecret = env('HOTEL_SECRET_KEY');
    $signature = hash("sha256", $apiKey . $sharedSecret . time());
    $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/checkrates";

    $r = array(
        'Content-Type:application/json',
        'Accept: application/json',
        'Api-key:' . $apiKey,
        'X-Signature:' . $signature,
        'Accept-Encoding:gzip'
    );

    $post = [
        "rooms" => array([
            "rateKey" => $rate_key,
        ]),
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



function bookings($travelers, $rate_key, $holderDetails)
{
    $apiKey = env('HOTEL_API_KEY');
    $sharedSecret = env('HOTEL_SECRET_KEY');
    $signature = hash("sha256", $apiKey . $sharedSecret . time());
    $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/bookings";
    $post = array(
        "holder" => $holderDetails,
        "rooms" => array(
            array(
                "rateKey" => $rate_key,
                "paxes" => $travelers
            ),
        ),
        "clientReference" => "IntegrationAgency",
        "remark" => "Booking remarks are to be written here.",
        "tolerance" => 2.00
    );
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
        // dd($resp);
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
                        'data' => $hotels,
                        'message' => 'true',
                    ]);
                    break;
                default:
                    $hotels = json_decode($resp);
                    return ([
                        'status' => $http_code,
                        'data' => '',
                        'message' => $hotels->error->message ?? '',
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

function hotelApisAminities()
{
    $apiKey = env('HOTEL_API_KEY');
    $sharedSecret = env('HOTEL_SECRET_KEY');
    $signature = hash("sha256", $apiKey . $sharedSecret . time());
    $r = array(
        'Content-Type:application/json',
        'Accept: application/json',
        'Api-key:' . $apiKey,
        'X-Signature:' . $signature,
        'Accept-Encoding:gzip'
    );
    //  dd($r);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/facilities',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type:application/json',
            'Accept: application/json',
            'Api-key:d0f27614d49932fcdc296ce8bcfffb42',
            'X-Signature:' . $signature . '',
            'Accept-Encoding:gzip'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $accessresponse = json_decode($response, true);
    return $accessresponse;
}

function rankings()
{
    $apiKey = env('HOTEL_API_KEY');
    $sharedSecret = env('HOTEL_SECRET_KEY');
    $signature = hash("sha256", $apiKey . $sharedSecret . time());
    $r = array(
        'Content-Type:application/json',
        'Accept: application/json',
        'Api-key:' . $apiKey,
        'X-Signature:' . $signature,
        'Accept-Encoding:gzip'
    );
    //  dd($r);
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/categories',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type:application/json',
            'Accept: application/json',
            'Api-key:d0f27614d49932fcdc296ce8bcfffb42',
            'X-Signature:' . $signature . '',
            'Accept-Encoding:gzip'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $accessresponse = json_decode($response, true);
    return $accessresponse;
}



function voucher()
{

    // Replace these with your own values
    $apiKey = env('HOTEL_API_KEY');
    $apiSecret = env('HOTEL_SECRET_KEY');
    $bookingReference = '270-324200';
    $languageCode = 'en';

    // Build the request URL
    $url = 'https://api.test.hotelbeds.com/hotel-api/1.0/bookings/' . $bookingReference . '/voucher';
    $url .= '?language=' . $languageCode;

    // Set up the authorization header
    $authHeader = 'Api-Key: ' . $apiKey . "\r\n";
    $authHeader .= 'X-Signature: ' . hash('sha256', $apiKey . $apiSecret . time()) . "\r\n";

    // Make the request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($authHeader));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    dd($response);
    curl_close($ch);

    // Parse the response and extract the voucher details
    $voucherData = json_decode($response, true);
    $voucherCode = $voucherData['voucher']['code'];
    $voucherUrl = $voucherData['voucher']['pdf'];
}



function compareNumbersByDigit($a, $b)
{
    $aDigits = str_split((string) $a); // Convert $a to a string and split it into an array of digits
    $bDigits = str_split((string) $b); // Convert $b to a string and split it into an array of digits

    $numDigits = max(count($aDigits), count($bDigits)); // Determine the maximum number of digits in $a and $b

    // Loop through each digit position, starting from the left
    for ($i = 0; $i < $numDigits; $i++) {
        $aDigit = $aDigits[$i] ?? 0; // Get the $i-th digit of $a, or 0 if it doesn't exist
        $bDigit = $bDigits[$i] ?? 0; // Get the $i-th digit of $b, or 0 if it doesn't exist

        // If the digits are not equal, return the comparison result
        if ($aDigit !== $bDigit) {
            return $aDigit <=> $bDigit; // Compare the digits using the spaceship operator
        }
    }

    // If all digits are equal, return the original comparison result
    return $a <=> $b;
}
