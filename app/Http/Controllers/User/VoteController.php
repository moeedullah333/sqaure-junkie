<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\BoardOther;
use App\Models\GameBoard;
use App\Models\SquareBuy;
use App\Models\WinningUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VoteController extends Controller
{
    //
    public function checkData($val, $user_id)
    {
        $data = json_decode($val, true);
        $serializedArr = false;


        if (is_array($data)) {
            if (in_array($user_id, $data)) {

                return $serializedArr;
            }
            $data[] = $user_id;
        } else {
            $data = [
                $user_id
            ];
        }

        $serializedArr = json_encode($data);

        return $serializedArr;

        // $data = json_decode($val, true);

        // if (is_array($data)) {
        //     $data[] = $user_id;
        // } else {
        //     $data = [
        //         $user_id
        //     ];
        // }

        // $serializedArr = json_encode($data);

        // return $serializedArr;
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $item = Board::find($request->id);

        // dd($item->toArray());
        if ($request->board == 10) {

            $val = $item->ten;
            $serializedArr = $this->checkData($val, $user_id);
            if ($serializedArr == false) {
                return response()->json([
                    'status' => false,
                    'msg' => 'You have already Voted for this'
                ]);
            }
            $item->ten = $serializedArr;
        } elseif ($request->board == 20) {

            $val = $item->twenty;
            $serializedArr = $this->checkData($val, $user_id);
            if ($serializedArr == false) {
                return response()->json([
                    'status' => false,
                    'msg' => 'You have already Voted for this'
                ]);
            }
            $item->twenty = $serializedArr;
        } elseif ($request->board == 30) {

            $val = $item->thirty;
            $serializedArr = $this->checkData($val, $user_id);
            if ($serializedArr == false) {
                return response()->json([
                    'status' => false,
                    'msg' => 'You have already Voted for this'
                ]);
            }
            $item->thirty = $serializedArr;
        } elseif ($request->board == 40) {

            $val = $item->fourty;
            $serializedArr = $this->checkData($val, $user_id);
            if ($serializedArr == false) {
                return response()->json([
                    'status' => false,
                    'msg' => 'You have already Voted for this'
                ]);
            }
            $item->fourty = $serializedArr;
        } elseif ($request->board == 50) {

            $val = $item->fifty;
            $serializedArr = $this->checkData($val, $user_id);
            if ($serializedArr == false) {
                return response()->json([
                    'status' => false,
                    'msg' => 'You have already Voted for this'
                ]);
            }
            $item->fifty = $serializedArr;
        } elseif ($request->board == 'others') {

            $val = $item->others;
            $serializedArr = $this->checkData($val, $user_id);
            if ($serializedArr == false) {
                return response()->json([
                    'status' => false,
                    'msg' => 'You have already Voted for this'
                ]);
            }
            $item->others = $serializedArr;
        }

        $item->save();

        return response()->json([
            'status' => true,
            'board' => $request->board == 'others' ? 'others' : intval($request->board),
            'array' => json_decode($serializedArr)
        ]);

        // $user_id = auth()->user()->id;

        // $item = Board::find($request->id);

        // // dd($item->toArray());
        // if ($request->board == 10) {

        //     $val = $item->ten;
        //     $serializedArr = $this->checkData($val, $user_id);

        //     $item->ten = $serializedArr;
        // } elseif ($request->board == 20) {

        //     $val = $item->twenty;
        //     $serializedArr = $this->checkData($val, $user_id);
        //     $item->twenty = $serializedArr;
        // } elseif ($request->board == 30) {

        //     $val = $item->thirty;
        //     $serializedArr = $this->checkData($val, $user_id);
        //     $item->thirty = $serializedArr;
        // } elseif ($request->board == 40) {

        //     $val = $item->fourty;
        //     $serializedArr = $this->checkData($val, $user_id);
        //     $item->fourty = $serializedArr;
        // } elseif ($request->board == 50) {

        //     $val = $item->fifty;
        //     $serializedArr = $this->checkData($val, $user_id);
        //     $item->fifty = $serializedArr;
        // } elseif ($request->board == 'others') {

        //     $val = $item->others;

        //     $price = $request->price;

        //     $serializedArr = $this->checkData($val, $user_id);
        //     $item->others = $serializedArr;
        // }

        // $item->save();

        // if($request->board == 'others'){
        //     $BoardOther = new BoardOther();
        //     $BoardOther->board_id = $item->id;
        //     $BoardOther->user_id = $user_id;
        //     $BoardOther->price = $request->price;
        //     $BoardOther->save();
        // }


        // return response()->json([
        //     'status' => true,
        //     'board' => $request->board == 'others' ? 'others' : intval($request->board),
        //     'array' => json_decode($serializedArr)
        // ]);
    }

    // public function check()
    // {
    //     $data = Board::where('winning_board', null)->get();
    //     $date = Carbon::now();

    //     foreach ($data as $key => $item) {

    //         if ($date->format('Y-m-d') == $item->voting_deadline) {

    //             if ($item->ten == 0) {
    //                 $count_ten = 0;
    //             } else {
    //                 $count_ten = count(json_decode($item->ten));
    //             }

    //             if ($item->twenty == 0) {
    //                 $count_twenty = 0;
    //             } else {
    //                 $count_twenty = count(json_decode($item->twenty));
    //             }

    //             if ($item->thirty == 0) {
    //                 $count_thirty = 0;
    //             } else {
    //                 $count_thirty = count(json_decode($item->thirty));
    //             }

    //             if ($item->fourty == 0) {
    //                 $count_fourty = 0;
    //             } else {
    //                 $count_fourty =  count(json_decode($item->fourty));
    //             }

    //             if ($item->fifty == 0) {
    //                 $count_fifty = 0;
    //             } else {
    //                 $count_fifty = count(json_decode($item->fifty));
    //             }

    //             if ($item->others == 0) {
    //                 $count_others = 0;
    //             } else {
    //                 $count_others = count(json_decode($item->others));
    //             }

    //             $array  = [
    //                 'ten' => $count_ten,
    //                 'twenty' => $count_twenty,
    //                 'thirty' => $count_thirty,
    //                 'fourty' => $count_fourty,
    //                 'fifty' => $count_fifty,
    //                 'others' => $count_others
    //             ];

    //             arsort($array);

    //             $newArray = array_slice($array, 0, 2);

    //             $keys = array_keys($newArray);

    //             foreach ($keys as $key => $list) {
    //                 // echo $list;
    //                 $data = new GameBoard();
    //                 $data->board_id =  $item->id;
    //                 if ($list == 'ten') {

    //                     $data->price = 10;
    //                 } elseif ($list == 'twenty') {

    //                     $data->price = 20;
    //                 } elseif ($list == 'thirty') {

    //                     $data->price = 30;
    //                 } elseif ($list == 'fourty') {

    //                     $data->price = 40;
    //                 } elseif ($list == 'fifty') {

    //                     $data->price = 50;
    //                 } elseif ($list == 'others') {

    //                     $data->price = 0;
    //                 }
    //                 $data->save();


    //                 $q1x = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

    //                 $shuffledArrays = [];

    //                 for ($i = 1; $i <= 8; $i++) {

    //                     $shuffledArray = $q1x;
    //                     shuffle($shuffledArray);
    //                     $shuffledArrays[] = $shuffledArray;
    //                 }

    //                 $data = GameBoard::find($data->id);
    //                 $data->q1x = json_encode($shuffledArrays[0]);
    //                 $data->q2x = json_encode($shuffledArrays[1]);
    //                 $data->q3x = json_encode($shuffledArrays[2]);
    //                 $data->q4x = json_encode($shuffledArrays[3]);
    //                 $data->q1y = json_encode($shuffledArrays[4]);
    //                 $data->q2y = json_encode($shuffledArrays[5]);
    //                 $data->q3y = json_encode($shuffledArrays[6]);
    //                 $data->q4y = json_encode($shuffledArrays[7]);
    //                 $data->save();
    //             }

    //             $board = Board::where('id', $item->id)
    //                 ->update(['winning_board' => [$keys[0], $keys[1]]]);
    //         }
    //     }
    // }

    // functionality start 
    //  public function check()
    //  {
    //      $date = Carbon::now()->format('Y-m-d');

    //      $baord = Board::where('game_date', $date)->get();

    //      foreach ($baord as $value) {
    //          $num = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

    //          $percentageArr = ["9", "6", "3", "3", "9", "6", "3", "3", "9", "6", "3", "3", "17", "12", "4", "4"];

    //          $winningBoard = json_decode($value->winning_board);


    //          $price = $this->convertIntoNumber($winningBoard[0], $winningBoard[1]);


    //          // check data exist in the table or not. 
    //          $winningBoard1 = WinningUser::where(['board_id' => $value->id, 'board_price' => $price[0]])->first();
    //          $winningBoard2 = WinningUser::where(['board_id' => $value->id, 'board_price' => $price[1]])->first();

    //         //  dd($winningBoard1);

    //          if ($winningBoard1 == null) {

    //              $scoreNumber = $this->shuffleNumber($num);

    //              $data1 =  $this->winningUsersDataGet($scoreNumber, $value->id, $price[0]);

    //              //Percentage start
    //              $percentage = $this->percentage($price[0]);

    //              $insertUsersData = $this->insertWinningUsers($scoreNumber, $data1, $percentage, $percentageArr, $value->id, $price[0]);
    //          }

    //          if ($winningBoard2 == null) {
    //              $scoreNumber2 = $this->shuffleNumber($num);
    //              $data2 =  $this->winningUsersDataGet($scoreNumber2, $value->id, $price[1]);
    //              $percentage2 = $this->percentage($price[1]);

    //              $insertUsersData = $this->insertWinningUsers($scoreNumber2, $data2, $percentage2, $percentageArr, $value->id, $price[1]);
    //          }
    //      }

    //  }


    // function plus2($Number)
    // {
    //     if ((int)$Number == 9) {
    //         $addedValue = 1;
    //     } elseif ((int)$Number == 8) {
    //         $addedValue = 0;
    //     } else {
    //         $addedValue = (int)$Number + 2;
    //     }

    //     return $addedValue;
    // }

    // function minus2($Number)
    // {
    //     if ((int)$Number[0] == 1) {
    //         $minusValue = 9;
    //     } elseif ((int)$Number[0] == 0) {
    //         $minusValue = 8;
    //     } else {
    //         $minusValue = (int)$Number[0] - 2;
    //     }
    //     return $minusValue;
    // }

    // function setWinner($board_id, $price, $qtrx, $qtry, $first, $second, $firstValuePlus, $secondValuePlus, $firstValueMinus, $secondValueMinus)
    // {

    //     $rightWay = SquareBuy::with('user')->where(['board_id' => $board_id, 'price' => $price])->where($qtrx, $first)->where($qtry, $second)->first();

    //     $wrongWay = SquareBuy::with('user')->where(['board_id' => $board_id, 'price' => $price])->where($qtrx, $second)->where($qtry, $first)->first();

    //     $plus2 = SquareBuy::with('user')->where(['board_id' => $board_id, 'price' => $price])->where($qtrx, $firstValuePlus)->where($qtry, $secondValuePlus)->first();

    //     $minus2 = SquareBuy::with('user')->where(['board_id' => $board_id, 'price' => $price])->where($qtrx, $firstValueMinus)->where($qtry, $secondValueMinus)->first();

    //     $arr = ['rightWay' => $rightWay, 'wrongWay' => $wrongWay, 'plus2' => $plus2, 'minus2' => $minus2];

    //     return $arr;
    // }

    // public function shuffleNumber($num)
    // {
    //     $shuffledNumber = "";

    //     for ($i = 1; $i <= 6; $i++) {

    //         $shuffledArray = $num;
    //         shuffle($shuffledArray);
    //         $shuffledNumber = $shuffledArray;
    //     }

    //     $arr = [$shuffledNumber[0], $shuffledNumber[1], $shuffledNumber[2], $shuffledNumber[3], $shuffledNumber[4], $shuffledNumber[5], $shuffledNumber[6], $shuffledNumber[7]];
    //     return $arr;
    // }

    // public function convertIntoNumber($val, $val2)
    // {
    //     $string = strtolower($val);
    //     $string2 = strtolower($val2);

    //     $numberMap = [
    //         'ten' => 10,
    //         'twenty' => 20,
    //         'thirty' => 30,
    //         'fourth' => 40,
    //         'fifty' => 50,
    //         'others' => 'others',
    //     ];

    //     $arr = [];
    //     if (array_key_exists($string, $numberMap)) {
    //         $arr[] = $numberMap[$string];
    //     } else {
    //         return null;
    //     }

    //     if (array_key_exists($string2, $numberMap)) {
    //         $arr[] = $numberMap[$string2];
    //     } else {
    //         return null;
    //     }

    //     return $arr;
    // }

    // public function setUserWinnerFunc($FirstArr, $SecondArr, $ThirdArr, $FourthArr)
    // {
    //     $Firstqtr1 = "$FirstArr[0]";
    //     $Firstqtr2 = "$FirstArr[1]";

    //     $Secondqtr1 = "$SecondArr[0]";
    //     $Secondqtr2 = "$SecondArr[1]";

    //     $Thirdqtr1 = "$ThirdArr[0]";
    //     $Thirdqtr2 = "$ThirdArr[1]";

    //     $Fourthqtr1 = "$FourthArr[0]";
    //     $Fourthqtr2 = "$FourthArr[1]";

    //     return [$Firstqtr1, $Firstqtr2, $Secondqtr1, $Secondqtr2, $Thirdqtr1, $Thirdqtr2, $Fourthqtr1, $Fourthqtr2];
    // }

    // public function setWinnerFourthFunc($setWinnerFourthQtrArr)
    // {

    //     $rightWayQtr = [];
    //     $rightWayUserId = [];
    //     if ($setWinnerFourthQtrArr['rightWay']) {
    //         $rightWayUserId[] = $setWinnerFourthQtrArr['rightWay']->user_id;
    //         $rightWayQtr[] = $setWinnerFourthQtrArr['rightWay']->q1x;
    //         $rightWayQtr[] = $setWinnerFourthQtrArr['rightWay']->q1y;
    //     } else {
    //         $rightWayUserId[] = 'null';
    //         $rightWayQtr[] = 'null';
    //         $rightWayQtr[] = 'null';
    //     }


    //     $wrongWayQtr = [];
    //     $wrongWayUserId = [];
    //     if ($setWinnerFourthQtrArr['wrongWay']) {
    //         $wrongWayUserId[] = $setWinnerFourthQtrArr['wrongWay']->user_id;
    //         $wrongWayQtr[] = $setWinnerFourthQtrArr['wrongWay']->q1x;
    //         $wrongWayQtr[] = $setWinnerFourthQtrArr['wrongWay']->q1y;
    //     } else {
    //         $wrongWayUserId[] = 'null';
    //         $wrongWayQtr[] = 'null';
    //         $wrongWayQtr[] = 'null';
    //     }

    //     $plus2Qtr = [];
    //     $plus2UserId = [];
    //     if ($setWinnerFourthQtrArr['plus2']) {
    //         $plus2UserId[] =  $setWinnerFourthQtrArr['plus2']->user_id;
    //         $plus2Qtr[] =  $setWinnerFourthQtrArr['plus2']->q1x;
    //         $plus2Qtr[] =  $setWinnerFourthQtrArr['plus2']->q1y;
    //     } else {
    //         $plus2UserId[] = 'null';
    //         $plus2Qtr[] = 'null';
    //         $plus2Qtr[] = 'null';
    //     }

    //     $minus2Qtr = [];
    //     $minus2UserId = [];
    //     if ($setWinnerFourthQtrArr['minus2']) {
    //         $minus2UserId[] = $setWinnerFourthQtrArr['minus2']->user_id;
    //         $minus2Qtr[] = $setWinnerFourthQtrArr['minus2']->q1x;
    //         $minus2Qtr[] = $setWinnerFourthQtrArr['minus2']->q1y;
    //     } else {
    //         $minus2UserId[] = 'null';
    //         $minus2Qtr[] = 'null';
    //         $minus2Qtr[] = 'null';
    //     }

    //     return $rightWayDataArr = ['rightWayFourthQtr' => $rightWayQtr, 'rightWayFourthUserId' => $rightWayUserId, 'wrongWayFourthQtr' => $wrongWayQtr, 'wrongWayFourthUserId' => $wrongWayUserId, 'plus2FourthQtr' => $plus2Qtr, 'plus2FourthUserId' => $plus2UserId, 'minus2FourthQtr' => $minus2Qtr, 'minus2FourthUserId' => $minus2UserId];
    // }

    // public function setWinnerThirdFunc($setWinnerThirdQtrArr)
    // {

    //     $rightWayQtr = [];
    //     $rightWayUserId = [];
    //     if ($setWinnerThirdQtrArr['rightWay']) {
    //         $rightWayUserId[] = $setWinnerThirdQtrArr['rightWay']->user_id;
    //         $rightWayQtr[] = $setWinnerThirdQtrArr['rightWay']->q1x;
    //         $rightWayQtr[] = $setWinnerThirdQtrArr['rightWay']->q1y;
    //     } else {
    //         $rightWayUserId[] = 'null';
    //         $rightWayQtr[] = 'null';
    //         $rightWayQtr[] = 'null';
    //     }


    //     $wrongWayQtr = [];
    //     $wrongWayUserId = [];
    //     if ($setWinnerThirdQtrArr['wrongWay']) {
    //         $wrongWayUserId[] = $setWinnerThirdQtrArr['wrongWay']->user_id;
    //         $wrongWayQtr[] = $setWinnerThirdQtrArr['wrongWay']->q1x;
    //         $wrongWayQtr[] = $setWinnerThirdQtrArr['wrongWay']->q1y;
    //     } else {
    //         $wrongWayUserId[] = 'null';
    //         $wrongWayQtr[] = 'null';
    //         $wrongWayQtr[] = 'null';
    //     }

    //     $plus2Qtr = [];
    //     $plus2UserId = [];
    //     if ($setWinnerThirdQtrArr['plus2']) {
    //         $plus2UserId[] =  $setWinnerThirdQtrArr['plus2']->user_id;
    //         $plus2Qtr[] =  $setWinnerThirdQtrArr['plus2']->q1x;
    //         $plus2Qtr[] =  $setWinnerThirdQtrArr['plus2']->q1y;
    //     } else {
    //         $plus2UserId[] = 'null';
    //         $plus2Qtr[] = 'null';
    //         $plus2Qtr[] = 'null';
    //     }

    //     $minus2Qtr = [];
    //     $minus2UserId = [];
    //     if ($setWinnerThirdQtrArr['minus2']) {
    //         $minus2UserId[] = $setWinnerThirdQtrArr['minus2']->user_id;
    //         $minus2Qtr[] = $setWinnerThirdQtrArr['minus2']->q1x;
    //         $minus2Qtr[] = $setWinnerThirdQtrArr['minus2']->q1y;
    //     } else {
    //         $minus2UserId[] = 'null';
    //         $minus2Qtr[] = 'null';
    //         $minus2Qtr[] = 'null';
    //     }

    //     return $rightWayDataArr = ['rightWayThirdQtr' => $rightWayQtr, 'rightWayThirdUserId' => $rightWayUserId, 'wrongWayThirdQtr' => $wrongWayQtr, 'wrongWayThirdUserId' => $wrongWayUserId, 'plus2ThirdQtr' => $plus2Qtr, 'plus2ThirdUserId' => $plus2UserId, 'minus2ThirdQtr' => $minus2Qtr, 'minus2ThirdUserId' => $minus2UserId];
    // }

    // public function setWinnerSecondFunc($setWinnerSecondQtrArr)
    // {

    //     $rightWayQtr = [];
    //     $rightWayUserId = [];
    //     if ($setWinnerSecondQtrArr['rightWay']) {
    //         $rightWayUserId[] = $setWinnerSecondQtrArr['rightWay']->user_id;
    //         $rightWayQtr[] = $setWinnerSecondQtrArr['rightWay']->q1x;
    //         $rightWayQtr[] = $setWinnerSecondQtrArr['rightWay']->q1y;
    //     } else {
    //         $rightWayUserId[] = 'null';
    //         $rightWayQtr[] = 'null';
    //         $rightWayQtr[] = 'null';
    //     }


    //     $wrongWayQtr = [];
    //     $wrongWayUserId = [];
    //     if ($setWinnerSecondQtrArr['wrongWay']) {
    //         $wrongWayUserId[] = $setWinnerSecondQtrArr['wrongWay']->user_id;
    //         $wrongWayQtr[] = $setWinnerSecondQtrArr['wrongWay']->q1x;
    //         $wrongWayQtr[] = $setWinnerSecondQtrArr['wrongWay']->q1y;
    //     } else {
    //         $wrongWayUserId[] = 'null';
    //         $wrongWayQtr[] = 'null';
    //         $wrongWayQtr[] = 'null';
    //     }

    //     $plus2Qtr = [];
    //     $plus2UserId = [];
    //     if ($setWinnerSecondQtrArr['plus2']) {
    //         $plus2UserId[] =  $setWinnerSecondQtrArr['plus2']->user_id;
    //         $plus2Qtr[] =  $setWinnerSecondQtrArr['plus2']->q1x;
    //         $plus2Qtr[] =  $setWinnerSecondQtrArr['plus2']->q1y;
    //     } else {
    //         $plus2UserId[] = 'null';
    //         $plus2Qtr[] = 'null';
    //         $plus2Qtr[] = 'null';
    //     }

    //     $minus2Qtr = [];
    //     $minus2UserId = [];
    //     if ($setWinnerSecondQtrArr['minus2']) {
    //         $minus2UserId[] = $setWinnerSecondQtrArr['minus2']->user_id;
    //         $minus2Qtr[] = $setWinnerSecondQtrArr['minus2']->q1x;
    //         $minus2Qtr[] = $setWinnerSecondQtrArr['minus2']->q1y;
    //     } else {
    //         $minus2UserId[] = 'null';
    //         $minus2Qtr[] = 'null';
    //         $minus2Qtr[] = 'null';
    //     }

    //     return $rightWayDataArr = ['rightWaySecondQtr' => $rightWayQtr, 'rightWaySecondUserId' => $rightWayUserId, 'wrongWaySecondQtr' => $wrongWayQtr, 'wrongWaySecondUserId' => $wrongWayUserId, 'plus2SecondQtr' => $plus2Qtr, 'plus2SecondUserId' => $plus2UserId, 'minus2SecondQtr' => $minus2Qtr, 'minus2SecondUserId' => $minus2UserId];
    // }

    // public function setWinnerFirstFunc($setWinnerFirstQtrArr)
    // {

    //     $rightWayQtr = [];
    //     $rightWayUserId = [];
    //     if ($setWinnerFirstQtrArr['rightWay']) {
    //         $rightWayUserId[] = $setWinnerFirstQtrArr['rightWay']->user_id;
    //         $rightWayQtr[] = $setWinnerFirstQtrArr['rightWay']->q1x;
    //         $rightWayQtr[] = $setWinnerFirstQtrArr['rightWay']->q1y;
    //     } else {
    //         $rightWayUserId[] = 'null';
    //         $rightWayQtr[] = 'null';
    //         $rightWayQtr[] = 'null';
    //     }


    //     $wrongWayQtr = [];
    //     $wrongWayUserId = [];
    //     if ($setWinnerFirstQtrArr['wrongWay']) {
    //         $wrongWayUserId[] = $setWinnerFirstQtrArr['wrongWay']->user_id;
    //         $wrongWayQtr[] = $setWinnerFirstQtrArr['wrongWay']->q1x;
    //         $wrongWayQtr[] = $setWinnerFirstQtrArr['wrongWay']->q1y;
    //     } else {
    //         $wrongWayUserId[] = 'null';
    //         $wrongWayQtr[] = 'null';
    //         $wrongWayQtr[] = 'null';
    //     }

    //     $plus2Qtr = [];
    //     $plus2UserId = [];
    //     if ($setWinnerFirstQtrArr['plus2']) {
    //         $plus2UserId[] =  $setWinnerFirstQtrArr['plus2']->user_id;
    //         $plus2Qtr[] =  $setWinnerFirstQtrArr['plus2']->q1x;
    //         $plus2Qtr[] =  $setWinnerFirstQtrArr['plus2']->q1y;
    //     } else {
    //         $plus2UserId[] = 'null';
    //         $plus2Qtr[] = 'null';
    //         $plus2Qtr[] = 'null';
    //     }

    //     $minus2Qtr = [];
    //     $minus2UserId = [];
    //     if ($setWinnerFirstQtrArr['minus2']) {
    //         $minus2UserId[] = $setWinnerFirstQtrArr['minus2']->user_id;
    //         $minus2Qtr[] = $setWinnerFirstQtrArr['minus2']->q1x;
    //         $minus2Qtr[] = $setWinnerFirstQtrArr['minus2']->q1y;
    //     } else {
    //         $minus2UserId[] = 'null';
    //         $minus2Qtr[] = 'null';
    //         $minus2Qtr[] = 'null';
    //     }

    //     return $rightWayDataArr = ['rightWayFirstQtr' => $rightWayQtr, 'rightWayFirstUserId' => $rightWayUserId, 'wrongWayFirstQtr' => $wrongWayQtr, 'wrongWayFirstUserId' => $wrongWayUserId, 'plus2FirstQtr' => $plus2Qtr, 'plus2FirstUserId' => $plus2UserId, 'minus2FirstQtr' => $minus2Qtr, 'minus2FirstUserId' => $minus2UserId];
    // }

    // public function winningUsersDataGet($scoreNumber, $id, $price)
    // {

    //     //plus
    //     $firstValuePlus = $this->plus2($scoreNumber[0]);
    //     $secondFirstValuePlus = $this->plus2($scoreNumber[1]);

    //     $secondValuePlus = $this->plus2($scoreNumber[2]);
    //     $secondSecondValuePlus = $this->plus2($scoreNumber[3]);

    //     $thirdValuePlus = $this->plus2($scoreNumber[4]);
    //     $secondThirdValuePlus = $this->plus2($scoreNumber[5]);

    //     $fourthValuePlus = $this->plus2($scoreNumber[6]);
    //     $secondFourthValuePlus = $this->plus2($scoreNumber[7]);

    //     //minus
    //     $firstValueMinus = $this->minus2($scoreNumber[0]);
    //     $secondFirstValueMinus = $this->minus2($scoreNumber[1]);

    //     $secondValueMinus = $this->minus2($scoreNumber[2]);
    //     $secondSecondValueMinus = $this->minus2($scoreNumber[3]);

    //     $thirdValueMinus = $this->minus2($scoreNumber[4]);
    //     $secondThirdValueMinus = $this->minus2($scoreNumber[5]);

    //     $fourthValueMinus = $this->minus2($scoreNumber[6]);
    //     $secondFourthValueMinus = $this->minus2($scoreNumber[7]);


    //     $qtr1x = 'q1x';
    //     $qtr1y = 'q1y';
    //     $first = $scoreNumber[0];
    //     $second = $scoreNumber[1];

    //     $setWinnerFirst =  $this->setWinner($id, $price, $qtr1x, $qtr1y, $first, $second, $firstValuePlus, $secondFirstValuePlus, $firstValueMinus, $secondFirstValueMinus);

    //     $qtr2x = 'q2x';
    //     $qtr2y = 'q2y';
    //     $firstSecond = $scoreNumber[2];
    //     $secondSecond = $scoreNumber[3];

    //     $setWinnerSecond =  $this->setWinner($id, $price, $qtr2x, $qtr2y, $firstSecond, $secondSecond, $secondValuePlus, $secondSecondValuePlus, $secondValueMinus, $secondSecondValueMinus);

    //     $qtr3x = 'q3x';
    //     $qtr3y = 'q3y';
    //     $firstThird = $scoreNumber[4];
    //     $secondThird = $scoreNumber[5];

    //     $setWinnerThird =  $this->setWinner($id, $price, $qtr3x, $qtr3y, $firstThird, $secondThird, $thirdValuePlus, $secondThirdValuePlus, $thirdValueMinus, $secondThirdValueMinus);

    //     $qtr4x = 'q4x';
    //     $qtr4y = 'q4y';
    //     $firstFourth = $scoreNumber[6];
    //     $secondFourth = $scoreNumber[7];

    //     $setWinnerFourth =  $this->setWinner($id, $price, $qtr4x, $qtr4y, $firstFourth, $secondFourth, $fourthValuePlus, $secondFourthValuePlus, $fourthValueMinus, $secondFourthValueMinus);


    //     $setWinnerFirstFunc = $this->setWinnerFirstFunc($setWinnerFirst);

    //     $setWinnerSecondFunc = $this->setWinnerSecondFunc($setWinnerSecond);

    //     $setWinnerThirdFunc = $this->setWinnerThirdFunc($setWinnerThird);

    //     $setWinnerFourthFunc = $this->setWinnerFourthFunc($setWinnerFourth);

    //     // RIGHT WAY START
    //     $rwFirstArr = $setWinnerFirstFunc['rightWayFirstQtr'];
    //     $rwSecondArr = $setWinnerSecondFunc['rightWaySecondQtr'];
    //     $rwThirdArr = $setWinnerThirdFunc['rightWayThirdQtr'];
    //     $rwFourthArr = $setWinnerFourthFunc['rightWayFourthQtr'];

    //     $rightWayGetArr = $this->setUserWinnerFunc($rwFirstArr, $rwSecondArr, $rwThirdArr, $rwFourthArr);

    //     // user id  START
    //     $rwfuid1 = $setWinnerFirstFunc['rightWayFirstUserId'][0];
    //     $rwsuid1 = $setWinnerSecondFunc['rightWaySecondUserId'][0];
    //     $rwtuid1 = $setWinnerThirdFunc['rightWayThirdUserId'][0];
    //     $rwftuid1 = $setWinnerFourthFunc['rightWayFourthUserId'][0];
    //     // user id END
    //     $rightWayUserIdArr = ["$rwfuid1", "$rwsuid1", "$rwtuid1", "$rwftuid1"];
    //     // RIGHT WAY END


    //     // WRONG WAY START
    //     $wrongWayFirstArr = $setWinnerFirstFunc['wrongWayFirstQtr'];
    //     $wrongWaySecondArr = $setWinnerSecondFunc['wrongWaySecondQtr'];
    //     $wrongWayThirdArr = $setWinnerThirdFunc['wrongWayThirdQtr'];
    //     $wrongWayFourthArr = $setWinnerFourthFunc['wrongWayFourthQtr'];

    //     $wrongWayGetArr = $this->setUserWinnerFunc($wrongWayFirstArr, $wrongWaySecondArr, $wrongWayThirdArr, $wrongWayFourthArr);

    //     // user id START
    //     $wrongWayfuid1 = $setWinnerFirstFunc['wrongWayFirstUserId'][0];
    //     $wrongWaysuid1 = $setWinnerSecondFunc['wrongWaySecondUserId'][0];
    //     $wrongWaytuid1 = $setWinnerThirdFunc['wrongWayThirdUserId'][0];
    //     $wrongWayftuid1 = $setWinnerFourthFunc['wrongWayFourthUserId'][0];
    //     // user id END
    //     $wrongWayUserIdArr = ["$wrongWayfuid1", "$wrongWaysuid1", "$wrongWaytuid1", "$wrongWayftuid1"];
    //     // WRONG WAY END

    //     // PLUS 2 WAY START
    //     $plus2FirstArr = $setWinnerFirstFunc['plus2FirstQtr'];
    //     $plus2SecondArr = $setWinnerSecondFunc['plus2SecondQtr'];
    //     $plus2ThirdArr = $setWinnerThirdFunc['plus2ThirdQtr'];
    //     $plus2FourthArr = $setWinnerFourthFunc['plus2FourthQtr'];

    //     $plus2GetArr = $this->setUserWinnerFunc($plus2FirstArr, $plus2SecondArr, $plus2ThirdArr, $plus2FourthArr);

    //     // user id START
    //     $plus2fuid1 = $setWinnerFirstFunc['plus2FirstUserId'][0];
    //     $plus2suid1 = $setWinnerSecondFunc['plus2SecondUserId'][0];
    //     $plus2tuid1 = $setWinnerThirdFunc['plus2ThirdUserId'][0];
    //     $plus2ftuid1 = $setWinnerFourthFunc['plus2FourthUserId'][0];
    //     // user id END
    //     $plus2UserIdArr = ["$plus2fuid1", "$plus2suid1", "$plus2tuid1", "$plus2ftuid1"];
    //     // PLUS 2 END


    //     // MINUS 2 WAY START
    //     $minus2FirstArr = $setWinnerFirstFunc['minus2FirstQtr'];
    //     $minus2SecondArr = $setWinnerSecondFunc['minus2SecondQtr'];
    //     $minus2ThirdArr = $setWinnerThirdFunc['minus2ThirdQtr'];
    //     $minus2FourthArr = $setWinnerFourthFunc['minus2FourthQtr'];

    //     $minus2GetArr = $this->setUserWinnerFunc($minus2FirstArr, $minus2SecondArr, $minus2ThirdArr, $minus2FourthArr);

    //     // user id START
    //     $minus2fuid1 = $setWinnerFirstFunc['minus2FirstUserId'][0];
    //     $minus2suid1 = $setWinnerSecondFunc['minus2SecondUserId'][0];
    //     $minus2tuid1 = $setWinnerThirdFunc['minus2ThirdUserId'][0];
    //     $minus2ftuid1 = $setWinnerFourthFunc['minus2FourthUserId'][0];
    //     // user id END
    //     $minus2UserIdArr = ["$minus2fuid1", "$minus2suid1", "$minus2tuid1", "$minus2ftuid1"];
    //     // MINUS 2 END

    //     $data = ['rightWayGetArr' => $rightWayGetArr, 'wrongWayGetArr' => $wrongWayGetArr, 'plus2GetArr' => $plus2GetArr, 'minus2GetArr' => $minus2GetArr];
    //     $ids = ['rightWayUserIdArr' => $rightWayUserIdArr, 'wrongWayUserIdArr' => $wrongWayUserIdArr, 'plus2UserIdArr' => $plus2UserIdArr, 'minus2UserIdArr' => $minus2UserIdArr];

    //     return $arr = [$data, $ids];
    // }

    // public function percentage($price)
    // {
    //     $totalAmount = $price * 100;

    //     $adminPercentage = $totalAmount / 100 * 20;

    //     $usersPercentage = $totalAmount - $adminPercentage;


    //     $percentage9 = $usersPercentage / 100 * 9;
    //     $percentage6 = $usersPercentage / 100 * 6;
    //     $percentage3 = $usersPercentage / 100 * 3;
    //     $percentage17 = $usersPercentage / 100 * 17;
    //     $percentage12 = $usersPercentage / 100 * 12;
    //     $percentage4 = $usersPercentage / 100 * 4;

    //     return $arr = ['9' => $percentage9, '6' => $percentage6, '3' => $percentage3, '17' => $percentage17, '12' => $percentage12, '4' => $percentage4];
    // }

    // public function insertWinningUsers($scoreNumber, $data, $percentage, $percentageArr, $boardId, $price)
    // {
    //     $rightWayPercentage = ['$'.$percentage[9], '$'.$percentage[9], '$'.$percentage[9], '$'.$percentage[17]];

    //     $wrongWayPercentage = ['$'.$percentage[6], '$'.$percentage[6], '$'.$percentage[6], '$'.$percentage[12]];

    //     $plus2_minus2_Percentage = ['$'.$percentage[3], '$'.$percentage[3], '$'.$percentage[3], '$'.$percentage[4]];

    //     $post = WinningUser::updateOrCreate([
    //         'board_id' => $boardId,
    //         'board_price' => $price
    //     ], [
    //         'board_id' => $boardId,
    //         'board_price' => $price,
    //         'percentage' => json_encode($percentageArr),
    //         'score' => json_encode($scoreNumber),
    //         'winning_number' => json_encode($scoreNumber),

    //         'right_way' => json_encode($data[0]['rightWayGetArr']),
    //         'right_way_name' => json_encode($data[1]['rightWayUserIdArr']),

    //         'right_way_price' => json_encode($rightWayPercentage),

    //         'wrong_way' => json_encode($data[0]['wrongWayGetArr']),
    //         'wrong_way_name' => json_encode($data[1]['wrongWayUserIdArr']),

    //         'wrong_way_price' => json_encode($wrongWayPercentage),

    //         'plus2' => json_encode($data[0]['plus2GetArr']),
    //         'plus2_name' => json_encode($data[1]['plus2UserIdArr']),

    //         'plus2_price' => json_encode($plus2_minus2_Percentage),

    //         'minus2' => json_encode($data[0]['minus2GetArr']),
    //         'minus2_name' => json_encode($data[1]['minus2UserIdArr']),

    //         'minus2_price' => json_encode($plus2_minus2_Percentage)
    //     ]);
    // }
}
