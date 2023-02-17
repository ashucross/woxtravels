@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->
<!-- page specific style code here-->
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
                        <div class="d-flex justify-content-between">
                           <div class="search_des d-flex justify-content-between ">
                              <div class="Fromwhere position-relative">
                                 <!-- <h3 class="search_title">Destination</h3> -->
                                 <div class="position-relative">
                                    <span class="iconint"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="input_src leftri input_hgt" placeholder="Where are you going?" data-toggle="dropdown" />
                                    <div class="dropdown-menu drp_plane">
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
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="search_date ht_width_dt">
                              <!-- <h3 class="search_title">Check-In&nbsp;-&nbsp;Check-Out</h3> -->
                              <div class="position-relative ">
                                 <span class="iconint"><i class="fa fa-calendar"></i></span>
                                 <input aut type="text" name="ckein" placeholder="Check-In - Check-Out" class="ckein input_src  input_hgt ">
                              </div>
                           </div>
                           <!-- <div class="search_date widthn50">
                              <h3 class="search_title">Check-Out</h3>
                              
                              
                              
                              <div class="position-relative">
                              
                              
                              
                                  <span class="iconint"><i class="fa fa-calendar"></i></span>
                              
                              
                              
                                  <input aut type="text" name="daterange2" class="input_src  input_hgt">
                              
                              
                              
                              </div>
                              
                              
                              
                              </div> -->
                           <div class="search_adult ht_width_tr">
                              <!-- <h3 class="search_title">Travelers</h3> -->
                              <div class="position-relative " data-toggle="dropdown">
                                 <span class="iconint"><i class="fa fa-user-o"></i></span>
                                 <input aut type="text" value="2 adults - 10 children - 1 room" class="input_src input_hgt ups arrowus">
                                 <!-- <span class="ar_tv"><i class="ml-2 fa fa-angle-down"></i></span> -->
                                 <div class="dropslct">
                                    <div class="dropdown-menu dropdown-menu-right hiclk">
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
                        </div>
                        <div class="searchbtn d-flex">
                           <span class="blknone">&nbsp;</span>
                           <button type="submit" class="btn-grad ftbtn_src"><i class="fa fa-paper-plane-o mr-2"
                              aria-hidden="true"></i>Search </button>
                        </div>
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
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="theme_common_box_two img_hover">
                     <div class="theme_two_box_img">
                        <a href="hotel-details.html">
                        <img src="{{asset('public/assets/images/hotel1.png')}}" alt="img">
                        </a>
                        <p><i class="fas fa-map-marker-alt"></i>New beach, Thailand</p>
                     </div>
                     <div class="theme_two_box_content">
                        <h4><a href="hotel-details.html">Kantua hotel, Thailand</a></h4>
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
                        <span><img src="{{asset('public/assets/images/Bali.jpg')}}" alt="" class="img-res"/></span>
                        <h4>Bali
                           <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                        </h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="destinationbox">
                     <a href="#">
                        <span><img src="{{asset('public/assets/images/Mykonos.jpg')}}" alt="" class="img-res"/></span>
                        <h4>Mykonos 
                           <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                        </h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="destinationbox">
                     <a href="#">
                        <span><img src="{{asset('public/assets/images/Istanbul.jpg')}}" alt="" class="img-res"/></span>
                        <h4>Istanbul
                           <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                        </h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="destinationbox">
                     <a href="#">
                        <span><img src="{{asset('public/assets/images/Paris.jpg')}}" alt="" class="img-res"/></span>
                        <h4>Paris
                           <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                        </h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="destinationbox">
                     <a href="#">
                        <span><img src="{{asset('public/assets/images/Dubai.jpg')}}" alt="" class="img-res"/></span>
                        <h4>Dubai
                           <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                        </h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="destinationbox">
                     <a href="#">
                        <span><img src="{{asset('public/assets/images/Maldives.jpg')}}" alt="" class="img-res"/></span>
                        <h4>Maldives
                           <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                        </h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="destinationbox">
                     <a href="#">
                        <span><img src="{{asset('public/assets/images/Phuket.jpg')}}" alt="" class="img-res"/></span>
                        <h4>Phuket
                           <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                        </h4>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="destinationbox">
                     <a href="#">
                        <span><img src="{{asset('public/assets/images/Venice.jpg')}}" alt="" class="img-res"/></span>
                        <h4>Venice 
                           <span>Starting at<i class="fa fa-dollar ml-1 mr-1"></i>15</span>
                        </h4>
                     </a>
                  </div>
               </div>

              


               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                  <div class="destinationbox">
                     <a href="#">
                        <span><img src="{{asset('public/assets/images/Zurich.jpg')}}" alt="" class="img-res"/></span>
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
               <p>We list classiest budget hotels on our site along with some of the prominent international hotel chains  Ranging from class hotels to luxury beach
                  resorts, each hotel on our site gives you a memorable staying experience. Along with deluxe, budget and luxury hotels, WOX Travel also displays a number of heritage hotels for offering you a royal stay. Enjoy cheap hotel deals
                  for any destination with great savings.
               </p>
            </div>
         </div>
      </section>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
   $(".hiclk").click(function(event) {
        event.stopPropagation();
    });
})
   </script>
@endsection