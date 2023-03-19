<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thankyou</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,500&family=Russo+One&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .main-content {
            position: relative;
            height: 100%;
        }

        .tankyou-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            padding: 30px;
            margin-top: 0;
            border-radius: 10px;
            box-shadow: rgb(2 88 143 / 37%) 0px 1px 14px 0px;
        }

        .site-header__title {
            font-size: 80px;
            color: #02588f;
            margin-top: 0;
        }

        i#checkMark {
            font-size: 80px;
            display: block;
            margin-bottom: 50px;
            color: #02588f;
        }

        p.main-content__body {
            font-size: 20px;
            line-height: 26px;
        }

        .pageLink {
            background-color: #fccf13;
            color: #fff;
            font-size: 18px;
            border-radius: 50px;
            border: 0;
            cursor: pointer;
            text-decoration: none;
            padding: 10px 50px;
            display: inline-block;
            margin-top: 30px;
        }

        @media(max-width: 992px) {
            .tankyou-content {
                width: 85%;
            }

            .site-header__title {
                font-size: 30px;
            }

            i#checkMark {
                font-size: 45px;
                margin-bottom: 0;
            }

            p.main-content__body {
                font-size: 16px;
                line-height: 24px;
                margin-bottom: 0;
            }
        }

        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);

        .inner {
            position: absolute;
            margin: auto;
            width: 50px;
            height: 95px;
            top: 0px;
            left: 0px;
            bottom: 0px;
            right: 0px;
        }

        .inner>div {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 100%;
            position: absolute;
            transition: all 0.5s ease;
        }

        .inner>div:first-child {
            margin-left: -27px;
            animation: one 1.5s linear 1;
        }

        .inner>div:nth-child(2) {
            margin-left: 27px;
            animation: two 1.5s linear 1;
        }

        .inner>div:nth-child(3) {
            margin-top: 54px;
            margin-left: -27px;
            animation: four 1.5s linear 1;
        }

        .inner>div:nth-child(4) {
            margin-top: 54px;
            margin-left: 27px;
            animation: three 1.5s linear 1;
        }

        @keyframes one {
            0% {
                transform: scale(1);
            }

            25% {
                transform: scale(0.3);
            }

            50% {
                transform: scale(1);
            }

            75% {
                transform: scale(1.4);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes two {
            0% {
                transform: scale(1.4);
            }

            25% {
                transform: scale(1);
            }

            50% {
                transform: scale(0.3);
            }

            75% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.4);
            }
        }

        @keyframes three {
            0% {
                transform: scale(1);
            }

            25% {
                transform: scale(1.4);
            }

            50% {
                transform: scale(1);
            }

            75% {
                transform: scale(0.3);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes four {
            0% {
                transform: scale(0.3);
            }

            25% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.4);
            }

            75% {
                transform: scale(1);
            }

            100% {
                transform: scale(0.3);
            }
        }

        .inner>div.done {
            margin-left: 0px;
            margin-top: 27px;
        }

        .inner>div.page {
            transform: scale(40);
        }

        .pageLoad {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100vh;
            background-color: #0A0A0A;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .pageLoad.off {
            opacity: 0;
            pointer-events: none;
        }
    </style>

</head>

<body>
    <div class="pageLoad">
        <div class="inner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div class="main-content">
        <div class="tankyou-content">
            <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
            <i class="fa-solid fa-check-to-slot" id="checkMark"></i>
            <p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for filling that out. It means
                a
                lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for
                being you.</p>

            <a class="pageLink" href="#">Go to Home</a>
        </div>
    </div>


    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>

    <script>
        setTimeout(function () {
            $('.inner div').addClass('done');

            setTimeout(function () {
                $('.inner div').addClass('page');

                setTimeout(function () {
                    $('.pageLoad').addClass('off');

                    $('body, html').addClass('on');


                }, 500)
            }, 500)
        }, 1500);
    </script>

</body>

</html>
