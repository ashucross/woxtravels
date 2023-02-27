<?php

namespace App\Services;

use App\Models\User;
use Log;
use Auth;
// use App\Models\Flightdetail;
use Mail;
use App\Mail\sendEmail;

class EmailLoginSercices
{


    public function requestOtp($email)
    {
        $otp = rand(1000, 9999);
        Log::info("otp = " . $otp);
        $user  = User::where([['email', '=', $email]])->first();
        if (!empty($user)) {
           $user = User::where('email', $email)
                ->update([
                    'otp' => $otp
                ]);
        } else {
            $user = new user;
            $user->email = $email;
            $user->otp = $otp;
            $user->save();
        }
        if ($user) {
            $mailData = [
                'subject' => 'Testing Application OTP',
                'body' => 'Your OTP is : ' . $otp,
                'email' => $email
            ];
            \Mail::to($email)->send(new sendEmail($mailData));
            return true;
        } else {
            return false;
        }
    }


    public function verifyOtp($otp, $email)
    {
        $user  = User::where([['email', '=', $email], ['otp', '=', $otp]])->first();
        if ($user) {
            auth()->login($user, true);
            User::where('email', '=', $email)->update(['otp' => null]);
            return true;
        } else {
            return false;
        }
    }
}
