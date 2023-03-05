@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->

<!-- page specific style code here-->
@endsection
@section('pageContent')

<style>
.tab_nav .nav-tabs .nav-link{color:#000;}
.tab_nav .nav-tabs .nav-item.show .nav-link, .tab_nav .nav-tabs .nav-link.active {
    color: #000;
    background-color: #ffba03;
    border-color: #ffba03 #ffba03 #ffba03;
}
    </style>

<div class="container lds_visa">
    <div class="tab_nav">
        <!-- Nav tabs -->
        @include('includes.nav')

        <!-- Tab panes -->
    </div>
</div>
<section class="frmbg visabg d-flex">
    <div class="imgvs">
        <span><img src="{{asset('public/assets/images/visais.png')}}" class="img-res"></span>
    </div>
    <div class="formbox_visa">
        <div class="visahead">
            <h1>Get Visa Assistance Now</h1>
            <p>We're bringing you a new level of comfort.</p>
        </div>
        <form id="visa-enquiry" action="{{url('visa_enquiry')}}" method="Post" enctype="multipart/form-data">
          
            @csrf
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="newvisa">
                <div class="twobox">
                    <div class="boxvisa wi50">
                        <i class="fa fa-user iconal_visa"></i>
                        <input type="text" class="visainp" id="first_name" name="first_name" placeholder="First Name " required>
                    </div>
                    <div class="boxvisa wi50">
                        <i class="fa fa-user iconal_visa"></i>
                        <input type="text" class="visainp" id="last_name" name="last_name" placeholder="Last Name " required>
                    </div>
                </div>
                <div class="boxvisa ">
                    <i class="fa fa-phone iconal_visa"></i>
                    <input type="text" class="visainp" required id="phone_no" name="phone_no" placeholder="Mobile No ">
                </div>
                <!-- <div class="twobox">
                     <div class="boxvisa wi50">
                         <i class="fa fa-calendar iconal_visa"></i>
                         <input type="text" name="birthday" class="visainp" />
                     </div>
                     </div> -->
                <div class="boxvisa">
                    <i class="fa fa-envelope iconal_visa"></i>
                    <input type="email" class="visainp" required id="email_id" name="email_id" placeholder="Email ">
                </div>
                <div class="boxvisa ">
                    <i class="fa fa-flag iconal_visa"></i>
                    <select class="visainp txtind" id="nationality" required name="nationality">
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
                        <option value="Korea (Democratic People's Republic Of)">Korea (Democratic People's Republic Of)</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
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
                        <option value="St. Vincent &amp; the Grenadines">St. Vincent &amp; the Grenadines</option>
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
                        <option value="Turcs &amp; Caicos Islands">Turcs &amp; Caicos Islands</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="U.S. Minor Outlaying Islands">U.S. Minor Outlaying Islands</option>
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
                        <option value="Wallis &amp; Futuna Islands">Wallis &amp; Futuna Islands</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Yugoslavia">Yugoslavia</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
                <!-- <div class="twobox">
                     <div class="boxvisa wi50">
                         <i class="fa fa-globe iconal_visa"></i>
                         <select class="visainp" id="visa_type" name="visa_type">
                         <option>Passport issued in</option>
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
                         <option value="Korea (Democratic People's Republic Of)">Korea (Democratic People's Republic Of)</option>
                         <option value="Kuwait">Kuwait</option>
                         <option value="Kyrgyzstan">Kyrgyzstan</option>
                         <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
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
                         <option value="Nigeria" >Nigeria</option>
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
                         <option value="St. Vincent &amp; the Grenadines">St. Vincent &amp; the Grenadines</option>
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
                         <option value="Turcs &amp; Caicos Islands">Turcs &amp; Caicos Islands</option>
                         <option value="Turkey">Turkey</option>
                         <option value="Turkmenistan">Turkmenistan</option>
                         <option value="Tuvalu">Tuvalu</option>
                         <option value="U.S. Minor Outlaying Islands">U.S. Minor Outlaying Islands</option>
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
                         <option value="Wallis &amp; Futuna Islands">Wallis &amp; Futuna Islands</option>
                         <option value="Yemen">Yemen</option>
                         <option value="Yugoslavia">Yugoslavia</option>
                         <option value="Zambia">Zambia</option>
                         <option value="Zimbabwe">Zimbabwe</option>
                     </select>
                     </div>
                     
                     
                     </div> -->
                <div class="twobox">
                    <div class="boxvisa wi50">
                        <input type="file" class="hideup" placeholder=" " required name="passport">
                        <span class="uptxt_cs"><i class="fa fa-upload mr-2"></i>Upload Passport copy </span>
                    </div>
                    <!-- <div class="boxvisa wi50">
                        <i class="fa fa-calendar iconal_visa"></i>
                        <input type="text" name="birthday1" class="visainp" />
                        </div> -->
                    <div class="boxvisa wi50">
                        <i class="fa fa-cc-visa iconal_visa"></i>
                        <select class="visainp txtind" id="visa_type" name="visa_type" required>
                            <option hidden data-ioshidden value="">Visa Type</option>
                            <option>Bahrain Visa</option>
                            <option>Dubai Visa </option>
                            <option>Saudi Visa </option>
                            <option>Oman Visa</option>
                            <option>Kuwait Visa</option>
                            <option>Turkey Visa </option>
                            <option>Schengen Visa Assistance</option>
                        </select>
                    </div>
                </div>
                <div class="boxvisa msgtop_vic">
                    <i class="fa fa-edit iconal_visa "></i>
                    <textarea class="visainp heightauto" placeholder="Additional Message" required id="message" name="message" cols="2" rows="2"></textarea>
                </div>
                <div class="boxvisa">
                    <button type="submit" class="btn-grad ftbtn_src"><i class="fa fa-paper-plane-o mr-2" aria-hidden="true"></i>Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="container">
    <div class="iconchoise">
        <h3>Why are we Everyone's Choice !</h3>
        <div class="iconbox_vs">
            <div class="icnv">
                <span><img src="{{asset('public/assets/images/Expertic.svg')}}" class="img-res"></span>
                <h6>Expert Advice for different countries</h6>
            </div>
            <div class="icnv">
                <span><img src="{{asset('public/assets/images/ts_spt.svg')}}" class="img-res"></span>
                <h6>24 x 7 <span>availability</span></h6>
            </div>
            <div class="icnv">
                <span><img src="{{asset('public/assets/images/Documentation.svg')}}" class="img-res"></span>
                <h6>Hassle free <span>Documentation</span></h6>
            </div>
            <div class="icnv">
                <span><img src="{{asset('public/assets/images/Status.svg')}}" class="img-res"></span>
                <h6>Status Check <span>facility</span></h6>
            </div>
            <div class="icnv">
                <span><img src="{{asset('public/assets/images/Appointment.svg')}}" class="img-res"></span>
                <h6>Assistance to Fix Appointment with Embassy</h6>
            </div>
        </div>
    </div>
    <div class="trvtxt">
        <p>WOX Travel & Tour visa team is made up of seasoned, specialized and experienced experts in visa processing.</p>
        <p>
            Our process includes profiling, helping you to complete your visa application forms, vetting documents, getting appointment dates, conducting pre-interview session where applicable and making sure you have 99% chances of getting the visa.
        </p>
        <p>
            We do not encourage immigration defaults and kindly note that issuance of visas is at the discretion of the embassy.
        </p>
    </div>
    <div class="typebox">
        <div class="tybox_d">
            <h5><i class="fa fa-globe"></i>&nbsp;Types of VISA</h5>
            <ul class="listtype_v iconaw">
                <li>Tourist / Family VISA</li>
                <li>Business / Conference VISA.</li>
                <li>Transit VISA</li>
                <li>E-VISA</li>
                <li>Student</li>
            </ul>
        </div>
        <div class="tybox_d">
            <h5><i class="fa fa-file"></i>&nbsp;Documents Required</h5>
            <ul class="listtype_v iconaw">
                <li>Original Passport</li>
                <li>Photos</li>
                <li>Application form</li>
                <li>Present employment proof</li>
                <li>Financial background proof</li>
                <li>If Sponsors available –documents</li>
                <li>If no Sponsor –Hotel confirmation...</li>
            </ul>
        </div>
        <div class="tybox_d">
            <h5><i class="fa fa-phone "></i>&nbsp;Get in touch with us</h5>
            <ul class="listtype_v">
                <li class="callic">Call us on&nbsp;<a href="tel:+97317000561">+973 17000561</a></li>
                <li class="mailic">Mail us on&nbsp;<a href="tel:mailto:info@woxtt.com">info@woxtt.com</a></li>
                <li class="wtsic">WhatsApp us on&nbsp;<a target="_blanck" href="#">+973 17000561</a></li>
            </ul>
        </div>
    </div>
    <p class="nttxt">Note: Documents required, Charges, Processing Time may vary depending on the VISA type, Period of Stay, Embassy and Country.</p>
</div>
@endsection
@section('scripts')

@endsection