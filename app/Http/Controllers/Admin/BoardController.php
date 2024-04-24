<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\GameBoard;
use App\Models\Payment;
use App\Models\SetJobs;
use App\Models\SquareBuy;
use App\Models\User;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    //
    public function index()
    {
        $setJob = SetJobs::where('id', 1)->first();
        $boards = Board::where(['delete_status' => 0, 'is_archive' => 0])->latest()->get();

        $boardsSquareCount = [];

        $squareBuy = [];
        $paymentsBuy = [];

        foreach ($boards as $key => $board) {

            $gameBoards = GameBoard::where(['board_id' => $board->id, 'delete_status' => 0])->get();

            $ten = ($board->ten !== '' && $board->ten !== "0" ) ? count(json_decode($board->ten)) : 0;
            $twenty = ($board->twenty !== '' && $board->twenty !== "0" ) ? count(json_decode($board->twenty)) : 0;
            $thirty = ($board->thirty !== '' && $board->thirty !== "0" ) ? count(json_decode($board->thirty)) : 0;
            $fourty = ($board->fourty !== '' && $board->fourty !== "0" ) ? count(json_decode($board->fourty)) : 0;
            $fifty = ($board->fifty !== '' && $board->fifty !== "0" ) ? count(json_decode($board->fifty)) : 0;
            $others = ($board->others !== '' && $board->others !== "0" ) ? count(json_decode($board->others)) : 0;
                        

            if($ten >= 100) {
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 10, 'board_full_status' => true];
            }
            else{
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 10, 'board_full_status' => false];
            }

            if($twenty >= 100) {
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 20, 'board_full_status' => true];
            }
            else{
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 20, 'board_full_status' => false];
            }

            if($thirty >= 100) {
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 30, 'board_full_status' => true];
            }
            else{
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 30, 'board_full_status' => false];
            }

            if($fourty >= 100) {
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 40, 'board_full_status' => true];
            }
            else{
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 40, 'board_full_status' => false];
            }

            if($fifty >= 100) {
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 50, 'board_full_status' => true];
            }
            else{
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 50, 'board_full_status' => false];
            }

            if($others >= 100) {
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 'others', 'board_full_status' => true];
            }
            else{
                $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 'others', 'board_full_status' => false];
            }


            

            // $gameBoards = GameBoard::where(['board_id' => $board->id])->get();

            foreach ($gameBoards as $key => $gameBoard) {

                if ($gameBoard->block_board == 1)
                    continue;

                $payments = Payment::where(['board_id' => $gameBoard->board_id, 'part' => $gameBoard->part, 'price' => $gameBoard->price, 'delete_status' => 0, 'refund_status' => 0])->get();

                $totalCounts = 0;



                if($payments){

                    foreach ($payments as $payment) {

                        if (strval($payment->TransactionID) !== "") {
    
                            if (strval($payment->total_square) !== '') {
                                $totalCounts += count(json_decode($payment->total_square, true));
                            }
                        }
                    }
                }

                

                $checkSquares = SquareBuy::where(['board_id' => $gameBoard->board_id, 'part' => $gameBoard->part, 'price' => $gameBoard->price, 'delete_status' => 0])->get()->toArray();

                if(!empty($checkSquares)){
                    $squareBuy[$gameBoard->board_id][$gameBoard->part][$gameBoard->price][] = ['squaresCount' => SquareBuy::where(['board_id' => $gameBoard->board_id, 'part' => $gameBoard->part, 'price' => $gameBoard->price, 'delete_status' => 0])->count(), 'paymentsCount' => $totalCounts];
                }

                $checkPayments = Payment::where(['board_id' => $gameBoard->board_id, 'part' => $gameBoard->part, 'price' => $gameBoard->price, 'delete_status' => 0])->get()->toArray();

           

                if(!empty($checkPayments)){
                    $paymentsBuy[$gameBoard->board_id][$gameBoard->part][$gameBoard->price][] = ['squaresCount' => SquareBuy::where(['board_id' => $gameBoard->board_id, 'part' => $gameBoard->part, 'price' => $gameBoard->price, 'delete_status' => 0])->count(), 'paymentsCount' => $totalCounts];
                }



            }
        }

        return view('admin.board.index', compact('boards', 'boardsSquareCount', 'squareBuy','paymentsBuy', 'setJob'));
    }

    // public function findSquareCount($board_id, $price, $boardsSquareCount){

    //     if(!empty($boardsSquareCount)){
    //         foreach ($boardsSquareCount as $board) {
    //             if($board['board_id'] == $board_id && $board['price'] == $price){
    //                 if($board['board_full_status']){
    //                     return true;
    //                 }
    //             }
    //             else{
    //                 continue;
    //             }
    //         }
    //     }

    //     return false;
    // }



    public function create()
    {
        return view('admin.board.creat');
    }

    public function store(Request $request)
    {
        $request->validate([
            'board_name' => 'required',
            'team_name_x' => 'required',
            'team_name_y' => 'required',
            'voting_start_date' => 'required',
            'voting_deadline' => 'required',
            // 'game_date' => 'required',
            'square_start_date' => 'required',
            'square_deadline_date' => 'required',
            'payment_start_date' => 'required',
            'payment_deadline_date' => 'required',
            // 'payment_deadline_date_2' => 'required',
            'generate_number_date' => 'required',
            'status' => 'required',
            // 'other_value' => 'required'
        ]);

        $board = new Board();
        $board->board_name = $request->board_name;
        $board->team_name_x = $request->team_name_x;
        $board->team_name_y = $request->team_name_y;
        $board->other_value = $request->other_value;
        $board->voting_start_date = $request->voting_start_date;
        $board->voting_deadline = $request->voting_deadline;
        $board->game_date = $request->generate_number_date;
        $board->square_start_date = $request->square_start_date;
        $board->square_deadline = $request->square_deadline_date;
        $board->payment_start_date = $request->payment_start_date;
        $board->payment_deadline = $request->payment_deadline_date;
        // $board->payment_deadline_2 = $request->payment_deadline_date_2;
        $board->generate_number = $request->generate_number_date;
        $board->status = $request->status;
        $board->save();

        return redirect()->route('admin.board_list')->with('success', 'Board added successfully.');
    }

    public function edit($id)
    {
        $board = Board::where('id', $id)->first();
        return view('admin.board.update', compact('board'));
    }

    public function update(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'board_name' => 'required',
            'team_name_x' => 'required',
            'team_name_y' => 'required',
            'voting_start_date' => 'required',
            'voting_deadline' => 'required',
            // 'game_date' => 'required',
            'square_start_date' => 'required',
            'square_deadline_date' => 'required',
            'payment_start_date' => 'required',
            'payment_deadline_date' => 'required',
            // 'payment_deadline_date_2' => 'required',
            'generate_number_date' => 'required',
            'status' => 'required',
            // 'other_value' => 'required',
        ]);

        $board = Board::find($request->board_id);
        $board->board_name = $request->board_name;
        $board->team_name_x = $request->team_name_x;
        $board->team_name_y = $request->team_name_y;
        $board->other_value = $request->other_value;
        $board->voting_start_date = $request->voting_start_date;
        $board->voting_deadline = $request->voting_deadline;
        $board->game_date = $request->generate_number_date;
        $board->square_start_date = $request->square_start_date;
        $board->square_deadline = $request->square_deadline_date;
        $board->payment_start_date = $request->payment_start_date;
        $board->payment_deadline = $request->payment_deadline_date;
        // $board->payment_deadline_2 = $request->payment_deadline_date_2;
        $board->generate_number = $request->generate_number_date;
        $board->status = $request->status;
        $board->save();

        return redirect()->route('admin.board_list')->with('success', 'Board Update successfully.');
    }

    public function archive($board_id)
    {
        // dd($board_id);

        $board = Board::where('id', $board_id)->update([
            'is_archive' => 1
        ]);

        return redirect()->back()->with('success', 'Board archived successfully!');
        // $gameBoard = GameBoard
    }
    public function removeBoard($board_id, $part)
    {
        $board = Board::where('id', $board_id)->first();

        if($board){
            switch ($part) {
                case 10:
                    if($board->ten !== '' && $board->ten !== "0" ){
                        $board->ten = '0';
                    }
                    break;
                case 20:
                    if($board->twenty !== '' && $board->twenty !== "0" ){
                        $board->twenty = '0';
                    }
                    break;
                case 30:
                    if($board->thirty !== '' && $board->thirty !== "0" ){
                        $board->thirty = '0';
                    }
                    break;
                case 40:
                    if($board->fourty !== '' && $board->fourty !== "0" ){
                        $board->fourty = '0';
                    }
                    break;
                case 50:
                    if($board->fifty !== '' && $board->fifty !== "0" ){
                        $board->fifty = '0';
                    }
                    break;
                case 'others':
                    if($board->others !== '' && $board->others !== "0" ){
                        $board->others = '0';
                    }
                    break;
            }
            $board->save();
        }

        return redirect()->back()->with('success', 'Board Deleted successfully!');
        // $gameBoard = GameBoard
    }


    public function archive_all()
    {
        $boards = Board::where('is_archive', 0)->get();

        foreach ($boards as $key => $value) {
            $value->is_archive = 1;
            $value->save();
        }

        return redirect()->back()->with('success', 'All Boards archived successfully!');
    }


    public function user_vote_insert()
    {
        $users = User::where('email', '!=', 'admin@mail.com')->where('email', '!=', 'user@gmail.com')->take(99)->get('id');

        $getBoard = Board::where('id', 1)->first();
        $data = [];
        foreach ($users as $key => $value) {
            $data[] = json_encode($value->id);
        }
        $getBoard->others = $data;
        $getBoard->save();

        dd($getBoard->toArray(), $users->toArray());
    }
}
