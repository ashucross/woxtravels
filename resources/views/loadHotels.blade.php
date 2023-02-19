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