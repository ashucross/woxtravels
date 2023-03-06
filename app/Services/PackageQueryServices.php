<?php

namespace App\Services;

use App\Models\Packagesenquri;
use Auth;
use Illuminate\Http\Request;

class PackageQueryServices
{
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'residence' => 'required',
        ]);
        $post = new Packagesenquri;
        $post->cname = $request->cname;
        $post->email = $request->email;
        $post->tMonth = $request->tMonth;
        $post->aMessage = $request->aMessage;
        $post->tGuest = $request->tGuest;
        $post->phone = $request->phone;
        $post->city = $request->city;
        $post->package_id = $request->package_id;
        $post->residence = $request->residence;
        $post->save();
        if ($post->id) {
            return $post->id;
        } else {
            return 1;
        }
    }
}
