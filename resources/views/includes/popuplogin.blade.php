<div class="popds">
    <div class="modal fade" id="poplogin">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <img src="{{asset('public/assets/images/close-w.svg')}}" class="imgres" />
                </button>
                <!-- Modal Header -->
                <div class="modal-header">
                    <!--Page-->
                    <div class="login_view1 ">
                        <div class="imgtop">
                            <img src="{{asset('public/assets/images/travel_log.svg')}}" alt="" class="imgres" />
                        </div>
                        <div class="pdbx_pop">
                            <div class="headingpop text-center">
                                <h2>Get the full experience</h2>
                                <p>Track prices, make trip planning easier and enjoy faster booking.</p>
                            </div>
                            <div class="btnslit">
                                <span id="email_cn">Continue with email</span>
                                <span>
                                    <img src="images/google_g.svg" alt="" class="imgres mr-2" />Google </span>
                                <span>
                                    <img src="images/facebook_i.svg" alt="" class="imgres mr-2" />Facebook </span>
                                <div class="rmb_bx text-center">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1"> Remember me</label>
                                </div>
                            </div>
                            <div class="click_txt">
                                <p>By continuing you agree to WOX Travel & Tour <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--Login-->
                    <div class="login_view2 pdbx_pop" style="display: none;">
                        <div class="arrowbx d-flex">
                            <i class="fa fa-angle-left " id="bck_1"></i>
                            <h3>What's your email address?</h3>
                        </div>
                        <div class="d-flex flx_hv">
                            <div class="email_box">
                                <label>Email</label>
                                <div class="position-relative">
                                    <input type="text" class="login_input" placeholder="Email" />
                                </div>
                            </div>
                            <div class="btn_poplog">
                                <button class="btnnxt" id="nxtotp" type="submit">Next</button>
                            </div>
                        </div>
                    </div>
                    <!--OTP-->
                    <div class="login_view3 pdbx_pop" style="display: none;">
                        <div class="arrowbx d-flex">
                            <i class="fa fa-angle-left" id="bck_2"></i>
                            <h3>Continue with your account</h3>
                        </div>
                        <div class="flx_hv">
                            <P>Use the verification code we sent to <strong>dfg@gmail.com</strong> to log in. </P>
                            <div class="email_box">
                                <label>4-digit verification code</label>
                                <div class="position-relative d-flex psrdotp">
                                    <input type="text" class="login_input" />
                                    <input type="text" class="login_input" />
                                    <input type="text" class="login_input" />
                                    <input type="text" class="login_input" />
                                </div>
                                <button class="sntbtn" type="button">Send a new code</button>
                            </div>
                            <div class="btn_poplog">
                                <button class="btnnxt" type="submit">Verify code</button>
                            </div>
                            <div class="rmb_bx text-center mt-2">
                                <input type="checkbox" id="Remember" name="Remember" value="">
                                <label for="Remember"> Remember me</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>