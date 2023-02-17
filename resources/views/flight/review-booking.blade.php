@extends('homeLayout')
@section('styles')
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
                    //  dd($flights);
         @endphp
          @php
          $Traveldate=date_create($fly->FS_date);
          $Arivaldate=date_create($fly->FS_arrival);
          $RTraveldate=date_create($fly->FS_returndeparture);
          $RArivaldate=date_create($fly->FS_returnarrival);
          $source = json_Decode($fly->FS_search);
          $sourceName = $source->sourceName;
          $destiName = $source->destiName;
          @endphp
         <div class="listbooking-rv ">
            <ul>
               <li>
                  <div class="dts_heading ">
                     <h1 class="mtprew1">Flight Details</h1>
                     <span> <a href="#"><i class="fa fa-plane"></i>Change Flight</a></span>
                  </div>
                  <div class="flexws">
                     <div class="leftlogo_rv">
                        <div class="d-flex topdrt">
                           <div class="drp_txt">
                              <h4>Departure <span>{{date_format($Traveldate,"M d Y")}}</span></h4>
                              <div class="airlogo_rv">
                                 <span class="logowt">
                                 <img src="{{asset('public/assets/images/AI.gif')}}" class="img-res" alt="AI">
                                 </span>
                                 <span>{{$fly->FS_airlines}}</span>
                              </div>
                           </div>
                           <div class="datetm_rv">
                              <div class="tbrtvr">
                                 <h4>
                                    <span>({{$fly->FS_departLocation}})</span>
                                 </h4>
                                 <span class="blnspan">
                                 <span class="btsr">BAH</span>
                                 </span>
                                 <h4>
                                    <span>({{$fly->FS_arrivalLocation}})</span>
                                 </h4>
                              </div>
                           </div>
                           <div class="stopb">
                              <span>{{$fly->FS_stops}}&nbsp;Stop</span>
                           </div>
                        </div>
                        <div class="righttxt_rv d-flex ">
                           <div class="timebox d-flex">
                              <h4>{{date_format($Traveldate,"H:i : A")}}</h4>
                              <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                              <h4>{{date_format($Arivaldate,"H:i : A")}}</h4>
                           </div>
                           @php
                           $A = $fly->FS_duration;
                           $X = ["PT", "H", "M"];
                           $Y = ["", "h ", "m"];

                           $A_ = $fly->FS_returnduration;
                           $X_ = ["PT", "H", "M"];
                           $Y_ = ["", "h ", "m"];

                           @endphp
                           <div class="tmrv_rt">
                              <h5><span>Total journey duration</span>&nbsp;:&nbsp;{{str_replace($X, $Y, $A)}}</h5>
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
                           <span>{{ $sourceName }} to {{ $destiName }}</span>
                           @php
                            //    dd($fly);
                           @endphp
                           <ul>
                              <li>{{ $flightName->name }}</li>
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
            <h1><img src="{{asset('public/assets/images/loginics.svg')}}" class="img-res">&nbsp;Login-in your Account</h1>
            <div class="ds">
               <a href="#" class="cntds" data-toggle="modal" data-target="#login">Login</a>
            </div>
         </div>
         <form id="flightbooking-form" method="Post">
            <div class="Review_book whitebrd">
               <div class="text_tvs">
                  <h4>Traveler Details&nbsp;<span>
                     (&nbsp;1 - ADULT&nbsp;)
                     </span>
                  </h4>
                  <p>Enter traveler name(s) and date(s) of birth exactly as shown on the passport or other
                     goverment-issued photo ID to be used on this trip.
                  </p>
               </div>
               <div class="row pdrs">
                  <div class="col-sm-4 ">
                     <!-- <div class="inpse">
                        <input class="form-input" type="text" id="adult.0.first_name" name="adult[0][first_name]" placeholder="First Name">

                        </div> -->
                     <div class="inpse wds">
                        <label>Name<span class="erfr">*</span></label>
                        <div class="d-flex">
                           <div class="droptitle slcbs">
                              <select class="sltclick">
                                 <option hidden data-ioshidden value="" id="hideclick">Title</option>
                                 <option>Mr</option>
                                 <option>Ms</option>
                                 <option>Mrs</option>
                              </select>
                           </div>
                           <div class="inpes">
                              <input class="form-input" type="text" placeholder="First Name">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="inpse ">
                        <label class="md_none">&nbsp;</label>
                        <input type="text" class="form-input" placeholder="Middle Name">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="inpse">
                        <label class="md_none">&nbsp;</label>
                        <input type="text" class="form-input" placeholder="Last Name">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="inpse">
                        <label>Date of Birth<span class="erfr">*</span></label>
                        <div class="dttrhee">
                           <div class="sltnox slcbs">
                              <select id="year" name="yyyy" onchange="change_year(this)">
                                 <option hidden data-ioshidden value="">year</option>
                                 <option value="1930">1930</option>
                                 <option value="1931">1931</option>
                                 <option value="1932">1932</option>
                                 <option value="1933">1933</option>
                                 <option value="1934">1934</option>
                                 <option value="1935">1935</option>
                                 <option value="1936">1936</option>
                                 <option value="1937">1937</option>
                                 <option value="1938">1938</option>
                                 <option value="1939">1939</option>
                                 <option value="1940">1940</option>
                                 <option value="1941">1941</option>
                                 <option value="1942">1942</option>
                                 <option value="1943">1943</option>
                                 <option value="1944">1944</option>
                                 <option value="1945">1945</option>
                                 <option value="1946">1946</option>
                                 <option value="1947">1947</option>
                                 <option value="1948">1948</option>
                                 <option value="1949">1949</option>
                                 <option value="1950">1950</option>
                                 <option value="1951">1951</option>
                                 <option value="1952">1952</option>
                                 <option value="1953">1953</option>
                                 <option value="1954">1954</option>
                                 <option value="1955">1955</option>
                                 <option value="1956">1956</option>
                                 <option value="1957">1957</option>
                                 <option value="1958">1958</option>
                                 <option value="1959">1959</option>
                                 <option value="1960">1960</option>
                                 <option value="1961">1961</option>
                                 <option value="1962">1962</option>
                                 <option value="1963">1963</option>
                                 <option value="1964">1964</option>
                                 <option value="1965">1965</option>
                                 <option value="1966">1966</option>
                                 <option value="1967">1967</option>
                                 <option value="1968">1968</option>
                                 <option value="1969">1969</option>
                                 <option value="1970">1970</option>
                                 <option value="1971">1971</option>
                                 <option value="1972">1972</option>
                                 <option value="1973">1973</option>
                                 <option value="1974">1974</option>
                                 <option value="1975">1975</option>
                                 <option value="1976">1976</option>
                                 <option value="1977">1977</option>
                                 <option value="1978">1978</option>
                                 <option value="1979">1979</option>
                                 <option value="1980">1980</option>
                                 <option value="1981">1981</option>
                                 <option value="1982">1982</option>
                                 <option value="1983">1983</option>
                                 <option value="1984">1984</option>
                                 <option value="1985">1985</option>
                                 <option value="1986">1986</option>
                                 <option value="1987">1987</option>
                                 <option value="1988">1988</option>
                                 <option value="1989">1989</option>
                                 <option value="1990">1990</option>
                                 <option value="1991">1991</option>
                                 <option value="1992">1992</option>
                                 <option value="1993">1993</option>
                                 <option value="1994">1994</option>
                                 <option value="1995">1995</option>
                                 <option value="1996">1996</option>
                                 <option value="1997">1997</option>
                                 <option value="1998">1998</option>
                                 <option value="1999">1999</option>
                                 <option value="2000">2000</option>
                                 <option value="2001">2001</option>
                                 <option value="2002">2002</option>
                                 <option value="2003">2003</option>
                                 <option value="2004">2004</option>
                                 <option value="2005">2005</option>
                                 <option value="2006">2006</option>
                                 <option value="2007">2007</option>
                                 <option value="2008">2008</option>
                                 <option value="2009">2009</option>
                                 <option value="2010">2010</option>
                                 <option value="2011">2011</option>
                                 <option value="2012">2012</option>
                                 <option value="2013">2013</option>
                                 <option value="2014">2014</option>
                                 <option value="2015">2015</option>
                                 <option value="2016">2016</option>
                                 <option value="2017">2017</option>
                                 <option value="2018">2018</option>
                                 <option value="2019">2019</option>
                                 <option value="2020">2020</option>
                                 <option value="2021">2021</option>
                                 <option value="2022">2022</option>
                              </select>
                           </div>
                           <div class="sltnox slcbs">
                              <select id="month" name="mm" onchange="change_month(this)">
                                 <option hidden data-ioshidden value="">month</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                              </select>
                           </div>
                           <div class="sltnox slcbs">
                              <select id="day" name="dd">
                                 <option hidden data-ioshidden value="">day</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                                 <option value="13">13</option>
                                 <option value="14">14</option>
                                 <option value="15">15</option>
                                 <option value="16">16</option>
                                 <option value="17">17</option>
                                 <option value="18">18</option>
                                 <option value="19">19</option>
                                 <option value="20">20</option>
                                 <option value="21">21</option>
                                 <option value="22">22</option>
                                 <option value="23">23</option>
                                 <option value="24">24</option>
                                 <option value="25">25</option>
                                 <option value="26">26</option>
                                 <option value="27">27</option>
                                 <option value="28">28</option>
                                 <option value="29">29</option>
                                 <option value="30">30</option>
                                 <option value="31">31</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="inpse">
                        <label class="md_none">&nbsp;</label>
                        <div class="slcbs">
                           <select class="form-input" id="adult.0.gender" name="adult[0][gender]">
                              <option hidden data-ioshidden value="">Gender</option>
                              <option value="MALE">Male</option>
                              <option value="FEMALE">Female</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="inpse ">
                        <label>Nationality<span class="stres">*</span></label>
                        <div class="slcbs">
                           <select class="form-input" id="adult.0.nationality" name="adult[0][nationality]">
                              <option hidden data-ioshidden value="">Nationality</option>
                              <option value="Afghanistan">Afghanistan</option>
                              <option value="Albania">Albania</option>
                              <option value="Algeria">Algeria</option>
                              <option value="American Samoa">American Samoa</option>
                              <option value="Angola">Angola</option>
                              <option value="Anguilla">Anguilla</option>
                              <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                              <option value="Argentina">Argentina</option>
                              <option value="Armenia">Armenia</option>
                              <option value="Aruba">Aruba</option>
                              <option value="Australia">Australia</option>
                              <option value="Austria">Austria</option>
                              <option value="Azerbaijan">Azerbaijan</option>
                              <option value="Bahamas">Bahamas</option>
                              <option value="Bahrain">Bahrain</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Barbados">Barbados</option>
                              <option value="Belarus (Belorussia)">Belarus (Belorussia)</option>
                              <option value="Belgium">Belgium</option>
                              <option value="Belize">Belize</option>
                              <option value="Benin">Benin</option>
                              <option value="Bermuda">Bermuda</option>
                              <option value="Bhutan">Bhutan</option>
                              <option value="Bolivia">Bolivia</option>
                              <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                              <option value="Botswana">Botswana</option>
                              <option value="Brazil">Brazil</option>
                              <option value="British Virgin Islands">British Virgin Islands</option>
                              <option value="Brunei Darussalam">Brunei Darussalam</option>
                              <option value="Bulgaria">Bulgaria</option>
                              <option value="Burkina Faso">Burkina Faso</option>
                              <option value="Burundi">Burundi</option>
                              <option value="Cambodia">Cambodia</option>
                              <option value="Cameroon">Cameroon</option>
                              <option value="Canada">Canada</option>
                              <option value="Cape Verde">Cape Verde</option>
                              <option value="Cayman Islands">Cayman Islands</option>
                              <option value="Central African Republic">Central African Republic</option>
                              <option value="Chad">Chad</option>
                              <option value="Chile">Chile</option>
                              <option value="China">China</option>
                              <option value="Christmas Islands">Christmas Islands</option>
                              <option value="Cocos (Keeling) Island">Cocos (Keeling) Island</option>
                              <option value="Colombia">Colombia</option>
                              <option value="Comoros">Comoros</option>
                              <option value="Congo">Congo</option>
                              <option value="Congo (Rep. Dem.)">Congo (Rep. Dem.)</option>
                              <option value="Cook Islands">Cook Islands</option>
                              <option value="Costa Rica">Costa Rica</option>
                              <option value="Croatia">Croatia</option>
                              <option value="Cuba">Cuba</option>
                              <option value="Cyprus">Cyprus</option>
                              <option value="Czech Republic">Czech Republic</option>
                              <option value="Denmark">Denmark</option>
                              <option value="Djibouti">Djibouti</option>
                              <option value="Dominican Republic">Dominican Republic</option>
                              <option value="Dominicana">Dominicana</option>
                              <option value="Ecuador">Ecuador</option>
                              <option value="Egypt">Egypt</option>
                              <option value="El Salvador">El Salvador</option>
                              <option value="Equatorial Guinea">Equatorial Guinea</option>
                              <option value="Eritrea">Eritrea</option>
                              <option value="Estonia">Estonia</option>
                              <option value="Ethiopia">Ethiopia</option>
                              <option value="Falkland Islands">Falkland Islands</option>
                              <option value="Faroe Islands">Faroe Islands</option>
                              <option value="Fiji Islands">Fiji Islands</option>
                              <option value="Finland">Finland</option>
                              <option value="France">France</option>
                              <option value="French Guiana">French Guiana</option>
                              <option value="French Polynesia">French Polynesia</option>
                              <option value="Gabon">Gabon</option>
                              <option value="Gambia">Gambia</option>
                              <option value="Georgia">Georgia</option>
                              <option value="Germany">Germany</option>
                              <option value="Ghana">Ghana</option>
                              <option value="Gibralter">Gibralter</option>
                              <option value="Greece">Greece</option>
                              <option value="Greenland">Greenland</option>
                              <option value="Grenada">Grenada</option>
                              <option value="Guadeloupe">Guadeloupe</option>
                              <option value="Guam">Guam</option>
                              <option value="Guatemala">Guatemala</option>
                              <option value="Guinea">Guinea</option>
                              <option value="Guinea-Bissau">Guinea-Bissau</option>
                              <option value="Guyana">Guyana</option>
                              <option value="Haiti">Haiti</option>
                              <option value="Honduras">Honduras</option>
                              <option value="Hong Kong">Hong Kong</option>
                              <option value="Hungary">Hungary</option>
                              <option value="Iceland">Iceland</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Iran">Iran</option>
                              <option value="Iraq">Iraq</option>
                              <option value="Ireland">Ireland</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Ivory Coast">Ivory Coast</option>
                              <option value="Jamaica">Jamaica</option>
                              <option value="Japan">Japan</option>
                              <option value="Jordan">Jordan</option>
                              <option value="Kazakhstan">Kazakhstan</option>
                              <option value="Kenya">Kenya</option>
                              <option value="Kiribati">Kiribati</option>
                              <option value="Korea (Democratic People's Republic Of)">Korea (Democratic
                                 People's Republic Of)
                              </option>
                              <option value="Kuwait">Kuwait</option>
                              <option value="Kyrgyzstan">Kyrgyzstan</option>
                              <option value="Lao People's Democratic Republic">Lao People's Democratic
                                 Republic
                              </option>
                              <option value="Latvia">Latvia</option>
                              <option value="Lebanon">Lebanon</option>
                              <option value="Lesotho">Lesotho</option>
                              <option value="Liberia">Liberia</option>
                              <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                              <option value="Lithuania">Lithuania</option>
                              <option value="Luxembourg">Luxembourg</option>
                              <option value="Macau">Macau</option>
                              <option value="Macedonia">Macedonia</option>
                              <option value="Madagascar">Madagascar</option>
                              <option value="Malawi">Malawi</option>
                              <option value="Malaysia">Malaysia</option>
                              <option value="Maldives">Maldives</option>
                              <option value="Mali">Mali</option>
                              <option value="Malta">Malta</option>
                              <option value="Marshall Islands">Marshall Islands</option>
                              <option value="Martinique">Martinique</option>
                              <option value="Mauritania">Mauritania</option>
                              <option value="Mauritius">Mauritius</option>
                              <option value="Mayotte">Mayotte</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Micronesia">Micronesia</option>
                              <option value="Moldova">Moldova</option>
                              <option value="Monaco">Monaco</option>
                              <option value="Mongolia">Mongolia</option>
                              <option value="Montserrat">Montserrat</option>
                              <option value="Morocco">Morocco</option>
                              <option value="Mozambique">Mozambique</option>
                              <option value="Myanmar">Myanmar</option>
                              <option value="Namibia">Namibia</option>
                              <option value="Nauru">Nauru</option>
                              <option value="Nepal">Nepal</option>
                              <option value="Netherlands">Netherlands</option>
                              <option value="Netherlands Antilles">Netherlands Antilles</option>
                              <option value="New Caledonia">New Caledonia</option>
                              <option value="New Zealand">New Zealand</option>
                              <option value="Nicaragua">Nicaragua</option>
                              <option value="Niger">Niger</option>
                              <option value="Nigeria">Nigeria</option>
                              <option value="Niue">Niue</option>
                              <option value="Norfolk Islands">Norfolk Islands</option>
                              <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                              <option value="Norway">Norway</option>
                              <option value="Oman">Oman</option>
                              <option value="Pakistan">Pakistan</option>
                              <option value="Palau">Palau</option>
                              <option value="Panama">Panama</option>
                              <option value="Papua New Guinea">Papua New Guinea</option>
                              <option value="Paraguay">Paraguay</option>
                              <option value="Peru">Peru</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Poland">Poland</option>
                              <option value="Portugal">Portugal</option>
                              <option value="Puerto Rico">Puerto Rico</option>
                              <option value="Qatar">Qatar</option>
                              <option value="Reunion">Reunion</option>
                              <option value="Romania">Romania</option>
                              <option value="Ruanda">Ruanda</option>
                              <option value="Russian Federation">Russian Federation</option>
                              <option value="Saint Lucia">Saint Lucia</option>
                              <option value="Samoa">Samoa</option>
                              <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                              <option value="Saudi Arabia">Saudi Arabia</option>
                              <option value="Senegal">Senegal</option>
                              <option value="Seychelles">Seychelles</option>
                              <option value="Sierra Leone">Sierra Leone</option>
                              <option value="Singapore">Singapore</option>
                              <option value="Slovakia">Slovakia</option>
                              <option value="Slovenia">Slovenia</option>
                              <option value="Solomon Islands">Solomon Islands</option>
                              <option value="Somalia">Somalia</option>
                              <option value="South Africa">South Africa</option>
                              <option value="South Korea">South Korea</option>
                              <option value="Spain">Spain</option>
                              <option value="Sri Lanka">Sri Lanka</option>
                              <option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
                              <option value="St. Pierre &amp; Miquelon">St. Pierre &amp; Miquelon</option>
                              <option value="St. Vincent &amp; the Grenadines">St. Vincent &amp; the
                                 Grenadines
                              </option>
                              <option value="Sudan">Sudan</option>
                              <option value="Suriname">Suriname</option>
                              <option value="Swaziland">Swaziland</option>
                              <option value="Sweden">Sweden</option>
                              <option value="Switzerland">Switzerland</option>
                              <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                              <option value="Taiwan">Taiwan</option>
                              <option value="Tajikistan">Tajikistan</option>
                              <option value="Tanzania">Tanzania</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Togo">Togo</option>
                              <option value="Tonga">Tonga</option>
                              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                              <option value="Tunisia">Tunisia</option>
                              <option value="Turcs &amp; Caicos Islands">Turcs &amp; Caicos Islands
                              </option>
                              <option value="Turkey">Turkey</option>
                              <option value="Turkmenistan">Turkmenistan</option>
                              <option value="Tuvalu">Tuvalu</option>
                              <option value="U.S. Minor Outlaying Islands">U.S. Minor Outlaying Islands
                              </option>
                              <option value="Uganda">Uganda</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                              <option value="Uruguay">Uruguay</option>
                              <option value="Uzbekistan">Uzbekistan</option>
                              <option value="Vanuatu">Vanuatu</option>
                              <option value="Venezuela">Venezuela</option>
                              <option value="Vietnam">Vietnam</option>
                              <option value="Virgin Islands (US)">Virgin Islands (US)</option>
                              <option value="Wallis &amp; Futuna Islands">Wallis &amp; Futuna Islands
                              </option>
                              <option value="Yemen">Yemen</option>
                              <option value="Yugoslavia">Yugoslavia</option>
                              <option value="Zambia">Zambia</option>
                              <option value="Zimbabwe">Zimbabwe</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row pdrs">
                  <div class="col-sm-12">
                     <div class="txtal">
                        <h5>Passport Details</h5>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="inpse ">
                        <label>Passport Number<span class="stres">*</span></label>
                        <input type="text" class="form-input" placeholder="Passport Number">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="inpse ">
                        <label>Passport issued Date<span class="erfr">*</span></label>
                        <div class="dttrhee">
                           <div class="sltnox slcbs">
                              <select id="year1" name="yyyy" onchange="change_year(this)">
                                 <option hidden data-ioshidden value="">year</option>
                                 <option value="1930">1930</option>
                                 <option value="1931">1931</option>
                                 <option value="1932">1932</option>
                                 <option value="1933">1933</option>
                                 <option value="1934">1934</option>
                                 <option value="1935">1935</option>
                                 <option value="1936">1936</option>
                                 <option value="1937">1937</option>
                                 <option value="1938">1938</option>
                                 <option value="1939">1939</option>
                                 <option value="1940">1940</option>
                                 <option value="1941">1941</option>
                                 <option value="1942">1942</option>
                                 <option value="1943">1943</option>
                                 <option value="1944">1944</option>
                                 <option value="1945">1945</option>
                                 <option value="1946">1946</option>
                                 <option value="1947">1947</option>
                                 <option value="1948">1948</option>
                                 <option value="1949">1949</option>
                                 <option value="1950">1950</option>
                                 <option value="1951">1951</option>
                                 <option value="1952">1952</option>
                                 <option value="1953">1953</option>
                                 <option value="1954">1954</option>
                                 <option value="1955">1955</option>
                                 <option value="1956">1956</option>
                                 <option value="1957">1957</option>
                                 <option value="1958">1958</option>
                                 <option value="1959">1959</option>
                                 <option value="1960">1960</option>
                                 <option value="1961">1961</option>
                                 <option value="1962">1962</option>
                                 <option value="1963">1963</option>
                                 <option value="1964">1964</option>
                                 <option value="1965">1965</option>
                                 <option value="1966">1966</option>
                                 <option value="1967">1967</option>
                                 <option value="1968">1968</option>
                                 <option value="1969">1969</option>
                                 <option value="1970">1970</option>
                                 <option value="1971">1971</option>
                                 <option value="1972">1972</option>
                                 <option value="1973">1973</option>
                                 <option value="1974">1974</option>
                                 <option value="1975">1975</option>
                                 <option value="1976">1976</option>
                                 <option value="1977">1977</option>
                                 <option value="1978">1978</option>
                                 <option value="1979">1979</option>
                                 <option value="1980">1980</option>
                                 <option value="1981">1981</option>
                                 <option value="1982">1982</option>
                                 <option value="1983">1983</option>
                                 <option value="1984">1984</option>
                                 <option value="1985">1985</option>
                                 <option value="1986">1986</option>
                                 <option value="1987">1987</option>
                                 <option value="1988">1988</option>
                                 <option value="1989">1989</option>
                                 <option value="1990">1990</option>
                                 <option value="1991">1991</option>
                                 <option value="1992">1992</option>
                                 <option value="1993">1993</option>
                                 <option value="1994">1994</option>
                                 <option value="1995">1995</option>
                                 <option value="1996">1996</option>
                                 <option value="1997">1997</option>
                                 <option value="1998">1998</option>
                                 <option value="1999">1999</option>
                                 <option value="2000">2000</option>
                                 <option value="2001">2001</option>
                                 <option value="2002">2002</option>
                                 <option value="2003">2003</option>
                                 <option value="2004">2004</option>
                                 <option value="2005">2005</option>
                                 <option value="2006">2006</option>
                                 <option value="2007">2007</option>
                                 <option value="2008">2008</option>
                                 <option value="2009">2009</option>
                                 <option value="2010">2010</option>
                                 <option value="2011">2011</option>
                                 <option value="2012">2012</option>
                                 <option value="2013">2013</option>
                                 <option value="2014">2014</option>
                                 <option value="2015">2015</option>
                                 <option value="2016">2016</option>
                                 <option value="2017">2017</option>
                                 <option value="2018">2018</option>
                                 <option value="2019">2019</option>
                                 <option value="2020">2020</option>
                                 <option value="2021">2021</option>
                                 <option value="2022">2022</option>
                              </select>
                           </div>
                           <div class="sltnox slcbs">
                              <select id="month1" name="mm" onchange="change_month(this)">
                                 <option hidden data-ioshidden value="">month</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                              </select>
                           </div>
                           <div class="sltnox slcbs">
                              <select id="day1" name="dd">
                                 <option hidden data-ioshidden value="">day</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                                 <option value="13">13</option>
                                 <option value="14">14</option>
                                 <option value="15">15</option>
                                 <option value="16">16</option>
                                 <option value="17">17</option>
                                 <option value="18">18</option>
                                 <option value="19">19</option>
                                 <option value="20">20</option>
                                 <option value="21">21</option>
                                 <option value="22">22</option>
                                 <option value="23">23</option>
                                 <option value="24">24</option>
                                 <option value="25">25</option>
                                 <option value="26">26</option>
                                 <option value="27">27</option>
                                 <option value="28">28</option>
                                 <option value="29">29</option>
                                 <option value="30">30</option>
                                 <option value="31">31</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="inpse ">
                        <label>Passport Expiry Date<span class="erfr">*</span></label>
                        <div class="dttrhee">
                           <div class="sltnox slcbs">
                              <select id="year2" name="yyyy" onchange="change_year(this)">
                                 <option value="year" hidden>year</option>
                                 <option value="1930">1930</option>
                                 <option value="1931">1931</option>
                                 <option value="1932">1932</option>
                                 <option value="1933">1933</option>
                                 <option value="1934">1934</option>
                                 <option value="1935">1935</option>
                                 <option value="1936">1936</option>
                                 <option value="1937">1937</option>
                                 <option value="1938">1938</option>
                                 <option value="1939">1939</option>
                                 <option value="1940">1940</option>
                                 <option value="1941">1941</option>
                                 <option value="1942">1942</option>
                                 <option value="1943">1943</option>
                                 <option value="1944">1944</option>
                                 <option value="1945">1945</option>
                                 <option value="1946">1946</option>
                                 <option value="1947">1947</option>
                                 <option value="1948">1948</option>
                                 <option value="1949">1949</option>
                                 <option value="1950">1950</option>
                                 <option value="1951">1951</option>
                                 <option value="1952">1952</option>
                                 <option value="1953">1953</option>
                                 <option value="1954">1954</option>
                                 <option value="1955">1955</option>
                                 <option value="1956">1956</option>
                                 <option value="1957">1957</option>
                                 <option value="1958">1958</option>
                                 <option value="1959">1959</option>
                                 <option value="1960">1960</option>
                                 <option value="1961">1961</option>
                                 <option value="1962">1962</option>
                                 <option value="1963">1963</option>
                                 <option value="1964">1964</option>
                                 <option value="1965">1965</option>
                                 <option value="1966">1966</option>
                                 <option value="1967">1967</option>
                                 <option value="1968">1968</option>
                                 <option value="1969">1969</option>
                                 <option value="1970">1970</option>
                                 <option value="1971">1971</option>
                                 <option value="1972">1972</option>
                                 <option value="1973">1973</option>
                                 <option value="1974">1974</option>
                                 <option value="1975">1975</option>
                                 <option value="1976">1976</option>
                                 <option value="1977">1977</option>
                                 <option value="1978">1978</option>
                                 <option value="1979">1979</option>
                                 <option value="1980">1980</option>
                                 <option value="1981">1981</option>
                                 <option value="1982">1982</option>
                                 <option value="1983">1983</option>
                                 <option value="1984">1984</option>
                                 <option value="1985">1985</option>
                                 <option value="1986">1986</option>
                                 <option value="1987">1987</option>
                                 <option value="1988">1988</option>
                                 <option value="1989">1989</option>
                                 <option value="1990">1990</option>
                                 <option value="1991">1991</option>
                                 <option value="1992">1992</option>
                                 <option value="1993">1993</option>
                                 <option value="1994">1994</option>
                                 <option value="1995">1995</option>
                                 <option value="1996">1996</option>
                                 <option value="1997">1997</option>
                                 <option value="1998">1998</option>
                                 <option value="1999">1999</option>
                                 <option value="2000">2000</option>
                                 <option value="2001">2001</option>
                                 <option value="2002">2002</option>
                                 <option value="2003">2003</option>
                                 <option value="2004">2004</option>
                                 <option value="2005">2005</option>
                                 <option value="2006">2006</option>
                                 <option value="2007">2007</option>
                                 <option value="2008">2008</option>
                                 <option value="2009">2009</option>
                                 <option value="2010">2010</option>
                                 <option value="2011">2011</option>
                                 <option value="2012">2012</option>
                                 <option value="2013">2013</option>
                                 <option value="2014">2014</option>
                                 <option value="2015">2015</option>
                                 <option value="2016">2016</option>
                                 <option value="2017">2017</option>
                                 <option value="2018">2018</option>
                                 <option value="2019">2019</option>
                                 <option value="2020">2020</option>
                                 <option value="2021">2021</option>
                                 <option value="2022">2022</option>
                              </select>
                           </div>
                           <div class="sltnox slcbs">
                              <select id="month1" name="mm" onchange="change_month(this)">
                                 <option value="month" hidden>month</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                              </select>
                           </div>
                           <div class="sltnox slcbs">
                              <select id="day2" name="dd">
                                 <option value="day" hidden>day</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                                 <option value="13">13</option>
                                 <option value="14">14</option>
                                 <option value="15">15</option>
                                 <option value="16">16</option>
                                 <option value="17">17</option>
                                 <option value="18">18</option>
                                 <option value="19">19</option>
                                 <option value="20">20</option>
                                 <option value="21">21</option>
                                 <option value="22">22</option>
                                 <option value="23">23</option>
                                 <option value="24">24</option>
                                 <option value="25">25</option>
                                 <option value="26">26</option>
                                 <option value="27">27</option>
                                 <option value="28">28</option>
                                 <option value="29">29</option>
                                 <option value="30">30</option>
                                 <option value="31">31</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
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
                           <input type="text" id="mobile_code" class="" placeholder="Phone Number" name="name">
                        </div>
                        <script>
                           $(document).ready(function() {

                               $("#mobile_code").intlTelInput({

                                   initialCountry: "in",

                                   separateDialCode: true,

                                   // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"

                               });

                           });

                        </script>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="inpse ">
                        <label>Email</label>
                        <input type="text" id="email" name="email" placeholder="Email">
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
                                    <span><img src="{{asset('public/assets/images/AddMeals.svg')}}" class="img-res"></span>
                                    <h5>Add Meals</h5>
                                 </div>
                              </label>
                           </li>
                           <li>
                              <input type="checkbox" id="myCheckbox2">
                              <label for="myCheckbox2" class="brse">
                                 <div class="mels_ck d-flex">
                                    <span><img src="{{asset('public/assets/images/AddBaggage.svg')}}" class="img-res"></span>
                                    <h5>Add Baggage</h5>
                                 </div>
                              </label>
                           </li>
                           <li>
                              <input type="checkbox" id="myCheckbox3">
                              <label for="myCheckbox3" class="brse">
                                 <div class="mels_ck d-flex">
                                    <span><img src="{{asset('public/assets/images/SeatSelection.svg')}}" class="img-res"></span>
                                    <h5>Seat Selection</h5>
                                 </div>
                              </label>
                           </li>
                           <li>
                              <input type="checkbox" id="myCheckbox4">
                              <label for="myCheckbox4" class="brse">
                                 <div class="mels_ck d-flex">
                                    <span><img src="{{asset('public/assets/images/Baggageout.svg" class="img-res"></span>
                                    <!-- <h5>Baggage out First/Priority Check-in</h5> -->
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
@section('scripts')
@endsection
