<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\GameBoard;
use App\Models\Payment;
use App\Models\SquareBuy;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    //
    public function index(){

        $boards = Board::where('is_archive' , 1)->latest()->get();

        $boardsSquareCount = [];

        $squareBuy = [];

        foreach ($boards as $key => $board) {

            $gameBoards = GameBoard::where(['board_id' => $board->id, 'delete_status' => 0])->get();
            // $gameBoards = GameBoard::where(['board_id' => $board->id])->get();

            foreach ($gameBoards as $key => $gameBoard) {

                $partsCount = SquareBuy::where(['board_id' => $gameBoard->board_id, 'price' => $gameBoard->price, 'delete_status' => 0])->distinct('part')->count();

                $squares = 100 * $partsCount;

                $currentSquares = SquareBuy::where(['board_id' => $gameBoard->board_id, 'price' => $gameBoard->price, 'delete_status' => 0])->count();

                $boardFullStatus = false;

                if ($currentSquares == $squares) {
                    $boardFullStatus = true;
                }

                $boardsSquareCount[] = ['board_id' => $gameBoard->board_id, 'price' => $gameBoard->price, 'board_full_status' => $boardFullStatus];

                                
                $payments = Payment::where(['board_id' => $gameBoard->board_id, 'part' => $gameBoard->part, 'price' => $gameBoard->price , 'delete_status' => 0, 'refund_status' => 0])->get();

                $totalCounts = 0;

                foreach ($payments as $payment) {

                    if($payment->TransactionID !== ""){
                        
                        if($payment->total_square !== ''){
                            $totalCounts+= count(json_decode($payment->total_square, true));
                        }
 
                    }
                }   

                $squareBuy[$gameBoard->board_id][$gameBoard->part][$gameBoard->price][] = ['squaresCount' => SquareBuy::where(['board_id' => $gameBoard->board_id, 'part' => $gameBoard->part, 'price' => $gameBoard->price , 'delete_status' => 0])->count(), 'paymentsCount' => $totalCounts] ;

            }
        }
        return view('admin.archive.index' , compact('boards', 'boardsSquareCount' , 'squareBuy'));

    }

    public function ongoingArchive($board_id){
        Board::where('id' , $board_id)->update([
            'is_archive' => 0
        ]);

        return redirect()->back()->with('success' , 'Board ongoing successfully!');
    }
}
