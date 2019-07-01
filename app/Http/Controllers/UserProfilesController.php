<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
use App\Gallery;
use App\User;


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
        $this->middleware('auth')->except('edit');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $profile = UserProfile::find(auth()->user()->id);
        // $profile->galleries = Gallery::orderBy('created_at', 'desc')->paginate(5);
        // return view('user/profile.index')->with('profile', $profile);
        $user_id = auth()->user()->id;          
        $user = User::find($user_id);
        $data = array(
            'user'=>$user,
            'title' =>'Galleries',
            'response' =>'There are no Galleries yet',
            'posts'=> $user->posts,
            'profile' => $user->userProfile, 
            'galleries' => $user->galleries()
        );
        return view('user.profile.index')->with($data);
    }

    public function handle($slug)
    {
        
        // $profile = UserProfile::find(auth()->user()->id);
        $profile = UserProfile::where('slug', '=', $slug)->first();
        $profile->galleries = Gallery::orderBy('created_at', 'desc')->paginate(5);
        return view('user/profile.index')->with('profile', $profile);
        // return $profile;    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/profile.create');
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
            'profile_pic' =>'image|nullable',
            'background_image' =>'image|nullable'
        ]);
        $profile_pic = 'profile_pic';
        $background_image = 'background_image';
        $profile = new UserProfile;
        $profile->full_name = $request->input('full_name');
        $profile->slug = Controller::convertToSlug($profile->full_name);
        $profile->occupation = $request->input('occupation');
        $profile->short_message = $request->input('short_message');
        $profile->short_bio = $request->input('short_bio');
        $profile->skills = $request->input('skills');
        $profile->career_stats = $request->input('career_stats');
        $profile->tools = $request->input('tools');
        $profile->id = $profile->user_id = auth()->user()->id;
        $profile->profile_pic = Controller::upload_image($request, $profile_pic); 
        $profile->background_image = Controller::upload_image($request, $background_image); 
        $user = auth()->user();
        //$user->userProfile->save($profile);
        $profile->user()->associate($user);
        $profile->save();
        return redirect('/user/profile')->with('profile', $profile);
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $profile = UserProfile::where('slug', '=', $slug)->first();
        return view('user/profile/index')->with('profile',$profile);
        // $profile = UserProfile::find(auth()->user()->id);
        // return $profile ;       
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = UserProfile::find($id);
        $user = auth()->user();
        return view('user/profile.edit')->with('profile', $profile)->withUser($user);
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
        return view('user/profile.edit')->with($data);
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
