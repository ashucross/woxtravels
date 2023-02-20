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
                CURLOPT_POSTFIELDS => 'client_id=kQ8QvQGMS9WKLjN9xXLpNutDGbA1tYwE&client_secret=S9dJS4uesj1sqAWS&grant_type=client_credentials',
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

    function getFileName($fileName){

        $path = base_path('public/img/airline');
        $files = File::allFiles($path);
        $output ='';
        foreach($files as $file){
            $file1 = pathinfo($file);
            if($file1['filename'] == $fileName){
                $output = $file1['basename'];
            }
        }
        if($output){
            return url('img/airline').'/'.$output;
        }
         return $output;
    }

}
