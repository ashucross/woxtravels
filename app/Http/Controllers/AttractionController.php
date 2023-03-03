<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locations;
use App\Models\Packages;
use App\Models\PackageGallery;
use App\Models\PackageItineraries;
use App\Models\Addons;
use App\Models\PackageHotels;
use App\Models\Exclusions;
use App\Models\Inclusion;


class AttractionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        $Locations = Locations::select('id', 'name', 'dest_type', 'slug')->where('is_active', 1)
            ->orderBy('name', 'asc')->get();
        $Destinations = array();
        foreach ($Locations as $LOC) {
            $Destinations[$LOC->name] = array(
                'id' => $LOC->id,
                'slug' => $LOC->slug,
                'type' => $LOC->dest_type
            );
        }
        $data = array(
            '_MetaTitle' => 'Packages',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => 'active',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
            'destinations' => json_encode($Destinations)
        );
        // dd($data);
        return view('packages', compact('data'));
    }

    public function packageList(Request $request)
    {
        $destination = $request->destination;
        $Locations = Locations::select('id', 'name', 'dest_type')->where('slug', $destination)->first();
        $Packages = Packages::select('id', 'type', 'destination', 'package_name', 'tour_code', 'package_image_alt', 'package_image', 'no_of_nights', 'details_day_night', 'no_of_days', 'sales_price', 'offer_price', 'city', 'slug')->where('destination', $Locations->id)->orderBy('package_name', 'asc')->get();
        $data = array(
            '_MetaTitle' => 'Packages',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => 'active',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
            'location' => $Locations,
            'packages' => $Packages
        );
        return view('packageList', compact('data'));
    }

    public function details(Request $request)
    {

        $PkgDetls = Packages::where('slug', collect(request()->segments())->last())->orderBy('package_name', 'asc')->first();

        $inclusions = Inclusion::whereIn('id', explode(",", $PkgDetls->package_inclusions))->get();
        // dd($PkgDetls);
        $exclusions = Exclusions::whereIn('id', explode(",", $PkgDetls->package_exclusions))->get();
        $packageItineraries = PackageItineraries::where('package_id', $PkgDetls->id)->get();
        $packageGallery = PackageGallery::where('package_id', $PkgDetls->id)->get();
        $hotels = PackageHotels::select('hotels.id', 'hotels.name as hotelName', 'hotels.image_alt', 'hotels.image', 'hotels.description', 'hotels.amenities', 'hotels.help_line_no', 'hotels.email', 'hotels.address')->join('hotels', 'hotels.id', '=', 'package_hotels.hotel_name')->where('package_hotels.package_id', $PkgDetls->id)->get();
        $addon = Addons::whereIn('id', explode(",", $PkgDetls->addon))->get();
        $data = array(
            '_MetaTitle' => 'Packages',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => 'active',
            '_Visa' => '',
            '_Insurance' => '',
            '_Car' => '',
            'package' => $PkgDetls,
            'inclusions' => $inclusions,
            'exclusions' => $exclusions,
            'packageItineraries' => $packageItineraries,
            'hotels' => $hotels,
            'addon' => $addon,
            'packageGallery' => $packageGallery
        );
        // dd($data);
        return view('packagesDetails', compact('data'));
    }
}
