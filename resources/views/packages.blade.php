@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->
<style>
    [hidden] {
        display: none;
    }

    .visually-hidden {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }

    div.awesomplete {
        display: block;
        position: relative;
        width: 100%;
    }

    div.awesomplete>input {
        display: block;
        padding: 23px 20px;
    }

    div.awesomplete>ul {
        position: absolute;
        left: 0;
        z-index: 1;
        min-width: 100%;
        box-sizing: border-box;
        list-style: none;
        padding: 0;
        border-radius: .3em;
        margin: .2em 0 0;
        background: hsla(0, 0%, 100%, .9);
        background: linear-gradient(to bottom right, white, hsla(0, 0%, 100%, .8));
        border: 1px solid rgba(0, 0, 0, .3);
        box-shadow: .05em .2em .6em rgba(0, 0, 0, .2);
        text-shadow: none;
    }

    div.awesomplete>ul[hidden],
    div.awesomplete>ul:empty {
        display: none;
    }

    @supports (transform: scale(0)) {
        div.awesomplete>ul {
            transition: .3s cubic-bezier(.4, .2, .5, 1.4);
            transform-origin: 1.43em -.43em;
        }

        div.awesomplete>ul[hidden],
        div.awesomplete>ul:empty {
            opacity: 0;
            transform: scale(0);
            display: block;
            transition-timing-function: ease;
        }
    }

    /* Pointer */
    div.awesomplete>ul:before {
        content: "";
        position: absolute;
        top: -.43em;
        left: 1em;
        width: 0;
        height: 0;
        padding: .4em;
        background: white;
        border: inherit;
        border-right: 0;
        border-bottom: 0;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    div.awesomplete>ul>li {
        position: relative;
        padding: .2em .5em;
        cursor: pointer;
    }

    div.awesomplete>ul>li:hover {
        background: hsl(200, 40%, 80%);
        color: black;
    }

    div.awesomplete>ul>li[aria-selected="true"] {
        background: hsl(205, 40%, 40%);
        color: white;
    }

    div.awesomplete mark {
        background: hsl(65, 100%, 50%);
    }

    div.awesomplete li:hover mark {
        background: hsl(68, 100%, 41%);
    }

    div.awesomplete li[aria-selected="true"] mark {
        background: hsl(86, 100%, 21%);
        color: inherit;
    }
</style>
<!-- page specific style code here-->
@endsection
@section('pageContent')
<div class="banner_at position-relative">
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <!-- <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul> -->

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <h4>Find your next stay</h4>
      <img src="{{asset('public/assets/images/parallax-1.jpg')}}" class="img-res" alt="">
    </div>
    <div class="carousel-item">
    <h4>Find your next stay</h4>
      <img src="{{asset('public/assets/images/parallax-2.jpg')}}" class="img-res" alt="">
    </div>
    <div class="carousel-item">
    <h4>Find your next stay</h4>
      <img src="{{asset('public/assets/images/parallax-3.jpg')}}" class="img-res" alt="">
    </div>

<div class="carousel-item ">
        <h4>Find your next stay</h4>
      <img src="{{asset('public/assets/images/parallax-4.jpg')}}" class="img-res" alt="">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

<section class="search_box ">
    <div class="tab_nav">
        <!-- Nav tabs -->
        @include('includes.nav')
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane  active" id="TourPackages">
                <div class="pckbox">
                    <h2>Search Book Domestic and International Holidays</h2>
                    <div class="packege_src d-flex justify-content-between align-items-center">
                        <input type="text" id="myinput" name="location" class="awesomplete form-control" placeholder="Ex. Kerala, Goa, Bangkok  ..." />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>


<section class="topdeal_pk gapbox mt-4 box_dea">
    <div class="allheading text-center topeqal_pd">
        <h2>Popular Tourist Place to Visit in Bahrain</h2>
    </div>
    <div class="sliderdl">
        <div class="topdeal">
            <div>
            <div class="booking_box">
                <a href="#">
                <div class="position-relative imgbook">
                    <img src="{{asset('public/assets/images/F1Bahrain.jpg')}}" alt="" class="imgres" />
                    
                </div>
                <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Bahrain International Circuit (BIC)</h4>
                        
                    </div>
                   
                </div>
                </a>

            </div>
            </div>

           
            <div>
            <div class="booking_box">
            <a href="#">
                <div class="position-relative imgbook">
                    <img src="{{asset('public/assets/images/AlFatehGrandMosque.jpg')}}" alt="" class="imgres" />
                    
                </div>
                <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Al Fateh Grand Mosque</h4>
                    </div>
                   
                </div>
</a>
            </div>
            </div>

            <div>
            <div class="booking_box">
            <a href="#">
                <div class="position-relative imgbook">
                    <img src="{{asset('public/assets/images/Saudicauseway.jpg')}}" alt="" class="imgres" />
                    
                </div>
                <div class="text_booking">
                    <div class="inter_txt">
                        <h4>King Fahad Causeway</h4>
                    </div>
                   
                </div>
</a>

            </div>
            </div>


            <div>
            <div class="booking_box">
            <a href="#">
                <div class="position-relative imgbook">
                    <img src="{{asset('public/assets/images/Fort.jpg')}}" alt="" class="imgres" />
                    
                </div>
                <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Fort</h4>
                    </div>
                    
                </div>
</a>

            </div>
            </div>


            
            <div>
            <div class="booking_box">
            <a href="#">
                <div class="position-relative imgbook">
                    <img src="{{asset('public/assets/images/WorldTradeCentre.jpg')}}" alt="" class="imgres" />
                    
                </div>
                <div class="text_booking">
                    <div class="inter_txt">
                        <h4>World Trade Center</h4>
                    </div>
                
                </div>
</a>

            </div>
            </div>


            <div>
            <div class="booking_box">
            <a href="#">
                <div class="position-relative imgbook">
                    <img src="{{asset('public/assets/images/AlDarIsland.jpg')}}" alt="" class="imgres" />
                    
                </div>
                <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Al Dar Island</h4>
                    </div>
                
                </div></a>

            </div>
            </div>
          

            <div>
            <div class="booking_box">
            <a href="#">
                <div class="position-relative imgbook">
                    <img src="{{asset('public/assets/images/Lostparadise.jpg')}}" alt="" class="imgres" />
                    
                </div>
                <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Lost Paradise</h4>
                    </div>
                    
                </div></a>

            </div>
            </div>
          
            <div>
            <div class="booking_box">
            <a href="#">
                <div class="position-relative imgbook">
                    <img src="{{asset('public/assets/images/BabAlBahrian.jpg')}}" alt="" class="imgres" />
                    
                </div>
                <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Bab Al Bahrain</h4>
                        
                    </div>
                   
                </div>
</a>

            </div>
            </div>
          
           
        
        </div></div></section>

<style>
@media screen and (max-width: 768px){
.allheading>h1, .allheading>h2 {
    font-size: 18px;
}
}
    </style>


<section class="topdeal_pk gapbox mt-4">
    <div class="allheading text-center topeqal_pd">
        <h2>Cruise Line With Attractive Deals <span>(Worldwide)</span>
        </h2>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
        <div class="para_aball_2">
                <p>Wox Travel & Tour deals with well known cruise lines like <b>Royal Caribbean, Norwegian, Star Cruises, Costa Cruises, etc.,</b> in order to provide our clientele with the world's best cruise deals with affordable prices. This enables our clients to enjoy a wonderful voyage to various destination in addition to having the best rates in terms of entertainment, complimentary-use onboard facilities. </p>
            </div>
</div>
   <div class="col-sm-3">
   <div class="cruisebox">
<a href="">
<img src="{{asset('public/assets/images/Cruise1.jpg')}}" alt="" class="img-res" />
<span class="logosml"><img src="{{asset('public/assets/images/Cruise-logo1.jpg')}}" alt="" class="img-res" /></span>
</a>
</div>
</div>

<div class="col-sm-3">
   <div class="cruisebox">
<a href="">
<img src="{{asset('public/assets/images/Cruise2.jpg')}}" alt="" class="img-res" />
<span class="logosml"><img src="{{asset('public/assets/images/Cruise-logo2.jpg')}}" alt="" class="img-res" /></span>
</a>
</div>
</div>

<div class="col-sm-3">
   <div class="cruisebox">
<a href="">
<img src="{{asset('public/assets/images/Cruise3.jpg')}}" alt="" class="img-res" />
<span class="logosml"><img src="{{asset('public/assets/images/Cruise-logo3.jpg')}}" alt="" class="img-res" /></span>
</a>
</div>
</div>


<div class="col-sm-3">
   <div class="cruisebox">
<a href="">
<img src="{{asset('public/assets/images/Cruise4.jpg')}}" alt="" class="img-res" />
<span class="logosml"><img src="{{asset('public/assets/images/Cruise-logo4.jpg')}}" alt="" class="img-res" /></span>
</a>
</div>
</div>








</div>


    <!-- <div class="sliderdl">
        <div class="rc_book d-flex flex-wrap ">
        <div class="box_pkdeal">
                    <a href="#">
                        <div class="pkdl_img position-relative">
                            <img src="{{asset('public/assets/images/Cruise1.jpg')}}" alt="" class="img-res" />
                            <span class="dytm">
                                <i class="icon_clock_alt"></i> 3N/4D </span>
                        </div>
                        <div class="pkdl_txt">
                            <h4>Jaipur Escape</h4>
                            <p>3 Nights jaipur</p>
                            <span class="price">From <strong>
                                    <i class="fa fa-inr"></i> 18000 </strong> /per person </span>
                        </div>
                    </a>
                </div>

             

             
        </div>
    </div> -->
</section>
<section class="Recently_box gapbox mt-4">
    <div class="allheading text-center topeqal_pd">
        <h2>Top International Holidays <span>Explore Top International Holidays</span>
        </h2>
    </div>
</section>
<div class="rc_book d-flex flex-wrap gapbox">
   
<div class="booking_box">
<a href="#">
        <div class="position-relative imgbook">
            <img src="{{asset('public/assets/images/Internationalimg1.jpg')}}" alt="" class="imgres" />
            
        </div>
        <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Paris Disney land</h4>
                    </div>
                
                </div>
</a>
    </div>


    <div class="booking_box">
        <a href="#">
        <div class="position-relative imgbook">
            <img src="{{asset('public/assets/images/Internationalimg2.jpg')}}" alt="" class="imgres" />
          
        </div>
        <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Capetown</h4>
                    </div>
                
                </div></a>
    </div>


    <div class="booking_box">
        <a href="#">
        <div class="position-relative imgbook">
            <img src="{{asset('public/assets/images/Internationalimg3.jpg')}}" alt="" class="imgres" />
           
        </div>
        <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Cairo , Egypt</h4>
                    </div>
                
                </div>
    
    </a>
    </div>



    <div class="booking_box">
        <a href="#">
        <div class="position-relative imgbook">
            <img src="{{asset('public/assets/images/Internationalimg4.jpg')}}" alt="" class="imgres" />
           
        </div>
        <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Lag Vegas</h4>
                    </div>
                
                </div></a>
    </div>



    <div class="booking_box">
        <a href="#">
        <div class="position-relative imgbook">
            <img src="{{asset('public/assets/images/Internationalimg5.jpg')}}" alt="" class="imgres" />
           
        </div>
        <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Budapest</h4>
                    </div>
                
                </div>
            
            </a>
    </div>

    <div class="booking_box">
        <a href="#">
        <div class="position-relative imgbook">
            <img src="{{asset('public/assets/images/Internationalimg6.jpg')}}" alt="" class="imgres" />
          
        </div>
        <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Ibiza</h4>
                    </div>
                
                </div>
            
            </a>
    </div>

    <div class="booking_box">
        <a href="#">
        <div class="position-relative imgbook">
            <img src="{{asset('public/assets/images/Internationalimg7.jpg')}}" alt="" class="imgres" />
          
        </div>
        <div class="text_booking">
                    <div class="inter_txt">
                        <h4>kuala lumpur</h4>
                    </div>
                
                </div>
            </a>
    </div>

    <div class="booking_box">
        <a href="#">
        <div class="position-relative imgbook">
            <img src="{{asset('public/assets/images/Internationalimg8.jpg')}}" alt="" class="imgres" />
            <!-- <span class="mapimg">
                <img src="{{asset('public/assets/images/red_map.svg')}}" alt="" />Singapore</span> -->
        </div>
        <div class="text_booking">
                    <div class="inter_txt">
                        <h4>Singapore</h4>
                    </div>
                
                </div></a>
    </div>









    
   
   
   
   
    
</div>












</section>
@endsection
@section('scripts')
<script>
    (function() {

        var _ = function(input, o) {
            var me = this;

            // Setup

            this.input = $(input);
            this.input.setAttribute("autocomplete", "off");
            this.input.setAttribute("aria-autocomplete", "list");

            o = o || {};

            configure.call(this, {
                minChars: 2,
                maxItems: 10,
                autoFirst: false,
                filter: _.FILTER_CONTAINS,
                sort: _.SORT_BYLENGTH,
                item: function(text, input) {
                    return $.create("li", {
                        innerHTML: text.replace(RegExp($.regExpEscape(input.trim()), "gi"), "<mark>$&</mark>"),
                        "aria-selected": "false"
                    });
                },
                replace: function(text) {
                    this.input.value = text;
                }
            }, o);

            this.index = -1;

            // Create necessary elements

            this.container = $.create("div", {
                className: "awesomplete",
                around: input
            });

            this.ul = $.create("ul", {
                hidden: "",
                inside: this.container
            });

            this.status = $.create("span", {
                className: "visually-hidden",
                role: "status",
                "aria-live": "assertive",
                "aria-relevant": "additions",
                inside: this.container
            });

            // Bind events

            $.bind(this.input, {
                "input": this.evaluate.bind(this),
                "blur": this.close.bind(this),
                "keydown": function(evt) {
                    var c = evt.keyCode;

                    // If the dropdown `ul` is in view, then act on keydown for the following keys:
                    // Enter / Esc / Up / Down
                    if (me.opened) {
                        if (c === 13 && me.selected) { // Enter
                            evt.preventDefault();
                            me.select();
                        } else if (c === 27) { // Esc
                            me.close();
                        } else if (c === 38 || c === 40) { // Down/Up arrow
                            evt.preventDefault();
                            me[c === 38 ? "previous" : "next"]();
                        }
                    }
                }
            });

            $.bind(this.input.form, {
                "submit": this.close.bind(this)
            });

            $.bind(this.ul, {
                "mousedown": function(evt) {
                    var li = evt.target;

                    if (li !== this) {

                        while (li && !/li/i.test(li.nodeName)) {
                            li = li.parentNode;
                        }

                        if (li) {
                            me.select(li);
                        }
                    }
                }
            });

            if (this.input.hasAttribute("list")) {
                this.list = "#" + input.getAttribute("list");
                input.removeAttribute("list");
            } else {
                this.list = this.input.getAttribute("data-list") || o.list || [];
            }

            _.all.push(this);
        };

        _.prototype = {
            set list(list) {
                if (Array.isArray(list)) {
                    this._list = list;
                } else if (typeof list === "string" && list.indexOf(",") > -1) {
                    this._list = list.split(/\s*,\s*/);
                } else if (typeof list === "object") {
                    this._list = Object.keys(list);
                    this._listObject = list;
                } else { // Element or CSS selector
                    list = $(list);

                    if (list && list.children) {
                        this._list = slice.apply(list.children).map(function(el) {
                            return el.textContent.trim();
                        });
                    }
                }

                if (document.activeElement === this.input) {
                    this.evaluate();
                }
            },

            get list() {
                return this._list;
            },

            get selected() {
                return this.index > -1;
            },

            get opened() {
                return this.ul && this.ul.getAttribute("hidden") == null;
            },

            close: function() {
                this.ul.setAttribute("hidden", "");
                this.index = -1;

                $.fire(this.input, "awesomplete-close");
            },

            open: function() {
                this.ul.removeAttribute("hidden");

                if (this.autoFirst && this.index === -1) {
                    this.goto(0);
                }

                $.fire(this.input, "awesomplete-open");
            },

            next: function() {
                var count = this.ul.children.length;

                this.goto(this.index < count - 1 ? this.index + 1 : -1);
            },

            previous: function() {
                var count = this.ul.children.length;

                this.goto(this.selected ? this.index - 1 : count - 1);
            },

            // Should not be used, highlights specific item without any checks!
            goto: function(i) {
                var lis = this.ul.children;

                if (this.selected) {
                    lis[this.index].setAttribute("aria-selected", "false");
                }

                this.index = i;

                if (i > -1 && lis.length > 0) {
                    lis[i].setAttribute("aria-selected", "true");
                    this.status.textContent = lis[i].textContent;
                }

                $.fire(this.input, "awesomplete-highlight");
            },

            select: function(selected) {
                selected = selected || this.ul.children[this.index];

                if (selected) {
                    var prevented;

                    $.fire(this.input, "awesomplete-select", {
                        text: selected.textContent,
                        values: (this._listObject) ? this._listObject[selected.textContent] : "",
                        preventDefault: function() {
                            prevented = true;
                        }
                    });

                    if (!prevented) {
                        this.replace(selected.textContent);
                        this.close();
                        $.fire(this.input, "awesomplete-selectcomplete");
                    }
                }
            },

            evaluate: function() {
                var me = this;
                var value = this.input.value;

                if (value.length >= this.minChars && this._list.length > 0) {
                    this.index = -1;
                    // Populate list with options that match
                    this.ul.innerHTML = "";

                    this._list
                        .filter(function(item) {
                            return me.filter(item, value);
                        })
                        .sort(this.sort)
                        .every(function(text, i) {
                            me.ul.appendChild(me.item(text, value));

                            return i < me.maxItems - 1;
                        });

                    if (this.ul.children.length === 0) {
                        this.close();
                    } else {
                        this.open();
                    }
                } else {
                    this.close();
                }
            }
        };

        // Static methods/properties

        _.all = [];

        _.FILTER_CONTAINS = function(text, input) {
            return RegExp($.regExpEscape(input.trim()), "i").test(text);
        };

        _.FILTER_STARTSWITH = function(text, input) {
            return RegExp("^" + $.regExpEscape(input.trim()), "i").test(text);
        };

        _.SORT_BYLENGTH = function(a, b) {
            if (a.length !== b.length) {
                return a.length - b.length;
            }

            return a < b ? -1 : 1;
        };

        // Private functions

        function configure(properties, o) {
            for (var i in properties) {
                var initial = properties[i],
                    attrValue = this.input.getAttribute("data-" + i.toLowerCase());

                if (typeof initial === "number") {
                    this[i] = parseInt(attrValue);
                } else if (initial === false) { // Boolean options must be false by default anyway
                    this[i] = attrValue !== null;
                } else if (initial instanceof Function) {
                    this[i] = null;
                } else {
                    this[i] = attrValue;
                }

                if (!this[i] && this[i] !== 0) {
                    this[i] = (i in o) ? o[i] : initial;
                }
            }
        }

        // Helpers

        var slice = Array.prototype.slice;

        function $(expr, con) {
            return typeof expr === "string" ? (con || document).querySelector(expr) : expr || null;
        }

        function $$(expr, con) {
            return slice.call((con || document).querySelectorAll(expr));
        }

        $.create = function(tag, o) {
            var element = document.createElement(tag);

            for (var i in o) {
                var val = o[i];

                if (i === "inside") {
                    $(val).appendChild(element);
                } else if (i === "around") {
                    var ref = $(val);
                    ref.parentNode.insertBefore(element, ref);
                    element.appendChild(ref);
                } else if (i in element) {
                    element[i] = val;
                } else {
                    element.setAttribute(i, val);
                }
            }

            return element;
        };

        $.bind = function(element, o) {
            if (element) {
                for (var event in o) {
                    var callback = o[event];

                    event.split(/\s+/).forEach(function(event) {
                        element.addEventListener(event, callback);
                    });
                }
            }
        };

        $.fire = function(target, type, properties) {
            var evt = document.createEvent("HTMLEvents");

            evt.initEvent(type, true, true);

            for (var j in properties) {
                evt[j] = properties[j];
            }

            target.dispatchEvent(evt);
        };

        $.regExpEscape = function(s) {
            return s.replace(/[-\\^$*+?.()|[\]{}]/g, "\\$&");
        }

        // Initialization

        function init() {
            $$("input.awesomplete").forEach(function(input) {
                new _(input);
            });
        }

        // Are we in a browser? Check for Document constructor
        if (typeof Document !== 'undefined') {
            // DOM already loaded?
            if (document.readyState !== "loading") {
                init();
            } else {
                // Wait for it
                document.addEventListener("DOMContentLoaded", init);
            }
        }

        _.$ = $;
        _.$$ = $$;

        // Make sure to export Awesomplete on self when in a browser
        if (typeof self !== 'undefined') {
            self.Awesomplete = _;
        }

        // Expose Awesomplete as a CJS module
        if (typeof exports === 'object') {
            module.exports = _;
        }

        return _;

    }());
    var testList = {!!$data['destinations']!!};
    // {
    //     "lyon": {
    //         "a": 1,
    //         "b": 2
    //     },
    //     "paris": {
    //         "a": 11
    //     },
    //     "dijon": {
    //         "a": 111
    //     }
    // };

    var formTest = document.getElementsByClassName("formTest");
    var input = document.getElementById("myinput");

    var myAwesomeComplete = new Awesomplete(input, {
        list: testList
    });

    input.addEventListener("awesomplete-select", function(e) {
        //console.log(e.values.id);
        // Ajax Call
        if (e.values.id >= 1) {
            var RedirectUrl = "{{url('package-list')}}" + "/" + e.values.slug;
            $(location).prop('href', RedirectUrl);
            // console.log(RedirectUrl);
        }
        //formTest[0].submit();
    });

    formTest.item(0).addEventListener("submit", function(e) {
        e.preventDefault();
        console.log("submit");
    });
    //myAwesomeComplete.list = "Germany, Italy, plop2, plop4"
</script>
@endsection