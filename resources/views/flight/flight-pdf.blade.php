<!DOCTYPE html>
@php
ini_set('max_execution_time', 180);
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking Pdf</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="{{ public_path('/fonts/Poppins-Black.ttf') }}" rel="stylesheet">
    <link href="{{ public_path('/fonts/Poppins-BoldItalic.ttf') }}" rel="stylesheet">
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"> --}}

    <style>
        @font-face {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 400;
            src: url('/fonts/Poppins-BoldItalic.ttf') format('truetype');
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-size: 14px;
            color: #747474;
            font-family: 'Poppins', sans-serif !important;
            font-weight: 400;
            line-height: 22px;
        }


        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 25px;
        }

        .logo img {
            /* max-width: 100%; */
            /* width: 100%; */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-gray {
            color: #747474;
        }

        th {
            text-align: left;
        }

        th,
        td {
            padding: 5px;
        }

        .thead-blue {
            background-color: #F6FAFF;
        }

        .thead-blue th {
            color: #0258ac;
        }

        .flight-details {
            margin-bottom: 30px;
        }

        .d-block {
            display: block;
        }

        .text-blue {
            color: #02588f;
        }

        .flight-details h4 {
            font-size: 30px;
            margin-bottom: 5px;
            margin-top: 15px;
        }

        .border-top-bottom {
            border-top: 1px solid #d6d6d6;
            border-bottom: 1px solid #d6d6d6;
        }

        .divider-gray {
            height: 1px;
            background: #d6d6d6;
            margin: 10px 0;
        }

        .change-planes {
            margin-top: 40px;
            margin-bottom: 40px;
            border: 1px solid #d6d6d6;
            text-align: center;
            border-collapse: separate;
            border-radius: 50px;
        }

        ul {
            padding-left: 30px;
        }

        .page-break-before {

            page-break-before: always;
        }
    </style>

</head>
@php
// if(!empty($myBooking)){
$bookingId = json_decode($myBooking->booking_response)->booking_id;
$booking_response = json_decode($myBooking->booking_response);
$bookingDetails = getBookingDetiils($bookingId);
$segment = $booking_response->flight_details->data->flightOffers[0]->itineraries[0]->segments[0];
$depFlight = $bookingDetails[0];
$phoneNumber = $bookingDetails['travelersDetails'][0]['contact']['phones'][0]['countryCallingCode'] . ' ' .
$bookingDetails['travelersDetails'][0]['contact']['phones'][0]['number'];
$emailId = $bookingDetails['travelersDetails'][0]['contact']['emailAddress'];
$file = getFileName($segment->carrierCode)
@endphp

<body>
    <div class="container">
        <table>
            <tbody>
                <tr>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td width="5%">
                                        <div class="logo">
                                            <img src="https://www.woxtt.com/public/assets/images/logo-color.svg"
                                                alt="Logo Image">
                                        </div>
                                    </td>
                                    {{-- @php
                                    die;
                                    @endphp --}}
                                    <td width="45%">
                                        <span><strong>Ticket</strong>-Confirmed</span>
                                    </td>
                                    <td class="text-gray" width="40%">Booking ID: {{ $bookingId }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="flight-details">
                            <thead class="thead-blue">
                                <tr>
                                    <th width="33%">{{ date('M d Y', strtotime( $myBooking->from_date))}} </th>
                                    <th width="33%" colspan="2">{{
                                        $booking_response->oneway->one_way_route[0]->dep_city_name }} To {{
                                        $booking_response->oneway->one_way_route[0]->arr_city_name }} </th>
                                    <th width="33%">{{ strtolower(str_replace('H','H ',substr($segment->duration, 2)))}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-gray">{{$myBooking->flight_name}}</td>
                                    <td>
                                        <h4 class="text-blue">{{ $booking_response->oneway->dep_city_code }}</h4>
                                        <span class="text-blue">{{ $booking_response->oneway->dep_city_name }}</span>
                                        <p class="border-top-bottom">{{ date('M d Y H:i:a', strtotime(
                                            $booking_response->oneway->one_way_route[0]->dep_time)) }} </p>
                                    </td>
                                    <td>
                                        <span>{{ strtolower(str_replace('H','H ',substr($segment->duration,
                                            2)))}}</span>
                                        <div class="divider-gray"></div>
                                        <span>{{ $segment->co2Emissions[0]->cabin }}</span>
                                    </td>
                                    <td>
                                        <h4 class="text-blue">{{ $booking_response->oneway->arrival_city_code }}</h4>
                                        <span class="text-blue">{{ $booking_response->oneway->arrival_city_name
                                            }}</span>
                                        <p class="border-top-bottom">{{ date('M d Y H:i:a', strtotime(
                                            $booking_response->oneway->one_way_route[0]->arrival_time))}} </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-blue">Regular Fare</p>
                                        <p class="text-blue">SAVER</p>
                                    </td>
                                    <td>
                                        {{ $booking_response->oneway->dep_airport_name }}
                                        {{-- <a href="#" class="d-block text-blue"><strong>View on map</strong></a> --}}
                                    </td>
                                    <td>
                                        <!-- empty for  blank space -->
                                    </td>
                                    <td>{{ $booking_response->oneway->arrival_airport_name }}</td>
                                </tr>
                            </tbody>
                        </table>

                        @if(count($booking_response->flight_details->data->flightOffers[0]->itineraries) > 1)
                        <table class="flight-details">
                            <thead class="thead-blue">
                                <tr>

                                    <th width="33%">{{ date('M d Y ', strtotime(
                                        $booking_response->twoway->two_way_route[0]->dep_time)) }} </th>
                                    <th width="33%" colspan="2">{{
                                        $booking_response->twoway->two_way_route[0]->dep_city_name }} To {{
                                        $booking_response->twoway->two_way_route[0]->arr_city_name }} </th>
                                    <th width="33%">{{ strtolower(str_replace('H','H ',substr($segment->duration, 2)))}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-gray">{{$myBooking->flight_name}}</td>
                                    <td>
                                        <h4 class="text-blue">{{ $booking_response->twoway->dep_city_code }}</h4>
                                        <span class="text-blue">{{ $booking_response->twoway->dep_city_name }}</span>
                                        <p class="border-top-bottom">{{ date('M d Y H:i:a', strtotime(
                                            $booking_response->twoway->two_way_route[0]->dep_time)) }} </p>
                                    </td>
                                    <td>
                                        <span>{{ strtolower(str_replace('H','H ',substr($segment->duration,
                                            2)))}}</span>
                                        <div class="divider-gray"></div>
                                        <span>{{ $segment->co2Emissions[0]->cabin }}</span>
                                    </td>
                                    <td>
                                        <h4 class="text-blue">{{ $booking_response->twoway->arrival_city_code }}</h4>
                                        <span class="text-blue">{{ $booking_response->twoway->arrival_city_name
                                            }}</span>
                                        <p class="border-top-bottom">{{ date('M d Y H:i:a', strtotime(
                                            $booking_response->twoway->two_way_route[0]->arrival_time))}} </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-blue">Regular Fare</p>
                                        <p class="text-blue">SAVER</p>
                                    </td>
                                    <td>

                                        {{ $booking_response->twoway->two_way_route[0]->dep_airport_name }}
                                        {{-- <a href="#" class="d-block text-blue"><strong>View on map</strong></a> --}}
                                    </td>
                                    <td>
                                        <!-- empty for  blank space -->
                                    </td>
                                    <td>{{ $booking_response->twoway->two_way_route[0]->arr_airport_name }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                        <table class="passenger-details" style="border: 1px solid #d6d6d6">
                            <thead class="thead-blue">
                                <tr>
                                    <th>PASSENGER NAME</th>
                                    <th>Gender</th>
                                    <th>PNR</th>
                                    {{-- <th>E-TICKET NO.</th> --}}
                                    {{-- <th>SEAT</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookingDetails['passengers'] as $pas)
                                <tr>
                                    <td>{{ ucfirst($pas['first_name']) }} {{ $pas['last_name'] }}, {{ $pas['type'] }}
                                    </td>
                                    <td><strong>{{ $pas['gender'] }}</strong></td>
                                    <td>{{ $myBooking->pnr }}</td>
                                    {{-- <td>25</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- <table class="change-planes">
                            <tbody>
                                <tr>
                                    <td>Change of Planes. | 1h 40m layover in Hyderabad (HYD)</td>
                                </tr>
                            </tbody>
                        </table> --}}

                        {{-- <table class="flight-details">
                            <thead class="thead-blue">
                                <tr>
                                    <th width="33%">Sun, 05 Jun '22 </th>
                                    <th width="33%" colspan="2">KOLKATA TO HUBLI</th>
                                    <th width="33%">4h 55m</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-gray">Indigo 6E-6623</td>
                                    <td>
                                        <h4 class="text-blue">HYD</h4>
                                        <span class="text-blue">KOLKATA</span>
                                        <p class="border-top-bottom">05:55 hrs, 05 Jun </p>
                                    </td>
                                    <td>
                                        <span>2h 5m</span>
                                        <div class="divider-gray"></div>
                                        <span>Economy</span>
                                    </td>
                                    <td>
                                        <h4 class="text-blue">HBX</h4>
                                        <span class="text-blue">HYDERABAD</span>
                                        <p class="border-top-bottom">05:55 hrs, 05 Jun </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-blue">Regular Fare</p>
                                        <p class="text-blue">SAVER</p>
                                    </td>
                                    <td>
                                        Netaji Subhash Chandra Bose International Airport
                                        <a href="#" class="d-block text-blue"><strong>View on map</strong></a>
                                    </td>
                                    <td>
                                        <!-- empty for  blank space -->
                                    </td>
                                    <td>Rajiv Gandhi International Airport</td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="passenger-details" style="border: 1px solid #d6d6d6">
                            <thead class="thead-blue">
                                <tr>
                                    <th>PASSENGER NAME</th>
                                    <th>PNR</th>
                                    <th>E-TICKET NO.</th>
                                    <th>SEAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mr. Anoj Kumar, Adult</td>
                                    <td><strong>ATN5QE</strong></td>
                                    <td>ATN5QE</td>
                                    <td>25</td>
                                </tr>
                            </tbody>
                        </table> --}}

                        <table class="important-info page-break-before"
                            style="border: 1px solid #d6d6d6; margin-top: 40px;">
                            <thead class="thead-blue">
                                <tr>
                                    <th>IMPORTANT INFORMATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>
                                                <strong>Check-in Time : </strong>
                                                Passenger to report 2 hours before departure. Check-in procedure and
                                                baggage drop will close 1 hour before departure
                                            </li>
                                            <li>
                                                <strong>DGCA passenger charter :</strong>
                                                Please refer to passenger charter by clicking Here
                                            </li>
                                            <li>Please do not share your personal banking and security details like
                                                passwords, CVV, etc. with any third person or party
                                                claiming to represent MakeMyTrip. For any query, please reach out to
                                                MakeMyTrip on our official customer care number
                                            </li>
                                            <li>
                                                <strong>Baggage information :</strong>
                                                Carry no more than 1 check-in baggage and 1 hand baggage per passenger.
                                                Additional pieces of
                                                Baggage will be subject to additional charges per piece in addition to
                                                the excess baggage charges.
                                            </li>
                                            <li>
                                                <strong>Check travel guidelines issued by Karnataka below:</strong>
                                                : COVID test/vaccination rules : Travellers from Maharashtra, Kerala
                                                and Goa, entering Karnataka must either carry a final vaccination
                                                certificate (both doses done) or a negative RT-PCR report
                                                with a sample taken within 72 hours before arrival. RT-PCR test timeline
                                                starts from the swab collection time. Travellers
                                                might not be allowed to board their flights if they are not carrying a
                                                valid test report/vaccination certificate. Travellers from all
                                                states will have to undergo thermal screening at the airport. Following
                                                category of travellers are exempted from the
                                                abovementioned requirement:
                                                Constitutional functionaries and healthcare professionals, children
                                                below the age of 2 years,
                                                travellers arriving in emergency situations such as a death in the
                                                family, medical treatment might have to take an on-arrival
                                                test and further action will be decided basis the test result.Quarantine
                                                rules : All students arriving from Kerala must undergo
                                                mandatory 7 days of institutional quarantine before they start their
                                                studies. No quarantine for other travellers arriving in
                                                Karnataka.Pre-registration or e-pass rules : Download and update the
                                                Aarogya Setu app.For the complete list of travel
                                                guidelines issued by Indian States and UTs,If you have arrived on any
                                                international flight and are taking a connecting
                                                domestic flight, click here . Please check the ‘Travelling to India’
                                                tab.Since guidelines are dynamic and might change
                                                regularly, we strongly recommend that you check the full text of the
                                                guidelines issued by the Government before travelling.
                                                We accept no liability in this regard.Remember to web check-in before
                                                arriving at the airport; carry a printed or soft copy of
                                                the boarding pass.Please reach at least 2 hours prior to flight
                                                departure.The latest DGCA guidelines state that it is
                                                compulsory to wear a mask that covers the nose and mouth properly while
                                                at the airport and on the flight. Any lapse might
                                                result in de-boarding.
                                            </li>
                                            <li>
                                                <strong>Valid ID proof needed</strong>
                                                Carry a valid photo identification proof (Driver Licence, Aadhar Card,
                                                Pan Card or any other
                                                Government recognised photo identification)
                                            </li>
                                            <li>
                                                <strong>To Cancel or Modify this booking, visit:</strong>
                                                <a href="https://www.woxtt.com/">https://www.woxtt.com/</a>
                                            </li>
                                            <li><strong>You have paid: INR 11,961</strong></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- <table style="margin-top: 40px;">
                            <thead class="thead-blue">
                                <tr>
                                    <th>BAGGAGE INFORMATION</th>
                                </tr>
                            </thead>
                        </table>

                        <table style="border: 1px solid #d6d6d6; margin-top: 20px; text-align: center;">
                            <thead class="thead-blue" style="border-bottom: 1px solid #d6d6d6;">
                                <th width="25%" style="text-align: center;">Type</th>
                                <th width="25%" style="text-align: center;">Sector</th>
                                <th width="25%" style="text-align: center;">Cabin</th>
                                <th width="25%" style="text-align: center;">Check-in</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border-right: 1px solid #d6d6d6;">Adult</td>
                                    <td style="border-right: 1px solid #d6d6d6;">CCU-HYD</td>
                                    <td style="border-right: 1px solid #d6d6d6;">7 Kgs (1 piece only)</td>
                                    <td>15 Kgs (1 piece only)</td>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #d6d6d6;">Adult</td>
                                    <td style="border-right: 1px solid #d6d6d6;">HYD-HBX </td>
                                    <td style="border-right: 1px solid #d6d6d6;">7 Kgs (1 piece only)</td>
                                    <td>15 Kgs (1 piece only)</td>
                                </tr>
                            </tbody>
                        </table>

                        <table style="margin-top: 40px;">
                            <thead class="thead-blue">
                                <tr>
                                    <th>FARE BENEFITS</th>
                                </tr>
                            </thead>
                        </table>

                        <table style="margin-top: 20px;">
                            <tbody>
                                <tr>
                                    <td>
                                        <li>
                                            <strong>CCU-HYD : Economy SAVER</strong>
                                            [Date change fee starting 3,250 , Cancellation fee starting 3,500 , Free
                                            seats available , Cabin baggage
                                            7 Kgs, Check-in baggage included ]
                                        </li>
                                        <li>
                                            <strong>HYD-HBX : Economy SAVER</strong>
                                            [Date change fee starting 3,250 , Cancellation fee starting 3,500 , Free
                                            seats available , Cabin baggage
                                            7 Kgs, Check-in baggage included ]
                                        </li>
                                    </td>
                                </tr>
                            </tbody>
                        </table> --}}

                        <table style="margin-top: 20px;">
                            <thead class="thead-blue">
                                <tr>
                                    <th>CANCELLATION AND DATE CHANGE CHARGES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-size: 13px;"> All charges below are per passenger and per segment in
                                        INR </td>
                                </tr>
                            </tbody>
                        </table>

                        <table style="width: 48%; margin-top: 40px; border: 1px solid #d6d6d6; float: left;">
                            <thead class="thead-blue" style="border-bottom: 1px solid #d6d6d6;">
                                <tr>
                                    <th colspan="2">CCU-HYD,HYD-HBX</th>
                                    <th colspan="2">Cancellation Charges</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid #d6d6d6;">Type</td>
                                    <td style="border: 1px solid #d6d6d6;">Condition</td>
                                    <td style="border: 1px solid #d6d6d6;">Airline</td>
                                    <td style="border: 1px solid #d6d6d6;">MakeMyTrip</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #d6d6d6;">Adult</td>
                                    <td style="border: 1px solid #d6d6d6;">3 days - 365 days</td>
                                    <td style="border: 1px solid #d6d6d6;">3000</td>
                                    <td style="border: 1px solid #d6d6d6;">300</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="border: 1px solid #d6d6d6;">2 hrs - 3 days</td>
                                    <td style="border: 1px solid #d6d6d6;">3500</td>
                                    <td style="border: 1px solid #d6d6d6;">300</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="border: 1px solid #d6d6d6;">0 hrs - 2 hrs</td>
                                    <td style="border: 1px solid #d6d6d6;" colspan="2">Non - Refundable</td>
                                </tr>
                            </tbody>
                        </table>

                        <table style="width: 48%; margin-top: 40px; border: 1px solid #d6d6d6; float: right;">
                            <thead class="thead-blue" style="border-bottom: 1px solid #d6d6d6;">
                                <tr>
                                    <th colspan="2">CCU-HYD,HYD-HBX</th>
                                    <th colspan="2">Cancellation Charges</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid #d6d6d6;">Type</td>
                                    <td style="border: 1px solid #d6d6d6;">Condition</td>
                                    <td style="border: 1px solid #d6d6d6;">Airline</td>
                                    <td style="border: 1px solid #d6d6d6;">MakeMyTrip</td>
                                </tr>
                                <tr>
                                    <td style="border: 1px solid #d6d6d6;">Adult</td>
                                    <td style="border: 1px solid #d6d6d6;">3 days - 365 days</td>
                                    <td style="border: 1px solid #d6d6d6;">3000</td>
                                    <td style="border: 1px solid #d6d6d6;">300</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="border: 1px solid #d6d6d6;">2 hrs - 3 days</td>
                                    <td style="border: 1px solid #d6d6d6;">3500</td>
                                    <td style="border: 1px solid #d6d6d6;">300</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="border: 1px solid #d6d6d6;">0 hrs - 2 hrs</td>
                                    <td style="border: 1px solid #d6d6d6;" colspan="2">Non - Refundable</td>
                                </tr>
                            </tbody>
                        </table>

                        <div style="clear: both;"></div>

                        <table style="margin-top: 40px; border: 1px solid #d6d6d6; margin-top: 40px;">
                            <thead class="thead-blue" style="border-bottom: 1px solid #d6d6d6;">
                                <tr>
                                    <th colspan="2">24x7 CUSTOMER SUPPORT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: 1px solid #d6d6d6;">Tel</td>
                                    <td style="border: 1px solid #d6d6d6;">+973 17000561</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
