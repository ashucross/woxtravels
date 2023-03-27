@extends('homeLayout')
@section('styles')
@endsection
@section('pageContent')
@php
$booking_response = json_decode($hotel_booking_details->booking_response);
$paxs = $booking_response->booking->hotel->rooms[0]->paxes;
@endphp
<div class="container">
    <div class="detailsmain">
        <div class="leftmain_rv">
            <div class="booking_cm_txt text-center brdb">
                <span><img src="images/bok-conf-icon.png" alt="" class="img-res" /></span>
                <span>Your Booking Successfully Completed.</span>
                <span>Congratulations! your Booking has been Confirmed.</span>
                <span> Thank you</span>
            </div>

            <div class="detailscm brdb">
                <h3>Mr {{ $booking_response->booking->holder->name }} {{ $booking_response->booking->holder->surname }}
                </h3>
                <ul class="clearfix list_ds">

                    <li>
                        <label>Phone No.</label>
                        <span>{{ $hotel_booking_details->mobile }}</span>
                    </li>
                    <li>
                        <label>Email Id</label>
                        <span>{{ $hotel_booking_details->email }}</span>
                    </li>


                    <li>
                        <label>Booking Date</label>
                        <span>{{ date('F-Y-d', strtotime($hotel_booking_details->booking_date)) }}</span>
                    </li>

                </ul>

            </div>


            <div class="psg_details brdb">
                <div class="dts_heading">
                    <h1 class="mtprew1"><i class="fa fa-user mr-1"></i>Passenger Details</h1>
                </div>
                <div class="tbdetails table-responsive">
                    <table class="table tbds_c">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th> Pax Type</th>
                                <th>Name</th>
                                {{-- <th> Date Of Birth</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paxs as $pax)
                            @php
                            $type = $pax->type =='AD' ? 'Adult' : 'Child';
                            @endphp
                            <tr>
                                <td>{{ $pax->roomId }}</td>
                                <td>{{ $type }}</td>
                                <td>Mr {{ $pax->name }} {{ $pax->surname }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>


        </div>



        <div class="rightmain_rv ">
            <div class="pritotal_main  mtprew1">
                <div class="bookingrfs  pdbox_wht">
                    <h6>Your booking reference no
                        <strong>{{ $booking_response->booking->reference }}</strong>
                    </h6>
                    <h6 class="mt-3">Booking Date & Time
                        <span>{{ date('F-Y-d H:A', strtotime($hotel_booking_details->booking_date)) }}</strong>
                    </h6>

                </div>

                <div class="farebox whitebrd ">
                    <h3><i class="fa fa-money mr-1"></i>PAYMENT RECEIPT</h3>
                    <div class="paybx cngfet">

                        <ul class="basefareul">

                            <li><span>Adults x {{ $booking_response->booking->hotel->rooms[0]->rates[0]->adults
                                    }}</span></li>

                            <li><span>Base Fare</span><span><b><i class="fa fa-dollar"></i>&nbsp;{{
                                        $booking_response->booking->hotel->rooms[0]->rates[0]->net }}<sup>
                                        </sup></b></span></li>

                            <li><span>Discount</span><span><b><i class="fa fa-dollar"></i>&nbsp;0<sup> </sup></b></span>
                            </li>

                            <li><span>Total Fare</span><span><b><i class="fa fa-dollar"></i>&nbsp;{{
                                        $booking_response->booking->hotel->rooms[0]->rates[0]->net }}<sup>
                                        </sup></b></span></li>

                        </ul>

                    </div>





                    <div class="paybx brdtopd">

                        <ul class="basefareul">



                            <li><span><b>Total</b></span><span><b><i class="fa fa-dollar"></i> {{
                                        $booking_response->booking->hotel->rooms[0]->rates[0]->net }}.<sup>
                                        </sup></b></span></li>

                        </ul>



                        <div class="upcrt">

                            <span><i class="fa fa-line-chart" aria-hidden="true"></i>&nbsp; {{
                                $booking_response->booking->hotel->rooms[0]->rates[0]->rateComments }}.

                            </span>

                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

@endsection
