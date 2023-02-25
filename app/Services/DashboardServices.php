<?php

namespace App\Services;
use App\Models\User;
use Auth;
// use App\Models\Flightdetail;
class DashboardServices {

    public function update($user,$request)
    {
        $dob = date_create($request->dob);
        $user->first_name    = $request->name;
        $user->phone  = $request->phone;
        $user->dob   = date_format($dob, "Y-m-d");
        $user->gender  = $request->gender;
        $user->marital_status  = $request->marital_status;
        $user->save();
        return $user;
    }

    public function saveImage($request){
        $users = auth()->user();
        if (!empty($request)) {
            $data = $request;
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $name_set = str_replace(array(
                '\'', '"',
                ',', ';', '<', '>', ' ', '/'
            ), '_', $users->email);
            $imageName = $name_set . $users->id .'.png';
            $success = file_put_contents(public_path().'/assets/images/profileimage/'.$imageName, $data);
             if($success){
                return $imageName;
             }else{
                return '';
             }
            }
    }


    public function logout(){
        $users = auth()->user();
        if(!empty($users)){
            Auth::logout();
            return true;
        }else{
            return false;
        }
    }
}
