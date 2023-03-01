<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Models\Airport;
use App\Models\FlightSearch;
use App\Models\BookingDetail;

use Illuminate\Support\Facades\Session;
// use DB;
use Log;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Services\FlightServices;
use App\Http\Requests\Flight\FlightBookingRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
        $_TOKEN = token('amadeus');
        $this->Token = $_TOKEN['access_token'];
    }
    public function index(Request $request)
    {

        $data = meta_key();
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
            dd($response);
            curl_close($curlF);
            $dataArray = json_decode($response, true);
            $httpcode = curl_getinfo($curlF, CURLINFO_HTTP_CODE);
            if ($httpcode == 200) {
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
                            'flight_uniq_id' => $data['id'],
                            'complete_data' => json_encode($data)

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

                $totalPer = $adult . '-' . $child . '-' . $infant;
                $flightresult1 = addDataSession($dataArray);
                $request->session()->put('totalPer', $totalPer);

                $request->session()->put('flights', $flightresult1);
                return response(["status" => 200, "message" => 'Record found', 'airports' => $dataArray], 200);
            } else {
                return response(["status" => 400, "message" => 'No Record Found! Try Agian', 'airports' => []], 200);
            }
        } catch (\Exception $e) {
            return response(["status" => 500, "statuscode" => 500, "message" => $e->getMessage()], 500);
        }
    }

    public function flightList(Request $request)
    {
        $data = meta_key();
        $tokenId = $request->session()->get('token');
        $flightresult = Session::get('flights');
        $n = 10;
        $flights["data"]  = array_slice($flightresult["data"], 0, -$n);
        $flights["meta"] = $flightresult["meta"];
        $flights["dictionaries"] = $flightresult["dictionaries"];
        $flights["top_data"] = array_slice($flightresult["data"], -$n);
        $calenderresult = "";
        if (array_key_exists('errors', $flightresult)) {
            return redirect()->back()->withErrors([
                'title' => $flightresult['errors'][0]['title'],
                'detail' => $flightresult['errors'][0]['detail']
            ]);
        }
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
        // dd($flightresult);
        return view('flight.flightlist', compact('data', 'flightresult', 'price', 'Stops', 'Airlines', 'Location'));
    }


    public function flightDetails()
    {
        $data = json_decode(request()->get('data'));
        $dictionaries = json_decode(request()->get('dictionaries'));
        $passangers = request()->get('px');
        $sessionData['data'] = $data;
        $sessionData['dictionaries'] = $dictionaries;
        $sessionData['passengers'] = $passangers;
        $explodepass = explode('-', $passangers);
        $ticketsDetailsPricing =  collect($data->travelerPricings)->unique('travelerType')->values();
        foreach ($ticketsDetailsPricing as $key => $price) {
            $details[] = [
                'name' => $price->travelerType,
                'travelerId' => $price->travelerId,
                'total' => $explodepass[$key],
                'amount' => $price->price->total * $explodepass[$key],
                'currency' => $price->price->currency
            ];
        }
        $collection = Collect($details);
        // dd($collection);
        $totalAmount = $collection->sum('amount');
        $totalPassenger = $collection->sum('total');
        $sessionData['ticket_details'] = $collection;
        // Session::put('data',$sessionData);

        $total = [
            'total_amount' => $totalAmount,
            'total_passenger' => $totalPassenger,
            'currency' => $details[0]['currency']
        ];
        $sessionData['total'] = $total;
        $ticketDetails = $details;
        Session::put('data', $sessionData);
        $userFlight = Session::get('data');

        return redirect()->route('flightReview');
    }


    public function flightReview()
    {
        $data = meta_key();
        $userFlight = Session::get('data');
        if ($userFlight) {
            $ticketDetails =     $userFlight['ticket_details'];
            $total = $userFlight['total'];
            $dictionaries = $userFlight['dictionaries'];
            $fly = $userFlight['data'];
            $locations = collect(DB::table('airports')->orderBy('country_name', 'asc')->get())->unique('country_name');
            // return view('Frontend.flights.review',compact('data','dictionaries','ticketDetails','total','locations'));
            return view('flight.review-booking', compact('fly', 'data', 'dictionaries', 'ticketDetails', 'total', 'locations'));
        }
        return redirect()->to('/');
    }


    public function bookingFlight(FlightBookingRequest $request)
    {
        $data = $request->except('__token');
        return $this->bookingInfo($request, $data);
        return response()->json(['succcess' => false, 'message' => 'Please login'], 401);
    }

    public function bookingInfo($request, $data)
    {
        $travelers = [];

        if ((array_key_exists("adult", $data))) {
            foreach ($data['adult']  as $key => $adult) {
                //    dd($adult);
                $travelers[] = $this->getTravelerDetails($adult);
            }
        }
        if ((array_key_exists("child", $data))) {
            foreach ($data['child']  as $key => $child) {
                $travelers[] = $this->getTravelerDetails($child);
            }
        }
        if ((array_key_exists("held_infant", $data))) {
            foreach ($data['held_infant']  as $key => $infant) {
                $travelers[] = $this->getTravelerDetails($infant);
            }
        }
        $userFlight = Session::get('data');
        Session::put('travelers', $travelers);
        $total = $userFlight['total'];
        $travele = $this->ticketBooking($travelers);
        $traveler = json_decode($travele, true);

        Log::info($traveler);
        if (array_key_exists('errors', $traveler)) {
            $errors =  ucfirst(str_replace("_", " ", $traveler["errors"][0]["detail"]));

            return response()->json(['errors' => true, 'errors' => explode(',', $errors)], 400);
        }
        $dataInput['flight_details'] = $traveler;
        $result = bookingsDetails($dataInput);
        $dataOutput = addBookingsDetails($result);
        $booking = BookingDetail::create($dataOutput);
        $contact = [
            'email' => $request->get('email'),
            'contact' => $request->get('phone')
        ];

        return response()->json(['success' => true, 'contact' => $contact, 'total' => $total, 'booking_id' => $booking->id], 200);
    }


    public function ticketBooking($travelers)
    {
        $userFlight = Session::get('data');
        $input['type'] = "flight-order";
        $input['flightOffers'] = [$userFlight['data']];
        $input['travelers'] = $travelers;
        $data1['data'] = $input;
        $url = "https://test.api.amadeus.com/v1/booking/flight-orders";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Accept: application/json",
            'Authorization: Bearer ' . $this->Token . '',
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data1));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }


    public function  bkConfiration($id)
    {
        if (!empty($id)) {
            dd($id);
            $myBooking = BookingDetail::where('id', $id)->first();
            $data = meta_key();
            return view('flight.booking-success', compact('myBooking', 'data'));
        }
    }

    public function bookingConfirm(Request $request)
    {
        // $data = $request->except('_token');
        // $transactionId = $request->get('transaction_id');
        // $curlF = curl_init();
        // curl_setopt_array($curlF, array(
        //     CURLOPT_URL => 'https://api.flutterwave.com/v3/transactions/' . $transactionId . '/verify',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'GET',
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: Bearer FLWSECK_TEST-dca8fdc9d00301ef6def168470a13d10-X'
        //     ),
        // ));
        // $response = curl_exec($curlF);
        // $flightresult = json_decode($response, true);
        // // $traveler = $this->ticketBooking();
        // $booking = BookingDetail::find($request->get('booking_id'));
        // $booking->update([
        //     'status' => 1,
        //     'email' => $flightresult["data"]["customer"]["email"],
        //     'mobile' => $flightresult["data"]["customer"]["phone_number"],
        // ]);
        // $payment['bookingid'] =  $booking->id;
        // $payment['org_amount'] = $flightresult["data"]["charged_amount"];
        // $payment['amount'] = $flightresult["data"]["charged_amount"];
        // $payment['payment_response'] =  $response;
        // $payment['status'] = ($flightresult['data']['status'] == 'successful') ? 1 : 0;
        // PaymentDetail::create($payment);
        // curl_close($curlF);

        // Mail::to($booking->email)->send(new TicketMail($booking));


        return redirect()->to('/booking-success');
    }


    public function getTravelerDetails($data)
    {
        $dob = $data['date_of_birth'] . '-' . $data['date_of_month'] . '-' . $data['date_of_birst_Day'];
        $date = date_create($dob);
        $issuanceDate = $data['passport_Issued_Date'] . '-' . $data['passport_Issued_month'] . '-' . $data['passport_Issued_day'];
        $issuanceDate_ = date_create($issuanceDate);
        $expiryDate = $data['parsportExpire_year'] . '-' . $data['parsportExpire_month'] . '-' . $data['parsportExpire_day'];
        $expiryDate_ = date_create($expiryDate);
        $result = [
            "id" => $data['travelerId'],
            "dateOfBirth" => date_format($date, "Y-m-d"),
            "name" => [
                "firstName" => $data['first_name'],
                "lastName" => $data['last_name']
            ],
            "gender" => $data['gender'],
            "contact" => [
                "emailAddress" => $_POST['contact_email'],
                "phones" => [
                    [
                        "deviceType" => "MOBILE",
                        "countryCallingCode" => "91",
                        "number" => $_POST['mobile_number'],
                    ]
                ]
            ],

            "documents" => [
                [
                    "documentType" => "PASSPORT",
                    "birthPlace" => "Bahrain",
                    "issuanceLocation" => "Bahrain",
                    "issuanceDate" => date_format($issuanceDate_, "Y-m-d"),
                    "number" => $data['passport_number'],
                    "expiryDate" =>  date_format($expiryDate_, "Y-m-d"),
                    "issuanceCountry" => "ES",
                    "validityCountry" => "ES",
                    "nationality" => "ES",
                    "holder" => true
                ]
            ]
        ];

        return $result;
    }



    public function flightfilter(Request $request)
    {

        // $from =  explode('-', $request->input('from'));
        // $to =  explode('-', $request->get('to'));
        // $originLocationCode = $from[0];
        // $destinationLocationCode = $to[0];

        // if ($request->has('srch')) {
        //     $srch         =     $request->input('srch');
        //     if (trim($srch) != '') {
        //         $explodesearc = explode('|', $srch);

        //         $originexplode = explode('-', $explodesearc[0]);

        //         $desexplode = explode('-', $explodesearc[1]);

        //         // $datedeparture = date('Y-m-d', strtotime($explodesearc[2]));
        //         // $returnDate = date('Y-m-d', strtotime($explodesearc[2]));
        //         // if(isset($explodesearc[3])){
        //         // 	$returnDate = date('Y-m-d', strtotime($explodesearc[3]));
        //         // }
        //         $origin = $originexplode[0];
        //         $destination = $desexplode[0];

        //         // $source = $originexplode[1];
        //         $destin = $desexplode;
        //     }
        // }
        // if ($request->has('dep')) {
        //     $datedeparture = Carbon::createFromFormat('d/m/Y', request()->get('dep'))->format('Y-m-d');
        // }


        $old = Session::get('flights');
        $dar = collect($old["data"]);

        $dar1 = [];
        if (request()->get('maxPrice')) {
            $price = request()->get('maxPrice');
            $dar1  = $dar->where('total_price', '<', $price)->toArray();
        } else if (request()->get('includedAirlineCodes')) {

            $flight = request()->get('includedAirlineCodes');
            $dar1  = $dar->where('air_craft', '=', $flight)->toArray();
        } else {
            // var_dump($dar1);die;
            $dar1  = $dar->toArray();
        }
        $flightresult['meta'] = $old["meta"];
        $flightresult['data'] = array_values($dar1);
        $flightresult['dictionaries'] = $old["dictionaries"];
        $calenderresult = "";

        // return view('flight.flightlist', compact('data', 'flightresult', 'price', 'Stops', 'Airlines', 'Location'));

        $html = view('flight.search', compact(['flightresult']))->render();
        return response()->json([
            'status' => true,
            'html' => $html,
        ]);
    }


    public function  inititatePayment($id)
    {
        if (!empty($id)) {
            $myBooking = BookingDetail::where('id', $id)->first();
            $prices = [];
            foreach (json_decode($myBooking->booking_response)->passengers as $key => $passenger) {
                $prices[] = $passenger->price;
            }
            $totalAmount = array_sum($prices);
            // Define the API endpoint URL
            $paymentType = "Flight Booking";
            $sessionDataId = CREATE_CHECKOUT_SESSION($totalAmount, $id, $paymentType);
            return view('flight.payment', compact('sessionDataId'));
            // return view('flight.booking-success', compact('myBooking', 'data'));
        }
    }


    public function payment()
    {

        return view('flight.payment');
    }
}
