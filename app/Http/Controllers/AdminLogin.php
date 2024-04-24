<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLogin extends Controller
{
    //
    // function index()
    // {
    //     return view('admin.login-pages.login');
    // }
    // function user_register()
    // {
    //     return view('register');
    // }
    public function login(){
        if (auth()->check()) {
            return redirect()->route('admin_dashboard')->with('message','Warning: Please log out first before trying to log in'); // Redirect to home page or another page
        }
        // else {
        //     return redirect()->route('admin_login')->with('message', 'Please login first.');
        // }
        return view('admin.login-pages.login');
    }

    public function login_data(Request $request)
    {
        if(!empty($request->email) && !empty($request->password)){
            $userfind=User::where('email',$request->email)->where('user_role',1)->first();
            if($userfind){
                /*means found user*/
                if(Hash::check($request->password,$userfind->password)){
                    /*matched password*/
                    Auth::login($userfind);
                    if(Auth::check() && Auth::user()->user_role==1){
                        return redirect(route('admin_dashboard'));
                    }else{
                        return redirect(route('admin_login'));
                    }
                    /*matched password end*/
                }else{
                    return redirect(route('admin_login'))->with('Failed_Password','Password is incorrect')->with('email',$request->email);
                }
                /*means found user end*/
            }else{
                return redirect(route('admin_login'))->with('Failed_Email','Email not found');
            }
        }else{
            return redirect(route('admin_login'))->with('Failed_Empty','Please fill required fields');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate(); 
        return redirect(route('admin_login'));
    }
    
    
}
