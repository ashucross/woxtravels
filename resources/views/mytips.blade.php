@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->

<!-- page specific style code here-->
@endsection
@section('pageContent')
<div class="container">
      <section class="login_mytrip pdtop_b position-relative">
        <div class="d-flex justify-content-between ">
          <div class="logintrip">
            <button data-toggle="modal" data-target="#poplogin">
              <i class="fa fa-sign-in mr-1"></i>Login or Create an account </button>
            <ul class="trip_pop_list">
              <li>How to reschedule your flight? <a href="#">Click here</a>
              </li>
              <li>How to cancel/claim refund of your flight? <a href="#">Click here</a>
              </li>
              <li>How to transfer wallet money to bank? <a href="#">Click here</a>
              </li>
            </ul>
          </div>
          <div class="login_trip_dts">
            <span>
              <img src="{{asset('public/assets/images/trip.jpg')}}" alt="" class="imgres" />
            </span>
          </div>
        </div>
        <div class="border_line">
          <span>OR</span>
        </div>
        <div class="tripid d-flex justify-content-between ">
          <div class="formtrip">
            <h2>View/Cancel/Reschedule your Reservation <span>(As a Guest User)</span>
            </h2>
            <div class="formbs">
              <div class="input-wrapper">
                <input type="text" id="Reference" required>
                <label for="Reference">Reference ID/Booking ID/PNR</label>
              </div>
              <div class="input-wrapper">
                <input type="password" required>
                <label for="Reference"> Email Address</label>
              </div>
              <p>
                <i>You only have to fill your EMT Booking ID/Reference ID/PNR with Email Address used at the time of booking to retrieve the details</i>
              </p>
              <div class="btnsb_f text-center">
                <button type="submit" class="sbtrip">Submit</button>
              </div>
            </div>
          </div>
          <div class="formtrip_txt">
            <p>
              <b>Note:-&nbsp;To View/Cancel/Reschedule/Change/Print your flight tickets, Please login into <a href="#">https://xyz.com</a>
              </b>
            </p>
            <p>
              <b>a)&nbsp;Registered User&nbsp;-&nbsp;</b>You can log in using a combination of your Booking /Reference ID or PNR along with your password.
            </p>
            <p>
              <b>b)&nbsp;Guest user&nbsp;-&nbsp;</b>You can log in using a combination of your Booking /Reference ID or PNR along with the email address entered at the time of booking.
            </p>
            <p class="smlltxt">If you are unable to login and cancel/reschedule your reservation, kindly call corresponding airlines if your date of travel is within the next 7 days. </small>
          </div>
        </div>
      </section>
    </div>
@endsection
@section('scripts')

@endsection