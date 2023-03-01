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
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
</nav>
<section class="content_box ">
    <div class="container ">
        <div class="textcontact d-flex">
            <div class="whicnt">
                <span>
                    <a href="tel:+973 17000561">
                        <img src="{{asset('public/assets/images/call_b.svg')}}" alt="">
                    </a>
                </span>
                <a href="tel:+973 17000561">+973 17000561</a>
            </div>
            <div class="whicnt">
                <span>
                    <a href="mailto:info@woxtt.com">
                        <img src="{{asset('public/assets/images/message_b.svg')}}" alt="">
                    </a>
                </span>
                <a href="mailto:info@woxtt.com">info@woxtt.com</a>
            </div>
            <div class="whicnt">
                <span>
                    <a>
                        <img src="{{asset('public/assets/images/clock_b.svg')}}" alt="">
                    </a>
                </span>
                <a href="#">Open 24/7.</a>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="whybox text-center topvx">
            <div class="form_txt_contact">
                <span>DROP US A LINE</span>
                <h2>SEND YOUR <span>MESSAGE</span>
                </h2>
                <p>If you have question or would like more information on our works, Please complete the form and we’ll aim get back to you</p>
            </div>
            <form method="post" id='searchHot' action='{{url("submit_contact_form")}}'>
                     @csrf
            <div class="contact_form">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="position-relative">
                            <input type="text" class="intsa" name='firstname' placeholder="First Name" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="position-relative">
                            <input type="text" class="intsa" name='lastname' placeholder="Last Name" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="position-relative">
                            <input type="text" class="intsa" name='email' placeholder="Email" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="position-relative">
                            <input type="text" class="intsa" name='mobile' placeholder="Mobile" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="position-relative">
                            <textarea class="intsa" name='message' placeholder="Message" id="" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="text-center">
                            <button type="submit" class="sbmt">
                                <i class="fa fa-send mr-1"></i>Submit </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection