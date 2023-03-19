@extends('homeLayout')
@section('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
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

    .main {
        padding: 50px 0;
    }

    .section-header {
        background-color: #02588f;
        padding: 20px 0;
        margin-bottom: 40px;
    }

    h1 {
        font-size: 24px;
        line-height: 26px;
        margin-bottom: 0;
        font-weight: 400;
        color: #fff;
    }

    h2 {
        font-size: 20px;
        font-weight: 400;
        margin-bottom: 30px;
        color: #02588f;
    }

    h2 i {
        font-size: 16px;
    }

    h4 {
        font-size: 16px;
        margin: 30px 0;
        width: fit-content;
        color: #02588f;
        border-bottom: 1px solid #02588f;
    }

    hr {
        border-color: #bbbbbb;
    }

    .form-group {
        position: relative;
        margin-bottom: 20px;
    }

    .control-label,
    .form-check-label {
        font-size: 14px;
        display: block;
        margin-bottom: 5px;
        font-weight: 400;
        color: #1a1a1a;
    }

    .form-control {
        font-size: 14px;
        font-weight: 400;
        color: black;
    }

    .grid-inputs>div {
        padding: 0 30px;
    }

    .form-footer .form-check {
        margin-top: 20px;
    }

    .formAction {
        padding: 8px 20px;
        min-width: 150px;
        border-radius: 50px;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 600;
        display: inline-block;
        margin-top: 20px;

    }

    .btnSubmit {
        background-color: #fccf13;
        color: #fff;
    }

    .btnSubmit:hover {
        background-color: #e7bd0a;
        color: #fff;
    }


    .btnReset {
        background: #02588f;
        color: #fff;
        margin-right: 20px;
    }

    .btnReset:hover {
        background: #033f65;
        color: #fff;
    }



    @media(max-width: 992px) {
        .container {
            max-width: 98%;
        }
    }
</style>
@endsection
@section('pageContent')
<section class="main">
    <div class="section-header">
        <div class="container">
            <h1>Agent Registration </h1>
        </div>
    </div>
    <div class="container">
        <h2><i class="fa-solid fa-user"></i> Travel Agents</h2>
        <h4>Login Details</h4>

        <form  enctype="multipart/form-data" action="{{ url('agent/signup/save') }}" method="post" class="register-form" id="needs-validation"
            novalidate>
            @csrf
            @if(count($errors) > 0 )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="username">Username <sup
                                    class="text-danger">*</sup></label>
                            <input class="form-control" type="text"  required autocomplete="off" name="username" value="{{old('username')}}"
                                id="username" placeholder="Enter Username">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="password">Password <sup
                                    class="text-danger">*</sup></label>
                            <input class="form-control"  required autocomplete="off"  type="password" name="password" id="password"
                                placeholder="Enter Password">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="password">Confirm Password <sup
                                    class="text-danger">*</sup></label>
                            <input class="form-control" required autocomplete="off"  type="password" name="password_confirmation"
                                id="confirmPassword" placeholder="Enter Confirm Password">
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row grid-inputs">

                <div class="col-md-4 border-end">
                    <h4>Contact Details</h4>
                    <div class="form-group">
                        <label class="control-label" for="firstName">First Name <sup class="text-danger">*</sup></label>
                        <input class="form-control" required autocomplete="off"  type="text" name="first_name" value="{{old('first_name')}}"
                            id="firstName" placeholder="Enter First Name">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="lastName">Last Name </label>
                        <input class="form-control" type="text" name="last_name" value="{{old('last_name')}}"
                            id="lastName" placeholder="Enter Last Name">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="designation">Designation</label>
                        <input class="form-control" type="text" value="{{old('designation')}}" name="designation"
                            id="designation" placeholder="Enter Designation">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">Email <sup class="text-danger">*</sup></label>
                        <input class="form-control" required autocomplete="off"  type="text" value="{{old('email')}}" name="email" id="email"
                            placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="mobNumber">Phone <sup class="text-danger">*</sup></label>
                        <div class="d-flex gap-4">
                            <input class="form-control w-50" required autocomplete="off"  type="number" value="{{old('mobCode')}}" name="mobCode"
                                id="mobCode" placeholder="Code">
                            <input class="form-control" type="number" required autocomplete="off"  value="{{old('phone')}}" name="phone"
                                id="mobNumber" placeholder="Enter Mobile Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="mobNumber">Fax <sup class="text-danger">*</sup></label>
                        <div class="d-flex gap-4">
                            <input class="form-control w-50" type="number" required autocomplete="off"  value="{{old('faxcode')}}" name="faxcode"
                                id="faxcode" placeholder="Code">
                            <input class="form-control" type="number" required autocomplete="off"  value="{{old('faxNumber')}}" name="faxNumber"
                                id="faxNumber" placeholder="Enter Fax Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="currency">Preferred Currency</label>
                        <select name="currency" id="currency" class="form-control form-select">
                            <option value="" selected disabled>Select</option>
                            @if(!empty(getcurrencies()))
                            @foreach(getcurrencies() as $data)
                            <option {{!empty($setting->currency) && $setting->currency == $data->code ? 'selected':''}}
                                value='{{$data->code ?? ""}}'>{{$data->code ?? ""}} - {{$data->icon ?? ""}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="timeZone" class="control-label">Time Zone</label>
                        @php
                        echo Timezonelist::toSelectBox('timeZone', null, 'id="timeZone" class="form-control
                        form-select"');
                        @endphp
                    </div>

                </div>

                <div class="col-md-4 border-end">
                    <h4>Company Details</h4>
                    <div class="form-group">
                        <label for="companyname" class="control-label">Company Name <sup
                                class="text-danger">*</sup></label>
                        <input type="text" name="company_name" value="{{old('company_name')}}" id="companyname"
                            class="form-control" placeholder="Enter Your Company Name">
                    </div>

                    <div class="form-group">
                        <label for="iataStatus" class="control-label d-block">Iata Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Approved</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Not Approved</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="iataNumber" class="control-label">Iata Number (If approved)</label>
                        <input type="number" name="iataNumber" value="{{old('iataNumber')}}" id="iataNumber"
                            class="form-control" placeholder="Enter Iata Number">
                    </div>

                    <div class="form-group">
                        <label for="companyRegnumber" class="control-label">Company Reg. No. <sup
                                class="text-danger">*</sup></label>
                        <input type="number"  required autocomplete="off"  name="companyRegnumber" value="{{old('companyRegnumber')}}"
                            id="companyRegnumber" class="form-control" placeholder="Enter Company Reg. Number">
                    </div>

                    <div class="form-group">
                        <label for="natureofBusiness" class="control-label">Nature of Business</label>
                        <select name="natureofBusiness" id="natureofBusiness" class="form-select form-control">
                            <option value="" selected disabled>Select</option>
                            <option value="travelagennt">Travel Agent</option>
                            <option value="Corporate">Corporate</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="countrySelect" class="control-label">Country <sup
                                class="text-danger">*</sup></label>
                        <select class="form-select form-control country" required autocomplete="off"  name="country" id="countrySelect">
                            <option value="" selected disabled>Select</option>
                            @if(@$Country)
                            @foreach ($Country as $Countr)
                            <option value="{{  $Countr->id }}">{{ ucfirst($Countr->name) }}</option>
                            @endforeach
                            @else
                            <option selected>No Role Exist</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="countrySelect" class="control-label">State <sup class="text-danger">*</sup></label>
                        <select class="form-select form-control state" disabled name="state" id="countrySelect">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="citySelect" class="control-label">City <sup class="text-danger">*</sup></label>
                        <select name="city" disabled id="citySelect" required autocomplete="off"  class="form-control city form-select">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vatNumber" class="control-label">Vat Number <sup class="text-danger">*</sup>
                        </label>
                        <input type="number" name="vatNumber" required autocomplete="off"  value="{{old('vatNumber')}}" id="vatNumber"
                            class="form-control" placeholder="Enter Vat No.">
                    </div>

                    <div class="form-group">
                        <label for="pincodeZip" class="control-label">Pincode/Zipcode <sup
                                class="text-danger">*</sup></label>
                        <input type="number" required autocomplete="off"  name="postal_code" value="{{old('postal_code')}}" id="pincodeZip"
                            class="form-control" placeholder="Pincode/Zipcode">
                    </div>

                    <div class="form-group">
                        <label for="address" name="address" class="control-label">Address</label>
                        <textarea name="address" required autocomplete="off"  id="address" cols="30" rows="2"
                            class="form-control">  {{old('address')}} </textarea>
                    </div>

                    <div class="form-group">
                        <label for="website" class="control-label">Website</label>
                        <input type="text" name="website" id="website" value="{{old('website')}}" class="form-control"
                            placeholder="Enter Company Website">
                    </div>

                    <div class="form-group">
                        <label for="companylogo" class="control-label">Company Logo (150px X 150px) <sup
                                class="text-danger">*</sup></label>
                        <input type="file"  required autocomplete="off"  name="logo" id="companylogo" class="form-control">
                    </div>

                </div>

                <div class="col-md-4">
                    <h4>Accounts</h4>

                    <div class="form-group">
                        <label for="accountName" class="control-label">Name <sup class="text-danger">*</sup></label>
                        <input type="text" required autocomplete="off"  name="accountName" value="{{old('accountName')}}" id="accountName"
                            class="form-control" placeholder="Enter Account Name">
                    </div>

                    <div class="form-group">
                        <label for="accountEmail" class="control-label">Email <sup class="text-danger">*</sup></label>
                        <input type="email" name="accountEmail" required autocomplete="off"  value="{{old('email')}}" id="accountEmail"
                            class="form-control" placeholder="Enter Account Email">
                    </div>

                    <div class="form-group">
                        <label for="contactno">Contact Number</label>
                        <div class="d-flex gap-4">
                            <input type="number" required autocomplete="off" name="code" id="code" value="{{old('code')}}" class="form-control w-50"
                                placeholder="Code">
                            <input type="number" required autocomplete="off" name="accountcontactno" value="{{old('accountcontactno')}}"
                                id="contactno" class="form-control" placeholder="Enter Contact Number">
                        </div>
                    </div>

                    <h4>Reservations/Operations</h4>

                    <div class="form-group">
                        <label for="" class="control-label">Name</label>
                        <input type="text" name="oprationname" value="{{old('oprationname')}}" id=""
                            class="form-control" placeholder="Enter REservation Name">
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="oprationEmail" value="{{old('oprationEmail')}}" class="form-control"
                            placeholder="Enter Reservation Email" id="">
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">Contact No. <sup class="text-danger">*</sup></label>
                        <div class="d-flex gap-4">
                            <input type="number" class="form-control w-50" required autocomplete="off"  value="{{old('operationsCode')}}"
                                name="operationsCode" placeholder="Code">
                            <input type="number" name="oprationContact" required autocomplete="off"  value="{{old('oprationContact')}}" id=""
                                class="form-control" placeholder="Enter Contact No.">
                        </div>
                    </div>

                    <h4>Management</h4>

                    <div class="form-group">
                        <label for="" class="control-label">Name</label>
                        <input type="text" name="managementName" value="{{old('managementName')}}" id=""
                            class="form-control" placeholder="Enter Management Name">
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="managmentEmail" value="{{old('managmentEmail')}}" id=""
                            class="form-control" placeholder="Enter Management Email">
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label">Contact No. <sup class="text-danger">*</sup></label>
                        <div class="d-flex gap-4">
                            <input type="number" class="form-control w-50" required autocomplete="off"  value="{{old('managmentCode')}}"
                                placeholder="managmentCode">
                            <input type="number" name="managmentContact" required autocomplete="off"  value="{{old('managmentContact')}}" id=""
                                class="form-control" placeholder="Enter Contact No.">
                        </div>
                    </div>

                </div>
            </div>

            <hr>

            <div class="form-footer">
                <h4>Upload Documents</h4>
                <div class="mt_repeater align-items-center repeater-default">
                    <div data-repeater-list="documnet">
                        <div data-repeater-item="">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="" class="control-label">Document Name</label>
                                        <input type="text" name="document_name" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="" class="control-label">Attachment</label>
                                        <input type="file" name="docImg" id="" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="" class="control-label">Description</label>
                                        <textarea name="docdescrpition" id="" cols="30" rows="2" class="form-control"
                                            placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button data-repeater-delete="" type="button" class="btn  btn-sm btn-danger"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="button" data-repeater-create="" class="btn  adddocument btn-sm btn-success"><i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                <hr>
                <div class="captcha_submit">
                    <div class="g-recaptcha" data-sitekey="6Ldbdg0TAAAAAI7KAf72Q6uagbWzWecTeBWmrCpJ"></div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" required value="" id="flexCheckDefault">
                            <label class="form-check-label control-label d-inline-block" for="flexCheckDefault">
                                *I Agree to the Terms & Conditions
                            </label>
                        </div>
                    </div>

                    <button type="button" class="btn btnReset formAction">Reset</button>
                    <button type="submit" class="btn btnSubmit formAction">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>


<script>
    $(document).ready(function(){
    $("select.country").change(function () {
    var selectCountry = $(".country option:selected").val();
    var _this = $(this);
    _this.parent().append(
        '<p class="bef_send"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
    $.ajax({
        type: "POST",
        url: '/state',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            country: selectCountry
        }
    }).done(function (data) {
        $(".bef_send").hide();
        $(".state").html(data);
        $(".state").removeAttr("disabled");

    }).error(function () {
        $("#state_list").html("Error! Please try again later!");
    });
});
/*get cities from state*/
$(document).on('change', 'select.state', function () {
    var selectState = $(this).val();
    var _this = $(this);
    _this.parent().append(
        '<p class="bef_send"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
    $.ajax({
        type: "POST",
        url: '/city',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            state: selectState
        }
    }).done(function (data) {
        $(".bef_send").hide();
        $(".city").html(data);
        $(".city").removeAttr("disabled");
    })
    });
    });


    (function() {
    'use strict';
    window.addEventListener('load', function() {
      var form = document.getElementById('needs-validation');
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    }, false);
  })();




var repeater = $('.repeater-default').repeater({
  initval: 1,
});


jQuery(".drag").sortable({
    axis: "y",
    cursor: 'pointer',
    opacity: 0.5,
    placeholder: "row-dragging",
    delay: 150,
    update: function(event, ui) {
      console.log('repeaterVal');
      console.log(repeater.repeaterVal());
      console.log('serializeArray');
      console.log($('form').serializeArray());
    }
}).disableSelection();
</script>
@endsection
