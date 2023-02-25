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


<section class="containerfx ">
    @include('dashboard.profilesidebar')
    <div class=" rightpro tpd">
        <div class="bookingbg">
            <div class="profile_form d-flex justify-content-between align-items-center">
                <h2>Profile
                    <span>Basic info, for a faster booking experience</span>
                </h2>
                <button type="button" data-toggle="modal" class="edt_bt" data-target="#editprofile"><i
                        class="fa fa-edit mr-1"></i>Edit</button>

            </div>

            <div class="formdetail_profile">
                <ul class="listprfl">
                    <li>
                        <div class="form_lr_p d-flex align-items-center">
                            <label>Email</label>
                            <h4>{{ $users->email }}</h4>
                        </div>
                    </li>

                    <li>
                        <div class="form_lr_p d-flex align-items-center">
                            <label>NAME</label>
                            @if(isset($users->first_name))
                            <h4>{{ $users->first_name }}</h4>
                            @else
                            <span data-toggle="modal" data-target="#editprofile">+Add</span>
                            @endif
                        </div>
                    </li>

                    <li>
                        <div class="form_lr_p d-flex align-items-center">
                            <label>MOBILE NUMBER</label>
                            @if(isset($users->phone))
                            <h4>{{ $users->phone }}</h4>
                            @else
                            <span data-toggle="modal" data-target="#editprofile">+Add</span>
                            @endif
                        </div>
                    </li>

                    <li>
                        <div class="form_lr_p d-flex align-items-center">
                            <label>BIRTHDAY</label>
                            @if(isset($users->dob))
                            <h4>{{ date('d-m-Y', strtotime($users->dob)) }}</h4>
                            @else
                            <span data-toggle="modal" data-target="#editprofile">+Add</span>
                            @endif
                        </div>
                    </li>

                    <li>
                        <div class="form_lr_p d-flex align-items-center">
                            <label>GENDER</label>
                            @if(isset($users->gender))
                            @php
                                switch($users->gender){
                                    case 0:
                                    break;
                                    case 1:
                                    $gender = "Female";
                                    break;
                                    case 2:
                                    $gender = "Other";
                                    break;
                                }
                            @endphp
                            <h4>{{ $gender }}</h4>
                            @else
                            <span data-toggle="modal" data-target="#editprofile">+Add</span>
                            @endif
                        </div>
                    </li>

                    <li>
                        <div class="form_lr_p d-flex align-items-center">
                            <label>MARITAL STATUS</label>
                            @if(isset($users->marital_status))
                            @php
                            switch($users->marital_status){
                                case 0:
                                $marital_status = "Married";
                                break;
                                case 1:
                                $marital_status = "Single";
                                break;
                            }
                        @endphp
                            <h4>{{ $marital_status }}</h4>
                            @else
                            <span data-toggle="modal" data-target="#editprofile">+Add</span>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>


        </div>
    </div>

</section>
<!-- The Modal -->
<div class="popds">
    <div class="modal fade" id="editprofile">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><img
                        src="{{asset('public/assets/images/close-w.svg') }}" class="imgres" /></button>
                <!-- Modal Header -->
                <div class="modal-header">
                    <!--Login-->
                    <div class="pdbx_pop">
                        <div class="arrowbx d-flex">

                            <h3>Edit Profile</h3>
                        </div>
                        <form action="" method="POST" id="profile-form">
                            <input type="hidden" value="{{ $users->id }}" name="userId" />
                            <div class="d-flex flx_hv">
                                <div class="email_box">
                                    <label>Full Name</label>
                                    <div class="position-relative">
                                        <input type="text" placeholder="Enter Full Name" required
                                            value="{{ $users->first_name }}" name="name" class="login_input" />
                                    </div>
                                </div>
                                <div class="twoflex d-flex justify-content-between">
                                    <div class="email_box">
                                        <label>Mobile Number</label>
                                        <div class="position-relative">
                                            <input type="number" min="0" value="{{ $users->phone }}" required
                                                placeholder="Enter Mobile Number" name="phone" class="login_input" />
                                        </div>
                                    </div>
                                    <div class="email_box">
                                        <label>Birthday</label>
                                        <div class="position-relative">

                                            <i class="fa fa-calendar iconedt"></i>
                                            <input autocomplete="off" type="text" name="dob"
                                                value="{{ date('m/d/Y', strtotime($users->dob)) }}" required
                                                placeholder="DD/MM/YYYY" class="login_input">

                                        </div>
                                    </div>
                                </div>
                                <div class="twoflex d-flex justify-content-between">
                                    <div class="email_box">
                                        <label>Gender</label>
                                        <div class="position-relative">
                                            <select class="login_input" name="gender" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="0" {{ $users->gender == 0 ? 'selected' : '' }}>Male</option>
                                                <option value="1" {{ $users->gender == 1 ? 'selected' : '' }}>Female</option>
                                                <option value="2" {{ $users->gender == 2 ? 'selected' : '' }}>Other</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="email_box">
                                        @php
                                            // dd($users->marital_status);
                                        @endphp
                                        <label>Marital Status</label>
                                        <div class="position-relative">
                                            <select class="login_input" name="marital_status" required>
                                                <option value="" disabled selected>Select Marital Status</option>
                                                <option value="0" {{ $users->marital_status == 0 ? 'selected' : '' }}>Married</option>
                                                <option value="1" {{ $users->marital_status == 1 ? 'selected' : '' }}>Single</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn_poplan">
                                    <button class="btnnxt saveProfile" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{asset('public/assets/js/jquery-3.6.0.min.js')}}"></script>
@section('scripts')
<script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        const imageVal = e.target.result;
                        $.ajax({
                                url   : '{{url('dashboard/profile/update/image')}}',
                                type:"POST",
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data:{
                                    imageVal:imageVal
                                },
                                dataType:'json',
                            beforeSend: function(msg) {
                                $('.saveProfile').html(
                                    '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
                                );
                                $('.saveProfile').prop("disabled", true);
                            },
                            success:function(response){
                                console.log(response);
                                if(response.status == 200) {
                                    // toastr["success"]("Success!", response.message);
                                    // setTimeout(function(){
                                    // window.location.reload();
                                    // }, 5000);
                                }else{
                                    // $('.saveProfile').prop("disabled", false);
                                    // toastr["error"]("Error!", response.message);
                                }
                                // console.log(response);
                                // $('.loading-div').css('display','none');
                            },
                            error: function(response) {
                                // $('.saveProfile').prop("disabled", false);
                                // $('.saveProfile').html(
                                //     'Save'
                                // );
                                // $('#booking-details').prop("disabled", true);
                            }
                        });

                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });


            $(function() {
                $('input[name="dob"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1901,
                    // format: 'd/m/y',
                    maxYear: parseInt(moment().format('YYYY'),10)
                }, function(start, end, label) {
                    var years = moment().diff(start, 'years');
                    // alert("You are " + years + " years old!");
                });
            });


    $(document).ready(function() {
    $("#profile-form").on('submit',function(event){
        event.preventDefault();
        var strData = $("#profile-form").serializeArray();
        $.ajax({
            url   : '{{url('dashboard/profile/update')}}',
            type:"POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:strData,
            dataType:'json',
        beforeSend: function(msg) {
            $('.saveProfile').html(
                '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
            );
            $('.saveProfile').prop("disabled", true);
        },
        success:function(response){
            if(response.status == 200) {
                toastr["success"]("Success!", response.message);
                setTimeout(function(){
                window.location.reload();
                }, 5000);
            }else{
                $('.saveProfile').prop("disabled", false);
                toastr["error"]("Error!", response.message);
            }
            console.log(response);
            $('.loading-div').css('display','none');
        },
        error: function(response) {
            $('.saveProfile').prop("disabled", false);
            $('.saveProfile').html(
                'Save'
            );
            $('#booking-details').prop("disabled", true);
        }
       });
    });
});
</script>
@endsection
