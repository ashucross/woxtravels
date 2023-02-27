<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Services\EmailLoginSercices;
use Auth;
use App\Models\User;
use Redirect;

trait EmailLoginTrail
{

    private EmailLoginSercices $emailLoginSercices;

    public function __construct(EmailLoginSercices $emailLoginSercices)
    {
        $this->emailLoginSercices = $emailLoginSercices;
    }


    /** sent otp ***/

    public function requestOtp(Request $request)
    {
        if (!empty($request->email)) {
            $otp = app(EmailLoginSercices::class)->requestOtp($request->email);
            if ($otp == true) {
                return response(["status" => 200, "message" => "OTP sent successfully!", "email" => $request->email]);
            } else {
                return response(["status" => 401, 'message' => 'Invalid', "email" => '']);
            }
        } else {
            return response(["status" => 401, 'message' => 'Email Id Is Required!']);
        }
    }

    /*** verified otp */
    public function verifyOtp(Request $request)
    {
        if (!empty($request->opt && $request->email)) {
            $otp = $request->opt[0] . $request->opt[1] . $request->opt[2] . $request->opt[3];
            $email = $request->email;
            if (!empty($request->email)) {
                $verified = app(EmailLoginSercices::class)->verifyOtp($otp, $email);
                if ($verified == true) {
                    return response(["status" => 200, "message" => "Success", 'user' => auth()->user(), 'email' => $email]);
                } else {
                    return response(["status" => 401, 'message' => 'Invalid Otp!']);
                }
            } else {
                return response(["status" => 401, 'message' => 'Otp is Required!']);
            }
        }
    }
}
