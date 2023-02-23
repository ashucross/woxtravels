@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->
<!-- page specific style code here-->
@endsection
@section('pageContent')
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

                <div class="d-flex justify-content-between">

                    <div class="search_des d-flex justify-content-between ">

                        <div class="Fromwhere position-relative">



                            <div class="position-relative">

                                <span class="iconint"><i class="fa fa-map-marker"></i></span>

                                <input type="text" value='{{getdestinationName($params["location"]) ?? ""}}' class="input_src leftri input_hgt" placeholder="Where are you going?" data-toggle="dropdown" />



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



                            <input value='{{$params["checkin"] ?? ""}}' aut type="text" name="ckein" placeholder="Check-In - Check-Out" class="input_src  input_hgt ">


                        </div>



                    </div>

                    <div class="search_adult ht_width_tr">



                        <!-- <h3 class="search_title">Travelers</h3> -->



                        <div class="position-relative " data-toggle="dropdown">



                            <span class="iconint"><i class="fa fa-user-o"></i></span>



                            <input value='{{$params["adults"] ?? ""}}' type="text" value="2 adults - 10 children - 1 room" class="input_src input_hgt ups arrowus">



                            <!-- <span class="ar_tv"><i class="ml-2 fa fa-angle-down"></i></span> -->



                            <div class="dropslct">



                                <div class="dropdown-menu dropdown-menu-right">

                                    <div class="htlad">

                                        <div class="qty_box">

                                            <div class=" d-flex justify-content-between align-items-center">



                                                <span>Adult:



                                                </span>



                                                <div id='myform' method='POST' class='quantity' action='#'>



                                                    <input type='button' value='-' class='qtyminus minus' field='quantity' />



                                                    <input type='text' name='quantity' value='0' class='qty' />



                                                    <input type='button' value='+' class='qtyplus plus' field='quantity' />



                                                </div>







                                            </div>



                                        </div>





                                        <div class="qty_box">

                                            <div class=" d-flex justify-content-between align-items-center">



                                                <span>Child:

                                                    <span class="agetxt">Ages 0 - 17</span>

                                                </span>



                                                <div id='myform' method='POST' class='quantity' action='#'>



                                                    <input type='button' value='-' class='qtyminus minus' field='quantity' />



                                                    <input type='text' name='quantity' value='0' class='qty' />



                                                    <input type='button' value='+' class='qtyplus plus' field='quantity' />



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
                                                <p>To find you a place to stay that fits your entire group along with correct prices, we need to know how old your children will be at check-out</p>
                                            </div>

                                        </div>



                                        <div class="qty_box">

                                            <div class="d-flex justify-content-between align-items-center">



                                                <span>Rooms

                                                </span>



                                                <div id='myform' method='POST' class='quantity' action='#'>



                                                    <input type='button' value='-' class='qtyminus minus' field='quantity' />



                                                    <input type='text' name='quantity' value='0' class='qty' />



                                                    <input type='button' value='+' class='qtyplus plus' field='quantity' />



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



                    <div class="searchbtn d-flex mt-0">



                        <button type="submit" class="btn-grad ftbtn_src mt-0"><i class="fa fa-paper-plane-o mr-2" aria-hidden="true"></i>Search Hotel</button>

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

                                <a data-toggle="collapse" data-parent="#accordion" href="#PRICE" aria-expanded="true">

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

                                            <strong>Min:</strong> <span id="slider-range-value1"></span>

                                        </div>

                                        <div class=" text-right caption">

                                            <strong>Max:</strong> <span id="slider-range-value2"></span>

                                        </div>

                                    </div>



                                    <form>

                                        <input type="hidden" name="min-value" value="">

                                        <input type="hidden" name="max-value" value="">

                                    </form>







                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" href="#Popularfilters" aria-expanded="true">

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

                                            <label for="Swimmingpool1" class="label-container checkbox-default">Swimming

                                                pool

                                                <input name="Swimmingpool" class="flightfilter" id="Swimmingpool1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc"> 14 </span>

                                        </li>

                                        <li>

                                            <label for="Verygoodrating1" class="label-container checkbox-default">Very good

                                                rating

                                                <input name="Verygoodrating" class="Verygoodrating" id="Verygoodrating1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">248</span>

                                        </li>



                                        <li>

                                            <label for="Beachfront1" class="label-container checkbox-default">Beachfront

                                                <input name="Beachfront" class="flightfilter" id="Beachfront1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">1</span>

                                        </li>



                                        <li>

                                            <label for="Centrallylocated1" class="label-container checkbox-default">Centrally

                                                located

                                                <input name="Centrallylocated" class="flightfilter" id="Centrallylocated1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">512</span>

                                        </li>



                                        <li>

                                            <label for="Hidesoldout1" class="label-container checkbox-default">Hide sold

                                                out

                                                <input name="Hidesoldout1" class="flightfilter" id="Hidesoldout1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>



                                        </li>





                                    </ul>

                                </div>



                            </div>

                        </div>

                    </div>



                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <a data-toggle="collapse" data-parent="#accordion" href="#Stars" aria-expanded="true" aria-expanded="true">

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

                                        <li>

                                            <label for="star1" class="label-container checkbox-default">

                                                <div class="startbx">

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                </div>

                                                <input name="star" class="flightfilter" id="star1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc"> 56 </span>

                                        </li>



                                        <li>

                                            <label for="star2" class="label-container checkbox-default">

                                                <div class="startbx">

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                </div>

                                                <input name="star" class="flightfilter" id="star2" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">314</span>

                                        </li>

                                        <li>

                                            <label for="star3" class="label-container checkbox-default">

                                                <div class="startbx">

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                </div>

                                                <input name="star" class="flightfilter" id="star3" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">591</span>

                                        </li>



                                        <li>

                                            <label for="star4" class="label-container checkbox-default">

                                                <div class="startbx">

                                                    <i class="fa fa-star"></i>

                                                    <i class="fa fa-star"></i>

                                                </div>

                                                <input name="star" class="flightfilter" id="star4" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">119</span>

                                        </li>



                                        <li>

                                            <label for="star5" class="label-container checkbox-default">

                                                <div class="startbx">

                                                    <i class="fa fa-star"></i>

                                                </div>

                                                <input name="star" class="flightfilter" id="star5" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">38</span>

                                        </li>







                                    </ul>

                                </div>



                            </div>

                        </div>

                    </div>









                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <a data-toggle="collapse" data-parent="#accordion" href="#Hotelrating" aria-expanded="true">

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

                                    <ul class="check-boxes-custom list-checkboxes">

                                        <li>

                                            <label for="Excellent1" class="label-container checkbox-default">Excellent

                                                <input name="Excellent" class="flightfilter" id="Excellent1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">172</span>

                                        </li>

                                        <li>

                                            <label for="Verygood1" class="label-container checkbox-default">Very good

                                                <input name="Verygood" class="Verygoodrating" id="Verygood1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">246</span>

                                        </li>



                                        <li>

                                            <label for="Good1" class="label-container checkbox-default">Good

                                                <input name="Good" class="flightfilter" id="Good1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">188</span>

                                        </li>



                                        <li>

                                            <label for="Fair1" class="label-container checkbox-default">Fair

                                                <input name="Fair" class="flightfilter" id="Fair1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">90</span>

                                        </li>



                                        <li>

                                            <label for="Poor1" class="label-container checkbox-default">Poor

                                                <input name="Poor" class="flightfilter" id="Poor1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">57</span>

                                        </li>





                                    </ul>

                                </div>



                            </div>

                        </div>

                    </div>





                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h4 class="panel-title">

                                <a data-toggle="collapse" data-parent="#accordion" href="#Facilities" aria-expanded="true">

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

                                        <li>

                                            <label for="24hourfrontdesk1" class="label-container checkbox-default">24-hour

                                                front desk

                                                <input name="24hourfrontdesk" class="flightfilter" id="24hourfrontdesk1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">918</span>

                                        </li>

                                        <li>

                                            <label for="24hourroomservice1" class="label-container checkbox-default">24-hour

                                                room service

                                                <input name="24hourroomservice" class="Verygoodrating" id="24hourroomservice1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">0</span>

                                        </li>



                                        <li>

                                            <label for="Airconditioning1" class="label-container checkbox-default">Air

                                                conditioning

                                                <input name="Airconditioning" class="flightfilter" id="Airconditioning1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">33</span>

                                        </li>



                                        <li>

                                            <label for="Beachnearby1" class="label-container checkbox-default">Beach

                                                nearby

                                                <input name="Beachnearby" class="flightfilter" id="Beachnearby1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">1</span>

                                        </li>



                                        <li>

                                            <label for="Carparking1" class="label-container checkbox-default">Car parking

                                                <input name="Carparking" class="flightfilter" id="Carparking1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">241</span>

                                        </li>



                                        <li>

                                            <label for="Facilitiesfordisabled1" class="label-container checkbox-default">Facilities

                                                for disabled

                                                <input name="Facilitiesfordisabled" class="flightfilter" id="Facilitiesfordisabled1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">631</span>

                                        </li>



                                        <li>

                                            <label for="Fitnesscenter1" class="label-container checkbox-default">Fitness

                                                center

                                                <input name="Fitnesscenter" class="flightfilter" id="Fitnesscenter1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">170</span>

                                        </li>



                                        <li>

                                            <label for="Freecarparking1" class="label-container checkbox-default">Free car

                                                parking

                                                <input name="Freecarparking" class="flightfilter" id="Freecarparking1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">18</span>

                                        </li>





                                        <li>

                                            <label for="Freewifi1" class="label-container checkbox-default">Free wifi

                                                <input name="Freewifi" class="flightfilter" id="Freewifi1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">993</span>

                                        </li>



                                        <li>

                                            <label for="Kitchen1" class="label-container checkbox-default">Kitchen

                                                <input name="Kitchen" class="flightfilter" id="Kitchen1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">3</span>

                                        </li>



                                        <li>

                                            <label for="Nonsmokingrooms1" class="label-container checkbox-default">Non smoking

                                                rooms

                                                <input name="Nonsmokingrooms" class="flightfilter" id="Nonsmokingrooms1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">40</span>

                                        </li>



                                        <li>

                                            <label for="Petsallowed1" class="label-container checkbox-default">Pets

                                                allowed

                                                <input name="Petsallowed" class="flightfilter" id="Petsallowed1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">17</span>

                                        </li>



                                        <li>

                                            <label for="Roomservice1" class="label-container checkbox-default">Room

                                                service

                                                <input name="Roomservice" class="flightfilter" id="Roomservice1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">16</span>

                                        </li>



                                        <li>

                                            <label for="Areashuttle1" class="label-container checkbox-default">Area

                                                shuttle

                                                <input name="Areashuttle" class="flightfilter" id="Areashuttle1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">45</span>

                                        </li>



                                        <li>

                                            <label for="Smokingrooms1" class="label-container checkbox-default">Smoking

                                                rooms

                                                <input name="Smokingrooms" class="flightfilter" id="Smokingrooms1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">0</span>

                                        </li>



                                        <li>

                                            <label for="Spacenter1" class="label-container checkbox-default">Spa center

                                                <input name="Spacenter" class="flightfilter" id="Spacenter1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">0</span>

                                        </li>



                                        <li>

                                            <label for="Swimmingpool1" class="label-container checkbox-default">Swimming

                                                pool

                                                <input name="Swimmingpool" class="flightfilter" id="Swimmingpool" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">14</span>

                                        </li>



                                        <li>

                                            <label for="Wifi1" class="label-container checkbox-default">Wifi

                                                <input name="Wifi" class="flightfilter" id="Wifi1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">95</span>

                                        </li>



                                        <li>

                                            <label for="Covid19HygieneProtocols1" class="label-container checkbox-default">Covid-19

                                                Hygiene Protocols

                                                <input name="Covid19HygieneProtocols" class="flightfilter" id="Covid19HygieneProtocols1" type="checkbox" value="1">

                                                <span class="checkmark"></span>

                                            </label>

                                            <span class="lsprc">0</span>

                                        </li>



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
                <h2>Paris, France&nbsp;&nbsp;:&nbsp;&nbsp;<span>1123 hotels available</span> 
                    <p>Our best prices have now loaded</p> 
                </h2> 
                <div class="ratingdrop">  
                    <select class="lidr_pc"> 
                        <option>Rating</option> 
                        <option>Price&nbsp;&nbsp;:&nbsp;&nbsp;low to high</option> 
                        <option>Price&nbsp;&nbsp;:&nbsp;&nbsp;high to low</option> 
                        <option>Distance</option> 
                    </select> 
                </div> 
            </div>









            <div class="largebox_listing"> 
            @if(!empty($hotelsdata))
            @if(!empty($hotelsdata->hotels) && count($hotelsdata->hotels) > 0)
            @foreach($hotelsdata->hotels as $hotel)
                <div class="lglist"> 
                    <div class="list_hotel_img"> 
                        <div class="lgzoomimg"> 
                            <a href="#"> 
                                <img src="{{asset('/assets/images/Hera.jpg')}}" class="img-res" /> 
                            </a> 
                        </div> 
                    </div> 
                    <div class="list_hotel_txt"> 
                        <div class="listing_hd_hotel"> 
                            <h2><span>{{$hotel->name ?? ''}}</span> 
                                <div class="startbx smallstar"> 
                                    <span>5&nbsp;-&nbsp;</span> 
                                    <i class="fa fa-star"></i> 
                                </div> 
                            </h2> 
                            <ul class="listbt_sml"> 
                                <li><a href="#">{{$hotel->categoryName ?? ''}}</a></li>
                                <li><a href="#">{{$hotel->destinationName ?? ''}}</a></li>
                            </ul> 
                            <ul class="iconsml">
                                <li>
                                    <span><img src="images/Pool.png" class="img-res" /></span>
                                    <span>Pool</span>
                                </li>
                                <li>
                                    <span><img src="images/FreeParking.png" class="img-res" /></span>
                                    <span>Free Parking</span>
                                </li>
                                <li>
                                    <span><img src="images/Spa.png" class="img-res" /></span>
                                    <span>Spa</span>
                                </li>
                                <li>
                                    <span><img src="images/Gym.png" class="img-res" /></span>
                                    <span>Gym</span>
                                </li>
                                <li>
                                    <span><img src="images/Restaurant.png" class="img-res" /></span>
                                    <span>Restaurant</span>
                                </li>
                                <li>
                                    <span><img src="images/Bar.png" class="img-res" /></span>
                                    <span>Bar</span>
                                </li>
                            </ul>
                            <div class="green_ex">
                                <span><i class="fa fa-star"></i>&nbsp;4.77 (48 reviews)</span>
                            </div>
                        </div>
                    </div>
                    <div class="pribtns">
                        <div class="priceshow">
                            <h3><!-- <i class="fa fa-dollar mr-1"></i> -->{{$hotel->currency ?? ''}} {{$hotel->minRate ?? ''}} - {{$hotel->maxRate ?? ''}}
                                <span>per night</span>
                            </h3>
                            <!-- <p>total <i class="fa fa-dollar mr-1"></i>30,000 for 3 nights Tax & fees Inclusive</p> -->
                        </div>
                        <div class="hotslc">
                            <a href="{{url('hotelDetails')}}" class="btn-grad ftbtn_src">Book Now<i class="fa fa-angle-right ml5" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            @endif


                {{--<div class="lglist">

                        <div class="list_hotel_img">

                            <div class="lgzoomimg">

                                <a href="#">

                                    <img src="images/Hera.jpg" class="img-res" />

                                </a>

                            </div>



                        </div>



                        <div class="list_hotel_txt">



                            <div class="listing_hd_hotel">

                                <h2><span>The Hera Hotel Sapanca</span>

                                    <div class="startbx smallstar">

                                        <span>5&nbsp;-&nbsp;</span>

                                        <i class="fa fa-star"></i>



                                    </div>

                                </h2>

                                <ul class="listbt_sml">

                                    <li><a href="#">Cayici Mahallesi, Izmit Cd. No 44, Sapanca, 54600, Sakarya</a></li>



                                </ul>



                                <ul class="iconsml">

                                    <li>

                                        <span><img src="images/Pool.png" class="img-res" /></span>

                                        <span>Pool</span>

                                    </li>



                                    <li>

                                        <span><img src="images/FreeParking.png" class="img-res" /></span>

                                        <span>Free Parking</span>

                                    </li>



                                    <li>

                                        <span><img src="images/Spa.png" class="img-res" /></span>

                                        <span>Spa</span>

                                    </li>



                                    <li>

                                        <span><img src="images/Gym.png" class="img-res" /></span>

                                        <span>Gym</span>

                                    </li>



                                    <li>

                                        <span><img src="images/Restaurant.png" class="img-res" /></span>

                                        <span>Restaurant</span>

                                    </li>



                                    <li>

                                        <span><img src="images/Bar.png" class="img-res" /></span>

                                        <span>Bar</span>

                                    </li>





                                </ul>



                                <div class="green_ex">

                                    <span><i class="fa fa-star"></i>&nbsp;4.77 (48 reviews)</span>

                                </div>









                            </div>



                        </div>



                        <div class="pribtns">

                            <div class="priceshow">

                                <h3><i class="fa fa-dollar mr-1"></i>10,000

                                    <span>per night</span>

                                </h3>

                                <p>total <i class="fa fa-dollar mr-1"></i>30,000 for 3 nights Tax & fees Inclusive</p>

                            </div>

                            <div class="hotslc">

                                <a href="#" class="btn-grad ftbtn_src">Book Now<i class="fa fa-angle-right ml5"

                                        aria-hidden="true"></i></a>

                            </div>

                        </div>

                    </div>--}}



            </div>







        </div>

    </section>

</div>

@endsection