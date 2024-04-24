<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Percentage;
use Illuminate\Http\Request;

class PercentageController extends Controller
{
    //
    public function index()
    {
        $data = Percentage::where('id' , 1)->first();
        return view('admin.percentage.percentage' , compact('data'));
    }

    public function store(Request $request)
    {
        $getVal =  json_encode($request->values);

        $data = Percentage::updateOrCreate([
            'id' => 1
        ], [
            'percentage' => $getVal,
        ]);

        $decode = json_decode($data->percentage);
        $getPercentageValue = [];
        foreach ($decode as $key => $value) {
            $getPercentageValue[] =  $value;
        }

        return response()->json([
            'status' => true,
            'msg' => 'Percentage Add Successfully!',
            'data' =>  $getPercentageValue,
        ]);
    }
}
