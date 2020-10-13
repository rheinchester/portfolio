<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use App\Gallery;
use App\User;

class HandleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $profile = UserProfile::find(auth()->user()->id);
        $message = 'Profile not available';
        $profile = UserProfile::where('slug', '=', $slug)->first();
        if ($profile == null) {
            return view('unavailable')->with('message', $message);
        }
        $user = User::find($profile->user_id);
        $data = array(
            'user'=>$user,
            'galleries' => $user->galleries(),
            'profile' => $user->userProfile);
        return view('handle')->with($data);
    }
}
