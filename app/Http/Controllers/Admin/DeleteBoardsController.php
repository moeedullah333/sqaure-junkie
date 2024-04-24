<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\GameBoard;
use Illuminate\Http\Request;

class DeleteBoardsController extends Controller
{
    //
    public function board_delete_list(){
        $deleteBoard = Board::where('delete_status' , 1)->get();
        return view('admin.delete-board.baords' , compact('deleteBoard'));
    }

    public function board_part_delete_list(){
        $deleteBoard = GameBoard::with('boardName')->where('delete_status' , 1)->get();
        return view('admin.delete-board.boardParts' , compact('deleteBoard'));
    }
}
