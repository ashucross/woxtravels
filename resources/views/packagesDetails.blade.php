@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->

<!-- page specific style code here-->
@endsection
@section('pageContent')
<style>
    .dflex_js>li {
        width: auto;
    }
</style>
<!-- The send query -->
<div class="popsend">
    <div class="modal fade" id="sendquery">
        <div class="modal-dialog">
            <div class="modal-content">
                <h4 class="modal-title"><i class="fa fa-envelope mr-2"></i>Send Enquiry </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <div class="modal-body">
                    <div class="form_pop_send">
                        <form method="POST" action="{{ url('/query/package/store') }}">
                            @csrf
                            <input type="hidden" name="package_id" value="{{ $data['package']->id }}">
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" required class="form-control" name="cname" placeholder="Enter Name">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Name">Email</label>
                                        <input type="text" required class="form-control" name="email" placeholder="Enter Email">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Name">Country Of Residence</label>
                                        <input type="text" required class="form-control" name="residence"
                                            placeholder="Enter Country Of Residence">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Name">City</label>
                                        <input type="text" required class="form-control" name="city" placeholder="Enter City">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Name">Phone Number</label>
                                        <input type="number" required class="form-control" name="phone" placeholder="Enter City">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Name">Number of Guest</label>
                                        <input type="text" class="form-control" name="tGuest"
                                            placeholder="Enter Number of Guest">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Name">Travel Month</label>
                                        <select name="tMonth">
                                            <option>Select Travel Month</option>
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                            <option>July</option>
                                            <option>August</option>
                                            <option>September</option>
                                            <option>October</option>
                                            <option>November</option>
                                            <option>December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Name">Additional Message</label>
                                        <textarea name="aMessage" id="" cols="30" rows="3"
                                            placeholder="Enter Additional Message"></textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="sbt_pop">
                            <button type="submit" class="btn-grad ftbtn_src">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container_pd scrlh">
    <div class="row">
        <div class="col-sm-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <div class="top_txt_price d-flex justify-content-between align-items-center">
                <div class="left_top_txt">
                    <h1>{{$data['package']->package_name}}</h1>
                    <h6>{{$data['package']->no_of_nights}} Nights / {{$data['package']->no_of_days}} Days</h6>
                    <br>
                    <span>{{$data['package']->details_day_night}}</span>
                </div>
                <div class="price_right">
                    <h2>
                        <i class="fa fa-dollar mr-1"></i>{{number_format($data['package']->sales_price, 0)}}
                    </h2>
                    <a href="#" data-toggle="modal" data-target="#sendquery" class="btn-orng ftbtn_src">
                        <i class="fa fa-envelope mr-1"></i>Send Enquiry </i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-9">
                    <section class="slidertop">
                        <div class="slider slider-for">
                            @php
                            $admin_url = env('IMGURLGET', 'sfdsf');
                            @endphp
                            @foreach ($data['packageGallery'] as $key => $img)
                            @php
                            $fetchggimage = MediaImage($img->package_gallery_image);
                            @endphp
                            <div>
                                <div class="mrgbox">
                                    <img src="{{ $admin_url . '/public/img/media_gallery/'.@ $fetchggimage->images;  }}"
                                        alt="{{ $img->package_gallery_image_alt }}" class="img-res" />
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="slider slider-nav">
                            @foreach ($data['packageGallery'] as $key => $img)
                            @php
                            $fetchggimage = MediaImage($img->package_gallery_image);
                            @endphp
                            <div>
                                <div class="mrgbox">
                                    <img src="{{ $admin_url . '/public/img/media_gallery/'.@ $fetchggimage->images;  }}"
                                        alt="{{ $img->package_gallery_image_alt }}" class="img-res" />
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-sm-3">
                    <div class="dwn_ls">
                        <a href="#">
                            <i class="fa fa-download mr-1"></i>Download Itinerary </a>
                        <span>Share</span>
                        <a href="#">
                            <i class="fa fa-facebook mr-1"></i>Facebook </a>
                        <a href="#">
                            <i class="fa fa-whatsapp mr-1"></i>Whats App </a>
                        <a href="#">
                            <i class="fa fa-twitter mr-1"></i>Twitter </a>
                        <a href="#">
                            <i class="fa fa-linkedin mr-1"></i>Linkedin </a>
                    </div>
                </div>
            </div>
            <div class="bookmark_txt d-flex">
                <a href="#section1" class="active_nav">Overview</a>
                <a href="#section2">Inclusion</a>
                <a href="#section3">Itinerary</a>
                <a href="#section4">Hotels</a>
                <a href="#section5">Flights</a>
                <a href="#section6">Add on Tours</a>
                <a href="#section7">Terms & Condition</a>
            </div>
            <section class="discription_para  page-section" id="section1">
                <h3 class="headingall_ht">Description</h3>
                <div class="hegitbx para_dis">
                    <p>{{ strip_tags($data['package']->package_overview) }}</p>
                </div>
                <button id="moreless1" class="ml_btn moreless paraclick">
                    <span class="fa fa-angle-down"></span> View More </button>
            </section>
            <section class="roombox  page-section" id="section2">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="Inclusion_tx">
                            <h3 class="headingall_ht">Inclusion</h3>
                            @if(!empty($data['inclusions']))
                            <ul>
                                @foreach($data['inclusions'] as $INC)
                                <li>{{$INC->name}}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="Inclusion_tx">
                            <h3 class="headingall_ht">Exclusion</h3>
                            @if(!empty($data['exclusions']))
                            <ul>
                                @foreach($data['exclusions'] as $EXC)
                                <li>{{$EXC->name}}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <section class="roombox  page-section" id="section3">
                <div class="Itinerary_bx">
                    <h3 class="headingall_ht">Itinerary</h3>
                    <ul class="cbp_tmtimeline">
                        @foreach($data['packageItineraries'] as $key => $ITER)
                        <li>
                            <time class="cbp_tmtime" datetime="">
                                <span>Day</span>
                            </time>
                            <div class="cbp_tmicon"> {{ $key+1 }} </div>
                            <div class="cbp_tmlabel">
                                <h4>{{$ITER->title}}</h4>
                                {!! $ITER->details!!}
                                <div class="itinery_meals">
                                    <h6>Meals:</h6>
                                    <ul class="bullets">
                                        <li>
                                            <i class="fa fa-cutlery"></i>
                                        </li>
                                        <li>{{$ITER->foodtype}}</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <section class="roombox  page-section" id="section4">
                <h3 class="headingall_ht">Hotel Details</h3>
                @foreach($data['hotels'] as $HOTELS)
                @php
                // dd($HOTELS);
                @endphp
                <div class="largebox_listing">
                    <div class="lglist">
                        <div class="list_hotel_img">
                            <div class="lgzoomimg">
                                <a href="#">
                                    <img src="{{ $admin_url . '/public/img/hotel_img/'.$HOTELS->image;  }}"
                                        class="img-res" />

                                </a>
                            </div>
                        </div>
                        <div class="list_hotel_txt">
                            <div class="listing_hd_hotel">
                                <h2>
                                    <span> {{$HOTELS->hotelName}}</span>
                                    <div class="startbx smallstar">
                                        <span>5&nbsp;-&nbsp;</span>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </h2>
                                <ul class="listbt_sml">
                                    <li>
                                        <a href="#">{!!$HOTELS->description!!}</a>
                                    </li>
                                </ul>
                                <ul class="iconsml">
                                    <li>
                                        <span>
                                            <img src="{{asset('public/assets/images/Pool.png')}}" class="img-res" />
                                        </span>
                                        <span>Pool</span>
                                    </li>
                                    <li>
                                        <span>
                                            <img src="{{asset('public/assets/images/FreeParking.png')}}"
                                                class="img-res" />
                                        </span>
                                        <span>Free Parking</span>
                                    </li>
                                    <li>
                                        <span>
                                            <img src="{{asset('public/assets/images/Spa.png')}}" class="img-res" />
                                        </span>
                                        <span>Spa</span>
                                    </li>
                                    <li>
                                        <span>
                                            <img src="{{asset('public/assets/images/Gym.png')}}" class="img-res" />
                                        </span>
                                        <span>Gym</span>
                                    </li>
                                    <li>
                                        <span>
                                            <img src="{{asset('public/assets/images/Restaurant.png')}}"
                                                class="img-res" />
                                        </span>
                                        <span>Restaurant</span>
                                    </li>
                                    <li>
                                        <span>
                                            <img src="{{asset('public/assets/images/Bar.png')}}" class="img-res" />
                                        </span>
                                        <span>Bar</span>
                                    </li>
                                </ul>
                                <div class="green_ex">
                                    <span>
                                        <i class="fa fa-star"></i>&nbsp;4.77 (48 reviews) </span>
                                </div>
                            </div>
                        </div>
                        <div class="pribtns">
                            <div class="hotslc">
                                <p>Included in trip</p>
                                <a href="#" class="btn-grad ftbtn_src">Upgrade Hotel</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--<div class="largebox_listing">-->
                <!--    <div class="lglist">-->
                <!--        <div class="list_hotel_img">-->
                <!--            <div class="lgzoomimg">-->
                <!--                <a href="#">-->
                <!--                    <img src="{{asset('public/assets/images/Hera.jpg')}}" class="img-res" />-->
                <!--                </a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="list_hotel_txt">-->
                <!--            <div class="listing_hd_hotel">-->
                <!--                <h2>-->
                <!--                    <span> Deluxe Twin Room</span>-->
                <!--                    <div class="startbx smallstar">-->
                <!--                        <span>5&nbsp;-&nbsp;</span>-->
                <!--                        <i class="fa fa-star"></i>-->
                <!--                    </div>-->
                <!--                </h2>-->
                <!--                <ul class="listbt_sml">-->
                <!--                    <li>-->
                <!--                        <a href="#">Cayici Mahallesi, Izmit Cd. No 44, Sapanca, 54600, Sakarya</a>-->
                <!--                    </li>-->
                <!--                </ul>-->
                <!--                <ul class="iconsml">-->
                <!--                    <li>-->
                <!--                        <span>-->
                <!--                            <img src="{{asset('public/assets/images/Pool.png')}}" class="img-res" />-->
                <!--                        </span>-->
                <!--                        <span>Pool</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <span>-->
                <!--                            <img src="{{asset('public/assets/images/FreeParking.png')}}" class="img-res" />-->
                <!--                        </span>-->
                <!--                        <span>Free Parking</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <span>-->
                <!--                            <img src="{{asset('public/assets/images/Spa.png')}}" class="img-res" />-->
                <!--                        </span>-->
                <!--                        <span>Spa</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <span>-->
                <!--                            <img src="{{asset('public/assets/images/Gym.png')}}" class="img-res" />-->
                <!--                        </span>-->
                <!--                        <span>Gym</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <span>-->
                <!--                            <img src="{{asset('public/assets/images/Restaurant.png')}}" class="img-res" />-->
                <!--                        </span>-->
                <!--                        <span>Restaurant</span>-->
                <!--                    </li>-->
                <!--                    <li>-->
                <!--                        <span>-->
                <!--                            <img src="{{asset('public/assets/images/Bar.png')}}" class="img-res" />-->
                <!--                        </span>-->
                <!--                        <span>Bar</span>-->
                <!--                    </li>-->
                <!--                </ul>-->
                <!--                <div class="green_ex">-->
                <!--                    <span>-->
                <!--                        <i class="fa fa-star"></i>&nbsp;4.77 (48 reviews) </span>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="pribtns">-->
                <!--            <div class="hotslc">-->
                <!--                <p>Included in trip</p>-->
                <!--                <a href="#" class="btn-grad ftbtn_src">Upgrade Hotel</a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </section>
            <section class="roombox  page-section" id="section5" style="">
                <h3 class="headingall_ht">Flight Details</h3>
                <div class="listticket dptxts">
                    <h4>Departure</h4>
                    <ul class="tktlist">
                        <li class="trip" style="display: list-item;">
                            <div class="largehead">
                                <h4>Departure Journey &nbsp;&nbsp;|&nbsp;&nbsp; <span> Sep 21 2022</span>
                                </h4>
                            </div>
                            <div class="flexlist">
                                <div class="inuot_bx">
                                    <div class="tmingtk ">
                                        <ul class="dflex_js mbs">
                                            <li>
                                                <div class="airnm">
                                                    <span>
                                                        <img src="https://travel24hr.com/img/airline/AI.gif"
                                                            class="img-res" alt="AI">
                                                    </span>
                                                    <h6>AIR INDIA</h6>
                                                </div>
                                            </li>
                                            <li class="tooltip1">
                                                <p> 06:10&nbsp; <span>(DEL)</span>
                                                </p>
                                                <span class="blkts">India (Delhi)</span>
                                                <div class="tooltiptext">
                                                    <h6>
                                                        <strong>06:10 .</strong> Sep-21-2022 <span> India (Delhi)
                                                        </span>
                                                    </h6>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="blkts cnts">2h 45m</span>
                                                <span class="hrst"></span>
                                                <span class="blkts cnts">0 Stop</span>
                                            </li>
                                            <li class="tooltip1 text-right">
                                                <p> 08:55&nbsp; <span>(BLR)</span>
                                                </p>
                                                <span class="blkts">India (Bangalore)</span>
                                                <div class="tooltiptext">
                                                    <h6>
                                                        <strong> BLR 08:55 .</strong> Sep-21-22 <span>India (Bangalore)
                                                        </span>
                                                    </h6>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="bagbx">
                                            <span>
                                                <img src="{{asset('public/assets/images/Baggage-gray.svg')}}">&nbsp; 25
                                                kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="listticket dptxts">
                    <h4>Return</h4>
                    <ul class="tktlist">
                        <li class="trip" style="display: list-item;">
                            <div class="largehead">
                                <h4>Departure Journey &nbsp;&nbsp;|&nbsp;&nbsp; <span> Sep 21 2022</span>
                                </h4>
                            </div>
                            <div class="flexlist">
                                <div class="inuot_bx">
                                    <div class="tmingtk ">
                                        <ul class="dflex_js mbs">
                                            <li>
                                                <div class="airnm">
                                                    <span>
                                                        <img src="https://travel24hr.com/img/airline/AI.gif"
                                                            class="img-res" alt="AI">
                                                    </span>
                                                    <h6>AIR INDIA</h6>
                                                </div>
                                            </li>
                                            <li class="tooltip1">
                                                <p> 06:10&nbsp; <span>(DEL)</span>
                                                </p>
                                                <span class="blkts">India (Delhi)</span>
                                                <div class="tooltiptext">
                                                    <h6>
                                                        <strong>06:10 .</strong> Sep-21-2022 <span> India (Delhi)
                                                        </span>
                                                    </h6>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="blkts cnts">2h 45m</span>
                                                <span class="hrst"></span>
                                                <span class="blkts cnts">0 Stop</span>
                                            </li>
                                            <li class="tooltip1 text-right">
                                                <p> 08:55&nbsp; <span>(BLR)</span>
                                                </p>
                                                <span class="blkts">India (Bangalore)</span>
                                                <div class="tooltiptext">
                                                    <h6>
                                                        <strong> BLR 08:55 .</strong> Sep-21-22 <span>India (Bangalore)
                                                        </span>
                                                    </h6>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="bagbx">
                                            <span>
                                                <img src="{{asset('public/assets/images/Baggage-gray.svg')}}">&nbsp; 25
                                                kg Hand baggage&nbsp;&nbsp;|&nbsp;&nbsp;2x 23kg Checked baggage </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <section class="roombox  page-section" id="section6">
                <h3 class="headingall_ht">Add-Ons</h3>
                <div class="table-responsive mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Price</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mount Jungfrau with Interlaken Orientation</td>
                                <td>
                                    <i class="fa fa-rupee mr-1"></i>5000
                                </td>
                                <td>1 hour</td>
                            </tr>
                            <tr>
                                <td>Lido Show + illumination of Paris (return transfer own)</td>
                                <td>
                                    <i class="fa fa-rupee mr-1"></i>3000
                                </td>
                                <td>1 hour</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="roombox  page-section" id="section7">
                <h3 class="headingall_ht">Terms & Condition</h3>
                <div class="tst">
                    <h5>Cancellation Policy:</h5>
                    <p>The following charges are to be applied at the time of cancellation of holiday</p>
                    <br>
                    <p>Booking date to 21 days prior to departure - 25 % of the total holiday cost or a minimum of
                        15,000 (which ever is higher) per person.</p>
                    <p>Between 20 – 11 days of departure – 50 % of the total holiday cost per person</p>
                    <p>Between 10 – 6 days before departure – 75% of the total holiday cost per person</p>
                    <p>Less than 6 days of departure – 100 % of the total holiday cost per person</p>
                    <br>
                    <p>** Please read the notes t & c below to get full clarity on the same.</p>
                    <br>
                    <h5>Notes (T&C):</h5>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.</p>
                </div>
            </section>
        </div>
    </div>
</div>



@endsection
@section('scripts')

@endsection
