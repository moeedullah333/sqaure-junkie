<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\GameBoard;
use App\Models\Payment;
use App\Models\Percentage;
use App\Models\SquareBuy;
use App\Models\Team;
use App\Models\User;
use App\Models\WinningUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameBoardController extends Controller
{
    //

    public function list($id, $price, $part = null)
    {
        $data = GameBoard::with('boardName')->where(['board_id' => $id, 'price' => $price, 'delete_status' => 0])->get();

        // dd($data->toArray());

        return view('admin.game-board.board-list', compact('data', 'id', 'price' , 'part'));
    }


    public function index($part, $board_id, $id, $price)
    {
        // dd($part, $board_id, $id, $price);

        $getPercentage = Percentage::where('id', 1)->first();

        $data = GameBoard::where(['id' => $id, 'board_id' => $board_id, 'part' => $part, 'price' => $price])->first();

        // dd($data->toArray());

        $board_game_date = Board::where('id', $board_id)->first();

        // dd($board_game_date);

        $squareBuyCountTotal = SquareBuy::where(['board_id' => $board_id, 'part' => $part, 'price' => $price])->count();

        // dd($squareBuyCountTotal);
        // dd($price , $id);

        $squareBuy = DB::table('square_buy')
            ->join('payment', 'payment.user_id', '=', 'square_buy.user_id')
            ->select('payment.user_id as p.u_id', 'square_buy.user_id', 'payment.status as payStatus', 'payment.price', 'payment.board_id')
            ->where('payment.price', $price)
            ->where('payment.board_id', $board_id)
            ->where('payment.part', $part)
            ->distinct()
            ->get();

        $teams = Team::with('boardTeams')->where(['board_id' => $board_id, 'part' => $part, 'price' => $price])->first();

        $squareBuyCountUser = [];
        foreach ($squareBuy as $key => $value) {
            //  dd($value);
            $squareBuyCountUser[SquareBuy::where(['user_id' => $value->user_id, 'board_id' => $board_id, 'part' => $part, 'price' => $price])->count()][$value->payStatus][$teams->team_y][$teams->boardTeams['team_name_y']][$teams->team_x][$teams->boardTeams['team_name_x']][] = User::where(['id' => $value->user_id])->get();
        }

        // dd($squareBuyCountUser);

        $paidAmount = Payment::where(['board_id' => $board_id, 'part' => $part, 'price' => $price, 'status' => 1])->count();

        $winningUser = WinningUser::where(['board_id' => $board_id, 'part' => $part, 'board_price' => $price])->first();

        // dd($winningUser);

        if (isset($winningUser->right_way_name)) {

            $rightWayUser = [];
            foreach (json_decode($winningUser->right_way_name) as $key => $value) {
                $right_way_name = User::where('id', $value)->select('id', 'alias')->first();
                if ($right_way_name == !null) {
                    $rightWayUser[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
                } else {
                    $rightWayUser[] = 'null';
                }
            }

            $wrongWayUser = [];
            foreach (json_decode($winningUser->wrong_way_name) as $key => $value) {
                $wrong_way_name = User::where('id', $value)->select('id', 'alias')->first();
                if ($wrong_way_name == !null) {
                    $wrongWayUser[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
                } else {
                    $wrongWayUser[] = 'null';
                }
            }

            $plus2User = [];
            foreach (json_decode($winningUser->plus2_name) as $key => $value) {
                $plus2_name = User::where('id', $value)->select('id', 'alias')->first();
                if ($plus2_name == !null) {
                    $plus2User[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
                } else {
                    $plus2User[] = 'null';
                }
            }

            $minus2User = [];
            foreach (json_decode($winningUser->minus2_name) as $key => $value) {
                $minus2_name = User::where('id', $value)->select('id', 'alias')->first();
                if ($minus2_name == !null) {
                    $minus2User[] = User::where('id', $value)->select('id', 'alias')->first()->toArray();
                } else {
                    $minus2User[] = 'null';
                }
            }

            $userAliasArr = ['rightWayUser' => $rightWayUser, 'wrongWayUser' => $wrongWayUser, 'plus2User' => $plus2User, 'minus2User' => $minus2User];

            return view('admin.game-board.index', compact('id', 'price', 'data', 'board_game_date', 'squareBuyCountUser', 'squareBuyCountTotal', 'paidAmount', 'winningUser', 'userAliasArr', 'getPercentage'));
        }

        $currentDate = Carbon::now();
        $dateFormat = $currentDate->format('Y-m-d H:i:00');


        return view('admin.game-board.index', compact('id', 'price', 'data', 'board_game_date', 'squareBuyCountUser', 'squareBuyCountTotal', 'paidAmount', 'winningUser', 'getPercentage', 'dateFormat'));
    }

    public function spinerUpdate(Request $request)
    {
        // dd($request->all());
        $gameBoard = GameBoard::where('id', $request->id)->first();

        $getData = '';
        $msg = '';
        $spiner_count = '';
        if ($request->type == 'randomNumber') {
            $gameBoard->spin_numbers = $request->random_number;
            $gameBoard->spiner_count = 0;
            $getData =  $gameBoard->spin_numbers;
            $spiner_count =  $gameBoard->spiner_count;
            $msg = 'Random Number';
        } else {
            $gameBoard->spiner_count = $request->count;
            $getData =  $gameBoard->spiner_count;
            $msg = 'Number of spins';
        }

        $gameBoard->save();
        return response()->json([
            'status' => true,
            'data' => $getData,
            'spiner_count' => $spiner_count,
            'msg' => $msg
        ]);
    }


    public function store(Request $request)
    {
        // data1y start 
        $data1y = array_filter($request->data1y, function ($value) {
            return $value !== null && trim($value) !== '';
        });
        $arr1y = [];
        foreach ($data1y as $value) {
            $arr1y[] = $value;
        }
        // data1y end 

        // data2y start 
        $data2y = array_filter($request->data2y, function ($value) {
            return $value !== null && trim($value) !== '';
        });
        $arr2y = [];
        foreach ($data2y as $value) {
            $arr2y[] = $value;
        }
        // data2y end 

        // data3y start 
        $data3y = array_filter($request->data3y, function ($value) {
            return $value !== null && trim($value) !== '';
        });
        $arr3y = [];
        foreach ($data3y as $value) {
            $arr3y[] = $value;
        }
        // data3y end 

        // data4y start 
        $data4y = array_filter($request->data4y, function ($value) {
            return $value !== null && trim($value) !== '';
        });
        $arr4y = [];
        foreach ($data4y as $value) {
            $arr4y[] = $value;
        }
        // data4y end 

        $data = GameBoard::where(['id' => $request->id, 'part' => $request->part, 'price' => $request->price])->update([
            'q1x' => json_encode($request->data1x),
            'q1y' => json_encode($arr1y),
            'q2x' => json_encode($request->data2x),
            'q2y' => json_encode($arr2y),
            'q3x' => json_encode($request->data3x),
            'q3y' => json_encode($arr3y),
            'q4x' => json_encode($request->data4x),
            'q4y' => json_encode($arr4y),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'data add successfully',
        ]);
    }



    public function square_show(Request $request)
    {
        $squareBuy = SquareBuy::with('user')->where(['board_id' => $request->board_id, 'part' => $request->part, 'price' => $request->price])->get();
        return response()->json(['status' => true, 'data' => $squareBuy->toArray()]);
    }

    public function destory($user_id, $board_id, $price)
    {
        SquareBuy::where(['user_id' => $user_id, 'board_id' => $board_id, 'price' => $price])->delete();
        return redirect()->back()->with('success', 'Squares Delete Successfully.');
    }


    // admin set winner
    public function set_winner_first(Request $request)
    {

        $firstValueMinus = str_replace("-", "", $request->firstValueMinus);
        $secondValueMinus = str_replace("-", "", $request->secondValueMinus);

        $qtr1x = 'q1x';
        $qtr1y = 'q1y';

        $data =  $this->setWinner($request->board_id, $request->price, $request->part, $qtr1x, $qtr1y, $request->first, $request->second, $request->firstValuePlus, $request->secondValuePlus, $firstValueMinus, $secondValueMinus);

        $data = [
            'rightWay' => $data["rightWay"],
            'wrongWay' => $data["wrongWay"],
            'plus2' => $data["plus2"],
            'minus2' => $data["minus2"],
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function set_winner_second(Request $request)
    {
        $firstValueMinus = str_replace("-", "", $request->firstValueMinus);
        $secondValueMinus = str_replace("-", "", $request->secondValueMinus);

        $qtr2x = 'q2x';
        $qtr2y = 'q2y';

        $data =  $this->setWinner($request->board_id, $request->price, $request->part, $qtr2x, $qtr2y, $request->first, $request->second, $request->firstValuePlus, $request->secondValuePlus, $firstValueMinus, $secondValueMinus);

        $data = [
            'rightWay' => $data["rightWay"],
            'wrongWay' => $data["wrongWay"],
            'plus2' => $data["plus2"],
            'minus2' => $data["minus2"],
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function set_winner_third(Request $request)
    {

        $firstValueMinus = str_replace("-", "", $request->firstValueMinus);
        $secondValueMinus = str_replace("-", "", $request->secondValueMinus);

        $qtr3x = 'q3x';
        $qtr3y = 'q3y';

        $data =  $this->setWinner($request->board_id, $request->price, $request->part, $qtr3x, $qtr3y, $request->first, $request->second, $request->firstValuePlus, $request->secondValuePlus, $firstValueMinus, $secondValueMinus);


        $data = [
            'rightWay' => $data["rightWay"],
            'wrongWay' => $data["wrongWay"],
            'plus2' => $data["plus2"],
            'minus2' => $data["minus2"],
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    public function set_winner_fourth(Request $request)
    {
        $firstValueMinus = str_replace("-", "", $request->firstValueMinus);
        $secondValueMinus = str_replace("-", "", $request->secondValueMinus);

        $qtr4x = 'q4x';
        $qtr4y = 'q4y';

        $data = $this->setWinner($request->board_id, $request->price, $request->part, $qtr4x, $qtr4y, $request->first, $request->second, $request->firstValuePlus, $request->secondValuePlus, $firstValueMinus, $secondValueMinus);


        $data = [
            'rightWay' => $data["rightWay"],
            'wrongWay' => $data["wrongWay"],
            'plus2' => $data["plus2"],
            'minus2' => $data["minus2"],
        ];

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }


    function setWinner($board_id, $price, $part, $qtrx, $qtry, $first, $second, $firstValuePlus, $secondValuePlus, $firstValueMinus, $secondValueMinus)
    {

        $rightWay = SquareBuy::with('user')->where(['board_id' => $board_id, 'part' => $part, 'price' => $price])->where($qtrx, $first)->where($qtry, $second)->first();

        $wrongWay = SquareBuy::with('user')->where(['board_id' => $board_id, 'part' => $part, 'price' => $price])->where($qtrx, $second)->where($qtry, $first)->first();

        $plus2 = SquareBuy::with('user')->where(['board_id' => $board_id, 'part' => $part, 'price' => $price])->where($qtrx, $firstValuePlus)->where($qtry, $secondValuePlus)->first();

        $minus2 = SquareBuy::with('user')->where(['board_id' => $board_id, 'part' => $part, 'price' => $price])->where($qtrx, $firstValueMinus)->where($qtry, $secondValueMinus)->first();

        $arr = ['rightWay' => $rightWay, 'wrongWay' => $wrongWay, 'plus2' => $plus2, 'minus2' => $minus2];

        return $arr;
    }


    public function winner_announce(Request $request)
    {
        $post = WinningUser::updateOrCreate([
            'board_id' => $request->board_id,
            'board_price' => $request->price,
            'part' => $request->part,
        ], [
            'board_id' => $request->board_id,
            'board_price' => $request->price,
            'part' => $request->part,
            'percentage' => json_encode($request->percentage),
            'score' => json_encode($request->getScore),
            'winning_number' => json_encode($request->filterWinningNumber),
            'right_way' => json_encode($request->rightWayWinner),
            'right_way_name' => json_encode($request->rightWayWinnerId),
            'right_way_price' => json_encode($request->rightWayWinnerAmount),
            'wrong_way' => json_encode($request->wrongWayWinner),
            'wrong_way_name' => json_encode($request->wrongWayWinnerId),
            'wrong_way_price' => json_encode($request->wrongWayWinnerAmount),
            'plus2' => json_encode($request->plus2WayWinner),
            'plus2_name' => json_encode($request->plus2WinnerId),
            'plus2_price' => json_encode($request->plus2WinnerAmount),
            'minus2' => json_encode($request->minus2WayWinner),
            'minus2_name' => json_encode($request->minus2WinnerId),
            'minus2_price' => json_encode($request->minus2WinnerAmount),
            'status' => 1
        ]);

        return response()->json([
            'status' => true,
            'message' => 'data add successfully',
        ]);
    }


    public function teamWinning($board_id, $price, $part)
    {
        // dd($board_id , $price , $part);
        $getTeams = Team::where(['board_id' => $board_id, 'price' => $price, 'part' => $part])->first();
        $winningUser = WinningUser::where(['board_id' => $board_id, 'board_price' => $price, 'part' => $part])->first();
        $board = Board::where('id', $board_id)->first();

        // dd($winningUser);

        if ($winningUser != null) {

            $teamX = json_decode($getTeams->team_x);
            $teamY = json_decode($getTeams->team_y);
            // echo count($teamX);
            // echo "<br/>";
            // echo count($teamY);


            $rightWayUserId = json_decode($winningUser->right_way_name);
            $wrongWayUserId =  json_decode($winningUser->wrong_way_name);
            $plus2UserId =  json_decode($winningUser->plus2_name);
            $minus2UserId =  json_decode($winningUser->minus2_name);

            $data = array_merge($rightWayUserId, $wrongWayUserId, $plus2UserId, $minus2UserId);

            $teamXResult = array_intersect($teamX, $data);
            $teamYResult = array_intersect($teamY, $data);

            // echo "<br/>";
            // echo count($teamXResult);
            // echo "<br/>";
            // echo count($teamYResult);

            return response()->json(
                [
                    'status' => true,
                    'data' => ['teamXname' => $board->team_name_x, 'teamYname' => $board->team_name_y, 'teamXcount' => count($teamX), 'teamYcount' => count($teamY), 'teamXResult' => count($teamXResult), 'teamYResult' => count($teamYResult)],
                    'message' => "Data get successfully.",
                ]
            );

            // dd($data, $teamXResult, $teamYResult, $teamX);

            // dd($getTeams, $teamX, $teamY, $winningUser, $rightWayUserId, $wrongWayUserId, $plus2UserId, $minus2UserId);
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => "No Record Found",
                ]
            );
        }
    }


    public function teamWinningData(Request $request)
    {
        // dd($request->all());

        if ($request->type == 'price') {

            // $data = GameBoard::where('board_id', $request->board_id)->distinct(['id','price'])->get();
            $data = GameBoard::where('board_id', $request->board_id)
                ->distinct()
                ->select('price')
                ->get();

            if ($data) {
                return response()->json([
                    'status' => true,
                    'data' => $data,
                    'msg' => 'data get successfully',
                ]);
            }
        } elseif ($request->type == "alphabet") {

            $data = GameBoard::where(['board_id' => $request->board_id, 'price' => $request->price])->select(['id', 'part'])->get();

            if ($data) {
                return response()->json([
                    'status' => true,
                    'data' => $data,
                    'msg' => 'data get successfully',
                ]);
            }
        }
    }

    public function block_unblockGameBoard($part, $board_id, $id, $price, $status)
    {
        if ($status == 1) {
            $data = GameBoard::where(['id' => $id, 'board_id' => $board_id, 'price' => $price, 'part' => $part])->first();
            $data->block_board = 1;
            $data->save();$board = Board::where('id', $board_id)->update([
            'is_archive' => 1
        ]);
            $msg = 'Board Block successfully.';
        } else {

            $data = GameBoard::where(['id' => $id, 'board_id' => $board_id, 'price' => $price, 'part' => $part])->first();
            $data->block_board = 0;
            $data->save();
            $msg = 'Board Unblock successfully.';
        }

        return redirect()->back()->with('success', $msg);
    }
}
