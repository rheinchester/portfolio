<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserProfile;
class UserProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' =>'required',
            'occupation' =>'required'
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
        return redirect('userProfile.index')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
