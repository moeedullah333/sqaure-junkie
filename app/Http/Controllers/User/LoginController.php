<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $checkUser = User::where('alias', $request->email)->orWhere('email', $request->email)->first();
        if (!$checkUser == null) {

            if ($checkUser->non_payment_count < 3) {
                if (Auth::attempt(['alias' => $request->email, 'password' => $request->password]) || Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    if (Session::has('url')) {
                        return redirect(Session::get('url'));
                    } else {
                        return redirect()->route('user.dashboard');
                    }
                } else {
                    return redirect()->route('user.login')->with('error', 'Email or password not correct');
                }
            } else {
                return redirect()->route('user.login')->with('error', 'You are blocked. Kindly contact us at this mail (Block@sportjunkie.com)');
            }
        }else {
            return redirect()->route('user.login')->with('error', 'Email or password not correct');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function personalDetail()
    {

        $userDetail = Auth::user();
        return view('user.detail.user_profile', compact('userDetail'));
    }
    public function updateDetail(Request $request)
    {
        $user = User::find($request->user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->hashtag = $request->hashtag;
        $user->alias = $request->alias;

        if ($request->hasFile('avatar')) {

            $oldImage = public_path($user->avatar);
            File::delete($oldImage);

            $files = $request->file('avatar');
            $destinationPath = 'uploads/userImage/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move(public_path('uploads/userImage/'), $profileImage);
            $user->avatar = 'uploads/userImage/' . $profileImage;
        }
        $user->number = $request->phone;
        $user->save();
        return redirect()->route('user.personal.details')->with('message', 'Detail Udated Successfully!');
    }
}
