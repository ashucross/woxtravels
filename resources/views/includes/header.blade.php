@php
$segments = request()->segments();

@endphp
@if(isset($segments[0]) && $segments[0] == 'agent')
 @else
 <header>
    <section class="logo_menu_box d-flex justify-content-between  clearfix align-items-center">
        <div class="logo d-flex align-items-center">
            <div class="boxthems">
                <button type="button" class="cogbtn">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </button>
                <span>Choice Theme</span>
                <ul id="switcher">
                    <li id="BlackButton"></li>
                    <li id="whiteButton"></li>
                    <li id="darkblue"></li>
                </ul>
            </div>
            <a href="{{url('')}}" class="imgblack">
                <img src="{{asset('public/assets/images/logo-color.svg')}}" alt="" class="imgres " />
            </a>
            <a href="{{url('')}}" class="imagewhite">
                <img src="{{asset('public/assets/images/logo-white.svg')}}" alt="" class="imgres " />
            </a>
            <div class="dropmore">
                <div class="dropdown">
                    <button type="button" class=" dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bars menu_more"></i>
                        <span class="txt_more"> More travel</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('')}}">
                            <span>
                                <i class="fa fa-plane" aria-hidden="true"></i>
                            </span>Flight </a>
                        <a class="dropdown-item" href="{{url('hotel')}}">
                            <span>
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                            </span>Stays </a>
                        <a class="dropdown-item" href="{{url('packages')}}">
                            <span>
                                <i class="fa fa-glass" aria-hidden="true"></i>
                            </span>Attractions </a>
                        <a class="dropdown-item" href="{{url('visa')}}">
                            <span>
                                <i class="fa fa-globe" aria-hidden="true"></i>
                            </span>Visa </a>
                        <a class="dropdown-item" href="{{url('insurance')}}">
                            <span>
                                <i class="fa fa-umbrella" aria-hidden="true"></i>
                            </span>Insurance </a>
                        <a class="dropdown-item" href="{{url('car-rentals')}}">
                            <span>
                                <i class="fa fa-cab" aria-hidden="true"></i>
                            </span>Car Rentals </a>
                    </div>
                </div>
            </div>
        </div>
        <?php $setting = DB::table('regional_settings')->where('ip',Request::ip())->first(); ?>
        <div class="menubox">
            <ul class=" clearfix d-flex">
                <li class="closemenu">
                    <i class="fa fa-close"></i>
                </li>
                <li class="hlp_mdn">
                    <a href="#">Support</a>
                </li>
                <li class="flx_lgs">
                    <a href="#" class="btnds_menu" data-toggle="modal" data-target="#poplanguage">
                        <span class="mobile_lg_hd">Lang : {{$setting->language ?? 'English'}}</span>
                        <!-- <span class="mobile_sml_hd">EN</span> -->
                        <span class="imglgsin">
                            <img src="{{asset('public/assets/images/AMR.png')}}" alt="" class="imgres" />
                        </span>
                        <span class="mobile_lg_hd">{{$setting->country ?? 'US'}}</span>
                        <span class="inr_c"> -
                            <!-- <i class="fa fa-usd mr-1 ml-1"></i> -->{{$setting->currency ?? '$'}}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="My-Trip.html" class="btnds_menu logcng">
                        <i class="fa fa-plane mr-1"></i>My&nbsp;Trip </a>
                </li>
                @auth
                <li>
                    <a href="{{ url('dashboard') }}" class="btnds_menu logcng">
                        <i class="fa fa-user-o mr-1"></i>Dashboard </a>
                </li>
                @else
                <li>
                    <a href="#" class="btnds_menu logcng" data-toggle="modal" data-target="#poplogin">
                        <i class="fa fa-user-o mr-1"></i>Log&nbsp;in </a>
                </li>
                @endauth
                <li>
                    <a href="{{ url('/agent/login') }}" class="btnds_menu logcng" >
                        <i class="fa fa-user-o mr-1"></i> Agent Log&nbsp;in </a>
                </li>
            </ul>

        </div>
    </section>
</header>


<!-- poplogin -->
<div class="popds">
    <div class="modal fade" id="poplogin">
        <div class="modal-dialog">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal"><img
                        src="{{asset('public/assets/images/close-w.svg')}}" class="imgres" /></button>
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
                                <span> <a href="{{ url('auth/google') }}"><img
                                            src="{{asset('public/assets/images/google_g.svg')}}" alt=""
                                            class="imgres mr-2" />Google</a></span>
                                <span><a href="{{ url('auth/facebook') }}"><img
                                            src="{{asset('public/assets/images/facebook_i.svg')}}" alt=""
                                            class="imgres mr-2" />Facebook</a></span>

                                <div class="rmb_bx text-center">
                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                    <label for="vehicle1"> Remember me</label>

                                </div>
                            </div>

                            <div class="click_txt">
                                <p>By continuing you agree to Luftin <a href="#">Terms of Service</a> and <a
                                        href="#">Privacy Policy</a></p>
                            </div>
                        </div>
                    </div>
                    <!--Login-->
                    <div class="login_view2 pdbx_pop" style="display: none;">
                        <div class="arrowbx d-flex">
                            <i class="fa fa-angle-left " id="bck_1"></i>
                            <h3>What's your email address?</h3>
                        </div>

                        <form action="" method="POST" id="requestemailOtp">
                            <div class="d-flex flx_hv">
                                <div class="email_box">
                                    <label>Email</label>
                                    <div class="position-relative">
                                        <input type="text" class="login_input" name="email" required
                                            placeholder="Enter email address" />
                                    </div>
                                </div>

                                <div class="btn_poplog">
                                    <button class="btnnxt requestemailOtpbtn" type="submit">Next</button>
                                    {{-- <button class="btnnxt" id="nxtotp" type="submit">Next</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>


                    <!--OTP-->
                    <div class="login_view3 pdbx_pop" style="display: none;">
                        <div class="arrowbx d-flex">
                            <i class="fa fa-angle-left" id="bck_2"></i>
                            <h3>Continue with your account</h3>
                        </div>


                        <form action="" method="POST" id="verifyOtp">
                            <div class="flx_hv">
                                <P>Use the verification code we sent to <strong class="gmailOtp"></strong> to log in.
                                </P>
                                <div class="email_box">
                                    <label>4-digit verification code</label>
                                    <div class="position-relative d-flex psrdotp">
                                        <input type="number" id="firstA" min="0" max="9" maxlength="1"
                                            onKeyPress="if(this.value.length>0) return false;" class="login_input"
                                            name="opt[]" />
                                        <input type="number" id="firstB" min="0" max="9" maxlength="1"
                                            onKeyPress="if(this.value.length>0) return false;" class="login_input"
                                            name="opt[]" />
                                        <input type="number" id="firstC" min="0" max="9" maxlength="1"
                                            onKeyPress="if(this.value.length>0) return false;" class="login_input"
                                            name="opt[]" />
                                        <input type="number" id="firstD" min="0" max="9" maxlength="1"
                                            onKeyPress="if(this.value.length>0) return false;" class="login_input"
                                            name="opt[]" />
                                    </div>
                                    <button class="sntbtn" id="resendOtp" type="button">Send a new code</button>
                                </div>
                                <input type="hidden" id="getEmail" name="email" value="">
                                <div class="btn_poplog">
                                    <button class="btnnxt verifyOtpbtn" type="submit">Verify code</button>
                                </div>
                                <div class="rmb_bx text-center mt-2">
                                    <input type="checkbox" id="Remember" name="Remember" value="">
                                    <label for="Remember"> Remember me</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

<!-- poplogin end -->

<!-- poplanguage -->
<div class="popds">
    <div class="modal fade" id="poplanguage">
        <div class="modal-dialog">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal"><img
                        src="{{asset('public/assets/images/close-w.svg')}}" class="imgres" /></button>
                <!-- Modal Header -->
                <div class="modal-header">

                    <!--Login-->
                    <div class="pdbx_pop">
                        <div class="arrowbx d-flex">

                            <h3>Regional settings</h3>
                        </div>
                        <form method="post" id='setRegion' action='{{url("setRegion")}}'>
                            @csrf

                            <input type="hidden" value="{{Request::ip();}}" name="ip">
                            <div class="d-flex flx_hv">
                                <div class="email_box">
                                    <label><i class="fa fa-language mr-1" aria-hidden="true"></i>Language</label>
                                    <div class="position-relative">
                                        <select class="login_input" name="language" aria-invalid="false"
                                            id="culture-selector-locale" name="locale">
                                            <optgroup dir="ltr" label="Popular languages">
                                                <option value="en-GB">English (United Kingdom)</option>
                                            </optgroup>
                                            <optgroup dir="ltr" label="All languages">
                                                <option value="id-ID">Bahasa Indonesia (Indonesia)</option>
                                                <option value="ms-MY">Bahasa Melayu (Malaysia)</option>
                                                <option value="cs-CZ">Čeština (Česká&nbsp;Republika)</option>
                                                <option value="da-DK">Dansk (Danmark)</option>
                                                <option value="de-DE">Deutsch (Deutschland)</option>
                                                <option value="en-GB">English (United Kingdom)</option>
                                                <option value="en-US">English (United States)</option>
                                                <option value="es-ES">Español (España)</option>
                                                <option value="es-MX">Español (México)</option>
                                                <option value="tl-PH">Filipino (Pilipinas)</option>
                                                <option value="fr-FR">Français (France)</option>
                                                <option value="it-IT">Italiano (Italia)</option>
                                                <option value="hu-HU">Magyar (Magyarország)</option>
                                                <option value="nl-NL">Nederlands (Nederland)</option>
                                                <option value="nb-NO">Norsk, Bokmål (Norge)</option>
                                                <option value="pl-PL">Polski (Polska)</option>
                                                <option value="pt-BR">Português (Brasil)</option>
                                                <option value="pt-PT">Português (Portugal)</option>
                                                <option value="ro-RO">Română (România)</option>
                                                <option value="fi-FI">Suomi (Suomi)</option>
                                                <option value="sv-SE">Svenska (Sverige)</option>
                                                <option value="vi-VN">Tiếng Việt (Việt Nam)</option>
                                                <option value="tr-TR">Türkçe (Türkiye)</option>
                                                <option value="el-GR">Ελληνικά (Ελλάδα)</option>
                                                <option value="bg-BG">Български (България)</option>
                                                <option value="ru-RU">Русский (Россия)</option>
                                                <option value="uk-UA">Українська (Україна)</option>
                                                <option value="ar-AE">العربية&rlm;</option>
                                                <option value="th-TH">ไทย (ไทย)</option>
                                                <option value="ko-KR">한국어 (대한민국)</option>
                                                <option value="ja-JP">日本語 (日本)</option>
                                                <option value="zh-CN">简体中文</option>
                                                <option value="zh-TW">繁體中文</option>
                                            </optgroup>
                                        </select>

                                    </div>
                                </div>

                                <div class="email_box">
                                    <label><i class="fa fa-globe mr-1" aria-hidden="true"></i>Country / Region
                                        <p>Selecting the country you’re in will give you local deals and information.
                                        </p>
                                    </label>

                                    <div class="position-relative">
                                        <select class="login_input" aria-invalid="false" id="culture-selector-market"
                                            name="country">
                                            <option value="">Select</option>
                                            @if(!empty(getcountries()))
                                            @foreach(getcountries() as $countries)
                                            <option {{!empty($setting->country) && $setting->country ==
                                                $countries->sortname ? 'selected':''}} value='{{$countries->sortname ??
                                                ""}}'>{{$countries->name ?? ""}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="email_box">
                                    <label><i class="fa fa-money mr-1" aria-hidden="true"></i> Currency
                                    </label>

                                    <div class="position-relative">
                                        <select class="login_input" aria-invalid="false" id="culture-selector-currency"
                                            name="currency">
                                            <option value="">Select</option>
                                            @if(!empty(getcurrencies()))
                                            @foreach(getcurrencies() as $data)
                                            <option {{!empty($setting->currency) && $setting->currency == $data->code ?
                                                'selected':''}} value='{{$data->code ?? ""}}'>{{$data->code ?? ""}} -
                                                {{$data->icon ?? ""}}</option>
                                            @endforeach
                                            @endif
                                            <!-- <optgroup dir="ltr" label="Popular currencies">
                                                <option value="EUR">EUR - €</option>
                                                <option value="GBP">GBP - £</option>
                                                <option value="USD">USD - $</option>
                                            </optgroup>
                                            <optgroup dir="ltr" label="Other currencies">
                                                <option value="AED">AED - AED</option>
                                                <option value="AFN">AFN - AFN</option>
                                                <option value="ALL">ALL - Lek</option>
                                                <option value="AMD">AMD - դր.</option>
                                                <option value="ANG">ANG - NAf.</option>
                                                <option value="AOA">AOA - Kz</option>
                                                <option value="ARS">ARS - $</option>
                                                <option value="AUD">AUD - $</option>
                                                <option value="AWG">AWG - Afl.</option>
                                                <option value="AZN">AZN - ₼</option>
                                                <option value="BAM">BAM - КМ</option>
                                                <option value="BBD">BBD - $</option>
                                                <option value="BDT">BDT - BDT</option>
                                                <option value="BGN">BGN - лв.</option>
                                                <option value="BHD">BHD - د.ب.&rlm;</option>
                                                <option value="BIF">BIF - FBu</option>
                                                <option value="BMD">BMD - $</option>
                                                <option value="BND">BND - $</option>
                                                <option value="BOB">BOB - Bs</option>
                                                <option value="BRL">BRL - R$</option>
                                                <option value="BSD">BSD - $</option>
                                                <option value="BTN">BTN - Nu.</option>
                                                <option value="BWP">BWP - P</option>
                                                <option value="BYN">BYN - Br</option>
                                                <option value="BZD">BZD - BZ$</option>
                                                <option value="CAD">CAD - C$</option>
                                                <option value="CDF">CDF - FC</option>
                                                <option value="CHF">CHF - CHF</option>
                                                <option value="CLP">CLP - $</option>
                                                <option value="CNY">CNY - ¥</option>
                                                <option value="COP">COP - $</option>
                                                <option value="CRC">CRC - ₡</option>
                                                <option value="CUC">CUC - CUC</option>
                                                <option value="CUP">CUP - $MN</option>
                                                <option value="CVE">CVE - $</option>
                                                <option value="CZK">CZK - Kč</option>
                                                <option value="DJF">DJF - Fdj</option>
                                                <option value="DKK">DKK - kr.</option>
                                                <option value="DOP">DOP - RD$</option>
                                                <option value="DZD">DZD - د.ج.&rlm;</option>
                                                <option value="EGP">EGP - ج.م.&rlm;</option>
                                                <option value="ERN">ERN - Nfk</option>
                                                <option value="ETB">ETB - Br</option>
                                                <option value="FJD">FJD - $</option>
                                                <option value="GEL">GEL - ₾</option>
                                                <option value="GHS">GHS - GH¢</option>
                                                <option value="GIP">GIP - £</option>
                                                <option value="GMD">GMD - D</option>
                                                <option value="GNF">GNF - FG</option>
                                                <option value="GTQ">GTQ - Q</option>
                                                <option value="GYD">GYD - $</option>
                                                <option value="HKD">HKD - HK$</option>
                                                <option value="HNL">HNL - L.</option>
                                                <option value="HRK">HRK - kn</option>
                                                <option value="HTG">HTG - G</option>
                                                <option value="HUF">HUF - Ft</option>
                                                <option value="IDR">IDR - Rp</option>
                                                <option value="ILS">ILS - ₪</option>
                                                <option value="INR">INR - ₹</option>
                                                <option value="IQD">IQD - د.ع.&rlm;</option>
                                                <option value="IRR">IRR - ريال</option>
                                                <option value="ISK">ISK - kr.</option>
                                                <option value="JMD">JMD - J$</option>
                                                <option value="JOD">JOD - د.ا.&rlm;</option>
                                                <option value="JPY">JPY - ¥</option>
                                                <option value="KES">KES - S</option>
                                                <option value="KGS">KGS - сом</option>
                                                <option value="KHR">KHR - KHR</option>
                                                <option value="KMF">KMF - CF</option>
                                                <option value="KPW">KPW - ₩</option>
                                                <option value="KRW">KRW - ₩</option>
                                                <option value="KWD">KWD - د.ك.&rlm;</option>
                                                <option value="KYD">KYD - $</option>
                                                <option value="KZT">KZT - Т</option>
                                                <option value="LAK">LAK - ₭</option>
                                                <option value="LBP">LBP - ل.ل.&rlm;</option>
                                                <option value="LKR">LKR - Rp</option>
                                                <option value="LRD">LRD - $</option>
                                                <option value="LSL">LSL - M</option>
                                                <option value="LYD">LYD - د.ل.&rlm;</option>
                                                <option value="MAD">MAD - د.م.&rlm;</option>
                                                <option value="MDL">MDL - lei</option>
                                                <option value="MGA">MGA - Ar</option>
                                                <option value="MKD">MKD - ден.</option>
                                                <option value="MMK">MMK - K</option>
                                                <option value="MNT">MNT - ₮</option>
                                                <option value="MOP">MOP - MOP$</option>
                                                <option value="MRO">MRO - UM</option>
                                                <option value="MUR">MUR - Rs</option>
                                                <option value="MVR">MVR - MVR</option>
                                                <option value="MWK">MWK - MK</option>
                                                <option value="MXN">MXN - $</option>
                                                <option value="MYR">MYR - RM</option>
                                                <option value="MZN">MZN - MT</option>
                                                <option value="NAD">NAD - $</option>
                                                <option value="NGN">NGN - ₦</option>
                                                <option value="NIO">NIO - C$</option>
                                                <option value="NOK">NOK - kr</option>
                                                <option value="NPR">NPR - रु</option>
                                                <option value="NZD">NZD - $</option>
                                                <option value="OMR">OMR - ر.ع.&rlm;</option>
                                                <option value="PAB">PAB - B/.</option>
                                                <option value="PEN">PEN - S/.</option>
                                                <option value="PGK">PGK - K</option>
                                                <option value="PHP">PHP - P</option>
                                                <option value="PKR">PKR - Rs</option>
                                                <option value="PLN">PLN - zł</option>
                                                <option value="PYG">PYG - Gs</option>
                                                <option value="QAR">QAR - ر.ق.&rlm;</option>
                                                <option value="RON">RON - lei</option>
                                                <option value="RSD">RSD - Дин.</option>
                                                <option value="RUB">RUB - ₽</option>
                                                <option value="RWF">RWF - RWF</option>
                                                <option value="SAR">SAR - SAR</option>
                                                <option value="SBD">SBD - $</option>
                                                <option value="SCR">SCR - Rs</option>
                                                <option value="SDG">SDG - ج.س.&rlm;</option>
                                                <option value="SEK">SEK - SEK</option>
                                                <option value="SGD">SGD - $</option>
                                                <option value="SHP">SHP - £</option>
                                                <option value="SLL">SLL - Le</option>
                                                <option value="SOS">SOS - S</option>
                                                <option value="SRD">SRD - $</option>
                                                <option value="STD">STD - Db</option>
                                                <option value="SYP">SYP - ل.س.&rlm;</option>
                                                <option value="SZL">SZL - E</option>
                                                <option value="THB">THB - ฿</option>
                                                <option value="TJS">TJS - TJS</option>
                                                <option value="TMT">TMT - m</option>
                                                <option value="TND">TND - د.ت.&rlm;</option>
                                                <option value="TOP">TOP - T$</option>
                                                <option value="TRY">TRY - TL</option>
                                                <option value="TTD">TTD - TT$</option>
                                                <option value="TWD">TWD - NT$</option>
                                                <option value="TZS">TZS - TSh</option>
                                                <option value="UAH">UAH - грн.</option>
                                                <option value="UGX">UGX - USh</option>
                                                <option value="UYU">UYU - $U</option>
                                                <option value="UZS">UZS - сўм</option>
                                                <option value="VND">VND - ₫</option>
                                                <option value="VUV">VUV - VT</option>
                                                <option value="WST">WST - WS$</option>
                                                <option value="XAF">XAF - F</option>
                                                <option value="XCD">XCD - $</option>
                                                <option value="XOF">XOF - F</option>
                                                <option value="XPF">XPF - F</option>
                                                <option value="YER">YER - ر.ي.&rlm;</option>
                                                <option value="ZAR">ZAR - R</option>
                                                <option value="ZMW">ZMW - ZK</option> -->
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="btn_poplan">
                                    <button class="btnnxt" type="submit">Next</button>
                                    <button class="btnnxt1" data-dismiss="modal" type="submit">Cancel</button>
                                </div>
                            </div>
                        </form>


                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- poplanguage end --> @endif
