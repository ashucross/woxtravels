 
<div class="largebox_listing">
    @if(!empty($search_hotels) && count($search_hotels) > 0)
    @foreach($search_hotels as $hotel)
    <?php $image = !empty($hotel->images)  ? $hotel->images : ''; ?>
    <div class="lglist">
        <div class="list_hotel_img">
            <div class="lgzoomimg">
                <a href="#">
                    <img src="{{!empty($image) ? $image : asset('public/assets/images/hotel1.png')}}" class="img-res" />
                </a>
            </div>
        </div>
        <div class="list_hotel_txt">
            <div class="listing_hd_hotel">
                <h2><span>{{$hotel->name ?? ''}}</span>
                    <!-- <div class="startbx smallstar"> 
                        <span>5&nbsp;-&nbsp;</span> 
                        <i class="fa fa-star"></i> 
                    </div>  -->
                </h2>
                <ul class="listbt_sml">
                    <li><a href="#">{{$hotel->categoryName ?? ''}}</a></li>
                    <li><a href="#">{{$hotel->destinationName ?? ''}}</a></li>
                </ul>
                <ul class="iconsml">
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
                </ul>
                <div class="green_ex">
                    <span>
                        <?php $i = 0;
                        $rank = (int)$hotel->ranking ?? 0;
                        ?>
                        Rank : {{$rank ?? 0}}
                        <!--  <i class="fa fa-star"></i> -->

                        <!-- &nbsp;4.77 (48 reviews) -->
                    </span>
                </div>
            </div>
        </div>
        <div class="pribtns">
            <div class="priceshow">
                <h3><!-- <i class="fa fa-dollar mr-1"></i> -->{{$hotel->currency ?? ''}} {{$hotel->minRate ?? ''}} - {{$hotel->maxRate ?? ''}}
                    <span>per night</span>
                </h3>
                <p>Chain : {{$hotel->chain ?? ''}}</p>
                <p>Website : {{$hotel->web ?? ''}}</p>
            </div>
            <div class="hotslc">
                <a href="{{url('hotelDetails'.'/'.$hotel->code)}}" class="btn-grad ftbtn_src">Book Now<i class="fa fa-angle-right ml5" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    @endforeach
    @endif 