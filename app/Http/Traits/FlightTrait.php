<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Models\Airport;
use App\Models\FlightSearch;
use App\Helpers\Eweblink;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Services\FlightServices;

trait FlightTrait
{

    private FlightServices $flightServices;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private $Token;
    private $sessionId;
    public function __construct(FlightServices $flightServices)
    {
        $this->flightServices = $flightServices;
        $this->sessionId = Session::getId();
        $_TOKEN = EwebLink::token('amadeus');
        $this->Token = $_TOKEN['access_token'];
        // dd($this->Token);
    }
    public function index(Request $request)
    {

        // dd($this->sessionId);
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
        return view('flight.flight', compact('data'));
    }
    // Get Airport List
    public function airport(Request $request)
    {
        try {
            $Airports = Airport::where('airport_code', 'LIKE', '%' . $request->airport)
                ->orWhere('airport_city', 'LIKE', $request->airport . '%')
                ->orderBy('airport_city', 'asc')->limit(5)->get();
            return response(["status" => 200, "message" => 'record found', 'airports' => $Airports], 200);
        } catch (\Exception $e) {
            return response(["status" => 500, "statuscode" => 500, "message" => $e->getMessage()], 500);
        }
    }
    // Get Flight Search list
    public function flightSearch(Request $request)
    {
        try {
            $sourceName = $request->sourceName;
            $sourceCode = $request->sourceCode;
            $destiName = $request->destinationName;
            $destiCode = $request->destinationCode;
            $adult = $request->qnty_adult;
            $child = $request->qntyChild;
            $infant = $request->qntyInfant;
            $Search = array(
                'sourceName' => $sourceName,
                'destiName' => $destiName,
                'dates' => $request->ckein,
                'Cabin' => $request->Cabin,
                'adult' => $request->qnty_adult,
                'Child' => $request->qntyChild,
                'Infant' => $request->qntyInfant,
            );
            $date = explode(' - ', $request->ckein);
            //dd($date);
            $_departDate = date_create($date[0]);
            if (count($date) > 1) {
                $_returnDate = date_create($date[1]);
                $retD = date_format($_returnDate, "Y-m-d");
            } else {
                $retD = '';
            }
            $deptD = date_format($_departDate, "Y-m-d");
            $sourceCode = $request->sourceCode;
            $sourceCode = $request->sourceCode;
            $sourceCode = $request->sourceCode;
            if ($retD != '') {
                $url = $sourceCode . '&destinationLocationCode=' . $destiCode . '&departureDate=' . $deptD . '&returnDate=' . $retD . '&adults=' . $adult . '&children=' . $child . '&infants=' . $infant . '&max=10&currencyCode=USD';
            } else {
                $url = $sourceCode . '&destinationLocationCode=' . $destiCode . '&departureDate=' . $deptD . '&adults=' . $adult . '&children=' . $child . '&infants=' . $infant . '&max=10&currencyCode=USD';
            }
            // API Call
            $curlF = curl_init();
            curl_setopt_array($curlF, array(
                CURLOPT_URL => env('FLIGHT_API_URL') . 'shopping/flight-offers?originLocationCode=' . $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded'
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $this->Token . ''
                ),
            ));

            $response = curl_exec($curlF);
            curl_close($curlF);
            $dataArray = json_decode($response, true);
            // Multi row insert start
            $flights = array();
            if ($request->session()->has('token')) {
                $tokenId = $request->session()->get('token');
            } else {
                $request->session()->put('token', $this->sessionId);
                $tokenId = $request->session()->get('token');
            }
            $request->session()->put('source', $sourceName);
            $request->session()->put('destination', $destiName);

            foreach ($dataArray['data'] as $data) {

                $noOfStops = count($data['itineraries'][0]['segments']);
                if ($retD != '') {
                    $returnnoOfStops = count($data['itineraries'][1]['segments']);
                    $flights[] = array(
                        'FS_search' => json_encode($Search),
                        'FS_date' => $data['itineraries'][0]['segments'][0]['departure']['at'],
                        'FS_airlines' => $data['itineraries'][0]['segments'][0]['carrierCode'],
                        'FS_price' => $data['price']['total'],
                        'FS_departure' => $data['itineraries'][0]['segments'][0]['departure']['at'],
                        'FS_arrival' => $data['itineraries'][0]['segments'][0]['arrival']['at'],
                        'FS_stops' => $noOfStops - 1,
                        'FS_departLocation' => $data['itineraries'][0]['segments'][0]['departure']['iataCode'],
                        'FS_arrivalLocation' => $data['itineraries'][0]['segments'][$noOfStops - 1]['arrival']['iataCode'],
                        'FS_duration' => $data['itineraries'][0]['duration'],
                        'FS_flightInformation' => json_encode($data['itineraries'][0]['segments']),
                        'FS_faredetailrule' => '',
                        'FS_baggesinformation' => '',
                        'FS_cancelchangerule' => '',

                        'FS_returndate' => $data['itineraries'][1]['segments'][0]['departure']['at'],
                        'FS_returnairlines' => $data['itineraries'][1]['segments'][0]['carrierCode'],
                        'FS_returndeparture' => $data['itineraries'][1]['segments'][0]['departure']['at'],
                        'FS_returnarrival' => $data['itineraries'][1]['segments'][0]['arrival']['at'],
                        'FS_returnstops' => $returnnoOfStops - 1,
                        'FS_returndepartLocation' => $data['itineraries'][1]['segments'][0]['departure']['iataCode'],
                        'FS_returnarrivalLocation' => $data['itineraries'][1]['segments'][$returnnoOfStops - 1]['arrival']['iataCode'],
                        'FS_returnduration' => $data['itineraries'][1]['duration'],
                        'FS_returnflightInformation' => json_encode($data['itineraries'][1]['segments']),
                        'FS_returnfaredetailrule' => '',
                        'FS_returnbaggesinformation' => '',
                        'FS_returncancelchangerule' => '',

                        'FS_return' => 1,
                        'FS_sessionid' => $tokenId,
                        'flight_uniq_id' => $data['id']
                    );
                } else {
                    $returnnoOfStops = count($data['itineraries'][0]['segments']);
                    $flights[] = array(
                        'FS_search' => json_encode($Search),
                        'FS_date' => $data['itineraries'][0]['segments'][0]['departure']['at'],
                        'FS_airlines' => $data['itineraries'][0]['segments'][0]['carrierCode'],
                        'FS_price' => $data['price']['total'],
                        'FS_departure' => $data['itineraries'][0]['segments'][0]['departure']['at'],
                        'FS_arrival' => $data['itineraries'][0]['segments'][0]['arrival']['at'],
                        'FS_stops' => $noOfStops - 1,
                        'FS_departLocation' => $data['itineraries'][0]['segments'][0]['departure']['iataCode'],
                        'FS_arrivalLocation' => $data['itineraries'][0]['segments'][$noOfStops - 1]['arrival']['iataCode'],
                        'FS_duration' => $data['itineraries'][0]['duration'],
                        'FS_flightInformation' => json_encode($data['itineraries'][0]['segments']),
                        'FS_faredetailrule' => '',
                        'FS_baggesinformation' => '',
                        'FS_cancelchangerule' => '',
                        'FS_return' => 0,
                        'FS_sessionid' => $tokenId
                    );
                }
            }
            // die;
            FlightSearch::where('FS_sessionid', $tokenId)->delete();
            FlightSearch::insert($flights);

            $request->session()->put('flights', $dataArray);
            return response(["status" => 200, "message" => 'record found', 'airports' => $dataArray], 200);
        } catch (\Exception $e) {
            return response(["status" => 500, "statuscode" => 500, "message" => $e->getMessage()], 500);
        }
    }

    public function flightList(Request $request)
    {
        // dd($this->sessionId);
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
        $tokenId = $request->session()->get('token');
        $flights =  FlightSearch::where('FS_sessionid', $tokenId)->get();
        // Get
        $Location = array(
            'source' => $request->session()->get('source'),
            'destination' => $request->session()->get('destination'),
        );
        $price = array(
            'MinPrice' => FlightSearch::min('FS_price'),
            'MaxPrice' => FlightSearch::max('FS_price'),
        );
        $Airlines = FlightSearch::select('FS_airlines', DB::raw('MIN(FS_price) as price'))->where('FS_sessionid', $tokenId)->groupBy('FS_airlines')->get();
        $Stops = array(
            '0stop' => FlightSearch::select(DB::raw('MIN(FS_price) as price'))->where('FS_sessionid', $tokenId)->where('FS_stops', 0)->get(),
            '1stop' => FlightSearch::select(DB::raw('MIN(FS_price) as price'))->where('FS_sessionid', $tokenId)->where('FS_stops', 1)->get(),
            '1+stop' => FlightSearch::select(DB::raw('MIN(FS_price) as price'))->where('FS_sessionid', $tokenId)->where('FS_stops', '>', 1)->get(),
        );
        // dd($flights);
        return view('flight.flightlist', compact('data', 'flights', 'price', 'Stops', 'Airlines', 'Location'));
    }


    public function flightBooking($id)
    {
        // dd($this->sessionId);
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
        $id = Crypt::decryptString($id);
        $fly =  FlightSearch::where('FS_id', $id)->first();
        $flightName = $this->flightServices->getFlightName($fly->FS_airlines);
        $flightDetails = $this->flightServices->getFlightDetails($flightName->id);
        return view('flight.review-booking', compact('data', 'fly', 'flightDetails', 'flightName'));
    }


    public function flight_order(Request $request)
    {

        dd($request->all());
        $id = Crypt::decryptString($id);
        $fly =  FlightSearch::where('FS_id', $id)->first();

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://test.api.amadeus.com/v1/booking/flight-orders",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode(array(
            "data" => array(
              "type" => "flight-order",
              "flightOffers" => array(
                array(
                  "id" => $flight_offer_id
                )
              ),
              "travelers" => array(
                array(
                  "id" => "1",
                  "dateOfBirth" => "1982-01-16",
                  "name" => array(
                    "firstName" => "John",
                    "lastName" => "Doe"
                  ),
                  "gender" => "MALE",
                  "contact" => array(
                    "emailAddress" => "john.doe@example.com",
                    "phones" => array(
                      array(
                        "deviceType" => "MOBILE",
                        "countryCallingCode" => "33",
                        "number" => "600000001"
                      )
                    )
                  )
                )
              ),
              "remarks" => array(
                "general" => array(
                  "type" => "SITI",
                  "text" => "Please note that this booking was made via the Amadeus API"
                )
              ),
              "contacts" => array(
                array(
                  "addresseeName" => "John Doe",
                  "streetName" => "Baker Street",
                  "buildingNumber" => "221B",
                  "postalCode" => "NW1 6XE",
                  "cityName" => "London",
                  "countryCode" => "GB",
                  "purpose" => "STAY"
                )
              )
            )
          )),
          CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $this->Token . '',
            "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        dd($response);
        $err = curl_error($curl);


    }
}
