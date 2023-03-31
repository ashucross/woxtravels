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
    private $imgUrl;
    private $Token;
    private $sessionId;
    public function __construct()
    {
        //
        $this->imgUrl = env('HOTEL_IMG');
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
        ini_set('max_execution_time', 5000);
        $error = '';
        $cities = HotelDestination::get();
        $data = meta_key();
        $params = $request->all() ?? '';
        $start = 0;
        $end = 0;
        $hotel = getHotelList($params['location'], $start, $end);
        if ($hotel['status'] == 200) {
            $hotelcodescount = $hotel['data']->total;
            $totalpages = ceil($hotelcodescount / 60);
        } else {
            $hotelcodescount = '';
            $totalpages = '';
        }
        $totalPer = $request->adult . '-' . $request->child . '-' . json_encode($request->childages) . '-' . $request->rooms;
        $request->session()->put('totalPer', $totalPer);

        return view('hotel.search_hotel', compact('data', 'hotelcodescount', 'params', 'cities', 'error', 'totalPer', 'totalpages'));
    }

    public function ajaxlisting(Request $request)
    {
        ini_set('max_execution_time', 5000);
        $error = '';
        $cities = HotelDestination::get();
        $data = meta_key();
        $destinations = !empty($_GET['city']) ? $_GET['city'] : 'DEL';
        $start = !empty($_GET['start']) ? $_GET['start'] : 1;
        $end = !empty($_GET['end']) ? $_GET['end'] : 1;
        $hotel = getHotelList($destinations, $start, $end);
        if ($hotel['status'] == 200) {
            $search_hotels = $hotel['data'];
            // dd($search_hotels);
            ob_start();
            if (!empty($search_hotels) && count($search_hotels->hotels) > 0) {
                foreach ($search_hotels->hotels as $hotel) {
                    $params = [
                        'adult' => !empty($_GET['adult']) ? $_GET['adult'] : 0,
                        'child' => !empty($_GET['child']) ? $_GET['child'] : 0,
                        'rooms' => !empty($_GET['rooms']) ? $_GET['rooms'] : 0,
                        'checkIn' =>$_GET['checkIn'],
                        'checkOut' => $_GET['checkOut'] ,
                        'hotel_code' => $hotel->code,
                    ];
                    $gethotels = searchHotel($params);
                    if($gethotels['status'] == 200 ){
                        $resultHotel = $gethotels['data']->hotels->hotels[0];
                    // dd($resultHotel);
                    $image = !empty($hotel->images)  ? array_slice($hotel->images, 0, 1, true)  : '';
                    // dd($hotel);?>
                    <div class="lglist">
                        <div class="list_hotel_img">
                            <div class="lgzoomimg">
                                <a href="#">
                                    <img src="<?= !empty($image) ?   $this->imgUrl.$image[0]->path: asset('public/assets/images/hotel1.png'); ?>" class="img-res" />
                                </a>
                            </div>
                        </div>
                        <div class="list_hotel_txt">
                            <div class="listing_hd_hotel">
                                <h2><span><?= $hotel->name->content ?? '' ?></span>
                                    <?php
                                     $explode = explode("*", $hotel->S2C);
                                    //  dd($explode);
                                    for ($i = 0; $i < $explode[0]; $i++) {
                                        echo '<i
                                        class="fa fa-star"></i>';
                                    } ?> </h2>
                                <ul class="listbt_sml">
                                    <li><a href="#"><?=  $explode[0] . 'STARS' ; ?></a></li>
                                    <li><a href="#"><?= $hotel->destinationCode ?></a></li>
                                </ul>
                                <!-- <ul class="iconsml">
                                    <li>
                                        <span><img src="{{asset('public/assets/images/Pool.png')}}" class="img-res" /></span>
                                        <span>Pool</span>
                                    </li>
                                    <li>
                                        <span><img src="{{asset('public/assets/images/FreeParking.png')}}" class="img-res" /></span>
                                        <span>Free Parking</span>
                                    </li>
                                    <li>
                                        <span><img src="{{asset('public/assets/images/Spa.png')}}" class="img-res" /></span>
                                        <span>Spa</span>
                                    </li>
                                    <li>
                                        <span><img src="{{asset('public/assets/images/Gym.png')}}" class="img-res" /></span>
                                        <span>Gym</span>
                                    </li>
                                    <li>
                                        <span><img src="{{asset('public/assets/images/Restaurant.png')}}" class="img-res" /></span>
                                        <span>Restaurant</span>
                                    </li>
                                    <li>
                                        <span><img src="{{asset('public/assets/images/Bar.png')}}" class="img-res" /></span>
                                        <span>Bar</span>
                                    </li>
                                </ul> -->
                                <div class="green_ex">
                                    <span>
                                        <?php $i = 0;
                                        $rank = (int)$hotel->ranking ?? 0;
                                        ?>
                                        Rank : <?= !empty($rank) ? $rank: 0 ?>
                                        <!--  <i class="fa fa-star"></i> -->

                                        <!-- &nbsp;4.77 (48 reviews) -->
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="pribtns">
                            <div class="priceshow">
                                <h3>
                                    <!-- <i class="fa fa-dollar mr-1"></i> --><?= $hotel->countryCode ?>
                                    <?= $resultHotel->minRate ;?>- <?= $resultHotel->maxRate ?>
                                    <span>per night</span>
                                </h3>
                                <p>Chain : <?= $hotel->chainCode; ?></p>
                                <p>Website : <?= $hotel->web; ?></p>
                            </div>
                            <div class="hotslc">
                                <!-- <a href="{{url('hotelDetails' . '/' .$hotel['response_data'] . '/' .  $totalPer)}}" class="btn-grad ftbtn_src">Book Now<i class="fa fa-angle-right ml5" aria-hidden="true"></i></a> -->
                            </div>
                        </div>
                    </div>
<?php
                    $datare = ob_get_clean();
                    dd($datare);
                                }
                }
            }
        } else {
            $hotelcodescount = '';
            $totalpages = '';
        }

        return json_encode(array('success' => true, 'totalcount' => 0, 'hotelsdata' => $datare, 'filtersMeta' => $filtersMeta, 'mapdata' => $mapdata));
        die;
    }
    // public function search_hotel(Request $request)
    // {
    //     ini_set('max_execution_time', 5000);
    //     $error = '';
    //     $cities = HotelDestination::get();
    //     $data = array(
    //         '_MetaTitle' => 'Search Hotels',
    //         '_MetaKeywords' => '',
    //         '_MetaDescription' => '',
    //         '_Flight' => '',
    //         '_Hotel' => 'active',
    //         '_Packages' => '',
    //         '_Visa' => '',
    //         '_Insurance' => '',
    //         '_Car' => '',
    //     );
    //     $hotels = [];
    //     $params = $request->all() ?? '';
    //     $signature = getsignature();
    //     // dd(hotelApisAminities());
    //     $search_hotels = [];
    //     if ($request->session()->has('token')) {
    //         $tokenId = $request->session()->get('token');
    //     } else {
    //         $request->session()->put('token', $this->sessionId);
    //         $tokenId = $request->session()->get('token');
    //     }
    //     if (!empty($signature) && $signature['status'] == 200) {
    //         $gethotels = searchHotel($signature['data'], $params);
    //         if ($gethotels['status'] == 203) {
    //             $error = $gethotels['message'] ?? '';
    //         } else {
    //             $hotelsdata = $gethotels['data']->hotels ?? [];
    //             if (!empty($hotelsdata->hotels) && count($hotelsdata->hotels) > 0) {
    //                 foreach ($hotelsdata->hotels as $hotel) {
    //                     $details = getHoteldetail($signature['data'], $hotel);
    //                     $ranking[] = $details['hoteldetail']->hotel->ranking ?? '';
    //                     // dd($details['hoteldetail']->hotel->facilities);die;
    //                     $explode = explode(" ", $details['data']->categoryName);
    //                     $search_hotels[] = array(
    //                         'code' => $details['data']->code ?? '',
    //                         'name' => $details['data']->name ?? '',
    //                         'categoryName' => $details['data']->categoryName ?? '',
    //                         'hotelStar' => $explode[0] ?? '',
    //                         'destinationCode' => $details['data']->destinationCode ?? '',
    //                         'destinationName' => $details['data']->destinationName ?? '',
    //                         // 'noDecimalPrice'=> isset($details['data']->noDecimalPrice) ? round($details['data']->noDecimalPrice) :  '',
    //                         'minRate' => $details['data']->minRate ?? '',
    //                         'maxRate' => $details['data']->maxRate ?? '',
    //                         'currency' => $details['data']->currency ?? '',
    //                         'chain' => $details['hoteldetail']->hotel->chain->description->content ?? '',
    //                         'address' => $details['hoteldetail']->hotel->address->content ?? '',
    //                         'postalCode' => $details['hoteldetail']->hotel->postalCode ?? '',
    //                         'email' => $details['hoteldetail']->hotel->email ?? '',
    //                         'phones' => !empty($details['hoteldetail']->hotel->phones) && count($details['hoteldetail']->hotel->phones) > 0 ? serialize($details['hoteldetail']->hotel->phones) : '',
    //                         'ranking' => $details['hoteldetail']->hotel->ranking ?? '',
    //                         'images' => !empty($details['hoteldetail']->hotel->images) && count($details['hoteldetail']->hotel->images) > 0 ? 'http://photos.hotelbeds.com/giata' . '/' . $details['hoteldetail']->hotel->images[0]->path : '',
    //                         'web' => $details['hoteldetail']->hotel->web ?? '',
    //                         'response_data' => json_encode($details['data']),
    //                         'facilities' => $details['hoteldetail']->hotel->facilities ?? '',
    //                         'adult' => $request->adult ?? '',
    //                         'child' => $request->child ?? '',
    //                         'childages' => $request->childages ?? '',
    //                         'rooms' => $request->rooms ?? '',
    //                         'childages' => json_encode($request->childages) ?? '',
    //                         'FS_sessionid' => $tokenId
    //                     );
    //                 }
    //                 $totalPer = $request->adult . '-' . $request->child . '-' . json_encode($request->childages) . '-' . $request->rooms;
    //                 $request->session()->put('totalPer', $totalPer);
    //                 $request->session()->put('search_hotels', $search_hotels);
    //                 $request->session()->put('ranking', $ranking);
    //             }
    //         }
    //     } else {
    //         $search_hotels = [];
    //         $totalPer = '';
    //     }
    //     return view('hotel.search_hotel', compact('data', 'search_hotels', 'params', 'cities', 'error', 'totalPer'));
    // }


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
        $dar = collect($old);
        $dar1 = [];
        // if($request->Excellent &&  $request->stars){
        //     $starsSet = [];
        //     foreach ($request->stars as $stars) {
        //         $starsSet[] = $stars;
        //     }
        //     $selectedExcellent = $request->Excellent;
        //     $Excellents = [];
        //     foreach ($selectedExcellent as $Excellent) {
        //         $Excellents[] = $Excellent;
        //     }
        //     $dar1  = $dar->WhereIn('hotelStar',   $starsSet)->WhereIn('ranking',   $Excellents)->toArray();
        //     dd($dar);
        // }die;
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
        } else if ($request->Excellent) {
            $selectedExcellent = $request->Excellent;
            $starsSet = [];
            foreach ($selectedExcellent as $Excellent) {
                $starsSet[] = $Excellent;
            }
            $dar1  = $dar->WhereIn('ranking',   $starsSet)->toArray();
        } elseif ($request->orderbyFilter) {
            if ($request->orderbyFilter == 'low') {
                // Sort by age in ascending order
                $dar1 = $dar->sortBy('maxRate')->toArray();
            } else {
                // Sort by age in descending order
                $dar1 = $dar->sortByDesc('maxRate')->toArray();
            }
        } elseif ($request->low) {
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
