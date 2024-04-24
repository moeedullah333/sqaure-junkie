<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\GameBoard;
use App\Models\Payment;
use App\Models\SquareBuy;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;

class SquareBuyController extends Controller
{
    //
    public function store(Request $request)
    {

        // dd($request->all());

        $data = $request->selectedAttributes;
        $insertedIds = [];

        foreach ($data as $value) {

            $checkData = SquareBuy::where(['q1x' => $value['data-q1-x'], 'q1y' => $value['data-q1-y'], 'q2x' => $value['data-q2-x'], 'q2y' => $value['data-q2-y'], 'q3x' => $value['data-q3-x'], 'q3y' => $value['data-q3-y'], 'q4x' => $value['data-q4-x'], 'q4y' => $value['data-q4-y']])->first();

            if ($checkData == null) {
                // Create a new instance of your Eloquent model
                $squareBuyNew = new SquareBuy();

                // Set common properties
                $squareBuyNew->user_id = auth()->user()->id;
                $squareBuyNew->board_id = $request->board_id;
                $squareBuyNew->price = $request->price;
                $squareBuyNew->part = $request->part;
                $squareBuyNew->status = 1;

                foreach ($value as $key => $item) {
                    // Use a switch statement to set the appropriate property based on the key
                    switch ($key) {
                        case 'data-q1-x':
                            $squareBuyNew->q1x = $item;
                            break;
                        case 'data-q1-y':
                            $squareBuyNew->q1y = $item;
                            break;
                        case 'data-q2-x':
                            $squareBuyNew->q2x = $item;
                            break;
                        case 'data-q2-y':
                            $squareBuyNew->q2y = $item;
                            break;
                        case 'data-q3-x':
                            $squareBuyNew->q3x = $item;
                            break;
                        case 'data-q3-y':
                            $squareBuyNew->q3y = $item;
                            break;
                        case 'data-q4-x':
                            $squareBuyNew->q4x = $item;
                            break;
                        case 'data-q4-y':
                            $squareBuyNew->q4y = $item;
                            break;
                        default:
                            // Handle any other keys as needed
                            break;
                    }
                }

                // Save the model to the database
                $squareBuyNew->save();

                $insertedIds[] = $squareBuyNew->id;
            }
        }


        $squareBuy = SquareBuy::with('user')
            ->where(['board_id' => $request->board_id, 'part' => $request->part, 'price' => $request->price])
            ->get();

        $userIdList = SquareBuy::select('user_id')
            ->where(['board_id' => $request->board_id,  'part' => $request->part, 'price' => $request->price])
            ->distinct()
            ->get();

        $playersCount = $userIdList->count();

        $squareBuyCount = SquareBuy::where(['board_id' => $request->board_id,  'part' => $request->part, 'price' => $request->price])
            ->count();

        // $squareBuyCountUser = SquareBuy::where(['user_id' => auth()->user()->id, 'board_id' => $request->board_id, 'price' => $request->price])->count();

        // dd($squareBuyCountUser);

        $counts = [
            'playersCount' => $playersCount,
            'squareBuyCount' => $squareBuyCount
        ];

        // Amount work start
        $data = Payment::where(['user_id' => auth()->user()->id, 'board_id' => $request->board_id,  'part' => $request->part, 'price' => $request->price])
            ->where('status', 0)
            ->latest()
            ->first();

        if ($data == null) {

            $Payment = new Payment();
            $Payment->user_id = auth()->user()->id;
            $Payment->board_id = $request->board_id;
            $Payment->price = $request->price;
            $Payment->part = $request->part;
            $Payment->total_square = json_encode($insertedIds);
            $Payment->save();
        } elseif ($data->status == 0) {

            $getLastBuySquare = json_decode($data->total_square);
            $lastBuySquareArr = [];
            foreach ($getLastBuySquare as $key => $value) {
                $lastBuySquareArr[] = $value;
            }
            $arr = array_merge($lastBuySquareArr, $insertedIds);

            $data = Payment::where(['user_id' => auth()->user()->id, 'board_id' => $request->board_id,  'part' => $request->part, 'price' => $request->price])->where('status', 0)
                ->latest()
                ->update([
                    'total_square' => json_encode($arr),
                ]);
        }
        // Amount work end

        return response()->json([
            'status' => true,
            'message' => "Box Add successfully.",
            'data' => $squareBuy,
            'counts' => $counts,
            'boardDate' => ['board_id' => $request->board_id,  'part' => $request->part, 'price' => $request->price],
        ]);
    }


    public function square_get(Request $request)
    {

        $squareBuy = SquareBuy::with('user')->where(['board_id' => $request->board_id, 'part' => $request->part, 'price' => $request->price])
            ->get();
        // counts 
        $userIdList = SquareBuy::select('user_id')
            ->where(['board_id' => $request->board_id,  'part' => $request->part, 'price' => $request->price])
            ->distinct()
            ->get();

        $playersCount = $userIdList->count();

        $squareBuyCount = SquareBuy::where(['board_id' => $request->board_id,  'part' => $request->part, 'price' => $request->price])
            ->count();

        $counts = [
            'playersCount' => $playersCount,
            'squareBuyCount' => $squareBuyCount
        ];

        return response()->json(['status' => true, 'data' => $squareBuy->toArray(), 'counts' => $counts]);
    }


    public function current_game_list()
    {

        $date = Carbon::now();
        // dd($date->format('Y-m-d H:i:00'));

        if (auth()->check() && auth()->user()->id) {

            // $boardList = Board::where('delete_status', 0)->latest()->get();
            $boards = Board::where(['delete_status' => 0, 'is_archive' => 0])
            ->where('winning_board', '!=', null)
            ->where('winning_board', '!=', '[]')
            ->latest()
            ->get();
            
            $boardsSquareCount = [];

            $squareBuy = [];
            $paymentsBuy = [];
    
            foreach ($boards as $key => $board) {
    
                $gameBoards = GameBoard::where(['board_id' => $board->id, 'delete_status' => 0])->get();
    

                $others = ($board->others !== '' && $board->others !== "0" && $board->other_value > 0 ) ? count(json_decode($board->others)) : 0;


                $count10Squares = SquareBuy::where(['board_id' => $board->id, 'price' => 10, 'delete_status' => 0])->count();
                $count20Squares = SquareBuy::where(['board_id' => $board->id, 'price' => 20, 'delete_status' => 0])->count();
                $count30Squares = SquareBuy::where(['board_id' => $board->id, 'price' => 30, 'delete_status' => 0])->count();
                $count40Squares = SquareBuy::where(['board_id' => $board->id, 'price' => 40, 'delete_status' => 0])->count();
                $count50Squares = SquareBuy::where(['board_id' => $board->id, 'price' => 50, 'delete_status' => 0])->count();

                $countOthersSquares = 0;
                
                if($others > 0) { $countOthersSquares = SquareBuy::where(['board_id' => $board->id, 'price' => $board->other_value, 'delete_status' => 0])->count(); }


                
                if($count10Squares >= 100) {
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 10, 'board_full_status' => true];
                }
                else{
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 10, 'board_full_status' => false];
                }
    
                if($count20Squares >= 100) {
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 20, 'board_full_status' => true];
                }
                else{
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 20, 'board_full_status' => false];
                }
    
                if($count30Squares >= 100) {
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 30, 'board_full_status' => true];
                }
                else{
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 30, 'board_full_status' => false];
                }
    
                if($count40Squares >= 100) {
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 40, 'board_full_status' => true];
                }
                else{
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 40, 'board_full_status' => false];
                }
    
                if($count50Squares >= 100) {
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 50, 'board_full_status' => true];
                }
                else{
                    $boardsSquareCount[] = ['board_id' => $board->id, 'price' => 50, 'board_full_status' => false];
                }
                
                if($others > 0 && $countOthersSquares >= 100 ) {
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
    
                

            return view('user.boxbuy.current_game_list', compact('boards', 'boardsSquareCount', 'squareBuy', 'date'));
        } else {
            return redirect()->route('user_login');
        }
    }
    
    public function current_game_boxes_list()
    {
        $date = new Carbon();
        $dateFormat = $date->format('Y-m-d H:i:00');

        $boxes = Payment::with('boardName')->where(['user_id' => auth()->user()->id, 'delete_status' => 0])
            ->latest()
            ->get();

        $total = 0;

        foreach ($boxes as $box) {
            $total += $box->price *  count(json_decode($box->total_square, true));
        }


        return view('user.boxbuy.current_game_box_buy', compact('boxes', 'dateFormat', 'total'));
    }


    // pickAndPay
    public function pickAndPay(Request $request)
    {

        $Payment = Payment::where(['user_id' => auth()->user()->id, 'board_id' => $request->board_id, 'price' => $request->price, 'part' => $request->part, 'status' => 0])->first();

        $paymentDetails = ['board_id' => $Payment->board_id, 'price' => $Payment->price, 'part' => $Payment->part, 'total_square' =>  json_decode($Payment->total_square)];

        return response()->json([
            'status' => true,
            'data' => $paymentDetails,
        ]);
    }

    public function cancleBox(Request $request)
    {

        $Payment = Payment::where(['user_id' => auth()->user()->id, 'board_id' => $request->board_id, 'price' => $request->price, 'part' => $request->part, 'status' => 0])->first();

        foreach (json_decode($Payment->total_square) as $key => $value) {
            SquareBuy::where('id', $value)->delete();
        }
        $Payment->delete();

        return response()->json([
            'status' => true,
            'msg' => 'data delete successfully!',
        ]);
        // dd($Payment->toArray());
        // $squareBuy = SquareBuy::where('')

    }
}
