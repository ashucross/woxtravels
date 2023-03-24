@extends('homeLayout')
@section('styles')
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        color: #000;
    }

    .owl-nav {
        display: none;
    }

    .banner {
        background: url({{asset('public/assets/images/images/perto-rico-flights.webp')}});
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        background-blend-mode: overlay;
        background-color: #00000073;
        padding: 80px 0;
    }

    .owl-carousel .owl-item img {
        height: 500px;
        max-width: 800px;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .owl-carousel {
        max-width: 750px;
        box-shadow: 0 0 11px 1px #a3a3a3;
        position: relative;
        border-radius: 10px;
    }

    .owl-carousel>* {
        border-radius: 10px;
    }

    .owl-dots {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .owl-carousel .owl-item h2 {
        position: absolute;
        bottom: 4px;
        left: 10px;
        color: #fff;
        font-size: 35px;
    }

    .owl-theme .owl-dots .owl-dot.active span {
        background: #fccf13;
    }

    .banner .container {
        display: flex;
        align-items: center;
        height: 100%;
        position: relative;
    }

    .login-form {
        background-color: #fff;
        position: absolute;
        z-index: 999;
        padding: 20px;
        right: 0;
        border-radius: 10px;
        box-shadow: 0 0 21px 4px #404040;
        max-width: 600px;
    }

    .form-group {
        position: relative;
        margin-bottom: 15px;
    }

    .control-label {
        font-size: 14px;
        margin-bottom: 5px;
        font-weight: 300;
    }

    .form-control {
        font-size: 14px;
        font-weight: 400;
    }

    .form-check-label {
        font-size: 14px;
    }

    .login-form h1 {
        font-size: 22px;
        color: #02588f;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .login-form p {
        font-weight: 300;
    }

    .loginBtn {
        background: #fccf13;
        padding: 13px 35px;
        border: none;
        text-transform: uppercase;
        font-weight: 500;
        color: #fff;
        border-radius: 50px;
    }

    .loginBtn:hover {
        background: #eec108;
        color: #fff;
    }

    .forgotPass {
        color: #02588f;
        text-decoration: none;
    }

    .forgotPass:hover {
        color: #0485d8;
    }

    .key-facts {
        text-align: center;
        padding: 20px 0;
        background-color: #02588f;
        color: #fff;
    }


    .key-facts h3 {
        font-size: 40px;
    }

    .key-facts span {
        font-size: 12px;
        line-height: 15px;
    }

    @media(max-width: 992px) {
        .banner {
            height: auto;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .owl-carousel .owl-item img {
            height: 250px;
        }

        .login-form {
            position: static;
        }

        .banner .container {
            gap: 40px;
            flex-direction: column-reverse;
            justify-content: center;
        }

    }
</style>
<!-- page specific style code here-->

<!-- page specific style code here-->
@endsection
@section('pageContent')

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<div class="banner">
    <div class="container">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="{{asset('public/assets/images/images/new-york-flights.webp') }}" alt="Destination">
                <h2>New York</h2>
            </div>
            <div class="item">
                <img src="{{asset('public/assets/images/images/paris-flights.webp') }}" alt="Destination">
                <h2>Paris</h2>
            </div>
            <div class="item">
                <img src="{{asset('public/assets/images/images/rome-flights.webp') }}" alt="Destination">
                <h2>Rome</h2>
            </div>
            <div class="item">
                <img src="{{asset('public/assets/images/images/veniche-flights.webp') }}" alt="Destination">
                <h2>Marid</h2>
            </div>
        </div>
        <div class="login-form">
            <h1>Agent Login</h1>
            <p>Sign in with your agent code, username & password to log in!</p>
            <form action="">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="agentCode">Agent Code</label>
                            <input class="form-control" type="number" name="agentCode" id="agentCode"
                                placeholder="Enter Code">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username"
                                placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password"
                                placeholder="Enter your password">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check form-group">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="forgotPass" href="#">Forgot Password</a>
                            <a  class="forgotPass" href="{{ url('agent/signup') }}">Signup</a>
                            <button type="submit" class="loginBtn btn">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<section class="key-facts">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h2>Key Facts</h2>
            </div>
            <div class="col">
                <h3>150+</h3>
                <span>MULTI-LINGUAL TRAVEL PROFESSIONALS, AT YOUR SERVICE</span>
            </div>
            <div class="col">
                <h3>15+</h3>
                <span>YEARS OF EXPERIENCE IN TRAVEL INDUSTRY</span>
            </div>
            <div class="col">
                <h3>170+</h3>
                <span>TRAVEL PRODUCTS IN OVER 170 COUNTRIES WORLDWIDE </span>
            </div>
            <div class="col">
                <h3>24x7</h3>
                <span>DEDICATED CUSTOMER RELATIONSHIP MANAGERS FOR OUR CLIENTS AND SUPPLIER PARTNERS.</span>
            </div>
            <div class="col">
                <h3>15+</h3>
                <span>OFFICES IN 15 COUNTRIES ACROSS THE GLOBE</span>
            </div>
        </div>
    </div>
</section>






<section class="appbg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="headingapp position-relative text-center">
                    <h2>Download App Now !</h2>
                    <div class="qr_ap d-flex justify-content-center">
                        <div class="ap1">
                            <a href="#" class="mb-2">
                                <img src="{{asset('public/assets/images/ap2.png')}}" alt="" class="img-res" />
                            </a>
                            <a href="#">
                                <img src="{{asset('public/assets/images/ap1.png')}}" alt="" class="img-res" />
                            </a>
                        </div>
                        <div class="ap2">
                            <span>
                                <img src="{{asset('public/assets/images/ap3.png')}}" alt="" class="img-res" />
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(function () {
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 1,
            margin: 10,
            loop: true,
            nav: true,
            autoplay: true,
            rewind: true,
            autoplayTimeout: 5000,
            smartSpeed: 800,
        });
    });

</script>
@endsection
