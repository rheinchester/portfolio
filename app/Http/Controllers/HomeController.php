<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance: With thes line, anything that ism't authenticated is blocked
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetching post for specific user
        
        $user_id = auth()->user()->id;//For the post fetch user id
        $user = User::find($user_id); //For the user id fetch user data
        $data = array(
            'title' =>'Services',
            'response' =>'There ara no posts yet',
            'posts'=> $user->posts
        );
        return view('home')->with($data);
    }
}
