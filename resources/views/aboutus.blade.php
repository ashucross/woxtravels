@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->

<!-- page specific style code here-->
@endsection
@section('pageContent')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item">
            <a href="index.html">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
    </ol>
</nav>
<section class="container mt-5">
    <div class="row flex-row-reverse align-items-center">
        <div class="col-md-4">
            <div class="imagri">
                <img src="{{asset('public/assets/images/ab.png')}}" alt="" class="imgres" />
            </div>
        </div>
        <div class="col-md-8">
            <div class="para_aball">
                <h2>INTRODUCTION</h2>
                <p>Wox Travel & Tour is dedicated in providing it's esteemed clients with a distinguished and memorable travel experience. </p>
                <p>We understand the essential ingredients for any holiday; from clean and comfortable accommodation to a stress-free travel experience that gives our clients a chance to immerse themselves in the culture of the country being visited. </p>
                <p>whether you are travelling in a group tour or on a personalized itinerary, our staff will ensure that your every need is catered for.</p>
            </div>
        </div>
    </div>
</section>
<section class="bgblue mt-5">
    <div class="container">
        <div class="row flex-row-reverse align-items-center">
            
            <div class="col-md-4">
                <div class="imagri">
                    <img src="{{asset('public/assets/images/WE-OFFER.jpg')}}" alt="" class="imgres" />
                </div>
            </div>

            <div class="col-md-8">
                <div class="para_aball">
                    <h2>We offer our clients:</h2>
                    <!-- <span class="ofrng">We offer our clients:</span> -->
                    <p>High quality holiday packages throughout the world which given them a unique cultural and physical experience that can prove to be memorable;</p>
                    <p>We also cater to individual and group travel to leisure and corporate clients, which can be planned according to their preference; </p>
                    <p>Clietnts are also offered Special Interest tours / Themed tours Honeymoon / Wedding tour packages upon request;</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="container mt-5">
        <div class="row flex-row-reverse align-items-center">
            <div class="col-md-4">
                <div class="imagri">
                    <img src="{{asset('public/assets/images/about3.jpeg')}}" alt="" class="imgres" />
                </div>
            </div>
            <div class="col-md-8">
                <div class="para_aball">
                    <h2>OUR VALUES </h2>
                    <p>In addition to providing our customers with a memorable travel experince</p>
                    <p>we urge our clients to experience the difference in our services comparatively to other agencies which will not just open up their eyes to new cultures and travel experience but also open their heart to them.</p>
                    <p>we aim to work diligently to achieve more than our customer's expectations as we view every customer as a customer for life.</p>
                </div>
            </div>
        </div>
    </div>

<section class="bg_ylc mt-5">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="para_aball">
                <h2>OUR FACILITIES</h2>
                <div class="automr">
                    <ul class="airul d-flex flex-wrap justify-content-left ">
                        <!-- <li>Air : International / Regional</li>
                        <li>Low Cost Carrier</li>
                        <li>Meet and Assist</li>
                        <li>Best Cruise Deals</li>
                        <li>Holiday Packages</li>
                        <li>In-land Tour Packages </li>
                        <li>Visa Assistance</li>
                        <li>Car Rental</li>
                        <li>Hotel Booking</li> -->

                        <li>Air Ticket Booking</li>
                        <li>Sightseeing Tours</li>
                        <li>Chauffeur service</li>
                        <!-- <li>Cruise (RCL, NCL, Costa & MSC)</li> -->
                        <li>Cruise </li>
                        <li>Rent a Car</li>
                        <li>Airport Meet & Greet</li>
                        <li>Transfer</li>
                        <li>Hotel & Apartments</li>
                        <!-- <li>Exclusive Holiday package (Middle East, Far East, Europe & USA)</li> -->
                        <li>Exclusive Holiday package</li>
                        <li>Eurail (Tickets & passes)</li>
                        <li>Visas Assistance</li>
                        <!-- <li>Disneyland (Paris, Orlando & Hongkong)</li> -->
                        <li>Disneyland</li>
                        <li>Travel Insurance</li>
                        

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div></section>

<!-- <div class="container mt-5">
    <div class="row flex-row-reverse align-items-center">
        <div class="col-md-7">
            <div class="para_aball_2">
                <p>Wox Travel & Tour deals with well known cruise lines like <b>Royal Caribbean, Norwegian, Star Cruises, Costa Cruises, etc.,</b> in order to provide our clientele with the world's best cruise deals with affordable prices. This enables our clients to enjoy a wonderful voyage to various destination in addition to having the best rates in terms of entertainment, complimentary-use onboard facilities. </p>
            </div>
        </div>
        <div class="col-md-5">
            <div class="imagri">
                <img src="{{asset('public/assets/images/abour_right.png')}}" alt="" class="imgres" />
            </div>
        </div>
        <div class="col-sm-12 mt-5">
            <div class="para_aball_2 birdcnt">
                <p>We offer our clients with round-the-clock services to cater to any last minute changes or delays. Responses are guaranteed within 24 business hours. During your trip with us, we strive to offer you a stress-free travel. Our staff is highly qualified, with example experience in the travel field to deal with any issues that arise on the go. Our job is considered complete when our clients are back home safe and sound. </p>
                <br>
                <p class="blcs">For further information, please contact us at: <br> info@woxtt.com | www.woxtt.com <br> Landline / WhatsApp : +973 17000561 </p>
                <br>
                <p>Our office timings are from: 9am -6pm (excluding Fridays)We strive to offer you the most competitive, We strive to offer you the most competitive Affordable and high quality tours/vacation packages in the region. </p>
            </div>
        </div>
    </div>
</div> -->
@endsection
@section('scripts')

@endsection