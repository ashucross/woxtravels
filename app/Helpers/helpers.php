<?php

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


    function getHotel($data){
        $signature = $data;
        $apiKey = env('HOTEL_API_KEY');
        $Secret = env('HOTEL_SECRET_KEY');   
        $endpoint = "https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels?fields=all&language=ENG&from=1&to=10&useSecondaryLanguage=false"; 
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

 