<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class NumberGenerateController extends Controller
{
    //  
    public function index()
    {
        $boardList = Board::with('gameBoardShowPart')
        ->where('winning_board', '!=', Null)
        ->where('winning_board', '!=', '[]')
        ->where(['delete_status'=> 0 , 'is_archive' => 0])
        ->latest()
        ->get();
        // dd($boardList->toArray());

        return view('admin.number-generation.index' , compact('boardList'));
    }


    // public function user_number_generate_view2(){



    //     // $date = Carbon::now();
    //     // $dateFormatEnd = $date->endOfDay()->format('Y-m-d H:i:s');
    //     // $boardList = Board::whereBetween('generate_number', [$dateFormatStart, $dateFormatEnd])->get();




    //     if($boardList){
    //         foreach ($boardList as $board) {

    //         }
    //     }



    //     return view('user.generate-number.index2' , compact('boardList'));

    // }
}
