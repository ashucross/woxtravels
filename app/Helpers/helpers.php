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

    function searchHotel($data){
        $signature = $data;
        $apiKey = env('HOTEL_API_KEY');
        $Secret = env('HOTEL_SECRET_KEY');
        $endpoint = "https://api.test.hotelbeds.com/hotel-api/1.0/hotels";
        $post = [
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


