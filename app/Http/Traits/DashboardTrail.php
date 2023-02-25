<?php

namespace App\Http\Traits;
use Illuminate\Http\Request;
use App\Services\DashboardServices;
use Auth;
use App\Models\User;
use Redirect;
trait DashboardTrail
{

    private DashboardServices $dashboardServices;

    public function __construct(DashboardServices $dashboardServices){
        $this->dashboardServices = $dashboardServices;
    }

    public function index(Request $request)
    {
        $users = auth()->user();
        $data = meta_key();
        return view('dashboard.profile', compact('data','users'));
    }

    public function profileUpdate(Request $request){
        if(!empty($request->userId)){
            $user = User::findOrFail($request->userId);
            $usersSave = app(DashboardServices::class)->update($user,$request);
            if($usersSave){
                return response(["status" => 200, "message" => 'Profile Update successfully'], 200);
            }else{
                return response(["status" => 200, "message" => 'Profile Not Update ! Try Again Later'], 400);
            }
        }
    }

    public function updateImage(Request $request){
        if(!empty($request->imageVal)){
            $users = auth()->user();
            $updateImages = app(DashboardServices::class)->saveImage($request->imageVal);
            if(!empty($updateImages)){
                User::where('id', $users->id)
                    ->update([
                    'profile_img' => $updateImages
                ]);
            }
        }else{

        }
    }

    public function logout(){
        $logout = app(DashboardServices::class)->logout();
        if($logout == true){
            return redirect('/');

        }

    }
}
