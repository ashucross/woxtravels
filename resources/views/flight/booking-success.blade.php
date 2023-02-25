@php
if(!empty($myBooking)){
    $bookingId = json_decode($myBooking->booking_response)->booking_id;
    $bookingDetails = getBookingDetiils($bookingId);
    // echo "<pre>";
        $depFlight = $bookingDetails[0];
        // echo "<pre>";
        // var_dump($depFlight);
$phoneNumber = $bookingDetails['travelersDetails'][0]['contact']['phones'][0]['countryCallingCode']  . ' ' . $bookingDetails['travelersDetails'][0]['contact']['phones'][0]['number'];
$emailId = $bookingDetails['travelersDetails'][0]['contact']['emailAddress'];
if(!empty($bookingDetails)){
@endphp
@extends('homeLayout')
@section('styles')
<style>
    .error {
        color: red;
    }
</style>
@endsection
@section('pageContent')
@include('includes.popds')
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
                <h3>Mr Sandeep Kumar</h3>
                <ul class="clearfix list_ds">
                    <li>
                        <label>Phone No.</label>
                        <span>+ {{  $phoneNumber }}</span>
                    </li>
                    <li>
                        <label>Email Id</label>
                        <span>{{ $emailId }}</span>
                    </li>
                    <li>
                        <label>Destination</label>
                        <span>Delhi (DEL)</span>
                    </li>

                    <li>
                        <label>Booking Date</label>
                        <span>Wed,&nbsp;16&nbsp;Feb&nbsp;2022<span>&nbsp;06:29:48</span>
                    </li>

                </ul>
                <div class="tkt">
                    <button class="tkdwn" type="button"><i class="fa fa-download mr-1"></i>Ticked Download</button>
                </div>
            </div>

            <div class="fgt_details brdb">
                <div class="dts_heading">
                    <h1 class="mtprew1"><i class="fa fa-plane mr-1"></i>Flight Details</h1>

                </div>

                <div class="listbooking-rv">
                    <ul>
                        <li>
                            <div class="flexws">
                                <div class="leftlogo_rv">
                                    <div class="airlogo_rv">
                                        <span class="logowt">
                                            <img src="{{ $depFlight['file'] }}" class="img-res"></span>
                                        <span>TATA SIA</span>
                                    </div>

                                    <p>AIRLINES LTD dba VISTARA</p>
                                    <span class="uktxt">{{  $depFlight['depature']['flight'] }}</span>
                                </div>
                                <div class="righttxt_rv">
                                    <div class="datebx_rv">
                                        <span>Wed, 16 Feb 2022</span>
                                        <span class="dotvr"><b>Cabin&nbsp;:&nbsp;</b> Y , ROUNDTRIP</span>
                                    </div>
                                    <div class="time_rv">
                                        <div class="datetm_rv">
                                            <div class="tbrtvr">
                                                <h4>20:55,&nbsp;BOM<span>Mumbai&nbsp;(BOM)</span></h4>
                                                <span class="blnspan">&nbsp;</span>
                                                <h4>23:00,&nbsp;DEL<span>Delhi&nbsp;(DEL)</span></h4>
                                            </div>
                                        </div>
                                        <div class="tmrv_rt">
                                            <h5>2h&nbsp;5m</h5>
                                            <span>0&nbsp;Stop</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="colps_rv">
                                <div id="ShowFlight1" class="collapse clpside">
                                    <div class="heading_cpl">
                                        <h4><i class="fa fa-suitcase"></i>Flight and Baggage Details</h4>
                                        <div class="suitcase_rv"><span class="suitcase_img"><img
                                                    src="images/vistara-logo.jpg" class="img-res"></span><span
                                                class="suitcase_txt"><strong>20:55
                                                    - 23:00,</strong> 2h 5m</span></div>
                                    </div>

                                    <div class="to_list">
                                        <span>Mumbai(BOM) to Delhi(DEL)</span>
                                        <ul>
                                            <li>TATA SIA AIRLINES LTD dba VISTARA 988</li>
                                            <li>Cabin (Y) / Coach (V)</li>
                                            <li>Operating Airline (UK)</li>
                                            <li>Marketing Airline (UK)</li>
                                            <li>Embraer 320</li>
                                        </ul>
                                        <div class="btmlist_to">
                                            <span>Estimated bag fees&nbsp;:&nbsp;</span>
                                            <span><strong>Carry on&nbsp;:&nbsp;No fee</strong></span>
                                            <span><strong>Bag Allowance&nbsp;:&nbsp;15-kg</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 data-toggle="collapse" data-target="#ShowFlight1">Show Flight and Baggage Fee
                                    Details
                                    <i class="fa fa-angle-down"></i>
                                </h6>

                            </div>

                        </li>
                        <li>
                            <div class="flexws">
                                <div class="leftlogo_rv">
                                    <div class="airlogo_rv">
                                        <span class="logowt"><img src="images/uk.jpg" class="img-res"></span>
                                        <span>TATA SIA</span>
                                    </div>

                                    <p>AIRLINES LTD dba VISTARA</p>
                                    <span class="uktxt">UK-927</span>
                                </div>
                                <div class="righttxt_rv">
                                    <div class="datebx_rv">
                                        <span>Fri, 18 Feb 2022</span>
                                        <span class="dotvr"><b>Cabin&nbsp;:&nbsp;</b> Y , ROUNDTRIP</span>
                                    </div>
                                    <div class="time_rv">
                                        <div class="datetm_rv">
                                            <div class="tbrtvr">
                                                <h4>09:30,&nbsp;DEL<span>Delhi&nbsp;(DEL)</span></h4>
                                                <span class="blnspan">&nbsp;</span>
                                                <h4>11:35,&nbsp;BOM<span>Mumbai&nbsp;(BOM)</span></h4>
                                            </div>
                                        </div>
                                        <div class="tmrv_rt">
                                            <h5>2h&nbsp;5m</h5>
                                            <span>0&nbsp;Stop</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="colps_rv">
                                <div id="ShowFlight2" class="collapse clpside">
                                    <div class="heading_cpl">
                                        <h4><i class="fa fa-suitcase"></i>Flight and Baggage Details</h4>
                                        <div class="suitcase_rv"><span class="suitcase_img"><img
                                                    src="images/vistara-logo.jpg" class="img-res"></span><span
                                                class="suitcase_txt"><strong>09:30
                                                    - 11:35,</strong> 2h 5m</span></div>
                                    </div>

                                    <div class="to_list">
                                        <span>Delhi(DEL) to Mumbai(BOM)</span>
                                        <ul>
                                            <li>TATA SIA AIRLINES LTD dba VISTARA 927</li>
                                            <li>Cabin (Y) / Coach (V)</li>
                                            <li>Operating Airline (UK)</li>
                                            <li>Marketing Airline (UK)</li>
                                            <li>Embraer 320</li>
                                        </ul>
                                        <div class="btmlist_to">
                                            <span>Estimated bag fees&nbsp;:&nbsp;</span>
                                            <span><strong>Carry on&nbsp;:&nbsp;No fee</strong></span>
                                            <span><strong>Bag Allowance&nbsp;:&nbsp;15-kg</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 data-toggle="collapse" data-target="#ShowFlight2">Show Flight and Baggage Fee
                                    Details
                                    <i class="fa fa-angle-down"></i>
                                </h6>

                            </div>

                        </li>
                    </ul>
                </div>
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
                                <th> Date Of Birth</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Adult</td>
                                <td>Mr Sandeep Kumar</td>
                                <td>28 Dec 1995</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>

            <div class="termbx brdb">
                <div class="dts_heading">
                    <h1>Important Terms & Conditions</h1>
                </div>
                <div class="Review_book whitebrd">
                    <ul>
                        <li>All Tickets are Non-refundable, Non-changeable and Non-transferable unless otherwise
                            specified.
                        </li>
                        <li>Passengers must ensure that all names are correct as per their passports and that the travel
                            itinerary is correct. Changes may not be permissible after the tickets are issued and a
                            payment for a new ticket may be charged.</li>
                        <li>Airfares are guaranteed upon ticketing only. If there would be any issue with the payment,
                            we will notify you as soon as possible through email and phone. Otherwise, we will send you
                            the ticket within 48 hours of your booking.</li>
                        <li>Free baggage allowance will be provided to the passenger wherever applicable by the
                            airlines, varying according to routes and class of services.</li>
                        <li>Passengers must reach airport 3 hours prior in case of international flights and 2 hours
                            prior in case of domestic flights. Tickets cannot be refunded or changed due to no-show at
                            the airport (unless otherwise specified by
                            airlines).
                        </li>
                        <li>Passengers are responsible for all travel documentation including visas. Visas may be
                            required for the entire journey both for the destination and/or transit. Visas must be
                            secured before ticket issue. Tickets cannot be refunded
                            for failure to obtain a visa.
                            <ul>
                                <li>Passport ,Visa & Health Recommendation</li>
                                <li>Passports must be valid for at least 6 months beyond the period of your stay.
                                </li>
                                <li>ESTA visa is a mandatory requirement for all USA bound travel including transiting
                                    the USA.</li>
                                <li> If your flight has a change involving two different airports with the itinerary, it
                                    is your responsibility to organize the transfer to the right airport and also check
                                    the transit visa requirement.</li>
                                <li>If you have booked code-share flight, terminal change may be there and you may
                                    require transit visa for changing the terminals. Please check with the embassy or
                                    airline directly for checking visa requirements in case
                                    of terminal change.
                                </li>
                                <li>bookmytravelin is not responsible for the VISA formalities. Please consult the
                                    relevant embassy or consulate for this information.</li>
                                <li>Health Recommendation: Recommended inoculations for travel may change at any time.
                                    It is your responsibility to ensure that you obtain all recommended inoculations,
                                    take all recommended medication and follow all medical
                                    advice in relation to your trip.</li>

                            </ul>
                        </li>
                        <li>Insurance / Travel Insurance:- The Company strongly recommends that the Client takes out
                            adequate travel insurance. The Client is herewith recommended to read the terms of any
                            insurance to satisfy them as to the fitness of
                            cover. The Company will be pleased to quote you for insurance.</li>
                        <li>Money paid by for the flight/ holidays are ATOL protected by the Civil Aviation Authority.
                            Air Travel Organisers' Licensing is a USA Civil Aviation Authority scheme to give financial
                            protection to people who have purchased
                            package holidays and flights from a member tour operator.</li>
                        <li>Flights/ packages are protected by CAA in case the airline goes out of operation or
                            bankruptcy. However bookings made on low cost airlines or charter flights / airlines not
                            under SAFI are not covered by the airline failure
                            insurance, therefore agent will not be liable for loss of money in such cases.</li>
                        <li> Changes :- If you wish to change any item – other than increasing the number of persons in
                            your party/ booking – And providing we can accommodate the change, you will have to pay an
                            amendment Fee of USD 50.00 per booking plus
                            the airlines/ supplier charges (if any) .From time to time we are required to collect
                            additional taxes . You will be informed for any additional taxes prior to ticket issuance/
                            reissuance. After ticket issuance most of
                            the airlines do not allow changes.</li>
                        <li>Cancellation
                            <ul>
                                <li>Cancellation before ticket issuance :- Should you or any member of your party be
                                    forced to cancel your flight or holidays, we must be notified by the person who made
                                    the booking and who therefore responsible for the
                                    payment of cancellation charges.</li>
                                <li>Cancellation after ticket issuance: - Cancellation after ticket issuance will result
                                    in loss of 100 % of total cost of all travel arrangements in most of cases. Please
                                    consult with your travel consultant. Low cost airlines/Charter
                                    flights carry a 100 % cancellation fee in both conditions before or after ticket
                                    issuance.</li>

                            </ul>
                        </li>
                        <li>Force Majeure :- We accept no responsibility for and shall not be liable in respect of any
                            loss or damage or alterations , delays or changes arising from unusual and unforeseeable
                            circumstances beyond our control, such as war
                            or threat or war , riot, Civil Strife , industrial Dispute including air traffic control
                            disputes , terrorist activity , natural & nuclear disaster, fire or adverse weather
                            conditions , technical problems with transport
                            , closure or congestion of airports or ports , cancellation of schedules by scheduled
                            airlines. You can check the current position on any country by contacting the foreign and
                            commonwealth office.</li>
                        <li>South African travel requirements for minors travelling to and from South Africa. New
                            requirements, introduced by the South African Department of Home Affairs from 1 June 2015,
                            specify that all minors (children under 18 years)
                            are required to produce, in addition to their passport, an Unabridged Birth Certificate
                            which shows the details of both parents for all international travel to and from South
                            Africa. Travellers will be asked to produce
                            the required documentation at check-in for each flight.</li>
                        <li>New passport regulations for Travellers to the U.S.A.The United States of America has made
                            it mandatory, that anyone flying to the US for holidays or business under the Visa Waiver
                            Program must hold the latest Biometric Passport
                            or a Machine Readable Passport that contains an electronic chip, even if the electronic visa
                            has been granted. The biometric passport has a sequence of lines, that can be swiped by the
                            US Customs/Immigration/Border Protection
                            officers that will quickly confirm the passport holder's identity and collect other
                            information about the holder.VWP visitors arriving in the US without the Biometric Passport
                            would be denied entrance into the country.
                            Travellers among the VWP countries are encouraged to check with their passport issuing
                            authority to be in possession of a biometric passport. Travellers with an immediate travel
                            plan, who are unable to possess such a passport,
                            may apply for a US visa at the respective embassy or consulate.
                        </li>
                        <li> If you need further information on above mentioned points regarding
                            refund/cancellation/special assistance etc., please call our customer care number +1 (507)
                            398-1446 or email us on info@wox.com. +1 (507) 398-1446 or email
                            us on support@wox.com.</li>
                        <li>A direct flight in the aviation industry is any flight between two points by an airline with
                            no change in flight numbers, which may include a stop at an intermediate point. The stop
                            over may either be to get new passengers
                            (or allow some to disembark) or a mere technical stop over (i.e., for refuelling) or due to
                            operational reasons.</li>
                    </ul>


                </div>
            </div>

        </div>

        <div class="rightmain_rv ">
            <div class="pritotal_main  mtprew1">
                <div class="bookingrfs  pdbox_wht">
                    <h6>Your booking reference no
                        <strong>TCB28518</strong>
                    </h6>
                    <h6 class="mt-3">Booking Date & Time
                        <span>02 Mar 2022 06:29:48</strong>
                    </h6>

                </div>

                <div class="farebox whitebrd ">
                    <h3><i class="fa fa-money mr-1"></i>PAYMENT RECEIPT</h3>
                    <div class="paybx cngfet">

                        <ul class="basefareul">

                            <li><span>Adults x 1</span></li>

                            <li><span>Base Fare</span><span><b><i class="fa fa-dollar"></i>&nbsp;121,250<sup>
                                        </sup></b></span></li>

                            <li><span>Discount</span><span><b><i class="fa fa-dollar"></i>&nbsp;0<sup> </sup></b></span>
                            </li>

                            <li><span>Total Fare</span><span><b><i class="fa fa-dollar"></i>&nbsp;121,250<sup>
                                        </sup></b></span></li>

                        </ul>

                    </div>

                    <div class="paybx brdtopd">
                        <ul class="basefareul">
                            <li><span><b>Total</b></span><span><b><i class="fa fa-dollar"></i> 42981.<sup>
                                        </sup></b></span></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@php
}}
@endphp
@endsection
