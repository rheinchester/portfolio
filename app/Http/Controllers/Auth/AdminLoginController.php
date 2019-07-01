<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    /**
    *  Middleware where a guest is login in as admin
    * Uncomment after putting logout
    */
    public function __construct(){
        $this->middleware('guest:admin', ['except'=>['logout']]);//only works if array
    }
    /**
     * Brings login form into view
     * 
     */
    public function showLoginForm(){
        return view('auth.admin.login');
    }

    /**
     * Attempts login and appropriate redirects
     * 
     */
    public function login(Request $request){
        // Validate form data
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        // Attempt to login user with credentials, where remember 
        // set up across multiple sessions From the admin guard
        $credentials =  ['email' => $request->email, 
                          'password' => $request->password];
                        
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            // If successful then atttempt to login to intended location, instead of starting all over
            return redirect()->intended(route('admin.home'));
        }
        // If unsuccessful then redirect back to the login with form data(back())
        // $request->only('email') --->form data, why can't we log in array
        return redirect()->back();       
    }
    // consider using this function for users
    public function logout(){
        // session flush logs out of all accounts including user and admin
        // $request->session()->flush();
        // $request->session()->regenerate();
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
