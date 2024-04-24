<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WinningUser;
use Illuminate\Http\Request;

class WinningUserController extends Controller
{
    //
    public function winning_game_list()
    {

        $winningUser = WinningUser::latest()->get();


        $rightWayName = "";
        $rightWayPrice = "";

        $wrongWayName = "";
        $wrongWayPrice = "";

        $plus2_name = "";
        $plus2_price = "";

        $minus2_name = "";
        $minus2_price = "";

        foreach ($winningUser as $key => $value) {
            $rightWayName = json_decode($value->right_way_name);
            $rightWayPrice = json_decode($value->right_way_price);

            $wrong_way_name = json_decode($value->wrong_way_name);
            $wrong_way_price = json_decode($value->wrong_way_price);

            $plus2_name = json_decode($value->plus2_name);
            $plus2_price = json_decode($value->minus2_price);

            $minus2_name = json_decode($value->minus2_name);
            $minus2_price = json_decode($value->minus2_price);
        }

        $rightWayArray = [];

        foreach ($rightWayName as $key => $value) {
            if (isset($rightWayPrice[$key])) {
                $rightWayArray[$value] = $rightWayPrice[$key];
            }
        }
        
        foreach ($rightWayName as $key => $value) {
            if (isset($rightWayPrice[$key])) {
                $rightWayArray[$value] = $rightWayPrice[$key];
            }
        }

        foreach ($rightWayArray as $key => $value) {
           echo $user = User::where('alias' , $key)
           ->where('id' , auth()->user()->id)
           ->first();
        }

        print_r($rightWayArray);


        dd($rightWayName, $rightWayPrice);

        return view('user.winninguser.winning-user-list');
    }
}
