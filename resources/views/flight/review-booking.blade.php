@extends('homeLayout')
@section('styles')
<style>
    .error {
        color: red;
    }
</style>
<!-- page specific style code here-->
<!-- page specific style code here-->
@endsection
@section('pageContent')
<!-- poplanguage -->
<div class="popds">
    <div class="modal fade" id="poplanguage">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal"><img src="images/close-w.svg"
                        class="imgres" /></button>
                <!-- Modal Header -->
                <div class="modal-header">
                    <!--Login-->
                    <div class="pdbx_pop">
                        <div class="arrowbx d-flex">
                            <h3>Regional settings</h3>
                        </div>
                        <div class="d-flex flx_hv">
                            <div class="email_box">
                                <label><i class="fa fa-language mr-1" aria-hidden="true"></i>Language</label>
                                <div class="position-relative">
                                    <select class="login_input" aria-invalid="false" id="culture-selector-locale"
                                        name="locale">
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
                                <label>
                                    <i class="fa fa-globe mr-1" aria-hidden="true"></i>Country / Region
                                    <p>Selecting the country you’re in will give you local deals and information.
                                    </p>
                                </label>
                                <div class="position-relative">
                                    <select class="login_input" aria-invalid="false" id="culture-selector-market"
                                        name="market">
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BR">Brazil</option>
                                        <option value="VG">British Virgin Islands</option>
                                        <option value="BN">Brunei</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="CD">DR Congo</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="SZ">Eswatini</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="CI">Ivory Coast</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Laos</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macau</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia</option>
                                        <option value="MD">Moldova</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="KP">North Korea</option>
                                        <option value="MK">North Macedonia</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russia</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia &amp; South Sandwich Islands</option>
                                        <option value="KR">South Korea</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SH">St. Helena</option>
                                        <option value="PM">St. Pierre and Miquelon</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syria</option>
                                        <option value="TW">Taiwan</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TG">Togo</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="VI">US Virgin Islands</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VA">Vatican City</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Vietnam</option>
                                        <option value="WF">Wallis and Futuna Islands</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="email_box">
                                <label><i class="fa fa-money mr-1" aria-hidden="true"></i> Currency
                                </label>
                                <div class="position-relative">
                                    <select class="login_input" aria-invalid="false" id="culture-selector-currency"
                                        name="currency">
                                        <optgroup dir="ltr" label="Popular currencies">
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
                                            <option value="ZMW">ZMW - ZK</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="btn_poplan">
                                <button class="btnnxt" type="submit">Next</button>
                                <button class="btnnxt1" data-dismiss="modal" type="submit">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- poplanguage end -->
<section class="rvbg">
    <div class="container">
        <div class="listoption">
            <ul>
                <li class="step_act">
                    <span class="bgcolor_blue">1</span>
                    <h6>Flight &amp; Traveler Details</h6>
                </li>
                <li>
                    <span>2</span>
                    <h6>Enhane your trip</h6>
                </li>
                <li>
                    <span>3</span>
                    <h6>Review &amp; Book</h6>
                </li>
            </ul>
        </div>
    </div>
</section>
<div class="container_pd">
    <div class="detailsmain">
        <div class="leftmain_rv flxfvf">
            <div class="nofti_gr greenbg">
                <p><i class="fa fa-check-circle"></i>&nbsp;Good job! Book now so you don’t miss out on this price</p>
            </div>
            @php
            // dd($flights);
            @endphp
            @php
            $Traveldate=date_create($fly->itineraries[0]->segments[0]->departure->at);
            @endphp
            <div class="listbooking-rv ">
                <ul>
                    <li>
                        <div class="dts_heading ">
                            <h1 class="mtprew1">Flight Details</h1>
                            <span> <a href="{{ url()->previous() }}"><i class="fa fa-plane"></i>Change
                                    Flight</a></span>
                        </div>
                        <div class="flexws">
                            <div class="leftlogo_rv">
                                <div class="d-flex topdrt">
                                    <div class="drp_txt">
                                        <h4>Departure <span>{{date_format($Traveldate,"M d Y")}}</span></h4>
                                        <div class="airlogo_rv">
                                            <span class="logowt">

                                                @php $file =
                                                getFileName($fly->itineraries[0]->segments[0]->carrierCode) @endphp
                                                @if($file)
                                                <img src="{{$file}}" class="img-res"
                                                    alt="{{$fly->itineraries[0]->segments[0]->carrierCode}}">
                                                @else
                                                <img src="{{asset('public/assets/images/AI.gif')}}" class="img-res"
                                                    alt="AI">
                                                @endif
                                            </span>

                                            @php $airPlane = json_encode($dictionaries) @endphp
                                            @php $namePlane = json_decode(json_encode($dictionaries->carriers),true)
                                            @endphp

                                            <span>{{ $fly->itineraries[0]->segments[0]->carrierCode }}</span>
                                        </div>
                                    </div>

                                    <div class="datetm_rv">
                                        <div class="tbrtvr">
                                            @php $city = json_decode(json_encode($dictionaries->locations),true) @endphp
                                            @php $depaturecountryDetails =
                                            getCountryName($city[$fly->itineraries[0]->segments[0]->departure->iataCode]["countryCode"],$fly->itineraries[0]->segments[0]->departure->iataCode);
                                            @endphp

                                            <h4>
                                                <span>({{$depaturecountryDetails->city_code }})</span>
                                            </h4>
                                            <span class="blnspan">
                                                <span class="btsr">BAH</span>
                                            </span>
                                            @php $arrivalcountryDetails =
                                            getCountryName($city[$fly->itineraries[0]->segments[0]->arrival->iataCode]["countryCode"],$fly->itineraries[0]->segments[0]->arrival->iataCode);
                                            @endphp

                                            <h4>
                                                <span>({{ $arrivalcountryDetails->city_code}})</span>
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="stopb">
                                        <span>{{ (count($fly->itineraries[0]->segments) - 1)}}&nbsp;Stop</span>

                                    </div>
                                </div>
                                @php $craft = json_decode(json_encode($dictionaries->aircraft),true) @endphp
                                <div class="righttxt_rv d-flex ">
                                    <div class="timebox d-flex">
                                        <h4>{{ date('H:i A', strtotime($fly->itineraries[0]->segments[0]->departure->at)
                                            )}}</h4>
                                        <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                        <h4>{{ date('H:i A', strtotime($fly->itineraries[0]->segments[0]->arrival->at)
                                            )}}</h4>
                                        </span>

                                    </div>

                                    <div class="tmrv_rt">
                                        <h5><span>Total journey duration</span>&nbsp;:&nbsp;{{
                                            strtolower(str_replace('H','H ',substr($fly->itineraries[0]->duration,
                                            2)))}}</h5>
                                    </div>
                                    <div class="sle">
                                        <h6 data-toggle="collapse" data-target="#ShowFlight1">Details&nbsp;<i
                                                class="fa fa-angle-down"></i></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="colps_rv">
                            <div id="ShowFlight1" class="collapse clpside">
                                <div class="heading_cpl">
                                    <h4><i class="fas fa-suitcase-rolling"></i>Flight and Baggage Details</h4>
                                    <div class="suitcase_rv"><span class="suitcase_img">
                                            <img src="images/AI.gif" class="img-res" alt="AI">
                                        </span><span class="suitcase_txt"><strong>16:45 PM
                                                - 20:15 PM,</strong> 3h 30m</span>
                                    </div>
                                </div>
                                <div class="to_list">
                                    {{-- <span>{{ $sourceName }} to {{ $destiName }}</span> --}}
                                    @php
                                    // dd($fly);
                                    @endphp
                                    <ul>
                                        {{-- <li>{{ $flightName->name }}</li> --}}
                                        <li>Cabin (S) </li>
                                        <li>Operating Airline (AIR INDIA)</li>
                                        <li>Marketing Airline (AIR INDIA)</li>
                                        <li>Embraer 807</li>
                                    </ul>
                                    <div class="btmlist_to">
                                        <span>Estimated bag fees&nbsp;:&nbsp;</span>
                                        <span><strong>Carry on&nbsp;:&nbsp;No fee</strong></span>
                                        <span><strong>Bag Allowance&nbsp;:&nbsp;25-kg</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="dts_heading">
                <h1><img src="{{asset('public/assets/images/loginics.svg')}}" class="img-res">&nbsp;Login-in your
                    Account</h1>
                <div class="ds">
                    <a href="#" class="cntds" data-toggle="modal" data-target="#login">Login</a>
                </div>
            </div>
            <form action="" id="flightbooking-form" method="POST">
                {{ csrf_field() }}
                {{-- <input type="sdaf" name="flight_id" value="{{ $fly->FS_id }}"> --}}
                <div class="Review_book whitebrd">
                    @foreach($ticketDetails as $key => $value)

                    @php $a =0;
                    $name = strtolower($value['name']);@endphp
                    <div class="text_tvs">
                        <h4>Traveler Details&nbsp;<span>
                                (&nbsp;{{ $value['total']}} - {{$value['name']}}&nbsp;)
                            </span></h4>
                        </span>
                        </h4>
                        <p>Enter traveler name(s) and date(s) of birth exactly as shown on the passport or other
                            goverment-issued photo ID to be used on this trip.
                        </p>
                    </div>

                    @include('flight.userDetails')
                    @endforeach
                    <div class="row pdrs">
                        <div class="col-sm-12">
                            <div class="txtal">
                                <h5>
                                    Contact Information
                                    <p>Your ticket and flights information will be sent here.</p>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="inpse ">
                                <label>Phone Number</label>
                                <div class="form-group">
                                    <input type="text" id="contact_number" class="" placeholder="Phone Number"
                                        name="mobile_number" required>
                                </div>
                                <script>
                                    $(document).ready(function() {

                               $("#mobile_code").intlTelInput({

                                   initialCountry: "in",

                                   separateDialCode: true,
                               });

                           });

                                </script>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="inpse ">
                                <label>Email</label>
                                <input type="text" id="email" name="contact_email" placeholder="Email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pdrs">
                        <div class="col-sm-12">
                            <div class="txtal">
                                <h5>Addon Services
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="ckrv">
                                <ul>
                                    <li>
                                        <input type="checkbox" id="myCheckbox1">
                                        <label for="myCheckbox1" class="brse">
                                            <div class="mels_ck d-flex">
                                                <span><img src="{{asset('public/assets/images/AddMeals.svg')}}"
                                                        class="img-res"></span>
                                                <h5>Add Meals</h5>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="myCheckbox2">
                                        <label for="myCheckbox2" class="brse">
                                            <div class="mels_ck d-flex">
                                                <span><img src="{{asset('public/assets/images/AddBaggage.svg')}}"
                                                        class="img-res"></span>
                                                <h5>Add Baggage</h5>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="myCheckbox3">
                                        <label for="myCheckbox3" class="brse">
                                            <div class="mels_ck d-flex">
                                                <span><img src="{{asset('public/assets/images/SeatSelection.svg')}}"
                                                        class="img-res"></span>
                                                <h5>Seat Selection</h5>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="myCheckbox4">
                                        <label for="myCheckbox4" class="brse">
                                            <div class="mels_ck d-flex">
                                                <span><img src="{{asset('public/assets/images/Baggageout.svg') }}"
                                                        class="img-res"></span>
                                                <h5>Fast Track</h5>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row pdrs">
                        <div class="col-sm-6">
                            <div class="ins_box">
                                <div class="instxs d-flex">
                                    <h4><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add the possibility to
                                        cancel your trip
                                    </h4>
                                    <h5><i class="fa fa-dollar"></i>&nbsp;25.03
                                        <span>total price</span>
                                    </h5>
                                </div>
                                <div class="cks_list">
                                    <span><i class="fa fa-check" aria-hidden="true"></i>For any documented reason,
                                        e.g. loss of job, exam, illness of the insured person or their relatives,
                                        cat and dog</span>
                                    <span><i class="fa fa-check" aria-hidden="true"></i><strong>Resignation from
                                            travel in case of contracting COVID-19</strong></span>
                                    <span><i class="fa fa-check" aria-hidden="true"></i><strong>Resignation due to
                                            obligatory quarantine before departure</strong></span>
                                    <span><i class="fa fa-check" aria-hidden="true"></i>90% refund of the flight
                                        ticket costs</span>
                                    <span><i class="fa fa-check" aria-hidden="true"></i><span><strong>Insurance
                                                available only now!</strong></span></span>
                                    <a href="#">Insurance scope and exclusions</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="ins_box">
                                <div class="instxs d-flex">
                                    <h4><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add travel insurance
                                    </h4>
                                    <h5><i class="fa fa-dollar"></i>&nbsp;4.19
                                        <span>per person per day</span>
                                        <span>(total :<i class="fa fa-dollar"></i>16.77)</span>
                                    </h5>
                                </div>
                                <div class="cks_list">
                                    <span><i class="fa fa-check" aria-hidden="true"></i>coverage of medical
                                        costs<strong> (including COVID-19 treatment)</strong> up to $300,000</span>
                                    <span><i class="fa fa-check" aria-hidden="true"></i><strong>Quarantine abroad
                                            :</strong> cover of accommodation and return ticket costs up to $1,200
                                    </span>
                                    <span><i class="fa fa-check" aria-hidden="true"></i>Assistance and medical
                                        transport</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="promoc pdrs">
                        <div class="txtal">
                            <h5>Promo Code</h5>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="inpse ">
                                    <label>Promo Code</label>
                                    <input type="text" id="email" name="email" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="ckeck_trm">
                        <input class="hide-check" type="checkbox" id="acceptTnc">
                        <label for="acceptTnc" class="check-label black-text fs-xs-14">By continuing, you agree to the
                            <a href="#" target="blank">Terms &amp; Conditions</a>.</label>
                    </div>
                    <div class="ctbse">
                        <button type="submit" id="booking-details" class="btn-grad ftbtn_src">Continue to
                            book&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="rightmain_rv ">
            <div class="pritotal_main  mtprew1">
                <div class="bookingtimer whitebrd pdbox_wht">
                    <h6>Book now before tickets run out!</h6>
                    <div id="clockdiv"></div>
                    <script>
                        $(document).ready(function() {

                      // 10 minutes from now

                      var time_in_minutes = 10;

                      var current_time = Date.parse(new Date());

                      var deadline = new Date(current_time + time_in_minutes * 60 * 1000);





                      function time_remaining(endtime) {

                          var t = Date.parse(endtime) - Date.parse(new Date());

                          var seconds = Math.floor((t / 1000) % 60);

                          var minutes = Math.floor((t / 1000 / 60) % 60);

                          var hours = Math.floor((t / (1000 * 60 * 60)) % 24);

                          var days = Math.floor(t / (1000 * 60 * 60 * 24));

                          return {

                              'total': t,

                              'days': days,

                              'hours': hours,

                              'minutes': minutes,

                              'seconds': seconds

                          };

                      }



                      function run_clock(id, endtime) {

                          var clock = document.getElementById(id);



                          function update_clock() {

                              var t = time_remaining(endtime);

                              clock.innerHTML = '' + t.minutes + '<b>m</b>' + '<span>:</span>' + t.seconds + '<b>s</b>';

                              if (t.total <= 0) {

                                  clearInterval(timeinterval);

                              }

                          }

                          update_clock(); // run function once at first to avoid delay

                          var timeinterval = setInterval(update_clock, 1000);

                      }

                      run_clock('clockdiv', deadline);



                  });

                    </script>
                </div>
                <div class="farebox whitebrd ">
                    <h3>Flight Base Fare</h3>
                    <div class="paybx cngfet">
                        <ul class="basefareul">
                            <li><span>Adults x 1</span></li>
                            <li><span>Base Fare</span><span><b><i class="fa fa-dollar"></i>&nbsp;121,250<sup>
                                        </sup></b></span>
                            </li>
                            <li><span>Discount</span><span><b><i class="fa fa-dollar"></i>&nbsp;0<sup> </sup></b></span>
                            </li>
                            <li><span>Total Fare</span><span><b><i class="fa fa-dollar"></i>&nbsp;121,250<sup>
                                        </sup></b></span>
                            </li>
                        </ul>
                    </div>
                    <div class="paybx brdtopd">
                        <ul class="basefareul">
                            <li><span><b>Total</b></span><span><b><i class="fa fa-dollar"></i> 42981.<sup>
                                        </sup></b></span>
                            </li>
                        </ul>
                    </div>
                    <div class="bookbtn_fare">
                        <a href="Enhane-your-trip.html" class="btn-grad ftbtn_src">Continue to Book&nbsp;&nbsp;<i
                                class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="cntfare whitebrd pdbox_wht">
                    <span><i class="fa fa-question"></i></span>
                    <div class="prcntvd">
                        <h5>For customer support</h5>
                        <p>
                            Please call <a href="tel:0000000000">0000000000</a> or
                            <span>24/7 (Monday to Sunday).</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{asset('public/assets/js/jquery-3.6.0.min.js')}}"></script>
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
    $("#flightbooking-form").on('submit',function(event){
       event.preventDefault();
       var strData = $("#flightbooking-form").serializeArray();
       $('.loading-div').css('display','block');
       submitFlight(strData);
   })
   function submitFlight(strData){
        $.ajax({
            url   : '{{url('flight/booking')}}',
        type:"POST",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:strData,
        dataType:'json',
        beforeSend: function(msg) {
                        $('#booking-details').html(
                            '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
                        );
                        $('#booking-details').prop("disabled", true);
                    },
        success:function(response){
            console.log(response.booking_id);
            $('.loading-div').css('display','none');
            localStorage.removeItem("travelers-details");
            if(response.success == true){
                // window.location.href = 'initiate-Payment' + '/' + response.booking_id;
                window.location.href = 'flight/booking-confirmation' + '/' + response.booking_id;
            }

        },
        error: function(response) {
            $('#booking-details').html(
                            'Continue to book&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'
                        );
            $('#booking-details').prop("disabled", true);
            $('.loading-div').css('display','none');
              if (response.status === 400) {
                   alert(response.responseJSON.errors);
              }
                if (response.status === 401){
                  localStorage.setItem('travelers-details',form)
                    $('#login').modal('show');
              }
                    if (response.status === 422) {
                        var errors = $.parseJSON(response.responseText);
                        $.each(errors.errors, function(key, value) {
                             $(".form-input").each(function(){
                                if($(this).attr("id") == key){
                               //  $(this).addClass("errors");
                                  $(this).after('<span class="errors">' + value + '</span>')
                                }
                            });

                        });

                    }
        }

       });
   }
});



function change_year(select)
{
    if( isLeapYear( $(select).val() ) )
	  {
		    Days[1] = 29;

    }
    else {
        Days[1] = 28;
    }
    if( $("#month,#month1,#month2").val() == 2)
		    {
			       var day = $('#day,#day1,#day2');
			       var val = $(day).val();
			       $(day).empty();
			       var option = '<option value="day">day</option>';
			       for (var i=1;i <= Days[1];i++){ //add option days
				         option += '<option value="'+ i + '">' + i + '</option>';
             }
			       $(day).append(option);
			       if( val > Days[ month ] )
			       {
				          val = 1;
			       }
			       $(day).val(val);
		     }
  }

function change_month(select) {
    var day = $('#day,#day1,#day2');
    var val = $(day).val();
    $(day).empty();
    var option = '<option value="day">day</option>';
    var month = parseInt( $(select).val() ) - 1;
    for (var i=1;i <= Days[ month ];i++){ //add option days
        option += '<option value="'+ i + '">' + i + '</option>';
    }
    $(day).append(option);
    if( val > Days[ month ] )
    {
        val = 1;
    }
    $(day).val(val);
}
</script>
@endsection
