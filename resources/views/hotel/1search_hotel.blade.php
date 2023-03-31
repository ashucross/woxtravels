@extends('homeLayout')
@section('styles')
<style>
    ul.check-boxes-custom.list-checkboxes {
        overflow: visible;
    }
</style>
<!-- page specific style code here-->
<!-- page specific style code here-->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css">
@endsection
@section('pageContent')
<form method="post" id='searchHot' action='{{url("search_hotel")}}'>
    @csrf
    <div class="modifyhead">

        <div class="mobile-filter">

            <ul>

                <li><i class="fa fa-sort"></i>FILTER</li>

                <li><i class="fa fa-plane"></i>AIRLINES </li>

                <li><i class="fa fa-clock-o"></i>TIMES </li>

                <li><i class="fa fa-sort"></i>SORT </li>

            </ul>

        </div>





        <section class="htolst position-relative clearfix">

            <div class="tabsearh_input">

                <div class="boxsearching ">
                    @if(!empty($error))
                    <div class='alert alert-danger'>{{$error ?? ''}}</div>
                    @endif
                    <div class="d-flex justify-content-between">

                        <div class="search_des d-flex justify-content-between ">

                            <div class="Fromwhere position-relative">



                                <div class="position-relative">

                                    <span class="iconint"><i class="fa fa-map-marker"></i></span>
                                    <select type="text" class="input_src leftri input_hgt country_select" required
                                        name="location">
                                        <option value=''>Where are you going ?</option>
                                        @if(!empty($cities))
                                        @foreach($cities as $count)
                                        <option {{!empty($params["location"]) && $params["location"]==$count->code ?
                                            'selected' : ''}} value="{{$count->code ?? ''}}">{{$count->name ?? ''}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <!--  <input type="text" value='{{getdestinationName($params["location"]) ?? ""}}' class="input_src leftri input_hgt" placeholder="Where are you going?" data-toggle="dropdown" /> -->



                                    <!--    <div class="dropdown-menu drp_plane">

                                    <div class="plane_list">

                                        <span>Top Cities</span>

                                        <ul>

                                            <li>

                                                <div class="fli_name"><i class="fa fa-hotel"></i> Delhi

                                                </div>

                                                <div class="airport_name"><span>1214 properties</span><span>India</span></div>

                                            </li>

                                            <li>

                                                <div class="fli_name"><i class="fa fa-hotel"></i> Mumbai

                                                </div>

                                                <div class="airport_name"><span>1214 properties</span><span>India</span></div>

                                            </li>

                                            <li>

                                                <div class="fli_name"><i class="fa fa-hotel"></i> Bengaluru

                                                </div>

                                                <div class="airport_name"><span>1720 properties</span><span>India</span></div>

                                            </li>





                                        </ul>

                                    </div>

                                </div> -->

                                </div>



                            </div>





                        </div>








                        <div class="search_date ht_width_dt">






                            <div class="position-relative ">
                                <span class="iconint"><i class="fa fa-calendar"></i></span>
                                <input aut type="text" name="checkin" value='{{$params["checkin"] ?? ""}}' required
                                    placeholder="Check-In - Check-Out" class="ckein input_src  input_hgt ">
                            </div>
                            <!--  <div class="position-relative ">
                            <span class="iconint"><i class="fa fa-calendar"></i></span>
                            <input value='{{$params["checkin"] ?? ""}}' aut type="text" name="checkin" placeholder="Check-In - Check-Out" class="input_src  input_hgt ">
                        </div> -->



                        </div>

                        <div class="search_adult ht_width_tr">



                            <!-- <h3 class="search_title">Travelers</h3> -->



                            <div class="position-relative " data-toggle="dropdown">



                                <span class="iconint"><i class="fa fa-user-o"></i></span>



                                <input name='adults' value='{{$params["adults"] ?? ""}}' type="text"
                                    class="input_src input_hgt ups arrowus">



                                <!-- <span class="ar_tv"><i class="ml-2 fa fa-angle-down"></i></span> -->



                                <div class="dropslct">



                                    <div class="dropdown-menu dropdown-menu-right hiclk">
                                        <div class="htlad">
                                            <div class="qty_box">
                                                <div class=" d-flex justify-content-between align-items-center">
                                                    <span>Adult:
                                                    </span>
                                                    <div class='quantity1'>
                                                        <input type='button' slug='oneway' value='-' class='minus'
                                                            field='quantity' />
                                                        <input type='text' name='adult' id="oneway-qnty-adult"
                                                            value='{{$params["adult"] ?? ""}}' class='qty' />
                                                        <input type='button' slug='oneway' value='+' class='plus'
                                                            field='quantity' />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="qty_box">
                                                <div class=" d-flex justify-content-between align-items-center">
                                                    <span>Child:
                                                        <span class="agetxt">Ages 0 - 17</span>
                                                    </span>
                                                    <div class='quantity1' action='#'>
                                                        <input type='button' slug='oneway' value='-'
                                                            class='minus child_minus' field='quantity' />
                                                        <input type='text' name='child' id="oneway-qnty-child"
                                                            value='{{$params["child"] ?? ""}}' class='qty' />
                                                        <input type='button' slug='oneway' value='+'
                                                            class='plus child_added' field='quantity' />
                                                    </div>
                                                </div>
                                                <div class="d-flex box_child flex-wrap">
                                                    <div class="childxd child_ages">
                                                        <select class="form-control" name="childages[]">
                                                            <option hidden>
                                                                Age needed
                                                            </option>
                                                            <option value="0" selected="">0 years old</option>
                                                            <option value="1">1 year old</option>
                                                            <option value="2">2 years old</option>
                                                            <option value="3">3 years old</option>
                                                            <option value="4">4 years old</option>
                                                            <option value="5">5 years old</option>
                                                            <option value="6">6 years old</option>
                                                            <option value="7">7 years old</option>
                                                            <option value="8">8 years old</option>
                                                            <option value="9">9 years old</option>
                                                            <option value="10">10 years old</option>
                                                            <option value="11">11 years old</option>
                                                            <option value="12">12 years old</option>
                                                            <option value="13">13 years old</option>
                                                            <option value="14">14 years old</option>
                                                            <option value="15">15 years old </option>
                                                            <option value="16">16 years old</option>
                                                            <option value="17">17 years old</option>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="childxd">
                                                <select>
                                                   <option hidden>
                                                      Age needed
                                                   </option>
                                                   <option value="0" selected="">0 years old</option>
                                                   <option value="1">1 year old</option>
                                                   <option value="2">2 years old</option>
                                                   <option value="3">3 years old</option>
                                                   <option value="4">4 years old</option>
                                                   <option value="5">5 years old</option>
                                                   <option value="6">6 years old</option>
                                                   <option value="7">7 years old</option>
                                                   <option value="8">8 years old</option>
                                                   <option value="9">9 years old</option>
                                                   <option value="10">10 years old</option>
                                                   <option value="11">11 years old</option>
                                                   <option value="12">12 years old</option>
                                                   <option value="13">13 years old</option>
                                                   <option value="14">14 years old</option>
                                                   <option value="15">15 years old </option>
                                                   <option value="16">16 years old</option>
                                                   <option value="17">17 years old</option>
                                                </select>
                                             </div> -->
                                                </div>
                                                <div class="ht_qt_txt">
                                                    <p>To find you a place to stay that fits your entire group along
                                                        with correct prices, we need to know how old your children will
                                                        be at check-out</p>
                                                </div>
                                            </div>
                                            <div class="qty_box">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>Rooms
                                                    </span>
                                                    <div id='myform' method='POST' class='quantity1' action='#'>
                                                        <input type='button' value='-' slug="oneway" class='minus'
                                                            field='quantity' />
                                                        <input type='text' name='rooms' id="oneway-qnty-room"
                                                            value='{{$params["rooms"] ?? ""}}' class='qty' />
                                                        <input type='button' value='+' slug="oneway" class='plus'
                                                            field='quantity' />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btntv">
                                            <button type="submit"
                                                class="btn-grad ftbtn_src set-adults-val">Done</button>
                                        </div>
                                    </div>



                                </div>



                            </div>











                        </div>



                        <div class="searchbtn d-flex mt-0">



                            <button type="submit" class="btn-grad ftbtn_src mt-0"><i class="fa fa-paper-plane-o mr-2"
                                    aria-hidden="true"></i>Search Hotel</button>

                        </div>

                    </div>







                </div>



            </div>

        </section>

    </div>




    <div class="container_pd">

        <section class="list_fliter">

            <div class="filterbx">

                <div class="ftr_head ">

                    <h1>Filter</h1>

                    <span>Clear all</span>

                </div>



                <div class="filtercnt">

                    <div class="mobileapply_ftr">

                        <button type="button" class="btnf_apy" id="aplybtn"><span>0 Filters</span>APPLY </button>

                    </div>

                    <div class="panel-group " id="accordion">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#PRICE"
                                        aria-expanded="true">
                                        <div class="txtftr">
                                            <h6>PRICE</h6>
                                            <span>Clear</span>
                                        </div>
                                    </a>
                                </h4>
                            </div>
                            <div id="PRICE" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="rage_price">
                                        <div id="slider-range"></div>
                                        <div class="d-flex justify-content-between slider-labels">
                                            <div class=" caption">
                                                <strong>Mi11n:</strong> <span id="slider-range-value1"></span>
                                            </div>
                                            <div class=" text-right caption">
                                                <strong>Max:</strong> <span id="slider-range-value2"></span>
                                            </div>
                                        </div>
                                        <form>
                                            <input type="hidden" name="min-value" id="min-value" value="">
                                            <input type="hidden" name="max-value" id="max-value" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="panel panel-default">

                            <div class="panel-heading">

                                <h4 class="panel-title">

                                    <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true"
                                        href="#Popularfilters" aria-expanded="true">

                                        <div class="txtftr">

                                            <h6>Popular filters</h6>

                                            <span>Clear</span>

                                        </div>

                                    </a>

                                </h4>

                            </div>

                            <div id="Popularfilters" class="panel-collapse collapse in show">

                                <div class="panel-body pdmrbx">

                                    <div class="checkftr">

                                        <ul class="check-boxes-custom list-checkboxes">

                                            <li>

                                                <label for="Swimmingpool1"
                                                    class="label-container checkbox-default">Swimming

                                                    pool

                                                    <input name="Swimmingpool" class="flightfilter" id="Swimmingpool1"
                                                        type="checkbox" value="1">

                                                    <span class="checkmark"></span>

                                                </label>

                                                <span class="lsprc"> 14 </span>

                                            </li>

                                            <li>

                                                <label for="Verygoodrating1"
                                                    class="label-container checkbox-default">Very good

                                                    rating

                                                    <input name="Verygoodrating" class="Verygoodrating"
                                                        id="Verygoodrating1" type="checkbox" value="1">

                                                    <span class="checkmark"></span>

                                                </label>

                                                <span class="lsprc">248</span>

                                            </li>



                                            <li>

                                                <label for="Beachfront1"
                                                    class="label-container checkbox-default">Beachfront

                                                    <input name="Beachfront" class="flightfilter" id="Beachfront1"
                                                        type="checkbox" value="1">

                                                    <span class="checkmark"></span>

                                                </label>

                                                <span class="lsprc">1</span>

                                            </li>



                                            <li>

                                                <label for="Centrallylocated1"
                                                    class="label-container checkbox-default">Centrally

                                                    located

                                                    <input name="Centrallylocated" class="flightfilter"
                                                        id="Centrallylocated1" type="checkbox" value="1">

                                                    <span class="checkmark"></span>

                                                </label>

                                                <span class="lsprc">512</span>

                                            </li>



                                            <li>

                                                <label for="Hidesoldout1" class="label-container checkbox-default">Hide
                                                    sold

                                                    out

                                                    <input name="Hidesoldout1" class="flightfilter" id="Hidesoldout1"
                                                        type="checkbox" value="1">

                                                    <span class="checkmark"></span>

                                                </label>



                                            </li>





                                        </ul>

                                    </div>



                                </div>

                            </div>

                        </div> --}}



                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#Stars"
                                        aria-expanded="true" aria-expanded="true">
                                        <div class="txtftr">
                                            <h6>Stars</h6>
                                            <span>Clear</span>
                                        </div>
                                    </a>
                                </h4>
                            </div>
                            <div id="Stars" class="panel-collapse collapse in show">

                                <div class="panel-body pdmrbx">

                                    <div class="checkftr">

                                        <ul class="check-boxes-custom list-checkboxes">
                                            <form id="search_form">
                                                <li>

                                                    <label for="star1" class="label-container checkbox-default">

                                                        <div class="startbx">

                                                            <i class="fa fa-star"></i>


                                                        </div>

                                                        <input class="flightfilter starFilter" name="stars[]" id="star1"
                                                            type="checkbox" value="1">

                                                        <span class="checkmark"></span>

                                                    </label>

                                                    {{-- <span class="lsprc"> 56 </span> --}}

                                                </li>



                                                <li>

                                                    <label for="star2" class="label-container checkbox-default">

                                                        <div class="startbx">

                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>


                                                        </div>

                                                        <input class="flightfilter starFilter" name="stars[]" id="star2"
                                                            type="checkbox" value="2">

                                                        <span class="checkmark"></span>

                                                    </label>

                                                    {{-- <span class="lsprc">314</span> --}}

                                                </li>

                                                <li>

                                                    <label for="star3" class="label-container checkbox-default">

                                                        <div class="startbx">

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                        </div>

                                                        <input class="flightfilter starFilter" name="stars[]" id="star3"
                                                            type="checkbox" value="3">

                                                        <span class="checkmark"></span>

                                                    </label>

                                                    {{-- <span class="lsprc">591</span> --}}

                                                </li>



                                                <li>

                                                    <label for="star4" class="label-container checkbox-default">

                                                        <div class="startbx">

                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                        </div>

                                                        <input class="flightfilter starFilter" name="stars[]" id="star4"
                                                            type="checkbox" value="4">

                                                        <span class="checkmark"></span>

                                                    </label>

                                                    {{-- <span class="lsprc">119</span> --}}

                                                </li>



                                                <li>

                                                    <label for="star5" class="label-container checkbox-default">

                                                        <div class="startbx">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>

                                                        </div>

                                                        <input class="flightfilter starFilter" name="stars[]" id="star5"
                                                            type="checkbox" value="5">

                                                        <span class="checkmark"></span>

                                                    </label>

                                                    {{-- <span class="lsprc">38</span> --}}

                                                </li>
                                            </form>
                                        </ul>

                                    </div>



                                </div>

                            </div>

                        </div>









                        <div class="panel panel-default">

                            <div class="panel-heading">

                                <h4 class="panel-title">

                                    <a data-toggle="collapse" data-parent="#accordion" href="#Hotelrating"
                                        aria-expanded="true">

                                        <div class="txtftr">

                                            <h6>Hotel rating</h6>

                                            <span>Clear</span>

                                        </div>

                                    </a>

                                </h4>

                            </div>

                            <div id="Hotelrating" class="panel-collapse collapse in">

                                <div class="panel-body pdmrbx">

                                    <div class="checkftr">

                                        {{-- <ul class="check-boxes-custom list-checkboxes">
                                            @php
                                            $numbers = Session::get('ranking');
                                            sort($numbers);
                                            $grouped = collect($numbers)->groupBy(function ($number) {
                                            $digits = str_split((string) $number);
                                            sort($digits);
                                            return implode('', $digits);
                                            })->map(function ($group) {
                                            $counts = array_count_values(str_split((string) $group->first()));
                                            return $group->map(function ($number) use ($counts) {
                                            return [
                                            'number' => $number,
                                            'count' => $counts,
                                            ];
                                            });
                                            });
                                            @endphp
                                            @if(!empty($grouped))
                                            <form id="rankingFilter_based">
                                                @foreach($grouped as $digit => $number)
                                                <li>
                                                    <label for="{{ $digit }}"
                                                        class="label-container checkbox-default">{{ $digit }} Hotel with
                                                        Rating
                                                        <input name="Excellent[]" class="flightfilter rankingFilter"
                                                            id="{{ $digit }}" type="checkbox" value="{{ $digit }}">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <span class="lsprc">{{ count($number) }}</span>
                                                </li>
                                                @endforeach
                                            </form>
                                            @endif
                                        </ul> --}}

                                    </div>



                                </div>

                            </div>

                        </div>





                        <div class="panel panel-default">

                            <div class="panel-heading">

                                <h4 class="panel-title">

                                    <a data-toggle="collapse" data-parent="#accordion" href="#Facilities"
                                        aria-expanded="true">

                                        <div class="txtftr">

                                            <h6>Facilities</h6>

                                            <span>Clear</span>

                                        </div>

                                    </a>

                                </h4>

                            </div>

                            <div id="Facilities" class="panel-collapse collapse in">

                                <div class="panel-body pdmrbx">

                                    <div class="checkftr">

                                        <ul class="check-boxes-custom list-checkboxes">
                                            {{-- @foreach (hotelApisAminities()['facilities'] as $hotelApisAminities)

                                            <li>

                                                <label for="24hourfrontdesk1"
                                                    class="label-container checkbox-default">{{
                                                    $hotelApisAminities['description']['content']}}

                                                    <input name="24hourfrontdesk" class="flightfilter facilityfilter"
                                                        id="24hourfrontdesk1" type="checkbox"
                                                        value="{{ $hotelApisAminities['description']['content']}}">

                                                    <span class="checkmark"></span>

                                                </label>



                                            </li>
                                            @endforeach --}}

                                        </ul>

                                    </div>



                                </div>

                            </div>

                        </div>







                    </div>

                </div>

            </div>



            <div class="listingbx">

                <div class="rightlist flexdrop">
                    <h2>{{getdestinationName($params["location"]) ??
                        ""}}&nbsp;&nbsp;:&nbsp;&nbsp;<span>{{!empty($hotelcodescount) && $hotelcodescount > 0 ?
                            $hotelcodescount : 0 }} hotels available</span>
                        {{-- <p>Our best prices have now loaded</p> --}}
                    </h2>
                    <div class="ratingdrop">
                        <select class="lidr_pc orderbyFilter" name="orderbyFilter">
                            <!-- <option>Rating</option> -->
                            <option value="">Select</option>
                            <option value="low">Price&nbsp;&nbsp;:&nbsp;&nbsp;low to high</option>
                            <option value="high">Price&nbsp;&nbsp;:&nbsp;&nbsp;high to low</option>
                            <!--  <option>Distance</option> -->
                        </select>
                    </div>
                </div>

                <div class="largebox_listing" id="Cheapest">
                </div>
            </div>
        </section>
    </div>
</form>
@php
    $dates = explode('-', $params['checkin']);
    $checkIn = date('Y-m-d', strtotime($dates[0]));
    $checkOut  =  date('Y-m-d', strtotime($dates[1]));
@endphp
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
<script>
    var elementArray = '{{$totalpages}}';
    var location_get = '{{$params['location']}}';
    var adult = '{{$params['adult']}}';
    var child = '{{$params['child']}}';
    var rooms = '{{$params['rooms']}}';
    var checkIn = '{{$checkIn}}';
    var checkOut = '{{$checkOut}}';
  $('.flight_loader').hide();
  var mi = 0;
  var mip = 0;
  var mis = 0;
  var InforObj = [];
var markers = new Array();
	  var width = 10;
	  var minpricearray =   new Array();
	  var hotelnamedata =   new Array();
	  var maxpricearray =  {};
	  var faciltiesarray =  {};
	  var mealsarray =  {};
	  var markersOnMap =  {};

 function fetch_data(start,arrCount)
 {
    // alert(arrCount)
		var link = '{{URL::to('/')}}/hotel/ajaxlisting?city='+ location_get + '&start='+start +'&end='+arrCount+'&adult='+adult+'&child='+child+'&rooms='+rooms+'&checkIn='+checkIn+'&checkOut='+checkOut;
		$.ajax({
		url:link+'&ajax=true',
		datatype: 'json',
		success:function(data)
		{
            console.log(data);
		// 	arrCount++;
		// 	if(elementArray <5){
		// 		var rre = elementArray;
		// 	}else{
		// 		var rre = 5
		// 	}
		// 	if(arrCount==rre){
		// 		  $('.searchloader').hide();
		// 		   $('.fltLoader').hide();
		// 		  $('.searchtext').html('Our best prices have now loaded');
		// 		  $('.properti_f').show();
		// 		width = 100;
		// 		$('.myBar').css({
        //             width: width + '%'
        //         });
		// 	}
		// 	 width += width;
		// 	 if (width >= 100) {
		// 		  } else {
		// 			$('.myBar').css({
        //             width: width + '%'
        //         });

		// 		  }
		// 	if (arrCount <= elementArray){
		// 		var obj = JSON.parse(data);
		// 		//console.log(obj.filtersMeta.hotelprice.min);
		// 		 if(obj.success){

		// 				$.ajax({
		// 				url:links+'&ajax=true',
		// 				datatype: 'json',
		// 				success:function(data)
		// 				{
		// 					var objs = JSON.parse(data);
		// 					 $.each(objs.hotels, function (index, value) {
		// 						 if(value.price != 'Not abailable'){
		// 						minpricearray.push(value.price);
		// 						 }

		// 						 $.each(value.mealplans, function (index, value) {
		// 							if( mealsarray[value.slug] === undefined ) {
		// 								mealsarray[value.slug] = value.name;
		// 							}else{

		// 							}
		// 				});
		// 					 $.each(mealsarray, function (indexa, valuess) {
		// 					 if($('#myULairmeal li').hasClass(indexa)){}else{
		// 					$('#myULairmeal').append('<li style="" class="'+indexa+'"><label class="label-container checkbox-default">'+valuess+'<input name="meal_plan" check_see="0" class="chboxmealplan hotelmealplans" type="checkbox" value="'+indexa+'"><span class="checkmark"></span></label></li>');
		// 					}
		// 				});
		// 						if(value.price == 'Not abailable'){
		// 							$('#code_'+value.code).remove();
		// 						}
		// 						$('#code_'+value.code+' .mealplans').attr('mealplan',value.mealplan);
		// 						$('#code_'+value.code+' .room_price_res').hide();
		// 						//$('#code_'+value.code+' .room_price').attr('src',value.mapimage);
		// 						$('#code_'+value.code+' .room_price').show();
		// 						$('#code_'+value.code+' .select_hotel_btn').show();
		// 						$('#code_'+value.code+' .price_value').html('<i class="fas fa-rupee-sign"></i>'+value.price);
		// 						$('#code_'+value.code+' .price1').attr('price',value.price);
		// 						$('#code_'+value.code+' .price1').attr('data-price',value.price);
		// 						$('#code_'+value.code+' .select_hotel_btn').html('<a target="_blank" href="<?php echo \URL::to('Hotel/HotelDetail'); ?>?city={{Request::get('city')}}&cin={{Request::get('cin')}}&cOut={{Request::get('cOut')}}&Hotel=NA&Rooms={{Request::get('Rooms')}}&pax={{Request::get('pax')}}&sid='+value.sid+'&hid='+value.code+'">View Room <i class="fa fa-angle-right"></i></a>');
		// 						$('#code_'+value.code+' .bookinglink').attr('href', '<?php echo \URL::to('Hotel/HotelDetail'); ?>?city={{Request::get('city')}}&cin={{Request::get('cin')}}&cOut={{Request::get('cOut')}}&Hotel=NA&Rooms={{Request::get('Rooms')}}&pax={{Request::get('pax')}}&sid='+value.sid+'&hid='+value.code);
		// 					});

		// 					priceslider(Math.min.apply(Math,minpricearray), Math.max.apply(Math,minpricearray));



		// 				}
		// 			});


		// 			 $.each(obj.filtersMeta.hotelnamedata, function (index, value) {
		// 				hotelnamedata.push(value);
		// 			});
		// 			//maxpricearray.push(obj.filtersMeta.hotelprice.max);

		// 				 $.each(obj.filtersMeta.facilties, function (index, value) {
		// 					if( faciltiesarray[value.slug] === undefined ) {

		// 						faciltiesarray[value.slug] = value.name;
		// 					}else{

		// 					 }
		// 				});





		// 			$.each(faciltiesarray, function (indexs, values) {
		// 				if($('#myULairfac li').hasClass(indexs)){}else{
		// 				$('#myULairfac').append('<li style="" class="'+indexs+'"><label class="label-container checkbox-default">'+values+'<input name="property_type" check_see="0" class="chboxAirline hotelfacilties" type="checkbox" value="'+indexs+'"><span class="checkmark"></span></label></li>');
		// 				}
		// 			});

		// 		}
		// 		$('#ajaxContent').append(obj.hotelsdata);

		// 			fetch_data(arrCount);
		// 				var count_bhanu = 0;

		// 		$(".refendable11onword").each(function() {
		// 			if ($("div:visible", this).length > 10) {
		// 				//console.log(count_bhanu);
		// 				count_bhanu = count_bhanu + 1;
		// 			}
		// 		});

		// 		$(".properti_f").html(count_bhanu+' Hotels available');

		// 			 $.each(obj.mapdata, function (index, value) {

		// 				$('.hotel_map_list').append(
		// 				'<div class="hotel_item"><a href="#" onclick="SetHotelMarker('+mi+')"><div class="hotel_img" style="background:url('+value.placeImage+')"></div><div class="hotel_info"><div class="title_wrap"><h3 class="title">'+value.placeName+'</h3> <div class="hotel_star">'+value.placerate+'</div></div><div class="hotel_address">'+value.placeaddress+'</div><div class="hotel_stats"><span class="beds">1 Bed</span><div class="hotel_stay"><span>23 nights, 2 adult</span></div></div><div class="room_price"><span class="price_value"><i class="fas fa-rupee-sign"></i> '+value.placeprice+'</span><div class="tax_price"><span>+ <i class="fas fa-rupee-sign"></i> 191, 287 taxes and charges</span></div></div><div class="clearfix"></div></div></a></div>');
		// 				mi++;
		// 			});


		// 			size_li = $("#myULairfac li").length;
		// 			for (var i = 0; i < obj.mapdata.length; i++) {
		// 				 var contentString = '<div id="content"><div class="hotelimg"><img src="'+obj.mapdata[i].placeImage+'"></div><div class="hotelinf"><h3>' + obj.mapdata[i].placeName +
        //                     '</h3><div class="ht_stars">'+obj.mapdata[i].placerate+'</div><div class="ht_tripadvis"><img class="item-left-img" src="{!! asset('public/img/ta-45.png')!!}" width="55" alt="Trip Advisior"></div><div class="ht_price"><span><i class="fas fa-rupee-sign"></i> '+obj.mapdata[i].placeprice+'</span></div><div class="clearfix"></div></div></div>';
		// 			   const marker = new google.maps.Marker({
        //                     position: new google.maps.LatLng(obj.mapdata[i].LatLng[0].lat, obj.mapdata[i].LatLng[0].lng),
        //                     map: map
        //                 });
		// 				//markers.push(marker);
		// 				markers[mis] = marker;
		// 			  const infowindow = new google.maps.InfoWindow({
        //                     content: contentString,
        //                     maxWidth: 650
        //                 });

        //                 marker.addListener('click', function () {
        //                     closeOtherInfo();
        //                     infowindow.open(marker.get('map'), marker);
        //                     InforObj[0] = infowindow;
        //                 });
		// 			  mis++;
		// 			}




		// 		xs = 10;
		// 		  if(size_li > 10){
		// 			  $('#facloadMore').show();

		// 		  }else{
		// 			  $('#facloadMore').hide();

		// 		  }
		// 		$('#myULairfac li:lt(' + xs + ')').show();
		// 	}
		}
	});

	var stops1 = "";
	 var count_checked = $(".starfliter:checked").length;
	 if(count_checked != 0){
				$(".flightstar").each(function() {

					if ($(this).attr("check_see") == "1") {
						stops1 = $(this).val();

						$(".starsscount").each(function() {

							if (stops1 == $(this).attr("stars")) {

								$(this).show();
							}

						});

					} else {
						var stops2 = $(this).val();
						$(".starsscount").each(function() {
							if (stops2 == $(this).attr("stars")) {
								$(this).hide();
							}

						});

					}

				});


		}
		 var count_checkeds = $(".hotelfacilties:checked").length;
	 if(count_checkeds != 0){
		$('.facilities').hide();
				$(".hotelfacilties").each(function() {

					if ($(this).attr("check_see") == "1") {
						stops1 = $(this).val();

						$(".facilities").each(function() {
							var s = $(this).attr("facilities");

							var d = s.split(';');
							console.log(checkValue(stops1, d));
						if (checkValue(stops1, d) == 'Exist') {


								$(this).show();
							}


						});

					}

				});
				if (stops1 == "") {
					$(".facilities").each(function() {
						$(this).show();
					});
	 }
	 }

	 var stops1 = "";
	 var count_checked = $(".hotelmealplans:checked").length;
	 if(count_checked != 0){
				$(".hotelmealplans").each(function() {

					if ($(this).attr("check_see") == "1") {
						stops1 = $(this).val();

						$(".mealplans").each(function() {

							if (stops1 == $(this).attr("mealplan")) {

								$(this).show();
							}

						});

					} else {
						var stops2 = $(this).val();
						$(".mealplans").each(function() {
							if (stops2 == $(this).attr("mealplan")) {
								$(this).hide();
							}

						});

					}

				});


		}
		if($('#hotelsearchname').val() != ''){
		  var stops1 = "";
				$('.hotelnamesearch').hide();
				$(".hotelnamesearch").each(function() {
							var stops1 = $('#hotelsearchname').val();

						if (stops1 == ui.item.value) {

								$(this).show();
							}


						});
		}
		var count_bhanu = 0;

				$(".refendable11onword").each(function() {
					if ($("div:visible", this).length > 10) {
						//console.log(count_bhanu);
						count_bhanu = count_bhanu + 1;
					}
				});

				$(".properti_f").html(count_bhanu+' Hotels available');

		//console.log(hotelnamedata);

 }

 fetch_data(1,10);




    (function(factory) {
        if (typeof define === 'function' && define.amd) {
            // AMD. Register as an anonymous module.
            define([], factory);
        } else if (typeof exports === 'object') {
            // Node/CommonJS
            module.exports = factory();
        } else {
            // Browser globals
            window.noUiSlider = factory();
        }
    }(function() {
        'use strict';
        // Removes duplicates from an array.
        function unique(array) {
            return array.filter(function(a) {
                return !this[a] ? this[a] = true : false;
            }, {});
        }
        // Round a value to the closest 'to'.
        function closest(value, to) {
            return Math.round(value / to) * to;
        }
        // Current position of an element relative to the document.
        function offset(elem) {
            var rect = elem.getBoundingClientRect(),
                doc = elem.ownerDocument,
                docElem = doc.documentElement,
                pageOffset = getPageOffset();
            // getBoundingClientRect contains left scroll in Chrome on Android.
            // I haven't found a feature detection that proves this. Worst case
            // scenario on mis-match: the 'tap' feature on horizontal sliders breaks.
            if (/webkit.*Chrome.*Mobile/i.test(navigator.userAgent)) {
                pageOffset.x = 0;
            }
            return {
                top: rect.top + pageOffset.y - docElem.clientTop,
                left: rect.left + pageOffset.x - docElem.clientLeft
            };
        }
        // Checks whether a value is numerical.
        function isNumeric(a) {
            return typeof a === 'number' && !isNaN(a) && isFinite(a);
        }
        // Rounds a number to 7 supported decimals.
        function accurateNumber(number) {
            var p = Math.pow(10, 7);
            return Number((Math.round(number * p) / p).toFixed(7));
        }
        // Sets a class and removes it after [duration] ms.
        function addClassFor(element, className, duration) {
            addClass(element, className);
            setTimeout(function() {
                removeClass(element, className);
            }, duration);
        }
        // Limits a value to 0 - 100
        function limit(a) {
            return Math.max(Math.min(a, 100), 0);
        }
        // Wraps a variable as an array, if it isn't one yet.
        function asArray(a) {
            return Array.isArray(a) ? a : [a];
        }
        // Counts decimals
        function countDecimals(numStr) {
            var pieces = numStr.split(".");
            return pieces.length > 1 ? pieces[1].length : 0;
        }
        // http://youmightnotneedjquery.com/#add_class
        function addClass(el, className) {
            if (el.classList) {
                el.classList.add(className);
            } else {
                el.className += ' ' + className;
            }
        }
        // http://youmightnotneedjquery.com/#remove_class
        function removeClass(el, className) {
            if (el.classList) {
                el.classList.remove(className);
            } else {
                el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
            }
        }
        // https://plainjs.com/javascript/attributes/adding-removing-and-testing-for-classes-9/
        function hasClass(el, className) {
            return el.classList ? el.classList.contains(className) : new RegExp('\\b' + className + '\\b').test(el.className);
        }
        // https://developer.mozilla.org/en-US/docs/Web/API/Window/scrollY#Notes
        function getPageOffset() {
            var supportPageOffset = window.pageXOffset !== undefined,
                isCSS1Compat = ((document.compatMode || "") === "CSS1Compat"),
                x = supportPageOffset ? window.pageXOffset : isCSS1Compat ? document.documentElement.scrollLeft : document.body.scrollLeft,
                y = supportPageOffset ? window.pageYOffset : isCSS1Compat ? document.documentElement.scrollTop : document.body.scrollTop;
            return {
                x: x,
                y: y
            };
        }
        // Shorthand for stopPropagation so we don't have to create a dynamic method
        function stopPropagation(e) {
            e.stopPropagation();
        }
        // todo
        function addCssPrefix(cssPrefix) {
            return function(className) {
                return cssPrefix + className;
            };
        }
        var
            // Determine the events to bind. IE11 implements pointerEvents without
            // a prefix, which breaks compatibility with the IE10 implementation.
            /** @const */
            actions = window.navigator.pointerEnabled ? {
                start: 'pointerdown',
                move: 'pointermove',
                end: 'pointerup'
            } : window.navigator.msPointerEnabled ? {
                start: 'MSPointerDown',
                move: 'MSPointerMove',
                end: 'MSPointerUp'
            } : {
                start: 'mousedown touchstart',
                move: 'mousemove touchmove',
                end: 'mouseup touchend'
            },
            defaultCssPrefix = 'noUi-';
        // Value calculation
        // Determine the size of a sub-range in relation to a full range.
        function subRangeRatio(pa, pb) {
            return (100 / (pb - pa));
        }
        // (percentage) How many percent is this value of this range?
        function fromPercentage(range, value) {
            return (value * 100) / (range[1] - range[0]);
        }
        // (percentage) Where is this value on this range?
        function toPercentage(range, value) {
            return fromPercentage(range, range[0] < 0 ? value + Math.abs(range[0]) : value - range[0]);
        }
        // (value) How much is this percentage on this range?
        function isPercentage(range, value) {
            return ((value * (range[1] - range[0])) / 100) + range[0];
        }
        // Range conversion
        function getJ(value, arr) {
            var j = 1;
            while (value >= arr[j]) {
                j += 1;
            }
            return j;
        }
        // (percentage) Input a value, find where, on a scale of 0-100, it applies.
        function toStepping(xVal, xPct, value) {
            if (value >= xVal.slice(-1)[0]) {
                return 100;
            }
            var j = getJ(value, xVal),
                va, vb, pa, pb;
            va = xVal[j - 1];
            vb = xVal[j];
            pa = xPct[j - 1];
            pb = xPct[j];
            return pa + (toPercentage([va, vb], value) / subRangeRatio(pa, pb));
        }
        // (value) Input a percentage, find where it is on the specified range.
        function fromStepping(xVal, xPct, value) {
            // There is no range group that fits 100
            if (value >= 100) {
                return xVal.slice(-1)[0];
            }
            var j = getJ(value, xPct),
                va, vb, pa, pb;
            va = xVal[j - 1];
            vb = xVal[j];
            pa = xPct[j - 1];
            pb = xPct[j];
            return isPercentage([va, vb], (value - pa) * subRangeRatio(pa, pb));
        }
        // (percentage) Get the step that applies at a certain value.
        function getStep(xPct, xSteps, snap, value) {
            if (value === 100) {
                return value;
            }
            var j = getJ(value, xPct),
                a, b;
            // If 'snap' is set, steps are used as fixed points on the slider.
            if (snap) {
                a = xPct[j - 1];
                b = xPct[j];
                // Find the closest position, a or b.
                if ((value - a) > ((b - a) / 2)) {
                    return b;
                }
                return a;
            }
            if (!xSteps[j - 1]) {
                return value;
            }
            return xPct[j - 1] + closest(value - xPct[j - 1], xSteps[j - 1]);
        }
        // Entry parsing
        function handleEntryPoint(index, value, that) {
            var percentage;
            // Wrap numerical input in an array.
            if (typeof value === "number") {
                value = [value];
            }
            // Reject any invalid input, by testing whether value is an array.
            if (Object.prototype.toString.call(value) !== '[object Array]') {
                throw new Error("noUiSlider: 'range' contains invalid value.");
            }
            // Covert min/max syntax to 0 and 100.
            if (index === 'min') {
                percentage = 0;
            } else if (index === 'max') {
                percentage = 100;
            } else {
                percentage = parseFloat(index);
            }
            // Check for correct input.
            if (!isNumeric(percentage) || !isNumeric(value[0])) {
                throw new Error("noUiSlider: 'range' value isn't numeric.");
            }
            // Store values.
            that.xPct.push(percentage);
            that.xVal.push(value[0]);
            // NaN will evaluate to false too, but to keep
            // logging clear, set step explicitly. Make sure
            // not to override the 'step' setting with false.
            if (!percentage) {
                if (!isNaN(value[1])) {
                    that.xSteps[0] = value[1];
                }
            } else {
                that.xSteps.push(isNaN(value[1]) ? false : value[1]);
            }
        }

        function handleStepPoint(i, n, that) {
            // Ignore 'false' stepping.
            if (!n) {
                return true;
            }
            // Factor to range ratio
            that.xSteps[i] = fromPercentage([
                that.xVal[i], that.xVal[i + 1]
            ], n) / subRangeRatio(that.xPct[i], that.xPct[i + 1]);
        }
        // Interface
        // The interface to Spectrum handles all direction-based
        // conversions, so the above values are unaware.
        function Spectrum(entry, snap, direction, singleStep) {
            this.xPct = [];
            this.xVal = [];
            this.xSteps = [singleStep || false];
            this.xNumSteps = [false];
            this.snap = snap;
            this.direction = direction;
            var index, ordered = [ /* [0, 'min'], [1, '50%'], [2, 'max'] */ ];
            // Map the object keys to an array.
            for (index in entry) {
                if (entry.hasOwnProperty(index)) {
                    ordered.push([entry[index], index]);
                }
            }
            // Sort all entries by value (numeric sort).
            if (ordered.length && typeof ordered[0][0] === "object") {
                ordered.sort(function(a, b) {
                    return a[0][0] - b[0][0];
                });
            } else {
                ordered.sort(function(a, b) {
                    return a[0] - b[0];
                });
            }
            // Convert all entries to subranges.
            for (index = 0; index < ordered.length; index++) {
                handleEntryPoint(ordered[index][1], ordered[index][0], this);
            }
            // Store the actual step values.
            // xSteps is sorted in the same order as xPct and xVal.
            this.xNumSteps = this.xSteps.slice(0);
            // Convert all numeric steps to the percentage of the subrange they represent.
            for (index = 0; index < this.xNumSteps.length; index++) {
                handleStepPoint(index, this.xNumSteps[index], this);
            }
        }
        Spectrum.prototype.getMargin = function(value) {
            return this.xPct.length === 2 ? fromPercentage(this.xVal, value) : false;
        };
        Spectrum.prototype.toStepping = function(value) {
            value = toStepping(this.xVal, this.xPct, value);
            // Invert the value if this is a right-to-left slider.
            if (this.direction) {
                value = 100 - value;
            }
            return value;
        };
        Spectrum.prototype.fromStepping = function(value) {
            // Invert the value if this is a right-to-left slider.
            if (this.direction) {
                value = 100 - value;
            }
            return accurateNumber(fromStepping(this.xVal, this.xPct, value));
        };
        Spectrum.prototype.getStep = function(value) {
            // Find the proper step for rtl sliders by search in inverse direction.
            // Fixes issue #262.
            if (this.direction) {
                value = 100 - value;
            }
            value = getStep(this.xPct, this.xSteps, this.snap, value);
            if (this.direction) {
                value = 100 - value;
            }
            return value;
        };
        Spectrum.prototype.getApplicableStep = function(value) {
            // If the value is 100%, return the negative step twice.
            var j = getJ(value, this.xPct),
                offset = value === 100 ? 2 : 1;
            return [this.xNumSteps[j - 2], this.xVal[j - offset], this.xNumSteps[j - offset]];
        };
        // Outside testing
        Spectrum.prototype.convert = function(value) {
            return this.getStep(this.toStepping(value));
        };
        /*	Every input option is tested and parsed. This'll prevent



	endless validation in internal methods. These tests are



	structured with an item for every option available. An



	option can be marked as required by setting the 'r' flag.



	The testing function is provided with three arguments:



		- The provided value for the option;



		- A reference to the options object;



		- The name for the option;







	The testing function returns false when an error is detected,



	or true when everything is OK. It can also modify the option



	object, to make sure all values can be correctly looped elsewhere. */
        var defaultFormatter = {
            'to': function(value) {
                return value !== undefined && value.toFixed(2);
            },
            'from': Number
        };

        function testStep(parsed, entry) {
            if (!isNumeric(entry)) {
                throw new Error("noUiSlider: 'step' is not numeric.");
            }
            // The step option can still be used to set stepping
            // for linear sliders. Overwritten if set in 'range'.
            parsed.singleStep = entry;
        }

        function testRange(parsed, entry) {
            // Filter incorrect input.
            if (typeof entry !== 'object' || Array.isArray(entry)) {
                throw new Error("noUiSlider: 'range' is not an object.");
            }
            // Catch missing start or end.
            if (entry.min === undefined || entry.max === undefined) {
                throw new Error("noUiSlider: Missing 'min' or 'max' in 'range'.");
            }
            // Catch equal start or end.
            if (entry.min === entry.max) {
                throw new Error("noUiSlider: 'range' 'min' and 'max' cannot be equal.");
            }
            parsed.spectrum = new Spectrum(entry, parsed.snap, parsed.dir, parsed.singleStep);
        }

        function testStart(parsed, entry) {
            entry = asArray(entry);
            // Validate input. Values aren't tested, as the public .val method
            // will always provide a valid location.
            if (!Array.isArray(entry) || !entry.length || entry.length > 2) {
                throw new Error("noUiSlider: 'start' option is incorrect.");
            }
            // Store the number of handles.
            parsed.handles = entry.length;
            // When the slider is initialized, the .val method will
            // be called with the start options.
            parsed.start = entry;
        }

        function testSnap(parsed, entry) {
            // Enforce 100% stepping within subranges.
            parsed.snap = entry;
            if (typeof entry !== 'boolean') {
                throw new Error("noUiSlider: 'snap' option must be a boolean.");
            }
        }

        function testAnimate(parsed, entry) {
            // Enforce 100% stepping within subranges.
            parsed.animate = entry;
            if (typeof entry !== 'boolean') {
                throw new Error("noUiSlider: 'animate' option must be a boolean.");
            }
        }

        function testConnect(parsed, entry) {
            if (entry === 'lower' && parsed.handles === 1) {
                parsed.connect = 1;
            } else if (entry === 'upper' && parsed.handles === 1) {
                parsed.connect = 2;
            } else if (entry === true && parsed.handles === 2) {
                parsed.connect = 3;
            } else if (entry === false) {
                parsed.connect = 0;
            } else {
                throw new Error("noUiSlider: 'connect' option doesn't match handle count.");
            }
        }

        function testOrientation(parsed, entry) {
            // Set orientation to an a numerical value for easy
            // array selection.
            switch (entry) {
                case 'horizontal':
                    parsed.ort = 0;
                    break;
                case 'vertical':
                    parsed.ort = 1;
                    break;
                default:
                    throw new Error("noUiSlider: 'orientation' option is invalid.");
            }
        }

        function testMargin(parsed, entry) {
            if (!isNumeric(entry)) {
                throw new Error("noUiSlider: 'margin' option must be numeric.");
            }
            // Issue #582
            if (entry === 0) {
                return;
            }
            parsed.margin = parsed.spectrum.getMargin(entry);
            if (!parsed.margin) {
                throw new Error("noUiSlider: 'margin' option is only supported on linear sliders.");
            }
        }

        function testLimit(parsed, entry) {
            if (!isNumeric(entry)) {
                throw new Error("noUiSlider: 'limit' option must be numeric.");
            }
            parsed.limit = parsed.spectrum.getMargin(entry);
            if (!parsed.limit) {
                throw new Error("noUiSlider: 'limit' option is only supported on linear sliders.");
            }
        }

        function testDirection(parsed, entry) {
            // Set direction as a numerical value for easy parsing.
            // Invert connection for RTL sliders, so that the proper
            // handles get the connect/background classes.
            switch (entry) {
                case 'ltr':
                    parsed.dir = 0;
                    break;
                case 'rtl':
                    parsed.dir = 1;
                    parsed.connect = [0, 2, 1, 3][parsed.connect];
                    break;
                default:
                    throw new Error("noUiSlider: 'direction' option was not recognized.");
            }
        }

        function testBehaviour(parsed, entry) {
            // Make sure the input is a string.
            if (typeof entry !== 'string') {
                throw new Error("noUiSlider: 'behaviour' must be a string containing options.");
            }
            // Check if the string contains any keywords.
            // None are required.
            var tap = entry.indexOf('tap') >= 0,
                drag = entry.indexOf('drag') >= 0,
                fixed = entry.indexOf('fixed') >= 0,
                snap = entry.indexOf('snap') >= 0,
                hover = entry.indexOf('hover') >= 0;
            // Fix #472
            if (drag && !parsed.connect) {
                throw new Error("noUiSlider: 'drag' behaviour must be used with 'connect': true.");
            }
            parsed.events = {
                tap: tap || snap,
                drag: drag,
                fixed: fixed,
                snap: snap,
                hover: hover
            };
        }

        function testTooltips(parsed, entry) {
            var i;
            if (entry === false) {
                return;
            } else if (entry === true) {
                parsed.tooltips = [];
                for (i = 0; i < parsed.handles; i++) {
                    parsed.tooltips.push(true);
                }
            } else {
                parsed.tooltips = asArray(entry);
                if (parsed.tooltips.length !== parsed.handles) {
                    throw new Error("noUiSlider: must pass a formatter for all handles.");
                }
                parsed.tooltips.forEach(function(formatter) {
                    if (typeof formatter !== 'boolean' && (typeof formatter !== 'object' || typeof formatter.to !== 'function')) {
                        throw new Error("noUiSlider: 'tooltips' must be passed a formatter or 'false'.");
                    }
                });
            }
        }

        function testFormat(parsed, entry) {
            parsed.format = entry;
            // Any object with a to and from method is supported.
            if (typeof entry.to === 'function' && typeof entry.from === 'function') {
                return true;
            }
            throw new Error("noUiSlider: 'format' requires 'to' and 'from' methods.");
        }

        function testCssPrefix(parsed, entry) {
            if (entry !== undefined && typeof entry !== 'string') {
                throw new Error("noUiSlider: 'cssPrefix' must be a string.");
            }
            parsed.cssPrefix = entry;
        }
        // Test all developer settings and parse to assumption-safe values.
        function testOptions(options) {
            // To prove a fix for #537, freeze options here.
            // If the object is modified, an error will be thrown.
            // Object.freeze(options);
            var parsed = {
                    margin: 0,
                    limit: 0,
                    animate: true,
                    format: defaultFormatter
                },
                tests;
            // Tests are executed in the order they are presented here.
            tests = {
                'step': {
                    r: false,
                    t: testStep
                },
                'start': {
                    r: true,
                    t: testStart
                },
                'connect': {
                    r: true,
                    t: testConnect
                },
                'direction': {
                    r: true,
                    t: testDirection
                },
                'snap': {
                    r: false,
                    t: testSnap
                },
                'animate': {
                    r: false,
                    t: testAnimate
                },
                'range': {
                    r: true,
                    t: testRange
                },
                'orientation': {
                    r: false,
                    t: testOrientation
                },
                'margin': {
                    r: false,
                    t: testMargin
                },
                'limit': {
                    r: false,
                    t: testLimit
                },
                'behaviour': {
                    r: true,
                    t: testBehaviour
                },
                'format': {
                    r: false,
                    t: testFormat
                },
                'tooltips': {
                    r: false,
                    t: testTooltips
                },
                'cssPrefix': {
                    r: false,
                    t: testCssPrefix
                }
            };
            var defaults = {
                'connect': false,
                'direction': 'ltr',
                'behaviour': 'tap',
                'orientation': 'horizontal'
            };
            // Run all options through a testing mechanism to ensure correct
            // input. It should be noted that options might get modified to
            // be handled properly. E.g. wrapping integers in arrays.
            Object.keys(tests).forEach(function(name) {
                // If the option isn't set, but it is required, throw an error.
                if (options[name] === undefined && defaults[name] === undefined) {
                    if (tests[name].r) {
                        throw new Error("noUiSlider: '" + name + "' is required.");
                    }
                    return true;
                }
                tests[name].t(parsed, options[name] === undefined ? defaults[name] : options[name]);
            });
            // Forward pips options
            parsed.pips = options.pips;
            // Pre-define the styles.
            parsed.style = parsed.ort ? 'top' : 'left';
            return parsed;
        }

        function closure(target, options) {
            // All variables local to 'closure' are prefixed with 'scope_'
            var scope_Target = target,
                scope_Locations = [-1, -1],
                scope_Base,
                scope_Handles,
                scope_Spectrum = options.spectrum,
                scope_Values = [],
                scope_Events = {},
                scope_Self;
            var cssClasses = [
                /*  0 */
                'target'
                /*  1 */
                , 'base'
                /*  2 */
                , 'origin'
                /*  3 */
                , 'handle'
                /*  4 */
                , 'horizontal'
                /*  5 */
                , 'vertical'
                /*  6 */
                , 'background'
                /*  7 */
                , 'connect'
                /*  8 */
                , 'ltr'
                /*  9 */
                , 'rtl'
                /* 10 */
                , 'draggable'
                /* 11 */
                , ''
                /* 12 */
                , 'state-drag'
                /* 13 */
                , ''
                /* 14 */
                , 'state-tap'
                /* 15 */
                , 'active'
                /* 16 */
                , ''
                /* 17 */
                , 'stacking'
                /* 18 */
                , 'tooltip'
                /* 19 */
                , ''
                /* 20 */
                , 'pips'
                /* 21 */
                , 'marker'
                /* 22 */
                , 'value'
            ].map(addCssPrefix(options.cssPrefix || defaultCssPrefix));
            // Delimit proposed values for handle positions.
            function getPositions(a, b, delimit) {
                // Add movement to current position.
                var c = a + b[0],
                    d = a + b[1];
                // Only alter the other position on drag,
                // not on standard sliding.
                if (delimit) {
                    if (c < 0) {
                        d += Math.abs(c);
                    }
                    if (d > 100) {
                        c -= (d - 100);
                    }
                    // Limit values to 0 and 100.
                    return [limit(c), limit(d)];
                }
                return [c, d];
            }
            // Provide a clean event with standardized offset values.
            function fixEvent(e, pageOffset) {
                // Prevent scrolling and panning on touch events, while
                // attempting to slide. The tap event also depends on this.
                e.preventDefault();
                // Filter the event to register the type, which can be
                // touch, mouse or pointer. Offset changes need to be
                // made on an event specific basis.
                var touch = e.type.indexOf('touch') === 0,
                    mouse = e.type.indexOf('mouse') === 0,
                    pointer = e.type.indexOf('pointer') === 0,
                    x, y, event = e;
                // IE10 implemented pointer events with a prefix;
                if (e.type.indexOf('MSPointer') === 0) {
                    pointer = true;
                }
                if (touch) {
                    // noUiSlider supports one movement at a time,
                    // so we can select the first 'changedTouch'.
                    x = e.changedTouches[0].pageX;
                    y = e.changedTouches[0].pageY;
                }
                pageOffset = pageOffset || getPageOffset();
                if (mouse || pointer) {
                    x = e.clientX + pageOffset.x;
                    y = e.clientY + pageOffset.y;
                }
                event.pageOffset = pageOffset;
                event.points = [x, y];
                event.cursor = mouse || pointer; // Fix #435
                return event;
            }
            // Append a handle to the base.
            function addHandle(direction, index) {
                var origin = document.createElement('div'),
                    handle = document.createElement('div'),
                    additions = ['-lower', '-upper'];
                if (direction) {
                    additions.reverse();
                }
                addClass(handle, cssClasses[3]);
                addClass(handle, cssClasses[3] + additions[index]);
                addClass(origin, cssClasses[2]);
                origin.appendChild(handle);
                return origin;
            }
            // Add the proper connection classes.
            function addConnection(connect, target, handles) {
                // Apply the required connection classes to the elements
                // that need them. Some classes are made up for several
                // segments listed in the class list, to allow easy
                // renaming and provide a minor compression benefit.
                switch (connect) {
                    case 1:
                        addClass(target, cssClasses[7]);
                        addClass(handles[0], cssClasses[6]);
                        break;
                    case 3:
                        addClass(handles[1], cssClasses[6]);
                        /* falls through */
                    case 2:
                        addClass(handles[0], cssClasses[7]);
                        /* falls through */
                    case 0:
                        addClass(target, cssClasses[6]);
                        break;
                }
            }
            // Add handles to the slider base.
            function addHandles(nrHandles, direction, base) {
                var index, handles = [];
                // Append handles.
                for (index = 0; index < nrHandles; index += 1) {
                    // Keep a list of all added handles.
                    handles.push(base.appendChild(addHandle(direction, index)));
                }
                return handles;
            }
            // Initialize a single slider.
            function addSlider(direction, orientation, target) {
                // Apply classes and data to the target.
                addClass(target, cssClasses[0]);
                addClass(target, cssClasses[8 + direction]);
                addClass(target, cssClasses[4 + orientation]);
                var div = document.createElement('div');
                addClass(div, cssClasses[1]);
                target.appendChild(div);
                return div;
            }

            function addTooltip(handle, index) {
                if (!options.tooltips[index]) {
                    return false;
                }
                var element = document.createElement('div');
                element.className = cssClasses[18];
                return handle.firstChild.appendChild(element);
            }
            // The tooltips option is a shorthand for using the 'update' event.
            function tooltips() {
                if (options.dir) {
                    options.tooltips.reverse();
                }
                // Tooltips are added with options.tooltips in original order.
                var tips = scope_Handles.map(addTooltip);
                if (options.dir) {
                    tips.reverse();
                    options.tooltips.reverse();
                }
                bindEvent('update', function(f, o, r) {
                    if (tips[o]) {
                        tips[o].innerHTML = options.tooltips[o] === true ? f[o] : options.tooltips[o].to(r[o]);
                    }
                });
            }

            function getGroup(mode, values, stepped) {
                // Use the range.
                if (mode === 'range' || mode === 'steps') {
                    return scope_Spectrum.xVal;
                }
                if (mode === 'count') {
                    // Divide 0 - 100 in 'count' parts.
                    var spread = (100 / (values - 1)),
                        v, i = 0;
                    values = [];
                    // List these parts and have them handled as 'positions'.
                    while ((v = i++ * spread) <= 100) {
                        values.push(v);
                    }
                    mode = 'positions';
                }
                if (mode === 'positions') {
                    // Map all percentages to on-range values.
                    return values.map(function(value) {
                        return scope_Spectrum.fromStepping(stepped ? scope_Spectrum.getStep(value) : value);
                    });
                }
                if (mode === 'values') {
                    // If the value must be stepped, it needs to be converted to a percentage first.
                    if (stepped) {
                        return values.map(function(value) {
                            // Convert to percentage, apply step, return to value.
                            return scope_Spectrum.fromStepping(scope_Spectrum.getStep(scope_Spectrum.toStepping(value)));
                        });
                    }
                    // Otherwise, we can simply use the values.
                    return values;
                }
            }

            function generateSpread(density, mode, group) {
                function safeIncrement(value, increment) {
                    // Avoid floating point variance by dropping the smallest decimal places.
                    return (value + increment).toFixed(7) / 1;
                }
                var originalSpectrumDirection = scope_Spectrum.direction,
                    indexes = {},
                    firstInRange = scope_Spectrum.xVal[0],
                    lastInRange = scope_Spectrum.xVal[scope_Spectrum.xVal.length - 1],
                    ignoreFirst = false,
                    ignoreLast = false,
                    prevPct = 0;
                // This function loops the spectrum in an ltr linear fashion,
                // while the toStepping method is direction aware. Trick it into
                // believing it is ltr.
                scope_Spectrum.direction = 0;
                // Create a copy of the group, sort it and filter away all duplicates.
                group = unique(group.slice().sort(function(a, b) {
                    return a - b;
                }));
                // Make sure the range starts with the first element.
                if (group[0] !== firstInRange) {
                    group.unshift(firstInRange);
                    ignoreFirst = true;
                }
                // Likewise for the last one.
                if (group[group.length - 1] !== lastInRange) {
                    group.push(lastInRange);
                    ignoreLast = true;
                }
                group.forEach(function(current, index) {
                    // Get the current step and the lower + upper positions.
                    var step, i, q,
                        low = current,
                        high = group[index + 1],
                        newPct, pctDifference, pctPos, type,
                        steps, realSteps, stepsize;
                    // When using 'steps' mode, use the provided steps.
                    // Otherwise, we'll step on to the next subrange.
                    if (mode === 'steps') {
                        step = scope_Spectrum.xNumSteps[index];
                    }
                    // Default to a 'full' step.
                    if (!step) {
                        step = high - low;
                    }
                    // Low can be 0, so test for false. If high is undefined,
                    // we are at the last subrange. Index 0 is already handled.
                    if (low === false || high === undefined) {
                        return;
                    }
                    // Find all steps in the subrange.
                    for (i = low; i <= high; i = safeIncrement(i, step)) {
                        // Get the percentage value for the current step,
                        // calculate the size for the subrange.
                        newPct = scope_Spectrum.toStepping(i);
                        pctDifference = newPct - prevPct;
                        steps = pctDifference / density;
                        realSteps = Math.round(steps);
                        // This ratio represents the ammount of percentage-space a point indicates.
                        // For a density 1 the points/percentage = 1. For density 2, that percentage needs to be re-devided.
                        // Round the percentage offset to an even number, then divide by two
                        // to spread the offset on both sides of the range.
                        stepsize = pctDifference / realSteps;
                        // Divide all points evenly, adding the correct number to this subrange.
                        // Run up to <= so that 100% gets a point, event if ignoreLast is set.
                        for (q = 1; q <= realSteps; q += 1) {
                            // The ratio between the rounded value and the actual size might be ~1% off.
                            // Correct the percentage offset by the number of points
                            // per subrange. density = 1 will result in 100 points on the
                            // full range, 2 for 50, 4 for 25, etc.
                            pctPos = prevPct + (q * stepsize);
                            indexes[pctPos.toFixed(5)] = ['x', 0];
                        }
                        // Determine the point type.
                        type = (group.indexOf(i) > -1) ? 1 : (mode === 'steps' ? 2 : 0);
                        // Enforce the 'ignoreFirst' option by overwriting the type for 0.
                        if (!index && ignoreFirst) {
                            type = 0;
                        }
                        if (!(i === high && ignoreLast)) {
                            // Mark the 'type' of this point. 0 = plain, 1 = real value, 2 = step value.
                            indexes[newPct.toFixed(5)] = [i, type];
                        }
                        // Update the percentage count.
                        prevPct = newPct;
                    }
                });
                // Reset the spectrum.
                scope_Spectrum.direction = originalSpectrumDirection;
                return indexes;
            }

            function addMarking(spread, filterFunc, formatter) {
                var style = ['horizontal', 'vertical'][options.ort],
                    element = document.createElement('div'),
                    out = '';
                addClass(element, cssClasses[20]);
                addClass(element, cssClasses[20] + '-' + style);

                function getSize(type) {
                    return ['-normal', '-large', '-sub'][type];
                }

                function getTags(offset, source, values) {
                    return 'class="' + source + ' ' + source + '-' + style + ' ' + source + getSize(values[1]) + '" style="' + options.style + ': ' + offset + '%"';
                }

                function addSpread(offset, values) {
                    if (scope_Spectrum.direction) {
                        offset = 100 - offset;
                    }
                    // Apply the filter function, if it is set.
                    values[1] = (values[1] && filterFunc) ? filterFunc(values[0], values[1]) : values[1];
                    // Add a marker for every point
                    out += ' < div ' + getTags(offset, cssClasses[21], values) + '> < /div>';
                    // Values are only appended for points marked '1' or '2'.
                    if (values[1]) {
                        out += ' < div ' + getTags(offset, cssClasses[22], values) + '>' + formatter.to(values[0]) + ' < /div>';
                    }
                }
                // Append all points.
                Object.keys(spread).forEach(function(a) {
                    addSpread(a, spread[a]);
                });
                element.innerHTML = out;
                return element;
            }

            function pips(grid) {
                var mode = grid.mode,
                    density = grid.density || 1,
                    filter = grid.filter || false,
                    values = grid.values || false,
                    stepped = grid.stepped || false,
                    group = getGroup(mode, values, stepped),
                    spread = generateSpread(density, mode, group),
                    format = grid.format || {
                        to: Math.round
                    };
                return scope_Target.appendChild(addMarking(spread, filter, format));
            }
            // Shorthand for base dimensions.
            function baseSize() {
                var rect = scope_Base.getBoundingClientRect(),
                    alt = 'offset' + ['Width', 'Height'][options.ort];
                return options.ort === 0 ? (rect.width || scope_Base[alt]) : (rect.height || scope_Base[alt]);
            }
            // External event handling
            function fireEvent(event, handleNumber, tap) {
                if (handleNumber !== undefined && options.handles !== 1) {
                    handleNumber = Math.abs(handleNumber - options.dir);
                }
                Object.keys(scope_Events).forEach(function(targetEvent) {
                    var eventType = targetEvent.split('.')[0];
                    if (event === eventType) {
                        scope_Events[targetEvent].forEach(function(callback) {
                            callback.call(
                                // Use the slider public API as the scope ('this')
                                scope_Self,
                                // Return values as array, so arg_1[arg_2] is always valid.
                                asArray(valueGet()),
                                // Handle index, 0 or 1
                                handleNumber,
                                // Unformatted slider values
                                asArray(inSliderOrder(Array.prototype.slice.call(scope_Values))),
                                // Event is fired by tap, true or false
                                tap || false,
                                // Left offset of the handle, in relation to the slider
                                scope_Locations);
                        });
                    }
                });
            }
            // Returns the input array, respecting the slider direction configuration.
            function inSliderOrder(values) {
                // If only one handle is used, return a single value.
                if (values.length === 1) {
                    return values[0];
                }
                if (options.dir) {
                    return values.reverse();
                }
                return values;
            }
            // Handler for attaching events trough a proxy.
            function attach(events, element, callback, data) {
                // This function can be used to 'filter' events to the slider.
                // element is a node, not a nodeList
                var method = function(e) {
                        if (scope_Target.hasAttribute('disabled')) {
                            return false;
                        }
                        // Stop if an active 'tap' transition is taking place.
                        if (hasClass(scope_Target, cssClasses[14])) {
                            return false;
                        }
                        e = fixEvent(e, data.pageOffset);
                        // Ignore right or middle clicks on start #454
                        if (events === actions.start && e.buttons !== undefined && e.buttons > 1) {
                            return false;
                        }
                        // Ignore right or middle clicks on start #454
                        if (data.hover && e.buttons) {
                            return false;
                        }
                        e.calcPoint = e.points[options.ort];
                        // Call the event handler with the event [ and additional data ].
                        callback(e, data);
                    },
                    methods = [];
                // Bind a closure on the target for every event type.
                events.split(' ').forEach(function(eventName) {
                    element.addEventListener(eventName, method, false);
                    methods.push([eventName, method]);
                });
                return methods;
            }
            // Handle movement on document for handle and range drag.
            function move(event, data) {
                // Fix #498
                // Check value of .buttons in 'start' to work around a bug in IE10 mobile (data.buttonsProperty).
                // https://connect.microsoft.com/IE/feedback/details/927005/mobile-ie10-windows-phone-buttons-property-of-pointermove-event-always-zero
                // IE9 has .buttons and .which zero on mousemove.
                // Firefox breaks the spec MDN defines.
                if (navigator.appVersion.indexOf("MSIE 9") === -1 && event.buttons === 0 && data.buttonsProperty !== 0) {
                    return end(event, data);
                }
                var handles = data.handles || scope_Handles,
                    positions, state = false,
                    proposal = ((event.calcPoint - data.start) * 100) / data.baseSize,
                    handleNumber = handles[0] === scope_Handles[0] ? 0 : 1,
                    i;
                // Calculate relative positions for the handles.
                positions = getPositions(proposal, data.positions, handles.length > 1);
                state = setHandle(handles[0], positions[handleNumber], handles.length === 1);
                if (handles.length > 1) {
                    state = setHandle(handles[1], positions[handleNumber ? 0 : 1], false) || state;
                    if (state) {
                        // fire for both handles
                        for (i = 0; i < data.handles.length; i++) {
                            fireEvent('slide', i);
                        }
                    }
                } else if (state) {
                    // Fire for a single handle
                    fireEvent('slide', handleNumber);
                }
            }
            // Unbind move events on document, call callbacks.
            function end(event, data) {
                // The handle is no longer active, so remove the class.
                var active = scope_Base.querySelector('.' + cssClasses[15]),
                    handleNumber = data.handles[0] === scope_Handles[0] ? 0 : 1;
                if (active !== null) {
                    removeClass(active, cssClasses[15]);
                }
                // Remove cursor styles and text-selection events bound to the body.
                if (event.cursor) {
                    document.body.style.cursor = '';
                    document.body.removeEventListener('selectstart', document.body.noUiListener);
                }
                var d = document.documentElement;
                // Unbind the move and end events, which are added on 'start'.
                d.noUiListeners.forEach(function(c) {
                    d.removeEventListener(c[0], c[1]);
                });
                // Remove dragging class.
                removeClass(scope_Target, cssClasses[12]);
                // Fire the change and set events.
                fireEvent('set', handleNumber);
                fireEvent('change', handleNumber);
                // If this is a standard handle movement, fire the end event.
                if (data.handleNumber !== undefined) {
                    fireEvent('end', data.handleNumber);
                }
            }
            // Fire 'end' when a mouse or pen leaves the document.
            function documentLeave(event, data) {
                if (event.type === "mouseout" && event.target.nodeName === "HTML" && event.relatedTarget === null) {
                    end(event, data);
                }
            }
            // Bind move events on document.
            function start(event, data) {
                var d = document.documentElement;
                // Mark the handle as 'active' so it can be styled.
                if (data.handles.length === 1) {
                    addClass(data.handles[0].children[0], cssClasses[15]);
                    // Support 'disabled' handles
                    if (data.handles[0].hasAttribute('disabled')) {
                        return false;
                    }
                }
                // Fix #551, where a handle gets selected instead of dragged.
                event.preventDefault();
                // A drag should never propagate up to the 'tap' event.
                event.stopPropagation();
                // Attach the move and end events.
                var moveEvent = attach(actions.move, d, move, {
                        start: event.calcPoint,
                        baseSize: baseSize(),
                        pageOffset: event.pageOffset,
                        handles: data.handles,
                        handleNumber: data.handleNumber,
                        buttonsProperty: event.buttons,
                        positions: [
                            scope_Locations[0],
                            scope_Locations[scope_Handles.length - 1]
                        ]
                    }),
                    endEvent = attach(actions.end, d, end, {
                        handles: data.handles,
                        handleNumber: data.handleNumber
                    });
                var outEvent = attach("mouseout", d, documentLeave, {
                    handles: data.handles,
                    handleNumber: data.handleNumber
                });
                d.noUiListeners = moveEvent.concat(endEvent, outEvent);
                // Text selection isn't an issue on touch devices,
                // so adding cursor styles can be skipped.
                if (event.cursor) {
                    // Prevent the 'I' cursor and extend the range-drag cursor.
                    document.body.style.cursor = getComputedStyle(event.target).cursor;
                    // Mark the target with a dragging state.
                    if (scope_Handles.length > 1) {
                        addClass(scope_Target, cssClasses[12]);
                    }
                    var f = function() {
                        return false;
                    };
                    document.body.noUiListener = f;
                    // Prevent text selection when dragging the handles.
                    document.body.addEventListener('selectstart', f, false);
                }
                if (data.handleNumber !== undefined) {
                    fireEvent('start', data.handleNumber);
                }
            }
            // Move closest handle to tapped location.
            function tap(event) {
                var location = event.calcPoint,
                    total = 0,
                    handleNumber, to;
                // The tap event shouldn't propagate up and cause 'edge' to run.
                event.stopPropagation();
                // Add up the handle offsets.
                scope_Handles.forEach(function(a) {
                    total += offset(a)[options.style];
                });
                // Find the handle closest to the tapped position.
                handleNumber = (location < total / 2 || scope_Handles.length === 1) ? 0 : 1;
                // Check if handler is not disablet if yes set number to the next handler
                if (scope_Handles[handleNumber].hasAttribute('disabled')) {
                    handleNumber = handleNumber ? 0 : 1;
                }
                location -= offset(scope_Base)[options.style];
                // Calculate the new position.
                to = (location * 100) / baseSize();
                if (!options.events.snap) {
                    // Flag the slider as it is now in a transitional state.
                    // Transition takes 300 ms, so re-enable the slider afterwards.
                    addClassFor(scope_Target, cssClasses[14], 300);
                }
                // Support 'disabled' handles
                if (scope_Handles[handleNumber].hasAttribute('disabled')) {
                    return false;
                }
                // Find the closest handle and calculate the tapped point.
                // The set handle to the new position.
                setHandle(scope_Handles[handleNumber], to);
                fireEvent('slide', handleNumber, true);
                fireEvent('set', handleNumber, true);
                fireEvent('change', handleNumber, true);
                if (options.events.snap) {
                    start(event, {
                        handles: [scope_Handles[handleNumber]]
                    });
                }
            }
            // Fires a 'hover' event for a hovered mouse/pen position.
            function hover(event) {
                var location = event.calcPoint - offset(scope_Base)[options.style],
                    to = scope_Spectrum.getStep((location * 100) / baseSize()),
                    value = scope_Spectrum.fromStepping(to);
                Object.keys(scope_Events).forEach(function(targetEvent) {
                    if ('hover' === targetEvent.split('.')[0]) {
                        scope_Events[targetEvent].forEach(function(callback) {
                            callback.call(scope_Self, value);
                        });
                    }
                });
            }
            // Attach events to several slider parts.
            function events(behaviour) {
                var i, drag;
                // Attach the standard drag event to the handles.
                if (!behaviour.fixed) {
                    for (i = 0; i < scope_Handles.length; i += 1) {
                        // These events are only bound to the visual handle
                        // element, not the 'real' origin element.
                        attach(actions.start, scope_Handles[i].children[0], start, {
                            handles: [scope_Handles[i]],
                            handleNumber: i
                        });
                    }
                }
                // Attach the tap event to the slider base.
                if (behaviour.tap) {
                    attach(actions.start, scope_Base, tap, {
                        handles: scope_Handles
                    });
                }
                // Fire hover events
                if (behaviour.hover) {
                    attach(actions.move, scope_Base, hover, {
                        hover: true
                    });
                    for (i = 0; i < scope_Handles.length; i += 1) {
                        ['mousemove MSPointerMove pointermove'].forEach(function(eventName) {
                            scope_Handles[i].children[0].addEventListener(eventName, stopPropagation, false);
                        });
                    }
                }
                // Make the range draggable.
                if (behaviour.drag) {
                    drag = [scope_Base.querySelector('.' + cssClasses[7])];
                    addClass(drag[0], cssClasses[10]);
                    // When the range is fixed, the entire range can
                    // be dragged by the handles. The handle in the first
                    // origin will propagate the start event upward,
                    // but it needs to be bound manually on the other.
                    if (behaviour.fixed) {
                        drag.push(scope_Handles[(drag[0] === scope_Handles[0] ? 1 : 0)].children[0]);
                    }
                    drag.forEach(function(element) {
                        attach(actions.start, element, start, {
                            handles: scope_Handles
                        });
                    });
                }
            }
            // Test suggested values and apply margin, step.
            function setHandle(handle, to, noLimitOption) {
                var trigger = handle !== scope_Handles[0] ? 1 : 0,
                    lowerMargin = scope_Locations[0] + options.margin,
                    upperMargin = scope_Locations[1] - options.margin,
                    lowerLimit = scope_Locations[0] + options.limit,
                    upperLimit = scope_Locations[1] - options.limit;
                // For sliders with multiple handles,
                // limit movement to the other handle.
                // Apply the margin option by adding it to the handle positions.
                if (scope_Handles.length > 1) {
                    to = trigger ? Math.max(to, lowerMargin) : Math.min(to, upperMargin);
                }
                // The limit option has the opposite effect, limiting handles to a
                // maximum distance from another. Limit must be > 0, as otherwise
                // handles would be unmoveable. 'noLimitOption' is set to 'false'
                // for the .val() method, except for pass 4/4.
                if (noLimitOption !== false && options.limit && scope_Handles.length > 1) {
                    to = trigger ? Math.min(to, lowerLimit) : Math.max(to, upperLimit);
                }
                // Handle the step option.
                to = scope_Spectrum.getStep(to);
                // Limit to 0/100 for .val input, trim anything beyond 7 digits, as
                // JavaScript has some issues in its floating point implementation.
                to = limit(parseFloat(to.toFixed(7)));
                // Return false if handle can't move
                if (to === scope_Locations[trigger]) {
                    return false;
                }
                // Set the handle to the new position.
                // Use requestAnimationFrame for efficient painting.
                // No significant effect in Chrome, Edge sees dramatic
                // performace improvements.
                if (window.requestAnimationFrame) {
                    window.requestAnimationFrame(function() {
                        handle.style[options.style] = to + '%';
                    });
                } else {
                    handle.style[options.style] = to + '%';
                }
                // Force proper handle stacking
                if (!handle.previousSibling) {
                    removeClass(handle, cssClasses[17]);
                    if (to > 50) {
                        addClass(handle, cssClasses[17]);
                    }
                }
                // Update locations.
                scope_Locations[trigger] = to;
                // Convert the value to the slider stepping/range.
                scope_Values[trigger] = scope_Spectrum.fromStepping(to);
                fireEvent('update', trigger);
                return true;
            }
            // Loop values from value method and apply them.
            function setValues(count, values) {
                var i, trigger, to;
                // With the limit option, we'll need another limiting pass.
                if (options.limit) {
                    count += 1;
                }
                // If there are multiple handles to be set run the setting
                // mechanism twice for the first handle, to make sure it
                // can be bounced of the second one properly.
                for (i = 0; i < count; i += 1) {
                    trigger = i % 2;
                    // Get the current argument from the array.
                    to = values[trigger];
                    // Setting with null indicates an 'ignore'.
                    // Inputting 'false' is invalid.
                    if (to !== null && to !== false) {
                        // If a formatted number was passed, attemt to decode it.
                        if (typeof to === 'number') {
                            to = String(to);
                        }
                        to = options.format.from(to);
                        // Request an update for all links if the value was invalid.
                        // Do so too if setting the handle fails.
                        if (to === false || isNaN(to) || setHandle(scope_Handles[trigger], scope_Spectrum.toStepping(to), i === (3 - options.dir)) === false) {
                            fireEvent('update', trigger);
                        }
                    }
                }
            }
            // Set the slider value.
            function valueSet(input) {
                var count, values = asArray(input),
                    i;
                // The RTL settings is implemented by reversing the front-end,
                // internal mechanisms are the same.
                if (options.dir && options.handles > 1) {
                    values.reverse();
                }
                // Animation is optional.
                // Make sure the initial values where set before using animated placement.
                if (options.animate && scope_Locations[0] !== -1) {
                    addClassFor(scope_Target, cssClasses[14], 300);
                }
                // Determine how often to set the handles.
                count = scope_Handles.length > 1 ? 3 : 1;
                if (values.length === 1) {
                    count = 1;
                }
                setValues(count, values);
                // Fire the 'set' event for both handles.
                for (i = 0; i < scope_Handles.length; i++) {
                    // Fire the event only for handles that received a new value, as per #579
                    if (values[i] !== null) {
                        fireEvent('set', i);
                    }
                }
            }
            // Get the slider value.
            function valueGet() {
                var i, retour = [];
                // Get the value from all handles.
                for (i = 0; i < options.handles; i += 1) {
                    retour[i] = options.format.to(scope_Values[i]);
                }
                return inSliderOrder(retour);
            }
            // Removes classes from the root and empties it.
            function destroy() {
                cssClasses.forEach(function(cls) {
                    if (!cls) {
                        return;
                    } // Ignore empty classes
                    removeClass(scope_Target, cls);
                });
                while (scope_Target.firstChild) {
                    scope_Target.removeChild(scope_Target.firstChild);
                }
                delete scope_Target.noUiSlider;
            }
            // Get the current step size for the slider.
            function getCurrentStep() {
                // Check all locations, map them to their stepping point.
                // Get the step point, then find it in the input list.
                var retour = scope_Locations.map(function(location, index) {
                    var step = scope_Spectrum.getApplicableStep(location),
                        // As per #391, the comparison for the decrement step can have some rounding issues.
                        // Round the value to the precision used in the step.
                        stepDecimals = countDecimals(String(step[2])),
                        // Get the current numeric value
                        value = scope_Values[index],
                        // To move the slider 'one step up', the current step value needs to be added.
                        // Use null if we are at the maximum slider value.
                        increment = location === 100 ? null : step[2],
                        // Going 'one step down' might put the slider in a different sub-range, so we
                        // need to switch between the current or the previous step.
                        prev = Number((value - step[2]).toFixed(stepDecimals)),
                        // If the value fits the step, return the current step value. Otherwise, use the
                        // previous step. Return null if the slider is at its minimum value.
                        decrement = location === 0 ? null : (prev >= step[1]) ? step[2] : (step[0] || false);
                    return [decrement, increment];
                });
                // Return values in the proper order.
                return inSliderOrder(retour);
            }
            // Attach an event to this slider, possibly including a namespace
            function bindEvent(namespacedEvent, callback) {
                scope_Events[namespacedEvent] = scope_Events[namespacedEvent] || [];
                scope_Events[namespacedEvent].push(callback);
                // If the event bound is 'update,' fire it immediately for all handles.
                if (namespacedEvent.split('.')[0] === 'update') {
                    scope_Handles.forEach(function(a, index) {
                        fireEvent('update', index);
                    });
                }
            }
            // Undo attachment of event
            function removeEvent(namespacedEvent) {
                var event = namespacedEvent.split('.')[0],
                    namespace = namespacedEvent.substring(event.length);
                Object.keys(scope_Events).forEach(function(bind) {
                    var tEvent = bind.split('.')[0],
                        tNamespace = bind.substring(tEvent.length);
                    if ((!event || event === tEvent) && (!namespace || namespace === tNamespace)) {
                        delete scope_Events[bind];
                    }
                });
            }
            // Updateable: margin, limit, step, range, animate, snap
            function updateOptions(optionsToUpdate) {
                var v = valueGet(),
                    i, newOptions = testOptions({
                        start: [0, 0],
                        margin: optionsToUpdate.margin,
                        limit: optionsToUpdate.limit,
                        step: optionsToUpdate.step,
                        range: optionsToUpdate.range,
                        animate: optionsToUpdate.animate,
                        snap: optionsToUpdate.snap === undefined ? options.snap : optionsToUpdate.snap
                    });
                ['margin', 'limit', 'step', 'range', 'animate'].forEach(function(name) {
                    if (optionsToUpdate[name] !== undefined) {
                        options[name] = optionsToUpdate[name];
                    }
                });
                // Save current spectrum direction as testOptions in testRange call
                // doesn't rely on current direction
                newOptions.spectrum.direction = scope_Spectrum.direction;
                scope_Spectrum = newOptions.spectrum;
                // Invalidate the current positioning so valueSet forces an update.
                scope_Locations = [-1, -1];
                valueSet(v);
                for (i = 0; i < scope_Handles.length; i++) {
                    fireEvent('update', i);
                }
            }
            // Throw an error if the slider was already initialized.
            if (scope_Target.noUiSlider) {
                throw new Error('Slider was already initialized.');
            }
            // Create the base element, initialise HTML and set classes.
            // Add handles and links.
            scope_Base = addSlider(options.dir, options.ort, scope_Target);
            scope_Handles = addHandles(options.handles, options.dir, scope_Base);
            // Set the connect classes.
            addConnection(options.connect, scope_Target, scope_Handles);
            if (options.pips) {
                pips(options.pips);
            }
            if (options.tooltips) {
                tooltips();
            }
            scope_Self = {
                destroy: destroy,
                steps: getCurrentStep,
                on: bindEvent,
                off: removeEvent,
                get: valueGet,
                set: valueSet,
                updateOptions: updateOptions,
                options: options, // Issue #600
                target: scope_Target, // Issue #597
                pips: pips // Issue #594
            };
            // Attach user events.
            events(options.events);
            return scope_Self;
        }
        // Run the standard initializer
        function initialize(target, originalOptions) {
            if (!target.nodeName) {
                throw new Error('noUiSlider.create requires a single element.');
            }
            // Test the options and create the slider environment;
            var options = testOptions(originalOptions, target),
                slider = closure(target, options);
            // Use the public value method to set the start values.
            slider.set(options.start);
            target.noUiSlider = slider;
            return slider;
        }
        // Use an object instead of a function for future expansibility;
        return {
            create: initialize
        };
    }));


    (function() {
        'use strict';
        var
            /** @const */
            FormatOptions = ['decimals', 'thousand', 'mark', 'prefix', 'postfix', 'encoder', 'decoder', 'negativeBefore', 'negative', 'edit', 'undo'];
        // General
        // Reverse a string
        function strReverse(a) {
            return a.split('').reverse().join('');
        }
        // Check if a string starts with a specified prefix.
        function strStartsWith(input, match) {
            return input.substring(0, match.length) === match;
        }
        // Check is a string ends in a specified postfix.
        function strEndsWith(input, match) {
            return input.slice(-1 * match.length) === match;
        }
        // Throw an error if formatting options are incompatible.
        function throwEqualError(F, a, b) {
            if ((F[a] || F[b]) && (F[a] === F[b])) {
                throw new Error(a);
            }
        }
        // Check if a number is finite and not NaN
        function isValidNumber(input) {
            return typeof input === 'number' && isFinite(input);
        }
        // Provide rounding-accurate toFixed method.
        function toFixed(value, decimals) {
            var scale = Math.pow(10, decimals);
            return (Math.round(value * scale) / scale).toFixed(decimals);
        }
        // Formatting
        // Accept a number as input, output formatted string.
        function formatTo(decimals, thousand, mark, prefix, postfix, encoder, decoder, negativeBefore, negative, edit, undo, input) {
            var originalInput = input,
                inputIsNegative, inputPieces, inputBase, inputDecimals = '',
                output = '';
            // Apply user encoder to the input.
            // Expected outcome: number.
            if (encoder) {
                input = encoder(input);
            }
            // Stop if no valid number was provided, the number is infinite or NaN.
            if (!isValidNumber(input)) {
                return false;
            }
            // Rounding away decimals might cause a value of -0
            // when using very small ranges. Remove those cases.
            if (decimals !== false && parseFloat(input.toFixed(decimals)) === 0) {
                input = 0;
            }
            // Formatting is done on absolute numbers,
            // decorated by an optional negative symbol.
            if (input < 0) {
                inputIsNegative = true;
                input = Math.abs(input);
            }
            // Reduce the number of decimals to the specified option.
            if (decimals !== false) {
                input = toFixed(input, decimals);
            }
            // Transform the number into a string, so it can be split.
            input = input.toString();
            // Break the number on the decimal separator.
            if (input.indexOf('.') !== -1) {
                inputPieces = input.split('.');
                inputBase = inputPieces[0];
                if (mark) {
                    inputDecimals = mark + inputPieces[1];
                }
            } else {
                // If it isn't split, the entire number will do.
                inputBase = input;
            }
            // Group numbers in sets of three.
            if (thousand) {
                inputBase = strReverse(inputBase).match(/.{1,3}/g);
                inputBase = strReverse(inputBase.join(strReverse(thousand)));
            }
            // If the number is negative, prefix with negation symbol.
            if (inputIsNegative && negativeBefore) {
                output += negativeBefore;
            }
            // Prefix the number
            if (prefix) {
                output += prefix;
            }
            // Normal negative option comes after the prefix. Defaults to '-'.
            if (inputIsNegative && negative) {
                output += negative;
            }
            // Append the actual number.
            output += inputBase;
            output += inputDecimals;
            // Apply the postfix.
            if (postfix) {
                output += postfix;
            }
            // Run the output through a user-specified post-formatter.
            if (edit) {
                output = edit(output, originalInput);
            }
            // All done.
            return output;
        }
        // Accept a sting as input, output decoded number.
        function formatFrom(decimals, thousand, mark, prefix, postfix, encoder, decoder, negativeBefore, negative, edit, undo, input) {
            var originalInput = input,
                inputIsNegative, output = '';
            // User defined pre-decoder. Result must be a non empty string.
            if (undo) {
                input = undo(input);
            }
            // Test the input. Can't be empty.
            if (!input || typeof input !== 'string') {
                return false;
            }
            // If the string starts with the negativeBefore value: remove it.
            // Remember is was there, the number is negative.
            if (negativeBefore && strStartsWith(input, negativeBefore)) {
                input = input.replace(negativeBefore, '');
                inputIsNegative = true;
            }
            // Repeat the same procedure for the prefix.
            if (prefix && strStartsWith(input, prefix)) {
                input = input.replace(prefix, '');
            }
            // And again for negative.
            if (negative && strStartsWith(input, negative)) {
                input = input.replace(negative, '');
                inputIsNegative = true;
            }
            // Remove the postfix.
            // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/slice
            if (postfix && strEndsWith(input, postfix)) {
                input = input.slice(0, -1 * postfix.length);
            }
            // Remove the thousand grouping.
            if (thousand) {
                input = input.split(thousand).join('');
            }
            // Set the decimal separator back to period.
            if (mark) {
                input = input.replace(mark, '.');
            }
            // Prepend the negative symbol.
            if (inputIsNegative) {
                output += '-';
            }
            // Add the number
            output += input;
            // Trim all non-numeric characters (allow '.' and '-');
            output = output.replace(/[^0-9\.\-.]/g, '');
            // The value contains no parse-able number.
            if (output === '') {
                return false;
            }
            // Covert to number.
            output = Number(output);
            // Run the user-specified post-decoder.
            if (decoder) {
                output = decoder(output);
            }
            // Check is the output is valid, otherwise: return false.
            if (!isValidNumber(output)) {
                return false;
            }
            return output;
        }
        // Framework
        // Validate formatting options
        function validate(inputOptions) {
            var i, optionName, optionValue,
                filteredOptions = {};
            for (i = 0; i < FormatOptions.length; i += 1) {
                optionName = FormatOptions[i];
                optionValue = inputOptions[optionName];
                if (optionValue === undefined) {
                    // Only default if negativeBefore isn't set.
                    if (optionName === 'negative' && !filteredOptions.negativeBefore) {
                        filteredOptions[optionName] = '-';
                        // Don't set a default for mark when 'thousand' is set.
                    } else if (optionName === 'mark' && filteredOptions.thousand !== '.') {
                        filteredOptions[optionName] = '.';
                    } else {
                        filteredOptions[optionName] = false;
                    }
                    // Floating points in JS are stable up to 7 decimals.
                } else if (optionName === 'decimals') {
                    if (optionValue >= 0 && optionValue < 8) {
                        filteredOptions[optionName] = optionValue;
                    } else {
                        throw new Error(optionName);
                    }
                    // These options, when provided, must be functions.
                } else if (optionName === 'encoder' || optionName === 'decoder' || optionName === 'edit' || optionName === 'undo') {
                    if (typeof optionValue === 'function') {
                        filteredOptions[optionName] = optionValue;
                    } else {
                        throw new Error(optionName);
                    }
                    // Other options are strings.
                } else {
                    if (typeof optionValue === 'string') {
                        filteredOptions[optionName] = optionValue;
                    } else {
                        throw new Error(optionName);
                    }
                }
            }
            // Some values can't be extracted from a
            // string if certain combinations are present.
            throwEqualError(filteredOptions, 'mark', 'thousand');
            throwEqualError(filteredOptions, 'prefix', 'negative');
            throwEqualError(filteredOptions, 'prefix', 'negativeBefore');
            return filteredOptions;
        }
        // Pass all options as function arguments
        function passAll(options, method, input) {
            var i, args = [];
            // Add all options in order of FormatOptions
            for (i = 0; i < FormatOptions.length; i += 1) {
                args.push(options[FormatOptions[i]]);
            }
            // Append the input, then call the method, presenting all
            // options as arguments.
            args.push(input);
            return method.apply('', args);
        }
        /** @constructor */
        function wNumb(options) {
            if (!(this instanceof wNumb)) {
                return new wNumb(options);
            }
            if (typeof options !== "object") {
                return;
            }
            options = validate(options);
            // Call 'formatTo' with proper arguments.
            this.to = function(input) {
                return passAll(options, formatTo, input);
            };
            // Call 'formatFrom' with proper arguments.
            this.from = function(input) {
                return passAll(options, formatFrom, input);
            };
        }
        /** @export */
        window.wNumb = wNumb;
    }());
$(document).ready(function() {
        $('.noUi-handle').on('click', function() {
            $(this).width(50);
        });
        var rangeSlider = document.getElementById('slider-range');
        var moneyFormat = wNumb({
            decimals: 0,
            thousand: ',',
            prefix: ''
        });
        var minVal = $('#min-value').val();
        var maxVal = $('#max-value').val();
        noUiSlider.create(rangeSlider, {
            start: [0, 1000],
            step: 1,
            range: {
                'min': [1],
                'max': [1000]
            },
            format: moneyFormat,
            connect: true
        });
        // Set visual min and max values and also update value hidden form inputs
        rangeSlider.noUiSlider.on('update', function(values, handle) {
            const low = moneyFormat.from(values[0]);
            const high = moneyFormat.from(values[1]);
            document.getElementById('slider-range-value1').innerHTML = values[0];
            document.getElementById('slider-range-value2').innerHTML = values[1];
            $('#min-value').val(moneyFormat.from(values[0]));
            $('#max-value').val(moneyFormat.from(values[1]));
        });


    $(".item_list").click(function() {
        var country_select = $('.country_select').val();
        // console.log(country_select);return;
        if (country_select) {
            $('.item_list').html("<option>Loading...</option>");
            $.ajax({
                url: '{{url("getSuggestionitems")}}',
                type: 'get',
                dataType: "json",
                data: {
                    search: country_select
                },
                success: function(data) {
                    $('.item_list').html();
                    $('.item_list').html(data.options);
                    $('.item_list').selectize();
                }
            });
        } else {
            toastr["error"]("Error!", "Please select country");
        }
    });
    $('.country_select').selectize();

    // $(".item_list").autocomplete({
    //       source: function(request, response) {
    //           $.ajax({
    //               url: '{{url("getSuggestionitems")}}',
    //               type: 'get',
    //               dataType: "json",
    //               data: {
    //                   search: 'IN'
    //               },
    //               success: function(data) {
    //                   response(data);
    //               }
    //           });
    //       },
    //       select: function(event, ui) {
    //          $(".item_list").val(ui.item.data);
    //          $(".item_list").attr('data-code',ui.item.code);
    //           /*
    //            $(this).parents('tr').find(".itemdesc").find("input").val(ui.item.description);
    //           $(this).parents('tr').find(".itemrate").find("input").val(ui.item.rate);
    //           setTimeout(()=>{
    //               $(this).parents('tr').find(".invoice-select").find("input").val(ui.item.data);
    //               console.log(ui.item.data)
    //           },500) */
    //       }
    //   });
    //   $(document).on('focus','.item_list',function() {
    //       $(this).autocomplete('search', '1')
    //   });



    $(".hiclk").click(function(event) {
        event.stopPropagation();
    });

    $("#searchHot").validate({
        rules: {
            location: "required",
            checkin: "required",
            adults: "required",
        },

        messages: {
            location: "Please enter location",
            checkin: "Please choose Checkin-Checkout dates",
            adults: "Please choose atleast one adult",
        },
        submitHandler: function(form) {
            /*Ajax Request Header setup*/
            form.submit();
        },
    });

    $("#min-value,#max-value").on("click", function(e) {
        $('.searchHot').submit();
    });

    $(document).on("change",'.orderby', function(e) {
        var val = $(this).val();
        var country_select  = $('.country_select ').val();
        $.ajax({
        type: "POST",
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
        url: "{{url('search_hot')}}",
        data: {orderBy:val,country_select :country_select },
        dataType: 'json',
            success: function(data){
                $(".largebox_listing").html(data.html);
            }
        });
    });


    $(".quantity1").on("click", ".plus", function(e) {
        let _Token = $(this).attr('slug');
        let _Adult = parseInt($("#" + _Token + "-qnty-adult").val());
        let _Child = parseInt($("#" + _Token + "-qnty-child").val());
        let _Infant = parseInt($("#" + _Token + "-qnty-room").val());
        let _Total = _Adult + _Child;
        let $input = $(this).prev("input.qty");
        let val = parseInt($input.val());
        let slugId = $input.attr("id");
        switch (slugId) {
            case _Token + "-qnty-adult":
                if (_Total + 1 <= 9 && _Adult + 1 <= 9) {
                    $input.val(val + 1).change();
                } else {
                    toastr["error"]("Error!", "Only 9 passenger is allowed");
                }
                break;
            case _Token + "-qnty-child":
                if (_Total + 1 <= 9 && _Child + 1 <= 9) {
                    $input.val(val + 1).change();
                } else {
                    toastr["error"]("Error!", "Only 9 passenger is allowed");
                }
                break;
            case _Token + "-qnty-room":
                if (_Infant + 1 <= 9) {
                    $input.val(val + 1).change();
                } else {
                    toastr["error"](
                        "Error!",
                        "only 9 room can be booked"
                    );
                }
                break;
        }
    });

    $(".quantity1").on("click", ".minus", function(e) {
        let _Token = $(this).attr('slug');
        let _Adult = parseInt($("#" + _Token + "-qnty-adult").val());
        let _Child = parseInt($("#" + _Token + "-qnty-child").val());
        let _Infant = parseInt($("#" + _Token + "-qnty-room").val());
        let _Total = _Adult + _Child;
        let $input = $(this).next("input.qty");
        var val = parseInt($input.val());
        let slugId = $input.attr("id");
        let vall = 0;
        //alert(_Adult);
        switch (slugId) {
            case _Token + "-qnty-adult":
                if (_Total <= 9 && _Adult <= 9) {
                    if (_Adult - 1 < _Infant) {
                        $("#" + _Token + "-qnty-infant").val("0");
                    }
                } else {
                    toastr["error"]("Error!", "Only 9 passenger is allowed");
                }
                break;
            case _Token + "-qnty-child":
                if (_Total <= 9 && _Child <= 9) {} else {
                    toastr["error"]("Error!", "Only 9 passenger is allowed");
                }
                break;
            case _Token + "-qnty-room":
                if (_Infant <= 9) {} else {
                    toastr["error"](
                        "Error!",
                        "only 9 rooms can be booked "
                    );
                }
                break;
        }

        if (slugId == _Token + "-qnty-adult") {
            vall = 1;
        }
        if (val > vall) {
            $input.val(val - 1).change();
        }
    });

    $('.child_added').click(function() {
        if ($('#oneway-qnty-child').val() > 0) {
            $('.child_ages:last').clone().insertAfter($('.child_ages:last'));
        }
    });
    $('.child_minus').click(function() {
        if ($('#oneway-qnty-child').val() > 1) {
            $('.child_ages:last').remove();
        }
    });
    $('.set-adults-val').click(function(e) {
        e.preventDefault();
        let _Adult = parseInt($("#oneway-qnty-adult").val());
        let _Child = parseInt($("#oneway-qnty-child").val());
        let _Room = parseInt($("#oneway-qnty-room").val());
        let _Total = _Adult + _Child;
        if (_Total == 0) {
            toastr["error"](
                "Error!",
                "Atleast 1 person is required"
            );
        }
        if (_Room == 0) {
            toastr["error"](
                "Error!",
                "Atleast 1 room is required"
            );
        }
        $('.arrowus').val('Adults : ' + _Adult + ', Child : ' + _Child + ', Room : ' + _Room);
        $('.dropslct').hide();
    });
    $('.arrowus').click(function() {
        $('.dropslct').show();
    });


    $("#slider-range").click(function(){
    var price = $("#slider-range-value2").text().replace("$", "")
    // alert(price);
    $.ajax({
        url: "{{URL::to('hotel/filter')}}?" + "&maxPrice=" + price
        , method: 'GET'
        , success: function(data) {
            $('#Cheapest').html(data.html)


        }
    });
})


 $(".starFilter").change(function(){
        var form_data = $("#search_form").serialize();
        $.ajax({
            url: "{{URL::to('hotel/filter')}}",
            method: "POST",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: form_data,
            success: function(data){
                $('#Cheapest').html(data.html)
            }
        });
    });

 $(".rankingFilter").change(function(){
        var form_data = $("#rankingFilter_based").serialize();
        $.ajax({
            url: "{{URL::to('hotel/filter')}}",
            method: "POST",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: form_data,
            success: function(data){
                $('#Cheapest').html(data.html)
            }
        });
    });

 $(".orderbyFilter").change(function(){
    var selectedOptionValue = $(this).val();
    alert(selectedOptionValue);
        $.ajax({
            url: "{{URL::to('hotel/filter')}}",
            method: "POST",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: {
                orderbyFilter:selectedOptionValue
            },
            success: function(data){
                $('#Cheapest').html(data.html)
            }
        });
    });


});
</script>
@endsection
