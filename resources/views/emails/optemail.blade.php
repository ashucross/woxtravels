<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- include fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet">

    <title>Newsletter</title>

    <style type="text/css">
        *{
            font-family: 'Mulish', sans-serif !important;
        }

        p,
        p:visited {
            font-size: 15px;
            line-height: 24px;
            font-family: 'Mulish', sans-serif;
            font-weight: 300;
            text-decoration: none;
            color: #000000;
        }

        h1 {
            font-size: 22px;
            line-height: 24px;
            font-family: 'Mulish', sans-serif;
            font-weight: normal;
            text-decoration: none;
            color: #000000;
        }

        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td {
            line-height: 100%;
        }

        .ExternalClass {
            width: 100%;
        }
    </style>

</head>

<body
    style="text-align: center; margin: 0; padding-top: 10px; padding-bottom: 10px; padding-left: 0; padding-right: 0; -webkit-text-size-adjust: 100%;background-color: #f2f4f6; color: #000000"
    align="center">

    <div style="text-align: center;">
        <table align="center"
            style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #f1d34f4d;"
            width="600">
            <tbody>
                <tr>
                    <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 15px; padding-bottom: 15px;"
                        width="596">
                        <img style="width: 180px; max-width: 180px; height: 85px; max-height: 85px;" alt="Logo" src="{{asset('public/assets/images/emailimages/logo.svg') }}" align="center" width="180" height="85">
                    </td>
                </tr>
            </tbody>
        </table>

        <img style="width: 600px; max-width: 600px; height: 350px; max-height: 350px; text-align: center;"
            alt="Hero image" src="{{asset('public/assets/images/emailimages/email-banner.webp') }}" align="center" width="600" height="350">

        <table align="center"
            style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #f1d34f4d;"
            width="600">
            <tbody>
                <tr>
                    <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 40px;"
                        width="596">

                        <h1
                        style="font-size: 26px;line-height: 40px;font-family: 'Mulish', sans-serif;font-weight: 700;text-decoration: none;color: #005495;">
                            Hi! {{  $mailData['email'] }}, <br> Thanks for Choosing Wox Travel & Tours.</h1>

                        <p
                            style="font-size: 16px;line-height: 26px;font-family: 'Mulish', sans-serif;font-weight: 400;text-decoration: none;color: #919293;">
                            {{($mailData['body']) }}</p>

                        <p
                        style="font-size: 16px;line-height: 26px;font-family: 'Mulish', sans-serif;font-weight: 400;text-decoration: none;color: #727272;">
                            Thank you once again for registering with us. We look forward to connecting with you soon!
                        </p>

                    </td>
                </tr>
            </tbody>
        </table>

        <img style="width: 600px; max-width: 600px; height: 350px; text-align: center;" alt="Image"
            src="{{asset('public/assets/images/emailimages/email-foot-banner.webp') }}" align="center" width="600" height="240">

        <table align="center"
            style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #f1d34f4d;"
            width="600">
            <tbody>
                <tr>
                    <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 30px;"
                        width="596">

                        <img style="width: 180px; max-width: 180px; height: 85px; max-height: 85px; text-align: center; color: #ffffff;"
                            alt="Logo" src="{{asset('public/assets/images/emailimages/logo.svg') }}" align="center" width="180" height="85">
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</body>

</html>
