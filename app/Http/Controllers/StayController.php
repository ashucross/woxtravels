<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;
use App\Models\HotelsData;
use App\Models\HotelFacilities;
use App\Models\RegionalSetting;
use App\Models\HotelDestination;

class StayController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //
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
        /*  $signature = getsignature();
        foreach($countries as $country){
            $destination = getSuggestionitems($signature['data'],$country->sortname);
            if(!empty($destination['data']->destinations) && count($destination['data']->destinations) > 0){

                foreach($destination['data']->destinations as $dest){
                    $exist = HotelDestination::where('code',$dest->code)->where('country',$country->sortname)->first();
                    if(empty($exist)){
                        HotelDestination::create([
                            'code'=>$dest->code,
                            'country'=>$country->sortname,
                            'name'=>$dest->name->content ?? '',
                        ]);
                    }
                }
            }

        }echo 'done';die; */
        /* $signature = getsignature();
        $gethotels = getSuggestionitems($signature['data'],'IN');
            dd($gethotels); */
        /* $signature = getsignature();
        foreach($countries as $country){
            $destination = getCountries($signature['data'],$country->sortname);
            foreach($destination['data']->destinations as $dest){
                HotelDestination::updateOrCreate(['code'=>$dest->code,'country'=>$country->sortname],[
                    'name'=>$dest->name->content ?? '',
                    'code'=>$dest->code,
                    'country'=>$country->sortname,
                ]);
            }

        }
         echo 'yes';die;
        if($signature['status'] == 200){
            $gethotels = getHotel($signature['data'],$pagination,$init);
            $hotelsdata = $gethotels['data'];
            dd($hotelsdata);
        }else{
            return ([
                'status'=>$signature['status']
            ]);
        }  */
        return view('hotel', compact('data', 'hotelsdata', 'cities'));
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
        // dd($params);
        $search_hotels = [];
        if (!empty($signature) && $signature['status'] == 200) {
            $gethotels = searchHotel($signature['data'], $params);
            if ($gethotels['status'] == 203) {
                $error = $gethotels['message'] ?? '';
            } else {


                $hotelsdata = $gethotels['data']->hotels ?? [];
                if (!empty($hotelsdata->hotels) && count($hotelsdata->hotels) > 0) {
                    foreach ($hotelsdata->hotels as $hotel) {
                        $isexist = HotelsData::where('code', $hotel->code)->first();
                        if (!empty($isexist)) {
                            $search_hotels[] = $isexist;
                        } elseif (empty($isexist)) {
                            $details = getHoteldetail($signature['data'], $hotel);

                            $createdHotel = HotelsData::create([
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
                                 'adult' => $request->adult ?? '',
                                'child' => $request->child ?? '',
                                'rooms' => $request->rooms ?? '',
                                'childages' => json_encode($request->childages) ?? '',
                            ]);
                            //  dd($details['data']);
                            //dd($details['hoteldetail']->hotel->facilities);
                            // if (!empty($details['hoteldetail']->hotel->facilities) && count($details['hoteldetail']->hotel->facilities) > 0) {
                            //     foreach ($details['hoteldetail']->hotel->facilities as $fac) {
                            //         // var_dump($fac);die;
                            //         $code = isset($fac->code) ? $fac->code : '';
                            //         HotelFacilities::updateOrCreate(['hotel_id' => $createdHotel->id, 'code' => $code], [
                            //             'hotel_id' => $createdHotel->id,
                            //             'value' => $fac->name,
                            //         ]);
                            //     }
                            // }

                            $newhotel = HotelsData::where('id', $createdHotel->id)->first();
                            $search_hotels[] = $newhotel;
                        }
                    }
                }
            }
        } else {
            $search_hotels = [];
        }

        return view('search_hotel', compact('data', 'search_hotels', 'params', 'cities', 'error'));
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
    public function hotelDetails(Request $request)
    {
         $segments = $request->segments(1);
         $hotelDetails = HotelsData::where('code', $segments[1])->first();
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
        return view('hotelDetails', compact('data', 'hotelDetails'));
    }

    public function book_now(Request $request)
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
        return view('book_now', compact('data'));
    }
}
