<div class="bookingbg tpd leftpro">
    <div class="proflPicContanr text-center">
        <div class="avatar-upload">
            <div class="avatar-edit">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                <label for="imageUpload"></label>
            </div>
            <div class="avatar-preview">
                @php
                    $profileimag = !empty($users->profile_img) ? asset('public/assets/images/profileimage/'. $users->profile_img) : asset('public/assets/images/imgpc.jfif');
                @endphp
                <div id="imagePreview" style="background-image: url({{ $profileimag }})">
                </div>
            </div>
        </div>

        <div class="text_name">
            <h4>{{ ucfirst($users->first_name) ?? '' }}</h4>
            <span>PERSONAL PROFILE</span>
            <br><br>
        </div>


        <div class="sidenav_bk">
            <ul class="clearfix">

                <li>
                    <div class="drop_pr">
                        <button type="button" id="flip"><span><i class="fa fa-address-card mr-1"></i>My
                                Bookings</span>
                            <i class="fa fa-angle-down"></i></button>
                        <ul style="display: none;" id="panel">
                            <li><a href="My-Booking.html"><i class="fa fa-plane mr-1"></i>Flight Booking</a></li>
                            <li><a href="My-Booking.html"><i class="fa fa-hotel mr-1"></i>Stays</a></li>
                            <li><a href="My-Booking.html"><i class="fa fa-glass mr-1"></i>Attractions</a></li>
                            <li><a href="My-Booking.html"><i class="fa fa-globe mr-1"></i>Visa </a></li>
                            <li><a href="My-Booking.html"><i class="fa fa-umbrella mr-1"></i>Insurance </a></li>
                            <li><a href="My-Booking.html"><i class="fa fa-cab mr-1"></i>Car Rentals </a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{  url('dashboard') }}"><i class="fa fa-user-circle mr-1"></i>My Profile</a></li>
                <a href="{{  url('dashboard/logout') }}"><i class="fa fa-sign-in mr-1"></i>Logout</a>
                <li></li>
            </ul>
        </div>

    </div>
</div>
