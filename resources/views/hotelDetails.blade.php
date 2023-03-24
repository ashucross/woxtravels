@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->
<!-- page specific style code here-->
@endsection
@section('pageContent')
@php

@endphp
<div class="container_pd">
    <div class="row">
        <div class="col-sm-12">
            <div class="top_txt_price d-flex justify-content-between align-items-center">
                <div class="left_top_txt">
                    <h1>{{ $hotelDetails->name }}
                        @php
                        $rooms = json_decode($hotelDetails->response_data)->rooms;
                        $hotelDetailsGet = getHotelImage($hotelDetails->code, getsignature()['data']);
                        $hotelDetailsFind = $hotelDetailsGet['status'] == 200 ? $hotelDetailsGet['data']['hotel'] : '';
                        // dd($hotelDetailsFind['images']);
                        @endphp
                        <span class="d-flex ml-2">
                            @php
                            $explode = explode(" ", $hotelDetails->categoryName);
                            for($i=0; $i<$explode[0]; $i++) { echo '<i
                                class="fa fa-star"></i>' ; } @endphp</span>
                    </h1>
                    <span><i class="fa fa-map-marker mr-1"></i>{{ $hotelDetails->address }}, {{
                        $hotelDetails->destinationName }}</span>
                </div>
                <div class="price_right">
                    <h2><i class="fa fa-dollar mr-1"></i>{{ $hotelDetails->maxRate }}</h2>
                    <a href="{{url('book_now')}}" class="btn-grad bkd">BOOK THIS NOW</a>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <section class="slidertop">
                @php
                $arrayHotel = $hotelDetailsFind['images'];
                $first_ten_keys = array_slice($arrayHotel, 0, 7, true); // extract the first 10 keys
                @endphp
                <div class="slider slider-for">
                    @if(!empty($first_ten_keys))
                    @foreach ($first_ten_keys as $hotelImg)
                    <div>
                        <div class="mrgbox">
                            <img src="https://photos.hotelbeds.com/giata/{{ $hotelImg['path']  }}"
                                alt="{{  $hotelImg['path']}}" class="img-res" />
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="slider slider-nav">
                    @if(!empty($first_ten_keys))
                    @foreach ($first_ten_keys as $hotelImg)
                    <div>
                        <div class="mrgbox">
                            <img src="https://photos.hotelbeds.com/giata/{{ $hotelImg['path']  }}"
                                alt="{{  $hotelImg['path']}}" class="img-res" />
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>


            </section>

            <div class="bookmark_txt d-flex">
                <a href="#section1" class="active_nav">Description</a>
                <a href="#section2">Rooms</a>
                <a href="#section3">Amenities</a>

            </div>

            <section class="discription_para  page-section" id="section1">
                <h3 class="headingall_ht">Description</h3>
                <div class="hegitbx ara_disp">
                    <p>{{ $hotelDetailsFind['description']['content'] ?? '' }}</p>
                </div>
                {{-- <button id="moreless1" class="ml_btn moreless paraclick">
                    <span class="fa fa-angle-down"></span> View More
                </button> --}}
            </section>

            <section class="roombox  page-section" id="section2">
                <h3 class="headingall_ht">Select Your Room</h3>

                @if(!empty($rooms))
                @foreach ($rooms as $key => $room )
                @foreach ($room->rates as $rate)
                <div class="largebox_listing">
                    @php
                    // dd($rate);
                    $hotelImg = $hotelDetailsFind['images'][$key++];
                    @endphp
                    <div class="lglist">
                        <div class="list_hotel_img">
                            <div class="lgzoomimg">
                                <a href="#">
                                    <img src="https://photos.hotelbeds.com/giata/{{ $hotelImg['path']  }}" class="img-res" />
                                </a>
                            </div>
                        </div>

                        <div class="list_hotel_txt">
                            <div class="listing_hd_hotel">
                                <h2><span>
                                        {{ $room->name }}</span>
                                    <div class="startbx smallstar">
                                        <span>{{ $explode[0] }}&nbsp;-&nbsp;</span>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </h2>

                                <ul class="listbt_sml">
                                    <li><a href="#">{{ $hotelDetails->address }}, {{
                                            $hotelDetails->destinationName }}</a></li>
                                </ul>


                                <ul class="iconsml">

                                    {{-- <li>

                                        <span><img src="{{url('assets/images/Pool.png')}}" class="img-res" /></span>

                                        <span>Pool</span>

                                    </li>



                                    <li>

                                        <span><img src="{{url('assets/images/FreeParking.png')}}"
                                                class="img-res" /></span>

                                        <span>Free Parking</span>

                                    </li>



                                    <li>

                                        <span><img src="{{url('assets/images/Spa.png')}}" class="img-res" /></span>

                                        <span>Spa</span>

                                    </li>



                                    <li>

                                        <span><img src="{{url('assets/images/Gym.png')}}" class="img-res" /></span>

                                        <span>Gym</span>

                                    </li>



                                    <li>

                                        <span><img src="{{url('assets/images/Restaurant.png')}}"
                                                class="img-res" /></span>

                                        <span>Restaurant</span>

                                    </li> --}}



                                    <li>

                                        {{ $rate->boardName }}

                                    </li>
                                    {{-- <li>

                                        <span><img src="{{url('assets/images/Bar.png')}}" class="img-res" /></span>

                                        <span>Bar</span>

                                    </li> --}}





                                </ul>
                                <div class="green_ex">
                                    <span><i class="fa fa-star"></i>&nbsp;4.77 (48 reviews)</span>
                                </div>
                            </div>
                        </div>
                        <div class="pribtns">
                            <div class="priceshow">
                                <h3><i class="fa fa-dollar mr-1"></i> {{ $rate->net }}
                                    <span>per night</span>
                                </h3>
                                <p>total <i class="fa fa-dollar mr-1"></i>30,000 for 3 nights Tax & fees Inclusive</p>
                            </div>

                            <div class="hotslc">
                                @php
                                $rate_key = checkrates($rate->rateKey)['data']->hotel->rooms[0]->rates[0]->rateKey;

                                // $rate_key = $checkrates_response['hotels'][0]['rooms'][0]['rates'][0]['rateKey']
                                    // dd( checkrates($rate->rateKey));die;
                                @endphp
                                {{-- rateKey --}}
                                <a href="{{  url('book_now/'. $rate->rateKey) }}" class="btn-grad ftbtn_src">Book Now<i class="fa fa-angle-right ml5"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </section>
            @endif



            <section class="Amenitiesbx page-section" id="section3">
                <div class="amtbox">
                    <h3 class="headingall_ht">Amenities</h3>
                    <div class="amt_icon d-flex flex-wrap">
                        <div class="amities_rpt d-flex">
                            <span class="imgblack"><img src="{{url('assets/images/Wifi_b.svg')}}" alt=""
                                    class="imgres " /></span>
                            <span class="imagewhite"><img src="{{url('assets/images/Wifi_w.svg')}}" alt=""
                                    class="imgres " /></span>
                            <h3>Wifi</h3>
                        </div>

                        <div class="amities_rpt d-flex">
                            <span class="imgblack"><img src="{{url('assets/images/Wake-upcall_b.svg')}}" alt=""
                                    class="imgres " /></span>
                            <span class="imagewhite"><img src="{{url('assets/images/Wake-upcall_w.svg')}}" alt=""
                                    class="imgres " /></span>
                            <h3>Wake-up call</h3>
                        </div>

                        <div class="amities_rpt d-flex">
                            <span class="imgblack"><img src="{{url('assets/images/Bathrobes_b.svg')}}" alt=""
                                    class="imgres " /></span>
                            <span class="imagewhite"><img src="{{url('assets/images/Bathrobes_w.svg')}}" alt=""
                                    class="imgres " /></span>
                            <h3>Bathrobes</h3>
                        </div>

                        <div class="amities_rpt d-flex">
                            <span class="imgblack"><img src="{{url('assets/images/Fitnesscenter_b.svg')}}" alt=""
                                    class="imgres " /></span>
                            <span class="imagewhite"><img src="{{url('assets/images/Fitnesscenter_w.svg')}}" alt=""
                                    class="imgres " /></span>
                            <h3>Fitness center</h3>
                        </div>

                        <div class="amities_rpt d-flex">
                            <span class="imgblack"><img src="{{url('assets/images/Telephone_b.svg')}}" alt=""
                                    class="imgres " /></span>
                            <span class="imagewhite"><img src="{{url('assets/images/Telephone_w.svg')}}" alt=""
                                    class="imgres " /></span>
                            <h3>Telephone</h3>
                        </div>

                        <div class="amities_rpt d-flex">
                            <span class="imgblack"><img src="{{url('assets/images/Drycleaning_b.svg')}}" alt=""
                                    class="imgres " /></span>
                            <span class="imagewhite"><img src="{{url('assets/images/Drycleaning_w.svg')}}" alt=""
                                    class="imgres " /></span>
                            <h3>Dry cleaning</h3>
                        </div>

                        <div class="amities_rpt d-flex">
                            <span class="imgblack"><img src="{{url('assets/images/Minibar_b.svg')}}" alt=""
                                    class="imgres " /></span>
                            <span class="imagewhite"><img src="{{url('assets/images/Minibar_w.svg')}}" alt=""
                                    class="imgres " /></span>
                            <h3>Mini bar</h3>
                        </div>

                        <!--  <div class="amities_rpt d-flex">
                                <span class="imgblack"><img src="images/Hairdryer_b.svg" alt="" class="imgres " /></span>
                                <span class="imagewhite"><img src="images/Hairdryer_w.svg" alt="" class="imgres " /></span>
                                <h3>Hair dryer</h3>
                            </div>

                            <div class="amities_rpt d-flex">
                                <span class="imgblack"><img src="images/Highchair_b.svg" alt="" class="imgres " /></span>
                                <span class="imagewhite"><img src="images/Highchair_w.svg" alt="" class="imgres " /></span>
                                <h3>High chair</h3>
                            </div>

                            <div class="amities_rpt d-flex">
                                <span class="imgblack"><img src="images/Restaurant_b.svg" alt="" class="imgres " /></span>
                                <span class="imagewhite"><img src="images/Restaurant_w.svg" alt="" class="imgres " /></span>
                                <h3>Restaurant</h3>
                            </div>

                            <div class="amities_rpt d-flex">
                                <span class="imgblack"><img src="images/AirConditioning_b.svg" alt="" class="imgres " /></span>
                                <span class="imagewhite"><img src="images/AirConditioning_w.svg" alt="" class="imgres " /></span>
                                <h3>Air Conditioning</h3>
                            </div>

                            <div class="amities_rpt d-flex">
                                <span class="imgblack"><img src="images/Slippers_b.svg" alt="" class="imgres " /></span>
                                <span class="imagewhite"><img src="images/Slippers_w.svg" alt="" class="imgres " /></span>
                                <h3>Slippers</h3>
                            </div> -->
                    </div>

                </div>

                <div class="nrs_box">
                    <h3 class="headingall_ht">Nearest Essentials</h3>

                    <div class="boxnear_full">
                        <div class="nearfield d-flex flex-wrap ">
                            <div class="boxnear_txt">
                                <h4>Airports</h4>
                                <span>London City Airport (LCY)
                                    <span>14.4 km</span>
                                </span>
                                <span>Heathrow Airport (LHR)
                                    <span>21.2 km</span>
                                </span>
                            </div>

                            <div class="boxnear_txt">
                                <h4>Public transportation
                                </h4>
                                <span>Marble Arch Tube Station
                                    <span>40 m</span>
                                </span>
                                <span>Baker Street Tube Station
                                    <span>9 m</span>
                                </span>
                            </div>

                            <div class="boxnear_txt">
                                <h4>Hospital or clinic</h4>
                                <span>The Wellington Hospital
                                    <span>21.1 km</span>
                                </span>

                            </div>

                            <div class="boxnear_txt">
                                <h4>Horsepower (hp)</h4>
                                <span>200</span>

                            </div>

                            <div class="boxnear_txt">
                                <h4>Transmission</h4>
                                <span>Manual</span>

                            </div>

                            <div class="boxnear_txt">
                                <h4>Condition</h4>
                                <span>New</span>

                            </div>

                            <div class="boxnear_txt">
                                <h4>Drive</h4>
                                <span>Rear</span>

                            </div>

                            <div class="boxnear_txt">
                                <h4>Warranty</h4>
                                <span>Yes</span>

                            </div>

                            <div class="boxnear_txt">
                                <h4>Hospital or clinic</h4>
                                <span>The Wellington Hospital
                                    <span>2.1 km</span>
                                </span>

                            </div>



                        </div>

                    </div>

                </div>
            </section>





        </div>



        <div class="col-sm-4 pl0 changehd">

            <section class="htolst position-relative clearfix">

                <div class="tabsearh_input">

                    <div class="boxsearching ">

                        <div class="">

                            <div class="search_des  ">

                                <div class="Fromwhere position-relative">



                                    <div class="position-relative">

                                        <span class="iconint"><i class="fa fa-map-marker"></i></span>

                                        <input type="text" class="input_src leftri input_hgt"
                                            placeholder="Where are you going?" data-toggle="dropdown" />



                                        <div class="dropdown-menu drp_plane">

                                            <div class="plane_list">

                                                <span>Top Cities</span>

                                                <ul>

                                                    <li>

                                                        <div class="fli_name"><i class="fa fa-hotel"></i> Delhi

                                                        </div>

                                                        <div class="airport_name"><span>1214
                                                                properties</span><span>India</span></div>

                                                    </li>

                                                    <li>

                                                        <div class="fli_name"><i class="fa fa-hotel"></i> Mumbai

                                                        </div>

                                                        <div class="airport_name"><span>1214
                                                                properties</span><span>India</span></div>

                                                    </li>

                                                    <li>

                                                        <div class="fli_name"><i class="fa fa-hotel"></i> Bengaluru

                                                        </div>

                                                        <div class="airport_name"><span>1720
                                                                properties</span><span>India</span></div>

                                                    </li>





                                                </ul>

                                            </div>

                                        </div>

                                    </div>



                                </div>





                            </div>



                            <div class="search_date ht_width_dt">







                                <div class="position-relative ">



                                    <span class="iconint"><i class="fa fa-calendar"></i></span>



                                    <input aut type="text" name="ckein" placeholder="Check-In - Check-Out"
                                        class="input_src  input_hgt ">



                                </div>



                            </div>




                            <div class="search_adult ht_width_tr">



                                <!-- <h3 class="search_title">Travelers</h3> -->



                                <div class="position-relative " data-toggle="dropdown">



                                    <span class="iconint"><i class="fa fa-user-o"></i></span>



                                    <input aut type="text" value="2 adults - 10 children - 1 room"
                                        class="input_src input_hgt ups arrowus">



                                    <!-- <span class="ar_tv"><i class="ml-2 fa fa-angle-down"></i></span> -->



                                    <div class="dropslct">



                                        <div class="dropdown-menu dropdown-menu-right">

                                            <div class="htlad">

                                                <div class="qty_box">

                                                    <div class=" d-flex justify-content-between align-items-center">



                                                        <span>Adult:



                                                        </span>



                                                        <div id='myform' method='POST' class='quantity' action='#'>



                                                            <input type='button' value='-' class='qtyminus minus'
                                                                field='quantity' />



                                                            <input type='text' name='quantity' value='0' class='qty' />



                                                            <input type='button' value='+' class='qtyplus plus'
                                                                field='quantity' />



                                                        </div>







                                                    </div>



                                                </div>





                                                <div class="qty_box">

                                                    <div class=" d-flex justify-content-between align-items-center">



                                                        <span>Child:

                                                            <span class="agetxt">Ages 0 - 17</span>

                                                        </span>



                                                        <div id='myform' method='POST' class='quantity' action='#'>



                                                            <input type='button' value='-' class='qtyminus minus'
                                                                field='quantity' />



                                                            <input type='text' name='quantity' value='0' class='qty' />



                                                            <input type='button' value='+' class='qtyplus plus'
                                                                field='quantity' />



                                                        </div>



                                                    </div>

                                                    <div class="d-flex box_child flex-wrap">

                                                        <div class="childxd">

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

                                                        </div>

                                                        <div class="childxd">

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

                                                        </div>



                                                    </div>

                                                    <div class="ht_qt_txt">
                                                        <p>To find you a place to stay that fits your entire group along
                                                            with correct prices, we need to know how old your children
                                                            will be at check-out</p>
                                                    </div>

                                                </div>



                                                <div class="qty_box">

                                                    <div class="d-flex justify-content-between align-items-center">



                                                        <span>Rooms

                                                        </span>



                                                        <div id='myform' method='POST' class='quantity' action='#'>



                                                            <input type='button' value='-' class='qtyminus minus'
                                                                field='quantity' />



                                                            <input type='text' name='quantity' value='0' class='qty' />



                                                            <input type='button' value='+' class='qtyplus plus'
                                                                field='quantity' />



                                                        </div>



                                                    </div>






                                                </div>

                                            </div>



                                            <div class="btntv">

                                                <button type="submit" class="btn-grad ftbtn_src">Done</button>

                                            </div>



                                        </div>



                                    </div>



                                </div>











                            </div>






                            <div class="searchbtn d-flex">



                                <button type="submit" class="btn-grad ftbtn_src"><i class="fa fa-paper-plane-o mr-2"
                                        aria-hidden="true"></i>Seach Hotel</button>

                            </div>

                        </div>







                    </div>



                </div>

            </section>
            <div class="mapbox">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15544.320449561204!2d80.28291785!3d13.094109150000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f509f4372af%3A0xb24f67e09b80003f!2sGeorge%20Town%2C%20Chennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1665567535064!5m2!1sen!2sin"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    jQuery(function($) {
            $('.moreless').on('click', function() {
                var $el = $(this),
                    textNode = this.lastChild;
                $el.find('span').toggleClass('fa-angle-down fa-angle-up');
                textNode.nodeValue = '' + ($el.hasClass('moreless') ? 'View Less' : ' View More ')
                $el.toggleClass('moreless');
            });
        });

        $(document).ready(function() {
            $(".paraclick").click(function() {
                $(".para_dis").toggleClass("hegitbx");
            });



            $(".bookmark_txt>a").click(function() {
                if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
                    if (target.length) {
                        $("html, body").animate({
                            scrollTop: target.offset().top - 80
                        }, 1000);
                        return false;
                    }
                }
            });
            $(window)
                .scroll(function() {
                    var scrollDistance = $(window).scrollTop();
                    $(".page-section").each(function(i) {
                        if ($(this).position().top - 100 <= scrollDistance) {
                            $(".bookmark_txt .active_nav").removeClass("active_nav");
                            $(".bookmark_txt>a").eq(i).addClass("active_nav");
                        }
                    });
                })
                .scroll();
        });
</script>

@endsection
