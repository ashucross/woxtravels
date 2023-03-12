$(document).ready(function() {
    /* LOGIN */

    $("#email_cn").click(function() {
        $(".login_view2").show();
        $(".login_view1").hide();
    });

    $("#bck_1").click(function() {
        $(".login_view2").hide();
        $(".login_view1").show();
    });

    $("#nxtotp").click(function() {
        $(".login_view2").hide();
        $(".login_view3").show();
    });

    $("#resendOtp").on('click', function(e){
        e.preventDefault();
        const email  = $("#getEmail").val();

        $.ajax({
            url   : '/request_otp',
            type:"POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                email:email
            },
            dataType:'json',
            beforeSend: function(msg) {
                $('.requestemailOtpbtn').html(
                    '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
                );
                $('.requestemailOtpbtn').prop("disabled", true);
            },
            success:function(response){
                if(response.status == 200) {
                    toastr["success"]("Success!", response.message);
                }else{
                    $('.requestemailOtpbtn').prop("disabled", false);
                    toastr["error"]("Error!", response.message);
                }
                console.log(response);
                $('.loading-div').css('display','none');
            },
            error: function(response) {
                $('.requestemailOtpbtn').prop("disabled", false);
                $('.saveProfile').html(
                    'Next'
                );
                $('.requestemailOtpbtn').prop("disabled", false);
            }
        });
    });

    $("#requestemailOtp").on('submit',function(event){
        event.preventDefault();
        var strData = $("#requestemailOtp").serializeArray();
        $.ajax({
            url   : '/request_otp',
            type:"POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:strData,
            dataType:'json',
        beforeSend: function(msg) {
            $('.requestemailOtpbtn').html(
                '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
            );
            $('.requestemailOtpbtn').prop("disabled", true);
        },
        success:function(response){
            if(response.status == 200) {
                toastr["success"]("Success!", response.message);
                $(".gmailOtp").html(response.email);
                $("#getEmail").val(response.email);
                $(".login_view2").hide();
                $(".login_view3").show();
            }else{
                $('.requestemailOtpbtn').prop("disabled", false);
                toastr["error"]("Error!", response.message);
            }
            console.log(response);
            $('.loading-div').css('display','none');
        },
        error: function(response) {
            $('.requestemailOtpbtn').prop("disabled", false);
            $('.saveProfile').html(
                'Next'
            );
            $('.requestemailOtpbtn').prop("disabled", false);
        }
    });
    });


    $("#verifyOtp").on('submit',function(event){
        event.preventDefault();
        var strData = $("#verifyOtp").serializeArray();
        $.ajax({
            url   : '/verify-otp',
            type:"POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:strData,
            dataType:'json',
        beforeSend: function(msg) {
            $('.verifyOtpbtn').html(
                '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Please Wait...'
            );
            $('.verifyOtpbtn').prop("disabled", true);
        },
        success:function(response){
            if(response.status == 200) {
                window.location.href ="/dashboard";
                toastr["success"]("Success!", response.message);
            }else{
                $('.verifyOtpbtn').prop("disabled", false);
                toastr["error"]("Error!", response.message);
            }
            console.log(response);
            $('.loading-div').css('display','none');
        },
        error: function(response) {
            toastr["error"]("Error!", response);
            $('.verifyOtpbtn').prop("disabled", false);
            $('.saveProfile').html(
                'Next'
            );
            $('.verifyOtpbtn').prop("disabled", false);
        }
    });
    });




    $("#bck_2").click(function() {
        $(".login_view2").show();
        $(".login_view3").hide();
    });

    /* LOGIN END*/

    $(".barmnu").click(function() {
        $(".menubox").addClass("showmenu");
    });
    $(".closemenu").click(function() {
        $(".menubox").removeClass("showmenu");
    });

    $("[name=tab]").each(function(i, d) {
        var p = $(this).prop("checked");
        //   console.log(p);
        if (p) {
            $("article").eq(i).addClass("on");
        }
    });

    $("[name=tab]").on("change", function() {
        var p = $(this).prop("checked");

        // $(type).index(this) == nth-of-type
        var i = $("[name=tab]").index(this);

        $("article").removeClass("on");
        $("article").eq(i).addClass("on");
    });

    $(".sbt1 ").click(function() {
        $(".sbt1 ").removeClass("activetb");
        $(this).addClass("activetb");
    });

    $(function() {
        $('input[name="daterange"]').daterangepicker({
                opens: "left",
                autoApply: true,
            },
            function(start, end, label) {
                console.log(
                    "A new date selection was made: " +
                    start.format("YYYY-MM-DD") +
                    " to " +
                    end.format("YYYY-MM-DD")
                );
            }
        );
    });
    // $(".dropdown-menu").click(function (event) {
    //     event.stopPropagation();
    // });




    $(function() {
        $('.daterange1').daterangepicker({
                singleDatePicker: true,
                opens: "left",
                autoApply: true,
            },
            function(start, end, label) {
                console.log(
                    "A new date selection was made: " +
                    start.format("YYYY-MM-DD") +
                    " to " +
                    end.format("YYYY-MM-DD")
                );
            }
        );
    });

    $('input[name="birthday"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
    });

    $('input[name="birthday"]').val("");
    $('input[name="birthday"]').attr("placeholder", "Date of birth");

    $('input[name="birthday1"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
    });

    $('input[name="birthday1"]').val("");
    $('input[name="birthday1"]').attr("placeholder", "Expiry date of passport");

    //   $(function() {
    //     $('input[name="ckein"]').daterangepicker({
    //         opens: 'left',
    //         autoApply: true,
    //         autoUpdateInput: false,
    //         locale: {
    //           cancelLabel: 'Clear'
    //       }
    //     }, function(start, end, label) {
    //         console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    //     });
    // });
    //   $('input[name="ckein"]').val('');
    //   $('input[name="ckein"]').attr("placeholder", "Check-In - Check-Out");
    //   $(".ckdte").click(function(){
    //     $(".cktxts").hide();
    //         });

    $(function() {
        $('.ckein').daterangepicker({
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                cancelLabel: "Clear",
            },
        });

        $('.ckein').on(
            "apply.daterangepicker",
            function(ev, picker) {
                $(this).val(
                    picker.startDate.format("MM/DD/YYYY") +
                    " - " +
                    picker.endDate.format("MM/DD/YYYY")
                );
            }
        );

        $('.ckein').on(
            "cancel.daterangepicker",
            function(ev, picker) {
                $(this).val("");
            }
        );
    });

    $(function() {
        $('input[name="daterange2"]').daterangepicker({
                singleDatePicker: true,
                opens: "left",
                autoApply: true,
            },
            function(start, end, label) {
                console.log(
                    "A new date selection was made: " +
                    start.format("YYYY-MM-DD") +
                    " to " +
                    end.format("YYYY-MM-DD")
                );
            }
        );
    });

    $(function() {
        $('.daterange2').daterangepicker({
                singleDatePicker: true,
                opens: "left",
                autoApply: true,
            },
            function(start, end, label) {
                console.log(
                    "A new date selection was made: " +
                    start.format("YYYY-MM-DD") +
                    " to " +
                    end.format("YYYY-MM-DD")
                );
            }
        );
    });

    $("#mobile_code").intlTelInput({
        initialCountry: "in",
        separateDialCode: true,
        // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
    });
});

jQuery(document).ready(($) => {
    $(".quantity").on("click", ".plus", function(e) {
        let _Token = $(this).attr('slug');
        let _Adult = parseInt($("#" + _Token + "-qnty-adult").val());
        let _Child = parseInt($("#" + _Token + "-qnty-child").val());
        let _Infant = parseInt($("#" + _Token + "-qnty-infant").val());
        let _Total = _Adult + _Child;

        let $input = $(this).prev("input.qty");
        let val = parseInt($input.val());
        let slugId = $input.attr("id");
        switch (slugId) {
            case _Token + "-qnty-adult":
                if (_Total + 1 <= 9 && _Adult + 1 <= 9) {
                    $input.val(val + 1).change();
                } else {
                    toastr["error"]("Error!", "Only 9 passenger is allowed");
                }
                break;
            case _Token + "-qnty-child":
                if (_Total + 1 <= 9 && _Child + 1 <= 9) {
                    $input.val(val + 1).change();
                } else {
                    toastr["error"]("Error!", "Only 9 passenger is allowed");
                }
                break;
            case _Token + "-qnty-infant":
                if (_Infant + 1 <= _Adult) {
                    $input.val(val + 1).change();
                } else {
                    toastr["error"](
                        "Error!",
                        "only " + _Adult + " infant is allowed with adult"
                    );
                }
                break;
        }
    });

    $(".quantity").on("click", ".minus", function(e) {
        let _Token = $(this).attr('slug');
        let _Adult = parseInt($("#" + _Token + "-qnty-adult").val());
        let _Child = parseInt($("#" + _Token + "-qnty-child").val());
        let _Infant = parseInt($("#" + _Token + "-qnty-infant").val());
        let _Total = _Adult + _Child;
        let $input = $(this).next("input.qty");
        var val = parseInt($input.val());
        let slugId = $input.attr("id");
        let vall = 0;
        //alert(_Adult);
        switch (slugId) {
            case _Token + "-qnty-adult":
                if (_Total <= 9 && _Adult <= 9) {
                    if (_Adult - 1 < _Infant) {
                        $("#" + _Token + "-qnty-infant").val("0");
                    }
                } else {
                    toastr["error"]("Error!", "Only 9 passenger is allowed");
                }
                break;
            case _Token + "-qnty-child":
                if (_Total <= 9 && _Child <= 9) {} else {
                    toastr["error"]("Error!", "Only 9 passenger is allowed");
                }
                break;
            case _Token + "-qnty-infant":
                if (_Infant <= _Adult) {} else {
                    toastr["error"](
                        "Error!",
                        "only " + _Adult + " infant is allowed with adult"
                    );
                }
                break;
        }

        if (slugId == _Token + "-qnty-adult") {
            vall = 1;
        }
        if (val > vall) {
            $input.val(val - 1).change();
        }
    });
});

// --------Calculation End

document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        var Background = getCookie("background");
        if (Background != null) {
            $("body").attr("class", Background);
        } else {
            $("body").attr("class", "white");
        }
    }
};

$(document).ready(function() {
    $("#BlackButton").click(switchGray);
    $("#whiteButton").click(switchWhite);
    $("#darkblue").click(switchBlue);

    function switchGray() {
        setCookie("background", "Black", 365);
        $("body").attr("class", "Black");
    }

    function switchWhite() {
        setCookie("background", "white", 365);
        $("body").attr("class", "white");
    }

    function switchBlue() {
        setCookie("background", "darkblue", 365);
        $("body").attr("class", "darkblue");
    }

    $(".cogbtn").click(function() {
        $(".boxthems").toggleClass("showcog");
    });

    $(".slider-for").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slider-nav",
    });
    $(".slider-nav").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: ".slider-for",
        dots: true,
        centerMode: true,
        focusOnSelect: true,
    });

    $("#flip").click(function() {
        $("#panel").slideToggle("slow");
    });
});

$(document).ready(function() {
    //Workaround - Safari/Ios - does not respect the <option hidden> attribute
    //Momentarily remove the hidden option element when the user clicks a select element.
    //Re-Add it after iOS has generated its selection popover

    var hiddenOption; //Holds the option element we want to be non-selectable extra option)
    var timers = []; //Collect setTimout timers

    function returnOptionToSelect(element) {
        if ($(element).children("[data-ioshidden]").length > 0) {
            //It's already there. Do nothing.
        } else {
            $(element).prepend(hiddenOption); //Put it back
        }
    }

    $("#jQueryWorkaroundForm select").on("touchstart touchend", function(e) {
        if ($(e.target).data("has-been-changed")) {
            //don't do anything
        } else {
            if ($(e.target).children("[data-ioshidden]").length > 0) {
                hiddenOption = $(e.target).children("[data-ioshidden]");
                $(hiddenOption).remove();
            }
            timers.push(setTimeout(returnOptionToSelect, 35, $(e.target))); //Nice short interval that's largely imperceptible, but long enough for the popover to generate
        }
    });

    $("#jQueryWorkaroundForm select").on("input", function(e) {
        if ($(e.target).data("has-been-changed")) {
            //do nothing
        } else {
            $(e.target).data("has-been-changed", true);
            if (
                navigator.maxTouchPoints &&
                navigator.userAgent.includes("Safari") &&
                !navigator.userAgent.includes("Chrome")
            ) {
                $(e.target).prop("selectedIndex", e.target.selectedIndex + 1); //Need to bump the index +1 on ios
            }
            //make sure the option is gone
            for (var x in timers) {
                clearTimeout(x);
            }
            timers = [];
            if ($(e.target).children("[data-ioshidden]").length > 0) {
                $(e.target).children("[data-ioshidden]").remove();
            }
            hiddenOption = undefined; //throw away the option so it can't get put back
        }
    });

    $("#jQueryWorkaroundForm select").on(
        "blur focusout touchcancel",
        function(e) {
            if ($(e.target).data("has-been-changed")) {
                //The user selected an option. Don't put the element back.
            } else {
                //The user did not select an option.
                if ($(e.target).children("[data-ioshidden]").length > 0) {
                    //It's already there. Do nothing.
                } else {
                    $(e.target).prepend(hiddenOption); //Put it back
                }
            }
        }
    );
});
// --- cookies
function setCookie(key, value, expiry) {
    var expires = new Date();
    expires.setTime(expires.getTime() + expiry * 24 * 60 * 60 * 1000);
    document.cookie = key + "=" + value + ";expires=" + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match("(^|;) ?" + key + "=([^;]*)(;|$)");
    return keyValue ? keyValue[2] : null;
}

function eraseCookie(key) {
    var keyValue = getCookie(key);
    setCookie(key, keyValue, "-1");
}



$(document).ready(function() {
    $('.topdeal').slick({
        dots: false,
        autoplay: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});


jQuery(function($) {
    $('.moreless').on('click', function() {
        var $el = $(this),
            textNode = this.lastChild;
        $el.find('span').toggleClass('fa-angle-down fa-angle-up');
        textNode.nodeValue = '' + ($el.hasClass('moreless') ? 'View Less' : ' View More ')
        $el.toggleClass('moreless');
    });
});

$(document).ready(function() {
    $(".paraclick").click(function() {
        $(".para_dis").toggleClass("hegitbx");
    });



    $(".bookmark_txt>a").click(function() {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html, body").animate({
                    scrollTop: target.offset().top - 50
                }, 1000);
                return false;
            }
        }
    });
    $(window)
        .scroll(function() {
            var scrollDistance = $(window).scrollTop();
            $(".page-section").each(function(i) {
                if ($(this).position().top - 100 <= scrollDistance) {
                    $(".bookmark_txt .active_nav").removeClass("active_nav");
                    $(".bookmark_txt>a").eq(i).addClass("active_nav");
                }
            });
        })
        .scroll();
});



/**** focun next brtn  */
var a = document.getElementById("firstA"),
    b = document.getElementById("firstB"),
    c = document.getElementById("firstC");
    d = document.getElementById("firstD");

    a.onkeyup = function() {
        if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
            b.focus();
        }
    }
    b.onkeyup = function() {
        if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
            c.focus();
        }
    }
    c.onkeyup = function() {
        if (this.value.length === parseInt(this.attributes["maxlength"].value)) {
            d.focus();
        }
    }
