<?php

namespace App\Helpers;

class Eweblink
{
    // Creating amadeus token
    public static function token($_APIPROVIDER)
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
                CURLOPT_POSTFIELDS => 'client_id=2ZMwEqSDgc9EReVyeLW6UqqPZyhLJbRv&client_secret=j8a8QhAi4eYrtZyL&grant_type=client_credentials',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded'
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $accessresponse = json_decode($response, true);
            return $accessresponse;
        } else{
            return false;
        }
    }
}
