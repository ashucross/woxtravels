<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisaEnquires;
use File;
use Mail;
use App\Mail\VisaEnquiryEmail;
class VisaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        $data = array(
            '_MetaTitle' => 'Visa',
            '_MetaKeywords' => '',
            '_MetaDescription' => '',
            '_Flight' => '',
            '_Hotel' => '',
            '_Packages' => '',
            '_Visa' => 'active',
            '_Insurance' => '',
            '_Car' => '',
        );
        return view('visa', compact('data'));
    }
    public function visa_enquiry(Request $request)
    {
        // dd($request->all());
        $first_name = $request->first_name ?? '';
        $last_name = $request->last_name ?? '';
        $phone_no = $request->phone_no ?? '';
        $email_id = $request->email_id ?? '';
        $visa_type = $request->visa_type ?? ''; 
        $nationality = $request->nationality ?? ''; 
        $message = $request->message ?? '';
        $passport = '';
        if ($request->hasfile('passport')) {
            $path = public_path('uploads/');

            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true); 
            }   
            $image = $request->passport;
            $namewithextension = $image->getClientOriginalName(); //Name with extension 'filename.jpg'
            $name = explode('.', $namewithextension)[0]; // Filename 'filename'
            $extension = $image->getClientOriginalExtension(); //Extension 'jpg'
            $passport = time() . '.' . $extension;
            $image->move(public_path() . '/uploads/', $passport);
        }
        $res = VisaEnquires::create([
            'first_name'=>$first_name ?? '',
            'last_name'=>$last_name ?? '',
            'phone_no'=>$phone_no ?? '',
            'email_id'=>$email_id ?? '',
            'nationality'=>$nationality ?? '',
            'visa_type'=>$visa_type ?? '',
            'message'=>$message ?? '',
            'passport'=>$passport ?? '',
        ]);
        if($res){
            $mailData = [
                'subject' => '#Visa assistance request',
                'body' => 'Hi, Your request submitted successfully , we will get back to you as soon as possible',
                'email' => $email_id ?? ''
            ];
            \Mail::to($email_id)->send(new VisaEnquiryEmail($mailData));
            $msg = "Woxtavel : Visa assistance request submitted successfully # By ".$first_name.' '.$last_name.'. Email : '.$email_id;
            sendWhatsAppMessage($msg.'. Message : '.$message,env('ADMIN_WHATSAPP_NUMBER'));
        } 
        return redirect()->back()->with('success','You request is under process, we will contact you within 24 hours.');
    }
}
