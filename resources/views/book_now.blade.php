@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->
<!-- page specific style code here-->
@endsection
@section('pageContent')
<div class="container_pd">

<div class="detailsmain">

    <div class="leftmain_rv flxfvf">
        <div class="dts_heading1">
            <h1>Review your Hotel details</h1>
        </div>


        <div class="whitebrd cngmd_hb">
            <div class="top_txt_price bggr d-flex justify-content-between align-items-center">
                <div class="left_top_txt">
                    <h2>Park Avenue Baker Street London
                        <span class="d-flex ml-2"><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i></span>
                    </h2>
                    <span><i class="fa fa-map-marker mr-1"></i>Greater London, United Kingdom</span>
                </div>
                <div class="price_right">
                    <h3>Non-Refundable</h3>
                </div>
            </div>

            <div class="detail_hotel pd15 d-flex">
                <div class="dtls_sp">
                    <img src="images/hotel-big-1.png" alt="" class="img-res" />
                </div>
                <div class="rst_dtls">
                    <ul class="clklist d-flex align-items-center justify-content-between">
                        <li>
                            <h6>CHECK-IN</h6>
                            <h3>Nov 22</h3>
                            <h4>Tue, 3:00 PM</h4>
                        </li>

                        <li>
                            <h5>1 Night</h5>
                        </li>

                        <li>
                            <h6>CHECK-OUT</h6>
                            <h3>Nov 23</h3>
                            <h4>Wed, 11:00 AM</h4>
                        </li>

                        <li>
                            <a href="#">Change Room </a>
                        </li>

                        <li>
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M127.1 146.5c1.3 7.7 8 13.5 16 13.5h16.5c9.8 0 17.6-8.5 16.3-18-3.8-28.2-16.4-54.2-36.6-74.7-14.4-14.7-23.6-33.3-26.4-53.5C111.8 5.9 105 0 96.8 0H80.4C70.6 0 63 8.5 64.1 18c3.9 31.9 18 61.3 40.6 84.4 12 12.2 19.7 27.5 22.4 44.1zm112 0c1.3 7.7 8 13.5 16 13.5h16.5c9.8 0 17.6-8.5 16.3-18-3.8-28.2-16.4-54.2-36.6-74.7-14.4-14.7-23.6-33.3-26.4-53.5C223.8 5.9 217 0 208.8 0h-16.4c-9.8 0-17.5 8.5-16.3 18 3.9 31.9 18 61.3 40.6 84.4 12 12.2 19.7 27.5 22.4 44.1zM400 192H32c-17.7 0-32 14.3-32 32v192c0 53 43 96 96 96h192c53 0 96-43 96-96h16c61.8 0 112-50.2 112-112s-50.2-112-112-112zm0 160h-16v-96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48z"/></svg>Free breakfast</span>
                        </li>
                    </ul>
                    <ul class="clklist d-flex align-items-center justify-content-between mt-3">
                        <li>
                            <h6>Rooms & Guests</h6>
                            <h3>
                                1
                                <span class="sm_ds"> Room</span> 4
                                <span class="sm_ds"> Guest</span>
                            </h3>

                        </li>
                    </ul>

                </div>
            </div>

            <ul class="pd15 clklist1 d-flex align-items-center justify-content-between">
                <li>
                    <h3>Deluxe Room, 1 FullBed, Non Refundable</h3>
                </li>
                <li>
                    <h4>2
                        <span>Adult</span>
                    </h4>
                    <h4>2
                        <span>Children</span>
                    </h4>
                </li>

                <li>
                    <a href="#" data-toggle="modal" data-target="#Essentialinfo">Essential info</a>
                    <a href="#" data-toggle="modal" data-target="#Inclusions">Inclusions</a>
                    <a href="#" data-toggle="modal" data-target="#Facilities">Facilities</a>
                    <a href="#" data-toggle="modal" data-target="#MoreDetails">More Details</a>
                </li>
            </ul>

        </div>
        <!--Essential info-->
        <div class="detailspop_sm">
            <!-- The Modal -->
            <div class="modal fade" id="Essentialinfo">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Essential Information</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="prs">
                                <p>Check-in between 3:00 PM - midnight</p>
                                <p>Check-out before 12:00 PM</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                    it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--Essential info end-->

        <!--Inclusions-->
        <div class="detailspop_sm">
            <!-- The Modal -->
            <div class="modal fade" id="Inclusions">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Inclusions</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="prs">
                                <ul class="d-flex flex-wrap wid3">
                                    <li>Free self parking</li>
                                    <li>Free WiFi</li>
                                    <li>Room Only</li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--Inclusions end-->

        <!--Facilities-->
        <div class="detailspop_lg">
            <!-- The Modal -->
            <div class="modal fade" id="Facilities">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Facilities</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="prs">
                                <ul class="d-flex flex-wrap wid2">
                                    <li><span>Smoking permitted</span></li>
                                    <li><span>Television</span></li>
                                    <li><span>Club level room</span></li>
                                    <li><span>Smoking and Non-Smoking</span></li>
                                    <li><span>Satellite TV service</span></li>
                                    <li><span>Electric kettle</span></li>
                                    <li><span>Soundproofed rooms</span></li>
                                    <li><span>Laptop-friendly workspace</span></li>
                                    <li><span>In-room childcare (surcharge)</span></li>
                                    <li><span>Blackout drapes/curtains</span></li>
                                    <li><span>Minibar</span></li>
                                    <li><span>Separate bathtub and shower</span></li>
                                    <li><span>Coffee/tea maker</span></li>
                                    <li><span>Wardrobe or closet</span></li>
                                    <li><span>Daily housekeeping</span></li>
                                    <li><span>Free WiFi</span></li>
                                    <li><span>Hypo-allergenic bedding available</span></li>
                                    <li><span>Espresso maker</span></li>
                                    <li><span>Bidet</span></li>
                                    <li><span>Phone</span></li>
                                    <li><span>Desk</span></li>
                                    <li><span>Premium TV channels</span></li>
                                    <li><span>Towels provided</span></li>
                                    <li><span>Bedsheets provided</span></li>
                                    <li><span>Netflix</span></li>
                                    <li><span>Connecting/adjoining rooms available</span></li>
                                    <li><span>Slippers</span></li>
                                    <li><span>Streaming services</span></li>
                                    <li><span>Mobile key entry</span></li>
                                    <li><span>Private bathroom</span></li>
                                    <li><span>Bathrobes</span></li>
                                    <li><span>Wheelchair accessible</span></li>
                                    <li><span>Free toiletries</span></li>
                                    <li><span>Down comforter</span></li>
                                    <li><span>Air conditioning</span></li>
                                    <li><span>Hair dryer</span></li>
                                    <li><span>Iron/ironing board</span></li>
                                    <li><span>In-room safe</span></li>
                                    <li><span>Pay movies</span></li>
                                    <li><span>Rollaway/extra beds (surcharge)</span></li>
                                    <li><span>Room service (24 hours)</span></li>
                                    <li><span>Free newspaper</span></li>
                                    <li><span>Free bottled water</span></li>
                                    <li><span>Free cribs/infant beds</span></li>
                                </ul>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--Facilities end-->


        <!--MoreDetails-->
        <div class="detailspop_sm">
            <!-- The Modal -->
            <div class="modal fade" id="MoreDetails">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">More Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="prs">
                                <p><strong>2 Twin Beds</strong></p>
                                <p>366-sq-foot room with sea views</p>
                                <p><b>Club Level -</b> Club Lounge access, continental breakfast, light refreshments, Internet access in the lounge, and 1 hour of meeting room use (subject to availability)</p>
                                <p><b>Internet -</b> Free WiFi</p>
                                <p><b>Entertainment -</b> 55-inch TV with premium channels and Netflix</p>
                                <p><b>Food & Drink -</b>Espresso maker, minibar (fees may apply), electric kettle, and 24-hour room service</p>
                                <p><b>Sleep -</b>Hypo-allergenic bedding, a down duvet, blackout drapes/curtains, and bed sheets</p>
                                <p><b>Bathroom </b>Private bathroom, separate bathtub and shower, bathrobes, and slippers</p>
                                <p><b>Practical -</b>Safe, free newspaper, and iron/ironing board; rollaway/extra beds and free cribs/infant beds available on request</p>
                                <p><b>Comfort -</b>Air conditioning and daily housekeeping</p>
                                <p><b>Accessibility - </b>Wheelchair accessible</p>
                                <p>Smoking And Non-Smoking</p>
                                <p>Connecting/adjoining rooms can be requested, subject to availability</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--MoreDetails end-->



        <div class="whitebrd mt-3">
            <div class="dts_heading">

                <h1><img src="images/loginics.svg" class="img-res">&nbsp;Login-in your Account</h1>

                <div class="ds mds">

                    <a href="#" class="undr" data-toggle="modal" data-target="#login">Login</a>
                    <a href="#" class="cntds">Continue as Guest</a>
                </div>
            </div>
        </div>


        <div class="dts_heading1 mt-2">
            <h1>Review your Hotel details</h1>
        </div>
        <div class="whitebrd pd15 ">
            <span class="error_info"><i class="fa fa-info-circle mr-1"></i>Please make sure you enter the Name as per your Government photo id.</span>
            <div class="slideform mt-3">
                <div class="accordion" id="faq">
                    <div class="card">
                        <div class="card-header" id="faqhead1">
                            <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1"> Room 1 </a>
                        </div>

                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                            <div class="card-body">
                                <div class="add_details">
                                    <div class="adbox d-flex align-items-center">
                                        <h2>Adult 1</h2>
                                        <div class="for_add d-flex">
                                            <div class="droptitle slcbs">
                                                <select class="sltclick">
                                        <option hidden data-ioshidden value="" id="hideclick">Title</option>
                                        <option>Mr</option>
                                        <option>Ms</option>
                                        <option>Mrs</option>
                                    </select>
                                            </div>
                                        </div>

                                        <div class="inpse1 ">
                                            <input type="text" class="form-input" placeholder="First Name / Given Name">
                                        </div>

                                        <div class="inpse1 ">
                                            <input type="text" class="form-input" placeholder="Last Name / Surname">
                                        </div>


                                    </div>
                                    <div class="adbox d-flex align-items-center">
                                        <h2>Adult 2</h2>
                                        <div class="for_add d-flex">
                                            <div class="droptitle slcbs">
                                                <select class="sltclick">
                                        <option hidden data-ioshidden value="" id="hideclick">Title</option>
                                        <option>Mr</option>
                                        <option>Ms</option>
                                        <option>Mrs</option>
                                    </select>
                                            </div>
                                        </div>

                                        <div class="inpse1 ">
                                            <input type="text" class="form-input" placeholder="First Name / Given Name">
                                        </div>

                                        <div class="inpse1 ">
                                            <input type="text" class="form-input" placeholder="Last Name / Surname">
                                        </div>


                                    </div>
                                    <div class="adbox d-flex align-items-center">
                                        <h2>Child 3</h2>
                                        <div class="for_add d-flex">
                                            <div class="droptitle slcbs">
                                                <select class="sltclick">
                                        <option hidden data-ioshidden value="" id="hideclick">Title</option>
                                        <option>Mr</option>
                                        <option>Ms</option>
                                        <option>Mrs</option>
                                    </select>
                                            </div>
                                        </div>

                                        <div class="inpse1 ">
                                            <input type="text" class="form-input" placeholder="First Name / Given Name">
                                        </div>

                                        <div class="inpse1 ">
                                            <input type="text" class="form-input" placeholder="Last Name / Surname">
                                        </div>


                                    </div>
                                    <div class="adbox d-flex align-items-center">
                                        <h2>Child 4</h2>
                                        <div class="for_add d-flex">
                                            <div class="droptitle slcbs">
                                                <select class="sltclick">
                                        <option hidden data-ioshidden value="" id="hideclick">Title</option>
                                        <option>Mr</option>
                                        <option>Ms</option>
                                        <option>Mrs</option>
                                    </select>
                                            </div>
                                        </div>

                                        <div class="inpse1 ">
                                            <input type="text" class="form-input" placeholder="First Name / Given Name">
                                        </div>

                                        <div class="inpse1 ">
                                            <input type="text" class="form-input" placeholder="Last Name / Surname">
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cj_data">
                <input type="checkbox" id="Save" name="Save" value="">
                <label for="Save"> Save Entire Traveller details</label>
            </div>


        </div>


        <div class="dts_heading1 mt-2">
            <h1>Contact information</h1>
        </div>
        <div class="whitebrd pd15 ">
            <div class="row">
                <div class="col-sm-12">
                    <p class="titxt">Your ticket and hotels information will be sent here..</p>
                </div>
                <div class="col-sm-4">

                    <div class="inpse ">
                        <label>Phone Number</label>
                        <div class="form-group">
                            <input type="text" id="mobile_code" class="" placeholder="Phone Number" name="name">
                        </div>
                        <script>
                            $(document).ready(function() {

                                $("#mobile_code").intlTelInput({

                                    initialCountry: "in",

                                    separateDialCode: true,

                                    // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"

                                });

                            });
                        </script>

                    </div>

                </div>



                <div class="col-sm-4">
                    <div class="inpse ">
                        <label>Email</label>
                        <input type="text" id="email" name="email" placeholder="Email">
                    </div>

                </div>

            </div>
        </div>



        <div class="dts_heading1 mt-2">
            <h1>Travel services</h1>
        </div>
        <div class="whitebrd pd15 ">
            <div class="row">
                <div class="col-sm-12">
                    <p class="titxt">Save more by using our frequent travel service</p>
                </div>
                <div class="col-sm-12">
                    <div class="ckrv">
                        <ul>
                            <li>
                                <input type="checkbox" id="myCheckbox4">
                                <label for="myCheckbox4" class="brse">
                                    <div class="mels_ck d-flex">
                                        <span><img src="images/Forex.svg" class="img-res"></span>                                               
                                        <h5>Forex</h5>
                                    </div>
                                </label>

                            </li>

                            <li>
                                <input type="checkbox" id="myCheckbox1">
                                <label for="myCheckbox1" class="brse">
                                    <div class="mels_ck d-flex">
                                        <span><img src="images/Insurance.svg" class="img-res"></span>
                                        <h5>Domestic Travel Insurance</h5>

                                    </div>

                                </label>

                            </li>

                            <li>
                                <input type="checkbox" id="myCheckbox2">
                                <label for="myCheckbox2" class="brse">
                                    <div class="mels_ck d-flex">
                                        <span><img src="images/Insurance.svg" class="img-res"></span>
                                        <h5>Overseas Travel Insurance</h5>
                                    </div>
                                </label>
                            </li>
                            <!-- <li>
                                <input type="checkbox" id="myCheckbox3">
                                <label for="myCheckbox3" class="brse">
                                    <div class="mels_ck d-flex">
                                        <span><img src="images/SeatSelection.svg" class="img-res"></span>
                                        <h5>Select All</h5>
                                    </div>
                                </label>
                            </li> -->





                        </ul>

                    </div>

                </div>





            </div>
        </div>



        <div class="dts_heading1 mt-2">
            <h1>Essential Information</h1>
        </div>
        <div class="whitebrd pd15 ">
            <div class="enh_txt">
                <h4>Inclusions</h4>
                <h3>Room 1</h3>
                <p>BreakFast</p>
                <h4>Hotel Policy</h4>
                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                    specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                    passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <h4>HOTEL POLICY</h4>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                    survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                    recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <h4>CHECKIN SPECIAL INSTRUCTIONS</h4>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                    survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more
                    recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>

            </div>

        </div>


        <div class="float-right lrfs mt-3">

            <button type="submit" id="booking-details" class="btn-grad ftbtn_src">Continue to Payment&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>

        </div>
        <div class="clear"></div>

    </div>

    <div class="rightmain_rv ">
        <div class="dts_heading1">
            <h2>Fare Summary</h2>
        </div>





        <div class="pritotal_main  ">
            <div class="whitebrd fare_ic ">
                <div class="accordion" id="farenew">
                    <div class="card">
                        <div class="card-header" id="farehead1">
                            <a href="#" class="btn btn-header-link d-flex justify-content-between  align-items-center" data-toggle="collapse" data-target="#fr1" aria-expanded="true" aria-controls="faq1">
                                <h5>Room Rates </h5>
                                <span class="float-right"><i class="fa fa-rupee mr-1"></i>2,78,976.6</span>
                            </a>
                        </div>

                        <div id="fr1" class="collapse show" aria-labelledby="farehead1" data-parent="#farenew">
                            <div class="card-body">
                                <div class="prce d-flex justify-content-between align-items-center">
                                    <span>Room 1</span>
                                    <span><i class="fa fa-rupee mr-1"></i>2,78,976.6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="farehead2">

                            <a href="#" class="btn btn-header-link d-flex justify-content-between  align-items-center" data-toggle="collapse" data-target="#fare2" aria-expanded="true" aria-controls="faq2">
                                <h5>Tax & Charges </h5>
                                <span class="float-right"><i class="fa fa-rupee mr-1"></i>1,20,867</span>
                            </a>
                        </div>

                        <div id="fare2" class="collapse" aria-labelledby="farehead2" data-parent="#farenew">
                            <div class="card-body">
                                <div class="prce d-flex justify-content-between align-items-center">
                                    <span>Taxes and Charges</span>
                                    <span><i class="fa fa-rupee mr-1"></i>62,770</span>
                                </div>
                                <div class="prce d-flex justify-content-between align-items-center">
                                    <span>Other Charges</span>
                                    <span><i class="fa fa-rupee mr-1"></i>58,096.86</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="totalpd d-flex justify-content-between align-items-center">
                    <h6>Total Amount:</h6>
                    <h6><i class="fa fa-rupee mr-1"></i>3,99,844</h6>
                </div>
            </div>




            <div class="farebox whitebrd ">

                <h3>Apply Promo Code</h3>
                <div class="inpse pd15">
                    <input type="text" id="email" name="email" placeholder="Enter promocode">

                    <div class="bookbtn_fare">
                        <a href="#" class="btn-grad ftbtn_src">Apply Code</a>
                    </div>

                </div>



            </div>



            <div class="cntfare whitebrd pdbox_wht">

                <span><i class="fa fa-question"></i></span>

                <div class="prcntvd">

                    <h5>For customer support</h5>

                    <p>

                        Please call <a href="tel:0000000000">0000000000</a> or

                        <span>24/7 (Monday to Sunday).</span></p>

                </div>

            </div>



        </div>



    </div>

</div>

</div>

@endsection