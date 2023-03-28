<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\HotelsData;
use App\Models\HotelFacilities;
use App\Models\RegionalSetting;
use App\Models\HotelDestination;
use Illuminate\Support\Facades\Session;

use DB;

class StayController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private $Token;
    private $sessionId;
    public function __construct()
    {
        //
        $this->sessionId = Session::getId();
    }

    public function submit_contact_form(Request $request)
    {
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $mobile = $request->mobile;
        $message = $request->message;
        $msg = "Woxtavel : Contact us request # By " . $firstname . ' ' . $lastname . '. Email : ' . $email;
        sendWhatsAppMessage($msg . '. Message : ' . $message, env('ADMIN_WHATSAPP_NUMBER'));
        return redirect()->back()->with('success', 'Thank you for contacting us, we will get back to you soon.');
    }


    public function index(Request $request)
    {
        // sendWhatsAppMessage('HI test msg','+918894254007');
        // update_currencies();

        ini_set('max_execution_time', '0');
        //dd($this->Token);
        $data = array(
            '_MetaTitle' => 'Hotel',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => 'active',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
        );
        $hotelsdata = [];
        $init = 1;
        $pagination = 12;
        $countries = Countries::get();
        $cities = HotelDestination::get();
        Session::forget('token');
        return view('hotel.hotel', compact('data', 'hotelsdata', 'cities'));
    }
    public function setRegion(Request $request)
    {
        $ip = $request->ip ?? '';
        $language = $request->language ?? '';
        $country = $request->country ?? '';
        $currency = $request->currency ?? '';
        RegionalSetting::updateOrCreate(['ip' => $ip], [
            'language' => $language ?? '',
            'country' => $country ?? '',
            'currency' => $currency ?? '',
        ]);

        return redirect()->back()->with('success', 'Setting saved successfully');
    }
    public function loadMoredata(Request $request)
    {
        $pagination = $request->pagination;
        $init = $request->init;
        $signature = getsignature();
        if ($signature['status'] == 200) {
            $gethotels = getHotel($signature['data'], $pagination, $init);
            $hotelsdata = $gethotels['data'];
            $html = view('loadHotels', compact('hotelsdata'))->render();
            return response()->json([
                'status' => 200,
                'html' => $html
            ]);
        }
    }

    public function search_hotel(Request $request)
    {
        ini_set('max_execution_time', 200);
        $error = '';
        $cities = HotelDestination::get();
        $data = array(
            '_MetaTitle' => 'Search Hotels',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => 'active',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
        );
        $hotels = [];
        $params = $request->all() ?? '';
        $signature = getsignature();
        $search_hotels = [];
        if ($request->session()->has('token')) {
            $tokenId = $request->session()->get('token');
        } else {
            $request->session()->put('token', $this->sessionId);
            $tokenId = $request->session()->get('token');
        }
        if (!empty($signature) && $signature['status'] == 200) {
            $gethotels = searchHotel($signature['data'], $params);
            if ($gethotels['status'] == 203) {
                $error = $gethotels['message'] ?? '';
            } else {
                $hotelsdata = $gethotels['data']->hotels ?? [];
                if (!empty($hotelsdata->hotels) && count($hotelsdata->hotels) > 0) {
                    foreach ($hotelsdata->hotels as $hotel) {
                        $details = getHoteldetail($signature['data'], $hotel);
                        $explode = explode(" ", $details['data']->categoryName);
                        $search_hotels[] = array(
                            'code' => $details['data']->code ?? '',
                            'name' => $details['data']->name ?? '',
                            'categoryName' => $details['data']->categoryName ?? '',
                            'hotelStar' => $explode[0] ?? '',
                            'destinationCode' => $details['data']->destinationCode ?? '',
                            'destinationName' => $details['data']->destinationName ?? '',
                            // 'noDecimalPrice'=> isset($details['data']->noDecimalPrice) ? round($details['data']->noDecimalPrice) :  '',
                            'minRate' => $details['data']->minRate ?? '',
                            'maxRate' => $details['data']->maxRate ?? '',
                            'currency' => $details['data']->currency ?? '',
                            'chain' => $details['hoteldetail']->hotel->chain->description->content ?? '',
                            'address' => $details['hoteldetail']->hotel->address->content ?? '',
                            'postalCode' => $details['hoteldetail']->hotel->postalCode ?? '',
                            'email' => $details['hoteldetail']->hotel->email ?? '',
                            'phones' => !empty($details['hoteldetail']->hotel->phones) && count($details['hoteldetail']->hotel->phones) > 0 ? serialize($details['hoteldetail']->hotel->phones) : '',
                            'ranking' => $details['hoteldetail']->hotel->ranking ?? '',
                            'images' => !empty($details['hoteldetail']->hotel->images) && count($details['hoteldetail']->hotel->images) > 0 ? 'http://photos.hotelbeds.com/giata' . '/' . $details['hoteldetail']->hotel->images[0]->path : '',
                            'web' => $details['hoteldetail']->hotel->web ?? '',
                            'response_data' => json_encode($details['data']),
                            'adult' => $request->adult ?? '',
                            'child' => $request->child ?? '',
                            'childages' => $request->childages ?? '',
                            'rooms' => $request->rooms ?? '',
                            'childages' => json_encode($request->childages) ?? '',
                            'FS_sessionid' => $tokenId
                        );
                    }
                    $totalPer = $request->adult . '-' . $request->child . '-' . json_encode($request->childages) . '-' . $request->rooms;
                    $request->session()->put('totalPer', $totalPer);
                    $request->session()->put('search_hotels', $search_hotels);
                }
            }
        } else {
            $search_hotels = [];
            $totalPer = '';
        }
        return view('hotel.search_hotel', compact('data', 'search_hotels', 'params', 'cities', 'error', 'totalPer'));
    }


    function search_hot(Request $request)
    {
        $orderBy = $request->orderBy ?? '';
        if (!empty($orderBy)) {
            if ($orderBy == 'low') {
                $orderbyval = 'asc';
            } else {
                $orderbyval = 'desc';
            }
            $search_hotels = HotelsData::where('destinationCode', $request->country_select)->orderBy('minRate', $orderbyval)->get();
            $returnHTML = view('filter_search_hotels', compact('search_hotels', 'orderBy'))->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function getSuggestionitems(Request $request)
    {
        $hotels = [];
        $params = $request->all() ?? '';
        $signature = getsignature();

        $pusharr = [];
        $options = '<option value="">Select location</option>';
        if ($signature['status'] == 200) {
            $gethotels = getSuggestionitems($signature['data'], $request->search);
            $hotelsdata = $gethotels['data']->destinations ?? [];
            $destinations = [];
            if (!empty($hotelsdata)) {
                foreach ($hotelsdata as $data) {
                    $options .= "<option>" . $data->name->content . "</option>";
                    /* $destinations['value'] = $data->name->content ?? '';
                     $destinations['code'] = $data->code;
                     $pusharr[] = $destinations; */
                }
            }
            return  response()->json([
                'options' => $options
            ]);
        } else {
            return  response()->json([
                'options' => $options
            ]);
            /*  return ([
                'status'=>$signature['status']
            ]); */
        }
    }
    public function hotelDetails(Request $request, $hotelDetailsGet, $passangers)
    {
        if (!empty($hotelDetailsGet)) {
            $hotel = json_decode($hotelDetailsGet);
            $explodepass = explode('-', $passangers);
            $signature = getsignature();
            $details = getHoteldetail($signature['data'], $hotel);
            $ranking = array(
                'ranking' =>  $details['hoteldetail']->hotel->ranking ?? ''
            );
            $hotelDetails = array(
                'code' => $details['data']->code ?? '',
                'name' => $details['data']->name ?? '',
                'categoryName' => $details['data']->categoryName ?? '',
                'destinationCode' => $details['data']->destinationCode ?? '',
                'destinationName' => $details['data']->destinationName ?? '',
                // 'noDecimalPrice'=> isset($details['data']->noDecimalPrice) ? round($details['data']->noDecimalPrice) :  '',
                'minRate' => $details['data']->minRate ?? '',
                'maxRate' => $details['data']->maxRate ?? '',
                'currency' => $details['data']->currency ?? '',
                'chain' => $details['hoteldetail']->hotel->chain->description->content ?? '',
                'address' => $details['hoteldetail']->hotel->address->content ?? '',
                'postalCode' => $details['hoteldetail']->hotel->postalCode ?? '',
                'email' => $details['hoteldetail']->hotel->email ?? '',
                'phones' => !empty($details['hoteldetail']->hotel->phones) && count($details['hoteldetail']->hotel->phones) > 0 ? serialize($details['hoteldetail']->hotel->phones) : '',
                'ranking' => $details['hoteldetail']->hotel->ranking ?? '',
                'images' => !empty($details['hoteldetail']->hotel->images) && count($details['hoteldetail']->hotel->images) > 0 ? 'http://photos.hotelbeds.com/giata' . '/' . $details['hoteldetail']->hotel->images[0]->path : '',
                'web' => $details['hoteldetail']->hotel->web ?? '',
                'response_data' => json_encode($details['data']),
                'adult' => $explodepass['0'] ?? '',
                'child' => $explodepass['1'] ?? '',
                'rooms' => $explodepass['3'] ?? '',
                'childages' => json_encode($explodepass['2']) ?? '',
            );
            $request->session()->put('passangers', $passangers);
            $request->session()->put('hotelDetails', $hotelDetails);
            $request->session()->put('detailsset', $details);
            // $request->session()->put('ranking', $ranking);
            $data = array(
                '_MetaTitle' => 'Hotel Detail',
                '_MetaKeywords' => '',
                '_MetaDescription' => '',
                '_Flight' => '',
                '_Hotel' => 'active',
                '_Packages' => '',
                '_Visa' => '',
                '_Insurance' => '',
                '_Car' => '',
            );
            return view('hotel.hotelDetails', compact('data', 'hotelDetails', 'details'));
        } else {
        }
    }

    public function book_now(Request $request)
    {
        if (!empty($request->razkey)) {
            $result = checkrates($request->razkey);
            if ($result['status']) {
                if ($result['data']->hotel->rooms[0]->rates[0]->rateType == 'BOOKABLE') {
                    $tokenId = $request->session()->get('token');
                    $hotelDetailsGet = Session::get('hotelDetails');
                    $hotelCompleteDetails = Session::get('detailsset');
                    $passangers = Session::get('passangers');
                    $explodepass = explode('-', $passangers);
                    $rateKey = $result['data']->hotel->rooms[0]->rates[0]->rateKey;
                    $data = array(
                        '_MetaTitle' => 'Book Now',
                        '_MetaKeywords' => '',
                        '_MetaDescription' => '',
                        '_Flight' => '',
                        '_Hotel' => 'active',
                        '_Packages' => '',
                        '_Visa' => '',
                        '_Insurance' => '',
                        '_Car' => '',
                    );
                    return view('hotel.book_now', compact('data', 'rateKey', 'hotelDetailsGet', 'result', 'explodepass', 'hotelCompleteDetails'));
                } else {
                    return response()->json([
                        'status' => 404,
                        'rateKey' => "Room Not Avalable  Try another Room ",
                        'hotelCode' => ''
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'html' => "Server error Try Again! ",
                    'hotelCode' => ''
                ]);
            }
        }
    }




    public function conf_book_now(Request $request)
    {
        $data = $request->all();
        $holderDetails = [
            "name" => $request->first_name_holder,
            "surname" => $request->last_name_holder,
            "email" => $request->holder_email,
            "phone" => $request->mobile_number
        ];
        $rateKey = $request->rateKey;
        $travelers = [];
        if ((array_key_exists("adult", $data))) {
            foreach ($data['adult']  as $key => $adult) {
                $travelers[] = $this->getTravelerDetails($adult);
            }
        }
        if ((array_key_exists("child", $data))) {
            foreach ($data['child']  as $key => $child) {
                $travelers[] = $this->getTravelerDetails($child);
            }
        }
        $booking = bookings($travelers, $rateKey, $holderDetails);
        if ($booking['status'] == 200) {
            $bookingDetails = $booking['data']->booking;
            $bookingId = DB::table('hotel_booking_details')->insert(
                array(
                    'booking_id'     =>   $booking['data']->booking->reference,
                    'booking_reference'   =>   $booking['data']->booking->reference,
                    'booking_date'   =>   $booking['data']->booking->creationDate,
                    'email'   =>    $request->holder_email,
                    'mobile'   =>    $request->mobile_number,
                    'booking_request'   =>   'Dayle',
                    'hotel_code'   =>   $booking['data']->booking->hotel->code,
                    'city_code'   =>    $booking['data']->booking->hotel->destinationCode,
                    'checkin'   =>   $booking['data']->booking->hotel->checkIn,
                    'checkout'   =>   $booking['data']->booking->hotel->checkOut,
                    'room_code'   =>   $booking['data']->booking->hotel->code,
                    'rate_key'   =>   $request->rateKey,
                    'booking_response'   =>   json_encode($booking['data']),
                )
            );
            $bookingId = DB::getPdo()->lastInsertId();
            $url = url('/hotel/confirm/' . $bookingId);
            if (isset($bookingId)) {
                return response()->json([
                    'status' => 200,
                    'url' => $url,
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'sessionDataId' => '',
                    'hotelCode' => '',
                    'message' => $booking['message'],
                ]);
            }
            // return Redirect::route('booking.show, $bookingId')->with( ['data' => $lastBooking] );
            $totalAmount = $booking['data']->booking->totalNet;
            $paymentType = "Hotel Booking";
            // $sessionDataId = CREATE_CHECKOUT_SESSION($totalAmount, 12, $paymentType);
            if (!empty($sessionDataId)) {
                return response()->json([
                    'status' => 200,
                    'sessionDataId' => $sessionDataId,
                    'hotelCode' => $booking,
                    'lastBooking' => $lastBooking,
                    'message' => $booking['message'],
                ]);
            }
        } else {
            return response()->json([
                'status' => 400,
                'sessionDataId' => '',
                'hotelCode' => '',
                'message' => $booking['message'],
            ]);
        }
    }

    public function getTravelerDetails($data)
    {

        $result = [
            "roomId" => $data['roomId'],
            "name" => $data['first_name'],
            "surname" => $data['last_name'],
            "type" => $data['roomType'],
            "age" => $data['age'],

        ];
        return $result;
    }


    public function confirmBookingview(Request $request, $id)
    {
        $data = array(
            '_MetaTitle' => 'Book Now',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => 'active',
            '_Packages' => '',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
        );
        $hotel_booking_details =  DB::table('hotel_booking_details')->select('*')->where('id', $id)->first();
        return view('hotel.hotel-booking-confing', ['hotel_booking_details' => $hotel_booking_details, 'data' => $data]);
    }

    public function hotelfilter(Request $request)
    {
        $old = Session::get('search_hotels');
        dd($old);
        $dar = collect($old);
        $dar1 = [];
        if (request()->get('maxPrice')) {
            $price = request()->get('maxPrice');
            $dar1  = $dar->where('maxRate', '<', $price)->toArray();
        } else if ($request->stars) {
            $selected_stars = $request->stars;
            $datara = implode(",", $selected_stars);
            $starsSet = [];
            foreach ($request->stars as $stars) {
                $starsSet[] = $stars;
            }
            $dar1  = $dar->WhereIn('hotelStar',   $starsSet)->toArray();
        } else if ($request->stars) {
            $selected_stars = $request->stars;
            $datara = implode(",", $selected_stars);
            $starsSet = [];
            foreach ($request->stars as $stars) {
                $starsSet[] = $stars;
            }
            $dar1  = $dar->WhereIn('hotelStar',   $starsSet)->toArray();
        } else {
            $dar1  = $dar->toArray();
        }
        $search_hotels = array_values($dar1);
        $totalPer = Session::get('totalPer');
        $html = view('hotel.filter', compact(['search_hotels', 'totalPer']))->render();
        return response()->json([
            'status' => true,
            'html' => $html,
        ]);
    }
}
