<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use App\Gallery;

use Illuminate\Support\Facades\Storage; 
class UserProfilesController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $profile = UserProfile::find(auth()->user()->id);
        $profile->galleries = Gallery::all();
        return view('userProfile.index')->with('profile', $profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userProfile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //GOOD
    {
        $this->validate($request, [
            'full_name' =>'required',
            'occupation' =>'required',
            'profile_pic' =>'image|nullable|max:1999',
            'background_image' =>'image|nullable|max:1999'
        ]);
        $profile_pic = 'profile_pic';
        $background_image = 'background_image';
        $profile = new UserProfile;
        $profile->full_name = $request->input('full_name');
        $profile->occupation = $request->input('occupation');
        $profile->short_message = $request->input('short_message');
        $profile->short_bio = $request->input('short_bio');
        $profile->skills = $request->input('skills');
        $profile->career_stats = $request->input('career_stats');
        $profile->tools = $request->input('tools');
        $profile->id = auth()->user()->id;
        $profile->profile_pic = Controller::upload_image($request, $profile_pic); 
        $profile->background_image = Controller::upload_image($request, $background_image); 
        $profile->save();
        // return $profile;
        return redirect('/userProfile')->with('profile', $profile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//GOOD
    {
        $profile = UserProfile::find(auth()->user()->id);
        // return $profile ;
        return view('userProfile.show')->with('profile',$profile);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = UserProfile::find(auth()->user()->id);
        return view('userProfile.edit')->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' =>'required',
            'occupation' =>'required'
        ]);
        $profile_pic = 'profile_pic';
        $background_image = 'background_image';
        $profile = UserProfile::find(auth()->user()->id);
        $profile->full_name = $request->input('full_name');
        $profile->occupation = $request->input('occupation');
        $profile->short_message = $request->input('short_message');
        $profile->short_bio = $request->input('short_bio');
        $profile->skills = $request->input('skills');
        $profile->career_stats = $request->input('career_stats');
        $profile->tools = $request->input('tools');
        if($request->hasFile($profile_pic)){
             $profile->profile_pic = Controller::upload_image($request, $profile_pic);
        }
        if ($request->hasFile($background_image)) {
            $profile->background_image = Controller::upload_image($request, $background_image);
        }
        $profile->save();
        $data = array('profile' => $profile, 
                        'success'=> 'profile Updated');
        return redirect('/userProfile')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find(auth()->user()->id);
        //only user that profileed is allowed to delete
        if (auth()->user()->id !== $profile->user_id) {
            return redirect('/profiles')->with('error', 'Unauthorized Page');
        }
        if ($profile->cover_image != 'noImage.jpg') {
            Storage::delete('public/cover_images/'.$profile->cover_image);
        }
        $profile->delete();
        return redirect('/profiles')->with('success', 'profile deleted');
    }
}
