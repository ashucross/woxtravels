@extends('homeLayout')
@section('styles') 
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.min.css">
<!-- page specific style code here-->
<!-- page specific style code here-->
<style>
   span.select2-selection.select2-selection--single {
    height: 64px;
}
.select2-selection__rendered {
    margin-top: 14px;
}
label#location-error,#checkin-error,#adults-error {
    font-size: 14px;
    margin-left: 12px;
    color: #ff4d4d;
} 
ul#ui-id-1 {
    width: 436.609px;
    left: 102px;
    top: 308px;
    position: absolute;
    height: 200px;
    overflow-y: scroll;
}
</style>
@endsection
@section('pageContent')


<section class="search_box  position-relative">
   <div class="tab_nav">
      <!-- Nav tabs -->
      @include('includes.nav')

      <!-- Tab panes -->
      <div class="tab-content">
         <div class="tab-pane  active" id="Hotel">
            <div class="tabsearh_input rds">
               <div class="boxsearching ">
                  <form method="post" id='searchHot' action='{{url("search_hotel")}}'>
                     @csrf
                     <div class="d-flex justify-content-between">
                        <div class="search_des d-flex justify-content-between ">
                           <div class="Fromwhere position-relative">
                              <!-- <h3 class="search_title">Destination</h3> -->
                             
                              <div class="position-relative">
                                 <span class="iconint"><i class="fa fa-map-marker"></i></span>
                                 <div class="ui-widget">
                                 <select type="text"  class="input_src leftri input_hgt country_select" required name="location" >
                                    <option value=''>Select Country</option>
                                    @if(!empty($countries))
                                       @foreach($countries as $count)
                                          <option value="{{$count->sortname ?? ''}}">{{$count->name ?? ''}}</option>
                                       @endforeach
                                    @endif
                                 </select> 
                                 
                                 </div>
                                 <!-- <input type="text" autocomplete="off"  class="input_src leftri input_hgt item_list" required name="location" placeholder="Where are you going?" data-toggle="dropdown" />
                                 </div> -->
                                 <!--  <div class="dropdown-menu drp_plane">
                                       <div class="plane_list">
                                          <span>Top Cities</span>
                                          <ul>
                                             <li>
                                                <div class="fli_name"><i class="fa fa-hotel"></i> Delhi
                                                </div>
                                                <div class="airport_name"><span>1214
                                                   properties</span><span>India</span>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="fli_name"><i class="fa fa-hotel"></i> Mumbai
                                                </div>
                                                <div class="airport_name"><span>1214
                                                   properties</span><span>India</span>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="fli_name"><i class="fa fa-hotel"></i> Bengaluru
                                                </div>
                                                <div class="airport_name"><span>1720
                                                   properties</span><span>India</span>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div> -->
                              </div>
                           </div>
                        </div>
                        <div class="search_date ht_width_dt">
                           <!-- <h3 class="search_title">Check-In&nbsp;-&nbsp;Check-Out</h3> -->
                           <span class="iconint"><i class="fa fa-map-marker"></i></span>
                           <select type="text"  class="input_src leftri input_hgt item_list" required name="location" >
                                    <option>Select Location</option>
                                 </select>
                          
                        </div>
                        <!-- <div class="search_date widthn50">
                              <h3 class="search_title">Check-Out</h3>
                              
                              
                              
                              <div class="position-relative">
                              
                              
                              
                                  <span class="iconint"><i class="fa fa-calendar"></i></span>
                              
                              
                              
                                  <input aut type="text" name="daterange2" class="input_src  input_hgt">
                              
                              
                              
                              </div>
                              
                              
                              
                              </div> -->
                        <div class="search_adult ht_width_tr">
                        <div class="position-relative ">
                              <span class="iconint"><i class="fa fa-calendar"></i></span>
                              <input aut type="text" name="checkin" required placeholder="Check-In - Check-Out" class="ckein input_src  input_hgt ">
                           </div>

                           <!-- <h3 class="search_title">Travelers</h3> -->
                           <div class="position-relative " data-toggle="dropdown">
                              <span class="iconint"><i class="fa fa-user-o"></i></span>
                              <input name='adults' placeholder='Adults' type="text" value="" class="input_src input_hgt ups arrowus">
                              <!-- <span class="ar_tv"><i class="ml-2 fa fa-angle-down"></i></span> -->
                              <div class="dropslct">
                                 <div class="dropdown-menu dropdown-menu-right hiclk">
                                    <div class="htlad">
                                       <div class="qty_box">
                                          <div class=" d-flex justify-content-between align-items-center">
                                             <span>Adult:
                                             </span>
                                             <div id='myform' method='POST' class='quantity1' action='#'>
                                                <input type='button' slug='oneway' value='-' class='minus' field='quantity' />
                                                <input type='text' name='quantity' id="oneway-qnty-adult" value='0' class='qty' />
                                                <input type='button' slug='oneway' value='+' class='plus' field='quantity' />
                                             </div>
                                          </div>
                                       </div>
                                       <div class="qty_box">
                                          <div class=" d-flex justify-content-between align-items-center">
                                             <span>Child:
                                                <span class="agetxt">Ages 0 - 17</span>
                                             </span>
                                             <div id='myform' method='POST' class='quantity1'  action='#'>
                                                <input type='button'  slug='oneway' value='-'  class='minus child_minus' field='quantity' />
                                                <input type='text' name='quantity' id="oneway-qnty-child"    value='0' class='qty' />
                                                <input type='button'  slug='oneway' value='+'  class='plus child_added' field='quantity' />
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
                                             <p>To find you a place to stay that fits your entire group along with correct prices, we need to know how old your children will be at check-out</p>
                                          </div>
                                       </div>
                                       <div class="qty_box">
                                          <div class="d-flex justify-content-between align-items-center">
                                             <span>Rooms
                                             </span>
                                             <div id='myform' method='POST' class='quantity1' action='#'>
                                                <input type='button' value='-' slug="oneway" class='minus' field='quantity' />
                                                <input type='text' name='quantity'  id="oneway-qnty-room" value='0' class='qty' />
                                                <input type='button' value='+' slug="oneway" class='plus' field='quantity' />
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="btntv">
                                       <button type="submit" class="btn-grad ftbtn_src set-adults-val">Done</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="searchbtn d-flex">
                        <span class="blknone">&nbsp;</span>
                        <button type="submit" class="btn-grad ftbtn_src"><i class="fa fa-paper-plane-o mr-2" aria-hidden="true"></i>Search </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="section_padding_top">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section_heading_center">
               <h2>Here to help keep you on the move</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <div class="helptxt">
               <a href="#" class=" d-flex justify-content-between">
                  <div class="txthp">
                     <h3>Change or cancel a trip</h3>
                     <p>Make updates to your itinerary or cancel a booking</p>
                  </div>
                  <span class="icont">
                     <i class="fa fa-edit"></i>
                  </span>
               </a>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="helptxt">
               <a href="#" class=" d-flex justify-content-between">
                  <div class="txthp">
                     <h3>Use a credit or coupon</h3>
                     <p>Apply a coupon code or credit to a new trip</p>
                  </div>
                  <span class="icont">
                     <i class="fa fa-dollar"></i>
                  </span>
               </a>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="helptxt">
               <a href="#" class=" d-flex justify-content-between">
                  <div class="txthp">
                     <h3>Track your refund</h3>
                     <p>Check the status of a refund currently in progress</p>
                  </div>
                  <span class="icont">
                     <i class="fa fa-comments-o" aria-hidden="true"></i>
                  </span>
               </a>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <div class="hp_txts">
               <a href="#">
                  <span>
                     <img src="{{asset('public/assets/images/hp1.jpg')}}" alt="" class="img-res" />
                  </span>
                  <h6>SEE MEMBER PRICES ON FALL TRIPS</h6>
                  <h3>Experience the joy of the season with an autumn getaway</h3>
               </a>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="hp_txts">
               <a href="#">
                  <span>
                     <img src="{{asset('public/assets/images/hp2.jpg')}}" alt="" class="img-res" />
                  </span>
                  <h6>GET MORE TO GO MORE</h6>
                  <h3>Members can double dip with points on top of airline miles</h3>
               </a>
            </div>
         </div>
         <div class="col-sm-4">
            <div class="hp_txts">
               <a href="#">
                  <span>
                     <img src="{{asset('public/assets/images/hp3.jpg')}}" alt="" class="img-res" />
                  </span>
                  <h6>YOUR WEEKEND JUST GOT BETTER</h6>
                  <h3>Save on these last-minute weekend getaways.</h3>
               </a>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="hp_txts">
               <a href="#">
                  <span>
                     <img src="{{asset('public/assets/images/hp4.jpg')}}" alt="" class="img-res" />
                  </span>
                  <h6>BROADEN YOUR HORIZONS</h6>
                  <h3>There's a whole lot of world out there—go see more of it</h3>
               </a>
            </div>
         </div>
         <div class="col-sm-6">
            <div class="hp_txts">
               <a href="#">
                  <span>
                     <img src="{{asset('public/assets/images/hp5.jpg')}}" alt="" class="img-res" />
                  </span>
                  <h6>CITY VIEWS</h6>
                  <h3>So much to see, so much to do</h3>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>

<section id="explore_area" class="section_padding_top">
   <div class="container">
      <!-- Section Heading -->
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section_heading_center">
               <h2>Top Hotels With Great Deals</h2>
            </div>
         </div>
      </div>
      <div class="row">
         @if(!empty($hotelsdata))
            @if(!empty($hotelsdata->hotels) && count($hotelsdata->hotels) > 0)
            @foreach($hotelsdata->hotels as $hotel)
            <?php $image = !empty($hotel->images) && count($hotel->images) > 0 ? 'http://photos.hotelbeds.com/giata'.'/'.$hotel->images[0]->path : ''; ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 loadmorediv">
               <div class="theme_common_box_two img_hover">
                  <div class="theme_two_box_img">
                     <a href="hotel-details.html">
                        <img height='280px' src="{{!empty($image) ? $image : asset('public/assets/images/hotel1.png')}}" alt="img">
                     </a>
                     <p><i class="fas fa-map-marker-alt"></i>{{$hotel->name->content ?? ''}}</p>
                  </div>
                  <div class="theme_two_box_content">
                     <h4><a href="hotel-details.html">{{$hotel->name->content ?? ''}}, {{$hotel->city->content ?? ''}}</a></h4>
                     <p><span class="review_rating"><!-- 4.8/5 Excellent -->Ranking : {{$hotel->ranking ?? ''}}</span> <!-- <span class="review_count">(1214
                              reviewes)</span> -->
                     </p>
                     <h3><!-- $99.00 <span>Price starts from</span> --></h3>
                  </div>
               </div>
            </div>
            @endforeach
            @endif
         @endif 
         
         <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="theme_common_box_two img_hover">
                     <div class="theme_two_box_img">
                        <a href="hotel-details.html">
                        <img src="{{asset('public/assets/images/hotel2.png')}}" alt="img">
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i>Indonesia</p>
                        <div class="discount_tab">
                           <span>50%</span>
                        </div>
                     </div>
                     <div class="theme_two_box_content">
                        <h4><a href="hotel-details.html">Hotel paradise international</a></h4>
                        <p><span class="review_rating">4.8/5 Excellent</span> <span class="review_count">(1214
                           reviewes)</span>
                        </p>
                        <h3>$99.00 <span>Price starts from</span></h3>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="theme_common_box_two img_hover">
                     <div class="theme_two_box_img">
                        <a href="hotel-details.html">
                        <img src="{{asset('public/assets/images/hotel3.png')}}" alt="img">
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i>Kualalampur</p>
                     </div>
                     <div class="theme_two_box_content">
                        <h4><a href="hotel-details.html">Hotel kualalampur</a></h4>
                        <p><span class="review_rating">4.8/5 Excellent</span> <span class="review_count">(1214
                           reviewes)</span>
                        </p>
                        <h3>$99.00 <span>Price starts from</span></h3>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="theme_common_box_two img_hover">
                     <div class="theme_two_box_img">
                        <a href="hotel-details.html">
                        <img src="{{asset('public/assets/images/hotel4.png')}}" alt="img">
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i>Mariana island</p>
                        <div class="discount_tab">
                           <span>50%</span>
                        </div>
                     </div>
                     <div class="theme_two_box_content">
                        <h4><a href="hotel-details.html">Hotel deluxe</a></h4>
                        <p><span class="review_rating">4.8/5 Excellent</span> <span class="review_count">(1214
                           reviewes)</span>
                        </p>
                        <h3>$99.00 <span>Price starts from</span></h3>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="theme_common_box_two img_hover">
                     <div class="theme_two_box_img">
                        <a href="hotel-details.html">
                        <img src="{{asset('public/assets/images/hotel5.png')}}" alt="img">
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i>Kathmundu, Nepal</p>
                     </div>
                     <div class="theme_two_box_content">
                        <h4><a href="hotel-details.html">Hotel rajavumi</a></h4>
                        <p><span class="review_rating">4.8/5 Excellent</span> <span class="review_count">(1214
                           reviewes)</span>
                        </p>
                        <h3>$99.00 <span>Price starts from</span></h3>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="theme_common_box_two img_hover">
                     <div class="theme_two_box_img">
                        <a href="hotel-details.html">
                        <img src="{{asset('public/assets/images/hotel6.png')}}" alt="img">
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i>Beach view</p>
                     </div>
                     <div class="theme_two_box_content">
                        <h4><a href="hotel-details.html">Thailand grand suit</a></h4>
                        <p><span class="review_rating">4.8/5 Excellent</span> <span class="review_count">(1214
                           reviewes)</span>
                        </p>
                        <h3>$99.00 <span>Price starts from</span></h3>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="theme_common_box_two img_hover">
                     <div class="theme_two_box_img">
                        <a href="hotel-details.html">
                        <img src="{{asset('public/assets/images/hotel7.png')}}" alt="img">
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i>Long island</p>
                     </div>
                     <div class="theme_two_box_content">
                        <h4><a href="hotel-details.html">Zefi resort and spa</a></h4>
                        <p><span class="review_rating">4.8/5 Excellent</span> <span class="review_count">(1214
                           reviewes)</span>
                        </p>
                        <h3>$99.00 <span>Price starts from</span></h3>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="theme_common_box_two img_hover">
                     <div class="theme_two_box_img">
                        <a href="hotel-details.html">
                        <img src="{{asset('public/assets/images/hotel8.png')}}" alt="img">
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i>Philippine</p>
                     </div>
                     <div class="theme_two_box_content">
                        <h4><a href="hotel-details.html">Manila international resort</a></h4>
                        <p><span class="review_rating">4.8/5 Excellent</span> <span class="review_count">(1214
                           reviewes)</span>
                        </p>
                        <h3>$99.00 <span>Price starts from</span></h3>
                     </div>
                  </div>
               </div> -->
      </div>
      <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="section_heading_center text-center">
               <button  class="btn btn-primary loadmore"  >
                        <i class="fa fa-reload-o mr-1"></i>Load More </a>
               </div>
            </div>
         </div>
   </div>
</section>




<section class="destinationbox">
   <div class="container">
      <!-- Section Heading -->
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="section_heading_center">
               <h2>Book Hotels at Popular Destinations</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Bali.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Bali
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Mykonos.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Mykonos
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Istanbul.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Istanbul
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Paris.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Paris
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Dubai.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Dubai
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Maldives.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Maldives
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Phuket.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Phuket
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Venice.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Venice
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>




         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="destinationbox">
               <a href="#">
                  <span><img src="{{asset('public/assets/images/Zurich.jpg')}}" alt="" class="img-res" /></span>
                  <h4>Zurich
                     <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                  </h4>
               </a>
            </div>
         </div>

      </div>
   </div>
</section>
<section>
   <div class="container">
      <div class="txt_destination">
         <h3>Cheapest Deals on Budget & Luxury Hotels are Available at WOX Travel & Tour</h3>
         <p>Due to the huge influx tourist world wide, WOX Travel offers a wide range of luxury, deluxe and budget hotels to them. Choose to stay in luxury and comfort with greatest discounts available on hotels bookings.</p>
         <p>We list classiest budget hotels on our site along with some of the prominent international hotel chains Ranging from class hotels to luxury beach
            resorts, each hotel on our site gives you a memorable staying experience. Along with deluxe, budget and luxury hotels, WOX Travel also displays a number of heritage hotels for offering you a royal stay. Enjoy cheap hotel deals
            for any destination with great savings.
         </p>
      </div>
   </div>
</section>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
<script>
   $(document).ready(function() {

      $(".item_list").click(function(){
         var country_select = $('.country_select').val();
         // console.log(country_select);return;
         if(country_select){ 
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
      }else{
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
    });


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

      $('.child_added').click(function(){ 
         if($('#oneway-qnty-child').val() > 0){ 
            $('.child_ages:last').clone().insertAfter($('.child_ages:last'));  
         }
      });
      $('.child_minus').click(function(){ 
         if($('#oneway-qnty-child').val() > 1){ 
            $('.child_ages:last').remove();  
         }
      });
      $('.set-adults-val').click(function(e){
         e.preventDefault();
         let _Adult = parseInt($("#oneway-qnty-adult").val());
         let _Child = parseInt($("#oneway-qnty-child").val());
         let _Room = parseInt($("#oneway-qnty-room").val());
         let _Total = _Adult + _Child;
         if(_Total == 0){
            toastr["error"](
               "Error!",
               "Atleast 1 person is required"
            );
         }
         if(_Room == 0){
            toastr["error"](
               "Error!",
               "Atleast 1 room is required"
            );
         }
         $('.arrowus').val('Adults : '+_Adult+', Child : '+_Child+', Room : '+_Room);
         $('.dropslct').hide();
      });
      $('.arrowus').click(function(){
         $('.dropslct').show();
      });

      var pagination = 12; 
      $('.loadmore').click(function(){ 
         $('.loadmore').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
         pagination = parseInt(pagination) + 12;
         var init = parseInt(pagination) - 11; 
         $.ajax({
            url: "{{url('loadMoredata')}}",
            dataType:'json',
            data:{pagination:pagination,init:init},
            success: function(result){
               $(".loadmorediv:last").after(result.html);
               $('.loadmore').html('Load More');
               $('.loadmore').attr('disabled',false);
            }
         });
      });
   
</script>
@endsection