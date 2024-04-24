<?php

namespace App\Http\Controllers;

use App\Events\StreamNotification;
use App\Models\Board;
use App\Models\BoardOther;
use App\Models\ContactsModel;
use App\Models\GameBoard;
use App\Models\Payment;
use App\Models\SetJobs;
use App\Models\Streaming;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WinningUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminInnerPages extends Controller
{
    //
    public function dashboard()
    {
        // $users = User::all();
        $users =  User::OrderBy('created_at', 'DESC')->get();
        $set_job =  SetJobs::where('id' , 1)->first();
        return view('admin.dashboard.dashboard', compact('users' , 'set_job'));
    }
    public function user_list(Request $request)
    {

        $users = User::with('squareBuy')->where('email', '!=', 'admin@mail.com')->get();

        // dd($users->toArray());

        $winningUserTotalEarning = WinningUser::get();

        $winningUser = $winningUserTotalEarning->toArray();

        $right_way_name = array_column($winningUser, 'right_way_name');
        $right_way_price = array_column($winningUser, 'right_way_price');

        $wrong_way_name = array_column($winningUser, 'wrong_way_name');
        $wrong_way_price = array_column($winningUser, 'wrong_way_price');

        $plus2_name = array_column($winningUser, 'plus2_name');
        $plus2_price = array_column($winningUser, 'plus2_price');

        $minus2_name = array_column($winningUser, 'minus2_name');
        $minus2_price = array_column($winningUser, 'minus2_price');

        // rightway start
        $right_way_name_Arr = [];
        foreach ($right_way_name as $key => $value) {
            $right_way_name_Arr[] = json_decode($value);
        }

        $right_way_price_Arr = [];
        foreach ($right_way_price as $key => $value) {
            $right_way_price_Arr[] = json_decode($value);
        }

        $rightWayfinalArr = [];
        foreach ($right_way_name_Arr as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $rightWayfinalArr[$value2][] = $right_way_price_Arr[$key][$key2];
            }
        }
        // rightway end

        // wrongway start
        $wrong_way_name_Arr = [];
        foreach ($wrong_way_name as $key => $value) {
            $wrong_way_name_Arr[] = json_decode($value);
        }

        $wrong_way_price_Arr = [];
        foreach ($wrong_way_price as $key => $value) {
            $wrong_way_price_Arr[] = json_decode($value);
        }

        $wrongWayfinalArr = [];
        foreach ($wrong_way_name_Arr as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $wrongWayfinalArr[$value2][] = $wrong_way_price_Arr[$key][$key2];
            }
        }
        // wrongway start

        // plus2 start
        $plus2_name_Arr = [];
        foreach ($plus2_name as $key => $value) {
            $plus2_name_Arr[] = json_decode($value);
        }

        $plus2_price_Arr = [];
        foreach ($plus2_price as $key => $value) {
            $plus2_price_Arr[] = json_decode($value);
        }

        $plus2finalArr = [];
        foreach ($plus2_name_Arr as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $plus2finalArr[$value2][] = $plus2_price_Arr[$key][$key2];
            }
        }
        // plus2 end

        // minus2 start
        $minus2_name_Arr = [];
        foreach ($minus2_name as $key => $value) {
            $minus2_name_Arr[] = json_decode($value);
        }

        $minus2_price_Arr = [];
        foreach ($minus2_price as $key => $value) {
            $minus2_price_Arr[] = json_decode($value);
        }

        $minus2finalArr = [];
        foreach ($minus2_name_Arr as $key => $value) {
            foreach ($value as $key2 => $value2) {
                $minus2finalArr[$value2][] = $minus2_price_Arr[$key][$key2];
            }
        }
        // minus2 end

        $mainArr = [$rightWayfinalArr, $wrongWayfinalArr, $plus2finalArr, $minus2finalArr,];

        $combinedArr = [];

        foreach ($mainArr as $arr) {
            foreach ($arr as $key => $values) {

                if (isset($combinedArr[$key])) {
                    $combinedArr[$key] = array_merge($combinedArr[$key], $values);
                } else {

                    $combinedArr[$key] = $values;
                }
            }
        }

        foreach ($combinedArr as &$values) {
            $values = array_map(function ($value) {
                return (int)str_replace('$', '', $value);
            }, $values);
        }

        // dd($combinedArr);

        return view('admin.users.userList', compact('users', 'combinedArr'));
    }

    // public function user_status(Request $request,$id, $user)
    // {
    //     $user = User::find($id);
    //     return view('admin.users.userList');
    // }

    public function teamsWinning()
    {

        $board = Board::where(['delete_status' => 0, 'is_archive' => 0])->latest()->select(['id', 'board_name', 'team_name_x', 'team_name_y'])->get();
        // dd($board->toArray());

        return view('admin.team.index', compact('board'));
    }

    public function payment()
    {
        // $date = Carbon::now();
        // $startOfWeek = $date->startOfWeek();
        // $endOfWeek = $date->endOfWeek();

        // $payment = Payment::whereBetween('updated_at' , [$startOfWeek , $endOfWeek])->get();
        $payments = Payment::with(['boardName', 'User'])->get();

        return view('admin.payment.index', compact('payments'));
    }

    public function payment_ajax(Request $request)
    {
        $date = Carbon::now();
        $date2 = Carbon::now();
        if ($request->type == 'weekly') {

            $startOfWeek = $date->startOfWeek();
            $endOfWeek = $date2->endOfWeek();
            $payments = Payment::with(['boardName', 'User'])->whereBetween('updated_at', [$startOfWeek, $endOfWeek])->get();
        } elseif ($request->type == 'monthly') {

            $startOfMonth = $date->startOfMonth();
            $endOfMonth = $date2->endOfMonth();
            $payments = Payment::with(['boardName', 'User'])->whereBetween('updated_at', [$startOfMonth, $endOfMonth])->get();
        } elseif ($request->type == 'yearly') {

            $startOfYear = $date->startOfYear();
            $endOfYear = $date2->endOfYear();
            $payments = Payment::with(['boardName', 'User'])->whereBetween('updated_at', [$startOfYear, $endOfYear])->get();
        } elseif ($request->type == 'all') {

            $payments = Payment::with(['boardName', 'User'])->get();
        }

        return response()->json([
            'status' => true,
            'data' => $payments,
        ]);
    }

    public function user_ban_ajax(Request $request)
    {

        if ($request->type == 'ban') {
            $user = User::where('id', $request->user_id)->first();
            $user->ban_user = 1;
            $user->save();
        } elseif ($request->type == 'unban') {
            $user = User::where('id', $request->user_id)->first();
            $user->ban_user = 0;
            $user->save();
        }

        return response()->json([
            'status' => true,
            'user_id' => $request->user_id,
            'data' => $user,
        ]);
    }

    public function streaming_ajax(Request $request)
    {
        if ($request->status == "true") {

            Streaming::where('id', 1)->update(['status' => 1]);
            $msg = "Streaming on successfully!";


            $data = [
                'msg' => 'Streaming start successfully',
                'status' => 1,
            ];
            event(new StreamNotification($data));
        } elseif ($request->status == "false") {

            Streaming::where('id', 1)->update(['status' => 0]);
            $msg = "Streaming stop successfully!";

            $data = [
                'msg' => 'Streaming stop successfully',
                'status' => 0
            ];
            event(new StreamNotification($data));
        } elseif ($request->status == "checkStatus") {

            $data = Streaming::where('id', 1)->first('status');

            return response()->json([
                'status' => true,
                'data' => $data,
            ]);
        }

        return response()->json([
            'status' => true,
            'msg' => $msg,
        ]);
    }


    function user_contact_list()
    {
        $contacts =  ContactsModel::OrderBy('created_at', 'DESC')->get();
        return view('website.webpages.contact_list', compact('contacts'));
    }


    public function other_board_list()
    {
        // $arr = [2, 33, 40, 1, 68, 65, 109, 19, 60, 32, 88, 87, 98, 18, 43, 73, 89, 58, 72, 81, 86, 54, 96, 41, 30, 76, 42, 28, 111, 7, 101, 94, 93, 29, 62, 112, 83, 27, 74, 38, 61, 100, 47, 3, 9, 36, 66, 91, 4, 75, 107, 97, 85, 67, 70, 13, 35, 105, 51, 46, 59, 17, 113, 82, 102, 56, 8, 92, 39, 79, 20, 14, 77, 0, 52, 49, 11, 45, 24, 64, 71, 31, 57, 34, 25, 53, 15, 110, 55, 6, 84, 16, 90, 108, 3, 4, 4, 5, 5, 3, 2];

        // $new_arr = array_filter($arr);
        // $addValuesArr = [];
        // foreach ($new_arr as $key => $value) {
        //     $addValuesArr[] = $value;
        // }

        // $users = User::take(116)->get('id')->toArray();
        // $arrUserIdArr = [];
        // foreach ($users as $key => $value) {
        //     if (in_array($value['id'], $addValuesArr)) {
        //         $arrUserIdArr[] =  $value['id'];
        //     }
        // }
        
        // foreach ($arrUserIdArr as $key => $value) {
        //     $num = rand(51,1000);
        //     DB::insert("INSERT INTO `board_others`( `board_id`, `user_id`, `price`) VALUES (13,$value,$num)");
        // }

        // exit;



        $date = Carbon::now();
        // ->where('other_value' , null)
        $baords = Board::with('OtherBoard')->get();
        $baordsGet = [];
        foreach ($baords as $key => $value) {
            if ($value->others > 0) {
                $baordsGet[] = $value->toArray();
            }
        }

        // dd($baords->toArray() , $baordsGet);

        return view('admin.others.index', compact('baordsGet'));
    }

    public function other_board_user_vote_list($board_id)
    {

        // $board_others = DB::table('board_others')->where('board_id', $board_id)->get();
        // $usres = Board::where('id' , $board_id)->first();

        $users = BoardOther::with('Users')->where('board_id' , $board_id)->get();

        // dd($users->toArray());

        return view('admin.others.users', compact('users'));
    }


    public function set_other_board_price(Request $request){
        // dd($request->all());
        $board = Board::where('id' , $request->board_id)->first();
        $board->other_value = $request->price;
        $board->save();

        $lettersArray = range('a', 'z');


        if ($board->others == 0) {
            $count_others = 0;
        } else {
            $count_others = count(json_decode($board->others));
        }


        if ($count_others > 100) {
            $partValue = $this->divideValue($count_others);
            $value = $this->gameBoardSave($board->id, $partValue, $lettersArray, $request->price);
            $this->numberGenerate($value);
        }

        return response()->json([
            'status' => true,
            'msg' => 'Board Created successfully.',
        ]);
    }


    function divideValue($value)
    {
        $value;
        $parts = 100;
        $partValue = floor($value / $parts);
        return $partValue;
    }

    function gameBoardSave($id, $partValue, $lettersArray, $price)
    {
        $dataInsertArr = [];

        for ($i = 0; $i < $partValue; $i++) {
            $data = new GameBoard();
            $data->board_id = $id;
            $data->part = $lettersArray[$i];
            $data->price = $price;
            $data->save();
            $dataInsertArr[] = $data;
        }

        foreach ($dataInsertArr as $key => $value) {

            $data = new Team();
            $data->board_id =  $value->board_id;
            $data->price = $value->price;
            $data->part = $value->part;
            $data->team_x = 0;
            $data->team_y = 0;
            $data->save();
        }

        return $dataInsertArr;
    }

    function numberGenerate($value)
    {
        foreach ($value as $key => $list) {

            $q1x = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

            $shuffledArrays = [];

            for ($i = 1; $i <= 8; $i++) {

                $shuffledArray = $q1x;
                shuffle($shuffledArray);
                $shuffledArrays[] = $shuffledArray;
            }

            $data = GameBoard::where(['board_id' => $list->board_id, 'part' => $list->part, 'price' => $list->price, 'id' => $list->id])->first();
            $data->q1x = json_encode($shuffledArrays[0]);
            $data->q2x = json_encode($shuffledArrays[1]);
            $data->q3x = json_encode($shuffledArrays[2]);
            $data->q4x = json_encode($shuffledArrays[3]);
            $data->q1y = json_encode($shuffledArrays[4]);
            $data->q2y = json_encode($shuffledArrays[5]);
            $data->q3y = json_encode($shuffledArrays[6]);
            $data->q4y = json_encode($shuffledArrays[7]);
            $data->save();
        }
    }
}
