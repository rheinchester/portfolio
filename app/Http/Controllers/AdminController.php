<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\UserProfile;
use App\Gallery;

class AdminController extends Controller
{


    public function __construct()
    {
        // explicitely makes admin key in auth the admin guard guard
        $this->middleware('auth:admin');    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id',2)->paginate(10);
        return view('auth.admin.home',compact(['users','profile']));
        
        
    }

    public function showUser($id){
        $user = User::find($id);
        // return view('auth.admin.home')->with('user',$user);
        return $user;
    }
}
