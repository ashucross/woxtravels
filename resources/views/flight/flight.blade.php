@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->

<!-- page specific style code here-->
@endsection
@section('pageContent')
<section class="search_box  position-relative">
    <div class="tab_nav">
        <!-- Nav tabs -->
        @include('includes.nav')

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane  active" id="Flight">
                <div class="tabsearch ">
                    <div class="tabsb d-flex">
                        <div class="sbt1 leftrds activetb">
                            <input type="radio" id="tab1" name="tab" checked>
                            <label for="tab1">Round Trip</label>
                        </div>
                        <div class="sbt1">
                            <input type="radio" id="tab2" name="tab">
                            <label for="tab2">One Way</label>
                        </div>
                        <div class="sbt1 righttrds">
                            <input type="radio" id="tab3" name="tab">
                            <label for="tab3">Multi-city</label>
                        </div>
                    </div>
                    <div class="tabsearh_input">
                        <article>
                            <form action="{{url('flight-search')}}" method="post" id="flight-round-trip">
                                {{ csrf_field() }}
                                <div class="boxsearching ">
                                    <div class="d-flex justify-content-between">
                                        <div class="search_location d-flex justify-content-between  ">
                                            <div class="Fromwhere position-relative">
                                                <h3 class="search_title">From </h3>
                                                <div class="position-relative">
                                                    <span class="iconint">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input type="text" slug="autocomplete-source" name="sourceName"
                                                        id="sourceName" token="source" autocomplete="off"
                                                        class="airport-search input_src leftri input_hgt"
                                                        placeholder="City or Airport" data-toggle="dropdown" />
                                                    <input type="hidden" name="sourceCode" id="sourceCode" />
                                                    <div class="dropdown-menu drp_plane">
                                                        <div class="plane_list">
                                                            <span>Search</span>
                                                            <ul id="autocomplete-source">
                                                                @if(!empty(getinitalAirpot() ))
                                                                @foreach ( getinitalAirpot() as $airport)
                                                                <li class="airport-select" type="source"
                                                                    code="{{ $airport->airport_code }}"
                                                                    location="{{ $airport->city_name }} ({{ $airport->airport_code }})">
                                                                    <div class="fli_name"><i class="fa fa-plane">
                                                                        </i>{{ $airport->city_name }} ({{
                                                                        $airport->airport_code }})</div>
                                                                    <div class="airport_name">
                                                                        <span>{{ $airport->airport_name
                                                                            }}</span><span>>{{ $airport->country_name
                                                                            }}</span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                            {{-- <span>Top Cities</span>
                                                            <ul>
                                                                <li>
                                                                    <div class="fli_name">
                                                                        <i class="fa fa-plane"></i> Delhi (DEL)
                                                                    </div>
                                                                    <div class="airport_name">
                                                                        <span>Indira Gandhi Airport</span>
                                                                        <span>India</span>
                                                                    </div>
                                                                </li>
                                                            </ul> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="excng_bx">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 36.5 46.8"
                                                        style="enable-background:new 0 0 36.5 46.8;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path class="excng_bx_w"
                                                                d="M25.6,6.7c2.2,1.9,4.4,3.7,6.5,5.5c0.6,0.5,1.2,1,1.8,1.5c0.2,0.2,0.4,0.2,0.6,0c0.5-0.6,1.1-1.3,1.6-1.9c0.3-0.3,0-0.4-0.1-0.6c-1.3-1.1-2.6-2.2-3.9-3.3C29,5.4,26,2.8,23,0.3c-0.1-0.1-0.2-0.3-0.4-0.2c-0.2,0.1-0.1,0.3-0.1,0.5c0,13.9,0,27.7,0,41.6c0,1.3,0,2.6,0,4c0,0.4,0.1,0.5,0.5,0.5c0.7,0,1.4,0,2.1,0c0.4,0,0.6-0.1,0.6-0.6c0-3.6,0-7.2,0-10.8c0-9.3,0-18.6,0-28C25.6,7.1,25.6,7,25.6,6.7z" />

                                                            <path class="excng_bx_w"
                                                                d="M10.8,40c-1.1-0.9-2.2-1.9-3.3-2.8c-1.6-1.4-3.3-2.8-4.9-4.2c-0.3-0.2-0.4-0.2-0.7,0c-0.4,0.5-0.9,1.1-1.3,1.6c-0.4,0.5-0.4,0.5,0.1,1c1.4,1.2,2.8,2.4,4.2,3.6c2.9,2.4,5.8,4.9,8.7,7.3c0.1,0.1,0.2,0.3,0.4,0.2c0.2-0.1,0.1-0.3,0.1-0.5c0-9.5,0-19,0-28.5c0-5.7,0-11.3,0-17c0-0.7,0-0.7-0.7-0.7c-0.6,0-1.3,0-1.9,0c-0.5,0-0.6,0.1-0.6,0.6c0,4.1,0,8.2,0,12.4c0,8.8,0,17.6,0,26.3C10.9,39.6,10.9,39.8,10.8,40z" />

                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="Towhere ">
                                                <h3 class="search_title">To </h3>
                                                <div class="position-relative">
                                                    <span class="iconint">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input type="text" slug="autocomplete-destination"
                                                        autocomplete="off" name="destinationName" id="destinationName"
                                                        token="destination"
                                                        class="airport-search input_src rightri input_hgt"
                                                        placeholder="City or Airport" data-toggle="dropdown" />
                                                    <input type="hidden" name="destinationCode" id="destinationCode" />
                                                    <div class="dropdown-menu drp_plane">
                                                        <div class="plane_list">
                                                            <span>Search</span>
                                                            <ul id="autocomplete-destination">
                                                                @if(!empty(getinitalAirpot() ))
                                                                @foreach ( getinitalAirpot() as $airport)
                                                                <li class="airport-select" type="destination"
                                                                    code="{{ $airport->airport_code }}"
                                                                    location="{{ $airport->city_name }} ({{ $airport->airport_code }})">
                                                                    <div class="fli_name"><i class="fa fa-plane">
                                                                        </i>{{ $airport->city_name }} ({{
                                                                        $airport->airport_code }})</div>
                                                                    <div class="airport_name">
                                                                        <span>{{ $airport->airport_name
                                                                            }}</span><span>>{{ $airport->country_name
                                                                            }}</span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                            {{-- <span>Top Cities</span>
                                                            <ul>
                                                                <li>
                                                                    <div class="fli_name">
                                                                        <i class="fa fa-plane"></i> Delhi (DEL)
                                                                    </div>
                                                                    <div class="airport_name">
                                                                        <span>Indira Gandhi Airport</span>
                                                                        <span>India</span>
                                                                    </div>
                                                                </li>
                                                            </ul> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search_date width50">
                                            <h3 class="search_title">Depart-Return</h3>
                                            <div class="position-relative">
                                                <span class="iconint">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input aut="" type="text" name="ckein"
                                                    placeholder="Check-In - Check-Out"
                                                    class="ckein input_src  input_hgt ">
                                            </div>
                                        </div>
                                        <div class="search_adult width50">
                                            <h3 class="search_title">Travelers</h3>
                                            <div class="position-relative ">
                                                <span class="iconint">
                                                    <i class="fa fa-user-o"></i>
                                                </span>
                                                <input aut type="text" value="1 Adult - Economy"
                                                    class="input_src input_hgt ups" data-toggle="dropdown">

                                                <div class="dropslct">
                                                    <div class="dropdown-menu dropdown-menu-right hiclk1">
                                                        <div class="tg_title">
                                                            <h3>Cabin and passenger selection-</h3>
                                                        </div>
                                                        <div class="cabin_box d-flex justify-content-between">
                                                            <div class="cb1">
                                                                <input type="radio" id="Economy" name="Cabin"
                                                                    value="Economy" checked>
                                                                <label for="Economy">Economy </label>
                                                            </div>
                                                            <div class="cb1">
                                                                <input type="radio" id="Premium economy" name="Cabin"
                                                                    value="Premium economy">
                                                                <label for="Premium economy">Premium economy</label>
                                                            </div>
                                                            <div class="cb1">
                                                                <input type="radio" id="Business " name="Cabin"
                                                                    value="Business ">
                                                                <label for="Business ">Business </label>
                                                            </div>
                                                            <div class="cb1">
                                                                <input type="radio" id="Firstclass " name="Cabin"
                                                                    value="First class">
                                                                <label for="Firstclass ">First class </label>
                                                            </div>
                                                        </div>
                                                        <div class="passenger_box">
                                                            <div class="qty_box">
                                                                <div
                                                                    class=" d-flex justify-content-between align-items-center">
                                                                    <span>Adult: </span>
                                                                    <div id='myform' method='POST' class='quantity'
                                                                        action='#'>
                                                                        <input type='button' value='-'
                                                                            class='qtyminus minus' slug="round"
                                                                            field='quantity' />
                                                                        <input type='text' id="round-qnty-adult"
                                                                            name='qnty_adult' value='1' class='qty' />
                                                                        <input type='button' value='+'
                                                                            class='qtyplus plus' slug="round"
                                                                            field='quantity' />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="qty_box">
                                                                <div
                                                                    class=" d-flex justify-content-between align-items-center">
                                                                    <span>Child: <span class="agetxt">Ages 2 to 9</span>
                                                                    </span>
                                                                    <div id='myform' method='POST' class='quantity'
                                                                        action='#'>
                                                                        <input type='button' value='-'
                                                                            class='qtyminus minus' slug="round"
                                                                            field='quantity' />
                                                                        <input type='text' name='qntyChild'
                                                                            id="round-qnty-child" value='0'
                                                                            class='qty' />
                                                                        <input type='button' value='+'
                                                                            class='qtyplus plus' slug="round"
                                                                            field='quantity' />
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex box_child flex-wrap">
                                                                    <div class="childxd">
                                                                        <select name="child_1_age">
                                                                            <option>Child 1 age</option>
                                                                            @for($i=2;$i<13;$i++) <option
                                                                                value="{{$i}}">{{$i}}</option>
                                                                                @endfor

                                                                        </select>
                                                                    </div>
                                                                    <div class="childxd">
                                                                        <select name="child_2_age">
                                                                            <option>Child 2 age</option>
                                                                            @for($i=2;$i<13;$i++) <option
                                                                                value="{{$i}}">{{$i}}</option>
                                                                                @endfor

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="qty_box">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <span>Infant: <span class="agetxt">Ages 2 -12</span>
                                                                    </span>
                                                                    <div id='myform' method='POST' class='quantity'
                                                                        action='#'>
                                                                        <input type='button' value='-'
                                                                            class='qtyminus minus' slug="round"
                                                                            field='quantity' />
                                                                        <input type='text' name='qntyInfant'
                                                                            id="round-qnty-infant" value='0'
                                                                            class='qty' />
                                                                        <input type='button' value='+'
                                                                            class='qtyplus plus' slug="round"
                                                                            field='quantity' />
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex box_child flex-wrap">
                                                                    <div class="childxd">
                                                                        <select>
                                                                            <option>Infant 1 age</option>
                                                                            <option>Under 1</option>
                                                                            <option>1</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btntv">
                                                            <button type="submit"
                                                                class="btn-grad ftbtn_src">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="searchbtn d-flex">
                                        <span class="blknone">&nbsp;</span>
                                        <button type="submit" class="btn-grad ftbtn_src" id="btn-search-flight">
                                            <i class="fa fa-paper-plane-o mr-2" aria-hidden="true"></i>Search Flights
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </article>
                        <!-- Oneway start-->
                        <article>
                            <form action="{{url('flight-search')}}" method="post" id="flight-oneway-trip" slug="">
                                {{ csrf_field() }}
                                <div class="boxsearching ">
                                    <div class="d-flex justify-content-between">
                                        <div class="search_location d-flex justify-content-between ">
                                            <div class="Fromwhere position-relative">
                                                <h3 class="search_title">From</h3>
                                                <div class="position-relative">
                                                    <span class="iconint">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input type="text" slug="autocomplete-source-oneway"
                                                        name="sourceName" id="source-onewayName" token="source-oneway"
                                                        class="airport-search input_src leftri input_hgt"
                                                        placeholder="City or Airport" data-toggle="dropdown" />
                                                    <input type="hidden" name="sourceCode" id="source-onewayCode" />
                                                    <div class="dropdown-menu drp_plane">
                                                        <div class="plane_list">
                                                            <span>Search</span>
                                                            {{-- <span>Top Cities</span> --}}
                                                            <ul id="autocomplete-source-oneway">
                                                                @if(!empty(getinitalAirpot() ))
                                                                @foreach ( getinitalAirpot() as $airport)
                                                                <li class="airport-select" type="source-oneway"
                                                                    code="{{ $airport->airport_code }}"
                                                                    location="{{ $airport->city_name }} ({{ $airport->airport_code }})">
                                                                    <div class="fli_name"><i class="fa fa-plane">
                                                                        </i>{{ $airport->city_name }} ({{
                                                                        $airport->airport_code }})</div>
                                                                    <div class="airport_name">
                                                                        <span>{{ $airport->airport_name
                                                                            }}</span><span>>{{ $airport->country_name
                                                                            }}</span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                            {{-- <span>Top Cities</span>
                                                            <ul>
                                                                <li>
                                                                    <div class="fli_name">
                                                                        <i class="fa fa-plane"></i> Delhi (DEL)
                                                                    </div>
                                                                    <div class="airport_name">
                                                                        <span>Indira Gandhi Airport</span>
                                                                        <span>India</span>
                                                                    </div>
                                                                </li>
                                                            </ul> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="excng_bx">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 36.5 46.8"
                                                        style="enable-background:new 0 0 36.5 46.8;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path class="excng_bx_w"
                                                                d="M25.6,6.7c2.2,1.9,4.4,3.7,6.5,5.5c0.6,0.5,1.2,1,1.8,1.5c0.2,0.2,0.4,0.2,0.6,0c0.5-0.6,1.1-1.3,1.6-1.9c0.3-0.3,0-0.4-0.1-0.6c-1.3-1.1-2.6-2.2-3.9-3.3C29,5.4,26,2.8,23,0.3c-0.1-0.1-0.2-0.3-0.4-0.2c-0.2,0.1-0.1,0.3-0.1,0.5c0,13.9,0,27.7,0,41.6c0,1.3,0,2.6,0,4c0,0.4,0.1,0.5,0.5,0.5c0.7,0,1.4,0,2.1,0c0.4,0,0.6-0.1,0.6-0.6c0-3.6,0-7.2,0-10.8c0-9.3,0-18.6,0-28C25.6,7.1,25.6,7,25.6,6.7z" />

                                                            <path class="excng_bx_w"
                                                                d="M10.8,40c-1.1-0.9-2.2-1.9-3.3-2.8c-1.6-1.4-3.3-2.8-4.9-4.2c-0.3-0.2-0.4-0.2-0.7,0c-0.4,0.5-0.9,1.1-1.3,1.6c-0.4,0.5-0.4,0.5,0.1,1c1.4,1.2,2.8,2.4,4.2,3.6c2.9,2.4,5.8,4.9,8.7,7.3c0.1,0.1,0.2,0.3,0.4,0.2c0.2-0.1,0.1-0.3,0.1-0.5c0-9.5,0-19,0-28.5c0-5.7,0-11.3,0-17c0-0.7,0-0.7-0.7-0.7c-0.6,0-1.3,0-1.9,0c-0.5,0-0.6,0.1-0.6,0.6c0,4.1,0,8.2,0,12.4c0,8.8,0,17.6,0,26.3C10.9,39.6,10.9,39.8,10.8,40z" />

                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="Towhere ">
                                                <h3 class="search_title">To </h3>
                                                <div class="position-relative">
                                                    <span class="iconint">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input type="text" slug="autocomplete-destination-oneway"
                                                        name="destinationName" id="destination-onewayName"
                                                        token="destination-oneway"
                                                        class="airport-search input_src rightri input_hgt"
                                                        placeholder="City or Airport" data-toggle="dropdown" />
                                                    <input type="hidden" name="destinationCode"
                                                        id="destination-onewayCode" />
                                                    <div class="dropdown-menu drp_plane">
                                                        <div class="plane_list">
                                                            <span>Search</span>
                                                            <ul id="autocomplete-destination-oneway">
                                                                @if(!empty(getinitalAirpot() ))
                                                                @foreach ( getinitalAirpot() as $airport)
                                                                <li class="airport-select" type="destination-oneway"
                                                                    code="{{ $airport->airport_code }}"
                                                                    location="{{ $airport->city_name }} ({{ $airport->airport_code }})">
                                                                    <div class="fli_name"><i class="fa fa-plane">
                                                                        </i>{{ $airport->city_name }} ({{
                                                                        $airport->airport_code }})</div>
                                                                    <div class="airport_name">
                                                                        <span>{{ $airport->airport_name
                                                                            }}</span><span>>{{ $airport->country_name
                                                                            }}</span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search_date width50">
                                            <h3 class="search_title">Depart</h3>
                                            <div class="position-relative">
                                                <span class="iconint">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input aut="" type="text" name="ckein" placeholder=""
                                                    class="daterange1 input_src  input_hgt">
                                            </div>
                                        </div>
                                        <div class="search_adult width50">
                                            <h3 class="search_title">Travelers</h3>
                                            <div class="position-relative ">
                                                <span class="iconint">
                                                    <i class="fa fa-user-o"></i>
                                                </span>
                                                <input aut type="text" value="1 Adult - Economy"
                                                    class="input_src input_hgt ups" data-toggle="dropdown">

                                                <div class="dropslct">
                                                    <div class="dropdown-menu dropdown-menu-right hiclk2">
                                                        <div class="tg_title">
                                                            <h3>Cabin and passenger selection-</h3>
                                                        </div>
                                                        <div class="cabin_box d-flex justify-content-between">
                                                            <div class="cb1">
                                                                <input type="radio" id="Economy" name="Cabin"
                                                                    value="Economy" selected>
                                                                <label for="Economy">Economy </label>
                                                            </div>
                                                            <div class="cb1">
                                                                <input type="radio" id="Premium economy" name="Cabin"
                                                                    value="Premium economy">
                                                                <label for="Premium economy">Premium economy</label>
                                                            </div>
                                                            <div class="cb1">
                                                                <input type="radio" id="Business " name="Cabin"
                                                                    value="Business ">
                                                                <label for="Business ">Business </label>
                                                            </div>
                                                            <div class="cb1">
                                                                <input type="radio" id="Firstclass " name="Cabin"
                                                                    value="First class">
                                                                <label for="Firstclass ">First class </label>
                                                            </div>
                                                        </div>
                                                        <div class="passenger_box">
                                                            <div class="qty_box">
                                                                <div
                                                                    class=" d-flex justify-content-between align-items-center">
                                                                    <span>Adult: </span>
                                                                    <div id='myform' method='POST' class='quantity'
                                                                        action='#'>
                                                                        <input type='button' value='-'
                                                                            class='qtyminus minus' slug="oneway"
                                                                            field='quantity' />
                                                                        <input type='text' id="oneway-qnty-adult"
                                                                            name='qnty_adult' value='1' class='qty' />
                                                                        <input type='button' value='+'
                                                                            class='qtyplus plus' slug="oneway"
                                                                            field='quantity' />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="qty_box">
                                                                <div
                                                                    class=" d-flex justify-content-between align-items-center">
                                                                    <span>Child: <span class="agetxt">Ages 2 to 9</span>
                                                                    </span>
                                                                    <div id='myform' method='POST' class='quantity'
                                                                        action='#'>
                                                                        <input type='button' value='-'
                                                                            class='qtyminus minus' slug="oneway"
                                                                            field='quantity' />
                                                                        <input type='text' name='qntyChild'
                                                                            id="oneway-qnty-child" value='0'
                                                                            class='qty' />
                                                                        <input type='button' value='+'
                                                                            class='qtyplus plus' slug="oneway"
                                                                            field='quantity' />
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex box_child flex-wrap">
                                                                    <div class="childxd">
                                                                        <select name="child_1_age">
                                                                            <option>Child 1 age</option>
                                                                            @for($i=2;$i<13;$i++) <option
                                                                                value="{{$i}}">{{$i}}</option>
                                                                                @endfor

                                                                        </select>
                                                                    </div>
                                                                    <div class="childxd">
                                                                        <select name="child_2_age">
                                                                            <option>Child 2 age</option>
                                                                            @for($i=2;$i<13;$i++) <option
                                                                                value="{{$i}}">{{$i}}</option>
                                                                                @endfor

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="qty_box">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <span>Infant: <span class="agetxt">Ages 2 -12</span>
                                                                    </span>
                                                                    <div id='myform' method='POST' class='quantity'
                                                                        action='#'>
                                                                        <input type='button' value='-'
                                                                            class='qtyminus minus' slug="oneway"
                                                                            field='quantity' />
                                                                        <input type='text' name='qntyInfant'
                                                                            id="oneway-qnty-infant" value='0'
                                                                            class='qty' />
                                                                        <input type='button' value='+'
                                                                            class='qtyplus plus' slug="oneway"
                                                                            field='quantity' />
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex box_child flex-wrap">
                                                                    <div class="childxd">
                                                                        <select>
                                                                            <option>Infant 1 age</option>
                                                                            <option>Under 1</option>
                                                                            <option>1</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btntv">
                                                            <button type="submit"
                                                                class="btn-grad ftbtn_src">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="searchbtn d-flex">
                                        <span class="blknone">&nbsp;</span>
                                        <button type="submit" class="btn-grad ftbtn_src" id="btn-search-oneway-flight">
                                            <i class="fa fa-paper-plane-o mr-2" aria-hidden="true"></i>Search Flights
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </article>
                        <!-- multicity end-->
                        <article>
                            <form action="{{url('flight-search')}}" method="post" id="flight-multicity-trip" slug="">
                                {{ csrf_field() }}
                                <div class="boxsearching ">
                                    <div class="d-flex justify-content-between lcchange">
                                        <div class="search_location d-flex justify-content-between ">
                                            <div class="Fromwhere position-relative">
                                                <h3 class="search_title">From </h3>
                                                <div class="position-relative">
                                                    <span class="iconint">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input type="text" class="input_src leftri input_hgt airport-search"
                                                        name="sourceName" id="source-multicityName"
                                                        token="source-multicity" slug="autocomplete-source-multicity"
                                                        placeholder="City or Airport" data-toggle="dropdown" />
                                                    <input type="hidden" name="sourceCode" id="source-multicityCode" />
                                                    <div class="dropdown-menu drp_plane">
                                                        <div class="plane_list">
                                                            <span>Search</span>
                                                            <ul id="autocomplete-source-multicity">
                                                                @if(!empty(getinitalAirpot() ))
                                                                @foreach ( getinitalAirpot() as $airport)
                                                                <li class="airport-select" type="source-multicity"
                                                                    code="{{ $airport->airport_code }}"
                                                                    location="{{ $airport->city_name }} ({{ $airport->airport_code }})">
                                                                    <div class="fli_name"><i class="fa fa-plane">
                                                                        </i>{{ $airport->city_name }} ({{
                                                                        $airport->airport_code }})</div>
                                                                    <div class="airport_name">
                                                                        <span>{{ $airport->airport_name
                                                                            }}</span><span>>{{ $airport->country_name
                                                                            }}</span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="excng_bx">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 36.5 46.8"
                                                        style="enable-background:new 0 0 36.5 46.8;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <path class="excng_bx_w" d="M25.6,6.7c2.2,1.9,4.4,3.7,6.5,5.5c0.6,0.5,1.2,1,1.8,1.5c0.2,0.2,0.4,0.2,0.6,0c0.5-0.6,1.1-1.3,1.6-1.9



                                                       c0.3-0.3,0-0.4-0.1-0.6c-1.3-1.1-2.6-2.2-3.9-3.3C29,5.4,26,2.8,23,0.3c-0.1-0.1-0.2-0.3-0.4-0.2c-0.2,0.1-0.1,0.3-0.1,0.5



                                                       c0,13.9,0,27.7,0,41.6c0,1.3,0,2.6,0,4c0,0.4,0.1,0.5,0.5,0.5c0.7,0,1.4,0,2.1,0c0.4,0,0.6-0.1,0.6-0.6c0-3.6,0-7.2,0-10.8



                                                       c0-9.3,0-18.6,0-28C25.6,7.1,25.6,7,25.6,6.7z" />
                                                            <path class="excng_bx_w" d="M10.8,40c-1.1-0.9-2.2-1.9-3.3-2.8c-1.6-1.4-3.3-2.8-4.9-4.2c-0.3-0.2-0.4-0.2-0.7,0c-0.4,0.5-0.9,1.1-1.3,1.6



                                                       c-0.4,0.5-0.4,0.5,0.1,1c1.4,1.2,2.8,2.4,4.2,3.6c2.9,2.4,5.8,4.9,8.7,7.3c0.1,0.1,0.2,0.3,0.4,0.2c0.2-0.1,0.1-0.3,0.1-0.5



                                                       c0-9.5,0-19,0-28.5c0-5.7,0-11.3,0-17c0-0.7,0-0.7-0.7-0.7c-0.6,0-1.3,0-1.9,0c-0.5,0-0.6,0.1-0.6,0.6c0,4.1,0,8.2,0,12.4



                                                       c0,8.8,0,17.6,0,26.3C10.9,39.6,10.9,39.8,10.8,40z" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="Towhere ">
                                                <h3 class="search_title">To </h3>
                                                <div class="position-relative">
                                                    <span class="iconint">
                                                        <i class="fa fa-map-marker"></i>
                                                    </span>
                                                    <input type="text"
                                                        class="input_src rightri input_hgt airport-search"
                                                        name="destinationName" id="destination-multicityName"
                                                        token="destination-multicity"
                                                        slug="autocomplete-destination-multicity"
                                                        placeholder="City or Airport" data-toggle="dropdown" />
                                                    <input type="hidden" name="sourceCode" id="source-multicityCode" />
                                                    <div class="dropdown-menu drp_plane">
                                                        <div class="plane_list">
                                                            <span>Search</span>
                                                            <ul id="autocomplete-destination-multicity">
                                                                @if(!empty(getinitalAirpot() ))
                                                                @foreach ( getinitalAirpot() as $airport)
                                                                <li class="airport-select" type="destination-multicity"
                                                                    code="{{ $airport->airport_code }}"
                                                                    location="{{ $airport->city_name }} ({{ $airport->airport_code }})">
                                                                    <div class="fli_name"><i class="fa fa-plane">
                                                                        </i>{{ $airport->city_name }} ({{
                                                                        $airport->airport_code }})</div>
                                                                    <div class="airport_name">
                                                                        <span>{{ $airport->airport_name
                                                                            }}</span><span>>{{ $airport->country_name
                                                                            }}</span>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search_date">
                                            <h3 class="search_title">Depart</h3>
                                            <div class="position-relative">
                                                <span class="iconint">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input aut type="text" name="daterange2" class="input_src  input_hgt">
                                            </div>
                                        </div>
                                        <div class="close_search" style="visibility: hidden;">
                                            <h3 class="search_title blknone">&nbsp;</h3>
                                            <span class="clids">
                                                <img src="{{asset('public/assets/images/close.svg')}}" alt=""
                                                    class="imgres" />
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between lcchange">
                                        <div class="repeater-default">
                                            <div data-repeater-list="city" class="drag">
                                                <div data-repeater-item="">
                                                    <div class="search_location d-flex justify-content-between"
                                                        style="width: 164% !important">
                                                        <div class="Fromwhere position-relative">
                                                            <h3 class="search_title">From </h3>
                                                            <div class="position-relative">
                                                                <span class="iconint">
                                                                    <i class="fa fa-map-marker"></i>
                                                                </span>
                                                                <input type="text"
                                                                    class="input_src leftri input_hgt airport-search multicitySearch"
                                                                    name="sourceName" id="source-multicity0Name"
                                                                    token="source-multicity0"
                                                                    slug="autocomplete-source-multicity0"
                                                                    placeholder="City or Airport"
                                                                    data-toggle="dropdown" />
                                                                <input type="hidden" name="sourceCode"
                                                                    id="source-multicity0Code" />
                                                                <div class="dropdown-menu drp_plane">
                                                                    <div class="plane_list">
                                                                        <span>Search</span>
                                                                        <ul id="autocomplete-source-multicity0"
                                                                            class="dropPlanFlight">
                                                                            @if(!empty(getinitalAirpot() ))
                                                                            @foreach ( getinitalAirpot() as $airport)
                                                                            <li class="airport-select"
                                                                                type="source-multicity0"
                                                                                code="{{ $airport->airport_code }}"
                                                                                location="{{ $airport->city_name }} ({{ $airport->airport_code }})">
                                                                                <div class="fli_name"><i
                                                                                        class="fa fa-plane">
                                                                                    </i>{{ $airport->city_name }} ({{
                                                                                    $airport->airport_code }})</div>
                                                                                <div class="airport_name">
                                                                                    <span>{{ $airport->airport_name
                                                                                        }}</span><span>>{{
                                                                                        $airport->country_name
                                                                                        }}</span>
                                                                                </div>
                                                                            </li>
                                                                            @endforeach
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span class="excng_bx">
                                                                <svg version="1.1" id="Layer_1"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                    y="0px" viewBox="0 0 36.5 46.8"
                                                                    style="enable-background:new 0 0 36.5 46.8;"
                                                                    xml:space="preserve">
                                                                    <g>
                                                                        <path class="excng_bx_w" d="M25.6,6.7c2.2,1.9,4.4,3.7,6.5,5.5c0.6,0.5,1.2,1,1.8,1.5c0.2,0.2,0.4,0.2,0.6,0c0.5-0.6,1.1-1.3,1.6-1.9



                                                       c0.3-0.3,0-0.4-0.1-0.6c-1.3-1.1-2.6-2.2-3.9-3.3C29,5.4,26,2.8,23,0.3c-0.1-0.1-0.2-0.3-0.4-0.2c-0.2,0.1-0.1,0.3-0.1,0.5



                                                       c0,13.9,0,27.7,0,41.6c0,1.3,0,2.6,0,4c0,0.4,0.1,0.5,0.5,0.5c0.7,0,1.4,0,2.1,0c0.4,0,0.6-0.1,0.6-0.6c0-3.6,0-7.2,0-10.8



                                                       c0-9.3,0-18.6,0-28C25.6,7.1,25.6,7,25.6,6.7z" />
                                                                        <path class="excng_bx_w" d="M10.8,40c-1.1-0.9-2.2-1.9-3.3-2.8c-1.6-1.4-3.3-2.8-4.9-4.2c-0.3-0.2-0.4-0.2-0.7,0c-0.4,0.5-0.9,1.1-1.3,1.6



                                                       c-0.4,0.5-0.4,0.5,0.1,1c1.4,1.2,2.8,2.4,4.2,3.6c2.9,2.4,5.8,4.9,8.7,7.3c0.1,0.1,0.2,0.3,0.4,0.2c0.2-0.1,0.1-0.3,0.1-0.5



                                                       c0-9.5,0-19,0-28.5c0-5.7,0-11.3,0-17c0-0.7,0-0.7-0.7-0.7c-0.6,0-1.3,0-1.9,0c-0.5,0-0.6,0.1-0.6,0.6c0,4.1,0,8.2,0,12.4



                                                       c0,8.8,0,17.6,0,26.3C10.9,39.6,10.9,39.8,10.8,40z" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div class="Towhere ">
                                                            <h3 class="search_title">To </h3>
                                                            <div class="position-relative">
                                                                <span class="iconint">
                                                                    <i class="fa fa-map-marker"></i>
                                                                </span>
                                                                <input type="text"
                                                                    class="input_src rightri input_hgt airport-search multicitySearchdestination"
                                                                    name="destinationName"
                                                                    id="destination-multicity0Name"
                                                                    token="destination-multicity0"
                                                                    slug="autocomplete-destination-multicity0"
                                                                    placeholder="City or Airport"
                                                                    data-toggle="dropdown" />
                                                                <input type="hidden" name="sourceCode"
                                                                    id="destination-multicity0Code" />
                                                                <div class="dropdown-menu drp_plane">
                                                                    <div class="plane_list">
                                                                        <span>Search</span>
                                                                        <ul id="autocomplete-destination-multicity0"
                                                                            class="dropPlanFlightdestination">
                                                                            @if(!empty(getinitalAirpot() ))
                                                                            @foreach ( getinitalAirpot() as $airport)
                                                                            <li class="airport-select"
                                                                                type="destination-multicity0"
                                                                                code="{{ $airport->airport_code }}"
                                                                                location="{{ $airport->city_name }} ({{ $airport->airport_code }})">
                                                                                <div class="fli_name"><i
                                                                                        class="fa fa-plane">
                                                                                    </i>{{ $airport->city_name }} ({{
                                                                                    $airport->airport_code }})</div>
                                                                                <div class="airport_name">
                                                                                    <span>{{ $airport->airport_name
                                                                                        }}</span><span>>{{
                                                                                        $airport->country_name
                                                                                        }}</span>
                                                                                </div>
                                                                            </li>
                                                                            @endforeach
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="search_date">
                                                            <h3 class="search_title">Depart</h3>
                                                            <div class="position-relative">
                                                                <span class="iconint">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <input aut type="text" name="daterange2"
                                                                    class="input_src  input_hgt">
                                                            </div>
                                                        </div>
                                                        <div class="close_search " data-repeater-delete="">
                                                            <h3 class="search_title blknone">&nbsp;</h3>
                                                            <span class="clids">
                                                                <img src="{{asset('public/assets/images/close.svg')}}"
                                                                    alt="" class="imgres" />
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="addbtn" data-repeater-create="">
                                                <button type="button" class="anotherflight_btn">
                                                    <i class="fa fa-plus mr-2"></i>Add another flight </button>
                                            </div>
                                            <div class="d-flex serch">
                                                <div class="search_adult Travelers_withcng">
                                                    <h3 class="search_title">Travelers</h3>
                                                    <div class="position-relative ">
                                                        <span class="iconint">
                                                            <i class="fa fa-user-o"></i>
                                                        </span>
                                                        <input aut type="text" value="1 Adult - Economy"
                                                            class="input_src input_hgt ups" data-toggle="dropdown">

                                                        <div class="dropslct">
                                                            <div class="dropdown-menu dropdown-menu-right hiclk1">
                                                                <div class="tg_title">
                                                                    <h3>Cabin and passenger selection-</h3>
                                                                </div>
                                                                <div class="cabin_box d-flex justify-content-between">
                                                                    <div class="cb1">
                                                                        <input type="radio" id="Economy" name="Cabin"
                                                                            value="Economy" checked>
                                                                        <label for="Economy">Economy </label>
                                                                    </div>
                                                                    <div class="cb1">
                                                                        <input type="radio" id="Premium economy"
                                                                            name="Cabin" value="Premium economy">
                                                                        <label for="Premium economy">Premium
                                                                            economy</label>
                                                                    </div>
                                                                    <div class="cb1">
                                                                        <input type="radio" id="Business " name="Cabin"
                                                                            value="Business ">
                                                                        <label for="Business ">Business </label>
                                                                    </div>
                                                                    <div class="cb1">
                                                                        <input type="radio" id="Firstclass "
                                                                            name="Cabin" value="First class">
                                                                        <label for="Firstclass ">First class </label>
                                                                    </div>
                                                                </div>
                                                                <div class="passenger_box">
                                                                    <div class="qty_box">
                                                                        <div
                                                                            class=" d-flex justify-content-between align-items-center">
                                                                            <span>Adult: </span>
                                                                            <div id='myform' method='POST'
                                                                                class='quantity' action='#'>
                                                                                <input type='button' value='-'
                                                                                    class='qtyminus minus' slug="round"
                                                                                    field='quantity' />
                                                                                <input type='text' id="round-qnty-adult"
                                                                                    name='qnty_adult' value='1'
                                                                                    class='qty' />
                                                                                <input type='button' value='+'
                                                                                    class='qtyplus plus' slug="round"
                                                                                    field='quantity' />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qty_box">
                                                                        <div
                                                                            class=" d-flex justify-content-between align-items-center">
                                                                            <span>Child: <span class="agetxt">Ages 2 to
                                                                                    9</span>
                                                                            </span>
                                                                            <div id='myform' method='POST'
                                                                                class='quantity' action='#'>
                                                                                <input type='button' value='-'
                                                                                    class='qtyminus minus' slug="round"
                                                                                    field='quantity' />
                                                                                <input type='text' name='qntyChild'
                                                                                    id="round-qnty-child" value='0'
                                                                                    class='qty' />
                                                                                <input type='button' value='+'
                                                                                    class='qtyplus plus' slug="round"
                                                                                    field='quantity' />
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex box_child flex-wrap">
                                                                            <div class="childxd">
                                                                                <select name="child_1_age">
                                                                                    <option>Child 1 age</option>
                                                                                    @for($i=2;$i<13;$i++) <option
                                                                                        value="{{$i}}">{{$i}}</option>
                                                                                        @endfor

                                                                                </select>
                                                                            </div>
                                                                            <div class="childxd">
                                                                                <select name="child_2_age">
                                                                                    <option>Child 2 age</option>
                                                                                    @for($i=2;$i<13;$i++) <option
                                                                                        value="{{$i}}">{{$i}}</option>
                                                                                        @endfor

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qty_box">
                                                                        <div
                                                                            class="d-flex justify-content-between align-items-center">
                                                                            <span>Infant: <span class="agetxt">Ages 2
                                                                                    -12</span>
                                                                            </span>
                                                                            <div id='myform' method='POST'
                                                                                class='quantity' action='#'>
                                                                                <input type='button' value='-'
                                                                                    class='qtyminus minus' slug="round"
                                                                                    field='quantity' />
                                                                                <input type='text' name='qntyInfant'
                                                                                    id="round-qnty-infant" value='0'
                                                                                    class='qty' />
                                                                                <input type='button' value='+'
                                                                                    class='qtyplus plus' slug="round"
                                                                                    field='quantity' />
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex box_child flex-wrap">
                                                                            <div class="childxd">
                                                                                <select>
                                                                                    <option>Infant 1 age</option>
                                                                                    <option>Under 1</option>
                                                                                    <option>1</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="btntv">
                                                                    <button type="submit"
                                                                        class="btn-grad ftbtn_src">Done</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btnall_way">
                                                    <h3 class="search_title blknone">&nbsp;</h3>
                                                    <button type="submit" class="btn-grad ftbtn_src">
                                                        <i class="fa fa-paper-plane-o mr-2"
                                                            aria-hidden="true"></i>Search
                                                        Flights
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </article>
                    </div>
                </div>
            </div>
            <div class="tab-pane  fade" id="TourPackages">
                <div class="pckbox">
                    <h2>Book Domestic and International Holidays</h2>
                    <div class="packege_src d-flex justify-content-between align-items-center">
                        <input type="text" placeholder="Ex. Kerala, Goa, Bangkok  ..." />
                        <button type="submit" class="btn-grad ftbtn_src">
                            <i class="fa fa-search mr-2"></i>Search </button>
                    </div>
                </div>
            </div>
            <div class="tab-pane  fade" id="Visa">...</div>
            <div class="tab-pane  fade" id="Insurance">...</div>
        </div>
    </div>
</section>
<!-- imagination Area -->
<section id="go_beyond_area" class="section_padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="heading_left_area">
                    <h2>Go beyond your <span>imagination</span>
                    </h2>
                    <h5>Discover your ideal experience with us</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="imagination_boxed">
                    <a href="#">
                        <img src="{{asset('public/assets/images/imagination1.png')}}" alt="img">
                    </a>
                    <h3>
                        <a href="#">7% Discount for all <span>Airlines</span>
                        </a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="imagination_boxed">
                    <a href="#">
                        <img src="{{asset('public/assets/images/imagination2.png')}}" alt="img">
                    </a>
                    <h3>
                        <a href="#!">Travel around <span>the world</span>
                        </a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="imagination_boxed">
                    <a href="#">
                        <img src="{{asset('public/assets/images/imagination3.png')}}" alt="img">
                    </a>
                    <h3>
                        <a href="#">Luxury resorts <span>top deals</span>
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section_padding_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section_heading_center">
                    <h2>FLY With us by</h2>
                </div>
            </div>
        </div>
        <div class="sliderdl cngl_sp">
            <div class="topdeal">
                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo1.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo2.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo3.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo4.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo5.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo6.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo7.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo8.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo9.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo10.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo11.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo12.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo13.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo14.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo15.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo16.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo17.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo18.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo19.jpg')}}" alt="img"></span>
                    </div>
                </div>



                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo20.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo21.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo22.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo23.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo24.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo25.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo26.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo27.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo28.jpg')}}" alt="img"></span>
                    </div>
                </div>


                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo29.jpg')}}" alt="img"></span>
                    </div>
                </div>

                <div>
                    <div class="logoflight">
                        <span><img src="{{asset('public/assets/images/flogo/flogo30.jpg')}}" alt="img"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top destinations -->
<section id="top_destinations" class="section_padding_top">
    <div class="container">
        <!-- Section Heading -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section_heading_center">
                    <h2>Top destinations</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="destinations_content_box img_animation">
                    <img src="{{asset('public/assets/images/big-img.png')}}" alt="img">
                    <div class="destinations_content_inner">
                        <h2>Up to</h2>
                        <div class="destinations_big_offer">
                            <h1>50</h1>
                            <h6>
                                <span>%</span>
                                <span>Off</span>
                            </h6>
                        </div>
                        <h2>Holiday packages</h2>
                        <a href="#" class="btn btn_theme btn_md btn-grad">Book now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="destinations_content_box img_animation">
                            <a href="#">
                                <img src="{{asset('public/assets/images/destination1.png')}}" alt="img">
                            </a>
                            <div class="destinations_content_inner">
                                <h3>
                                    <a href="#">Tokyo </a>
                                </h3>
                            </div>
                        </div>
                        <div class="destinations_content_box img_animation">
                            <a href="#">
                                <img src="{{asset('public/assets/images/destination2.png')}}" alt="img">
                            </a>
                            <div class="destinations_content_inner">
                                <h3>
                                    <a href="#">London</a>
                                </h3>
                            </div>
                        </div>
                        <div class="destinations_content_box img_animation">
                            <a href="#">
                                <img src="{{asset('public/assets/images/destination3.png')}}" alt="img">
                            </a>
                            <div class="destinations_content_inner">
                                <h3>
                                    <a href="#">Rome</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="destinations_content_box img_animation">
                            <a href="#">
                                <img src="{{asset('public/assets/images/destination4.png')}}" alt="img">
                            </a>
                            <div class="destinations_content_inner">
                                <h3>
                                    <a href="#">Amsterdam</a>
                                </h3>
                            </div>
                        </div>
                        <div class="destinations_content_box img_animation">
                            <a href="#">
                                <img src="{{asset('public/assets/images/destination5.png')}}" alt="img">
                            </a>
                            <div class="destinations_content_inner">
                                <h3>
                                    <a href="#">Milan</a>
                                </h3>
                            </div>
                        </div>
                        <div class="destinations_content_box img_animation">
                            <a href="#">
                                <img src="{{asset('public/assets/images/destination6.png')}}" alt="img">
                            </a>
                            <div class="destinations_content_inner">
                                <h3>
                                    <a href="#">Madrid</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="destinations_content_box img_animation">
                            <a href="#">
                                <img src="{{asset('public/assets/images/destination7.png')}}" alt="img">
                            </a>
                            <div class="destinations_content_inner">
                                <h3>
                                    <a href="#">Dubai</a>
                                </h3>
                            </div>
                        </div>
                        <div class="destinations_content_box img_animation">
                            <a href="#">
                                <img src="{{asset('public/assets/images/destination8.png')}}" alt="img">
                            </a>
                            <div class="destinations_content_inner">
                                <h3>
                                    <a href="#">New York </a>
                                </h3>
                            </div>
                        </div>
                        <div class="destinations_content_box">
                            <a href="#" class="btn btn_theme btn_md w-100 dse btn-grad">View all</a>
                        </div>
                    </div>
                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" />
<script>
    $(document).ready(function() {
        $("body #flight-round-trip").validate({
                rules: {
                        sourceName: "required",
                        destinationName: "required",
                        ckein: "required",
                },

        // })").validate({
            rules: {
                sourceName: "required",
                destinationName: "required",
                ckein: "required",
            },

            messages: {
                sourceName: "Please choose from location",
                destinationName: "Please choose to location",
                ckein: "Please choose travel date",
            },
            submitHandler: function(form) {
                /*Ajax Request Header setup*/
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    beforeSend: function(msg) {
                        $('#btn-search-flight').html(
                            '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
                        );
                        $('#btn-search-flight').prop("disabled", true);
                    },
                    success: function(response) {

                        $('#btn-search-flight').prop("disabled", false);
                        $('#btn-search-flight').html(
                            '<i class="fa fa-paper-plane-o mr-2" aria-hidden="true"></i>Seach Flights'
                        );
                        //console.log(response);
                        if (response.status == 200) {
                            window.location = "{{url('flight-search')}}";
                        }else{
                            alert(response.message);
                        }
                    },
                });
            },
        });

        // One way search
        $("body #flight-oneway-trip").validate({
            rules: {
                sourceName: "required",
                destinationName: "required",
                ckein: "required",
            },

            messages: {
                sourceName: "Please choose from location",
                destinationName: "Please choose to location",
                ckein: "Please choose travel date",
            },
            submitHandler: function(form) {
                /*Ajax Request Header setup*/
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    beforeSend: function(msg) {
                        $('#btn-search-oneway-flight').html(
                            '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
                        );
                        $('#btn-search-oneway-flight').prop("disabled", true);
                    },
                    success: function(response) {
                        alert(response);
                        $('#btn-search-oneway-flight').prop("disabled", false);
                        $('#btn-search-oneway-flight').html(
                            '<i class="fa fa-paper-plane-o mr-2" aria-hidden="true"></i>Seach Flights'
                        );
                        //console.log(response);
                        if (response.status == 200) {
                            window.location = "{{url('flight-search')}}";
                        }
                    },
                });
            },
        });

        /**multicity */

        $("body #flight-multicity-trip").validate({
            rules: {
                sourceName: "required",
                destinationName: "required",
                ckein: "required",
            },

            messages: {
                sourceName: "Please choose from location",
                destinationName: "Please choose to location",
                ckein: "Please choose travel date",
            },
            submitHandler: function(form) {
                /*Ajax Request Header setup*/
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    beforeSend: function(msg) {
                        $('#btn-search-oneway-flight').html(
                            '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
                        );
                        $('#btn-search-oneway-flight').prop("disabled", true);
                    },
                    success: function(response) {
                        alert(response);
                        $('#btn-search-oneway-flight').prop("disabled", false);
                        $('#btn-search-oneway-flight').html(
                            '<i class="fa fa-paper-plane-o mr-2" aria-hidden="true"></i>Seach Flights'
                        );
                        //console.log(response);
                        if (response.status == 200) {
                            window.location = "{{url('flight-search')}}";
                        }
                    },
                });
            },
        });
    });
</script>
<script>
    const navBarSearch = $(".airport-search");
    // navBarSearch.on('keypress keyup keypress blur change', function() {
        $(document).on('keyup', ".airport-search", function() {
        // $(document).on('keypress keyup keypress blur change', ".airport-search", function() {
            var search_keyword = $(this).val();
            var slug = $(this).attr('slug');
            // console.log(slug)
        var Type = $(this).attr('token');
        var slug_data = {
            airport: search_keyword,
        };
        // Check if atleast 3 chars are typed
        if (search_keyword.length >= 3) {
            var url = '/airport-list/';
            $.ajax({
                url: url, //'/dealers-search/' + search_keyword,
                type: 'GET',
                dataType: 'json',
                data: slug_data,
                success: function(response) {
                    var dynLI = "";
                    $('#' + slug + ' li').remove();
                    $.each(response.airports, function(index, element) {
                        dynLI += '<li class="airport-select" type="' + Type + '" code="' + element.airport_code + '" location="' + element.airport_city + ' (' + element.airport_code + ')">';
                        dynLI += '<div class="fli_name">';
                        dynLI += '<i class="fa fa-plane"></i>' + element.airport_city + ' (' + element.airport_code + ')';
                        dynLI += '</div>';
                        dynLI += '<div class="airport_name">';
                        dynLI += '<span>' + element.airport_name + '</span>';
                        dynLI += '<span>' + element.country + '</span>';
                        dynLI += '</div>';
                        dynLI += '</li>';
                        $("#" + slug).append(dynLI);
                    });
                    // console.log(slug);

                    $("body .airport-select").on("click", function() {
                        var _Code = $(this).attr("code");
                        var _Location = $(this).attr("location");
                        var _Type = $(this).attr("type");
                        // alert('#' + _Type + 'Name');
                        $('#' + _Type + 'Name').val(_Location);
                        $('#' + _Type + 'Code').val(_Code);

                        $(this).toggleClass('active');
                    });
                },
                error: function(err) {
                    console.log(err);

                }
            });
        }
    });
</script>
<script>
    $("body .airport-select").on("click", function() {
        var _Code = $(this).attr("code");
        var _Location = $(this).attr("location");
        var _Type = $(this).attr("type");
        $('#' + _Type + 'Name').val(_Location);
        $('#' + _Type + 'Code').val(_Code);
    });

    $("body .anotherflight_btn").on("click", function() {
     const res = $(".repeater-default").find(".multicitySearch");
     const length = $(".repeater-default").find(".multicitySearch").length;
     const nextinput =  res.next('input');
     const drp_plane =  $(".repeater-default").find(".dropPlanFlight");
     const closest = drp_plane.find('li');
     $(closest).each(function() {
        $( this ).attr('type', 'source-multicity' + length);
     });
     $(drp_plane).each(function() {
        $( this ).attr('id', 'autocomplete-source-multicity' + length);
     });
     $(nextinput).each(function() {
        $( this ).attr('id', 'source-multicity' + length + 'Code');
     });
     $( res ).each(function() {
        $( this ).attr('id',  'source-multicity' + length + 'Name');
        $( this ).attr('token', 'source-multicity' + length);
        $( this ).attr('slug',  'autocomplete-source-multicity' + length);
     });
    });

    $("body .anotherflight_btn").on("click", function() {
     const res = $(".repeater-default").find(".multicitySearchdestination");
     const length = $(".repeater-default").find(".multicitySearchdestination").length;
     console.log(length);
     const nextinput =  res.next('input');
     const drp_plane =  $(".repeater-default").find(".dropPlanFlightdestination");
     const closest = drp_plane.find('li');
     $(closest).each(function() {
        $( this ).attr('type', 'destination-multicity' + length);
     });
     $(drp_plane).each(function() {
        $( this ).attr('id', 'autocomplete-destination-multicity' + length);
     });
     $(nextinput).each(function() {
        $( this ).attr('id', 'destination-multicity' + length + 'Code');
     });
     $( res ).each(function() {
        $( this ).attr('id',  'destination-multicity' + length + 'Name');
        $( this ).attr('token', 'destination-multicity' + length);
        $( this ).attr('slug',  'autocomplete-destination-multicity' + length);
     });
    });
</script>

<script>
    $(document).ready(function(){
   $(".hiclk1").click(function(event) {
        event.stopPropagation();
    });

    $(".hiclk2").click(function(event) {
        event.stopPropagation();
    });

    $(".hiclk3").click(function(event) {
        event.stopPropagation();
    });
})



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
