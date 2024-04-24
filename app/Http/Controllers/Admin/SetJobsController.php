<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetJobs;
use Illuminate\Http\Request;

class SetJobsController extends Controller
{
    //
    public function setJobs(Request $request)
    {
        $data = SetJobs::where('id', 1)->first();
        $data->status = $request->status;
        $data->save();
        return response()->json([
            'status' => true,
        ]);
    }
}
