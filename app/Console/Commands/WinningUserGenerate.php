<?php

namespace App\Console\Commands;

use App\Models\Board;
use App\Models\SquareBuy;
use App\Models\WinningUser;
use Carbon\Carbon;
use Illuminate\Console\Command;

class WinningUserGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:winning-user-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $this->check();
    }

    private function plus2($Number)
    {
        if ((int)$Number == 9) {
            $addedValue = 1;
        } elseif ((int)$Number == 8) {
            $addedValue = 0;
        } else {
            $addedValue = (int)$Number + 2;
        }

        return $addedValue;
    }

    private function minus2($Number)
    {
        if ((int)$Number[0] == 1) {
            $minusValue = 9;
        } elseif ((int)$Number[0] == 0) {
            $minusValue = 8;
        } else {
            $minusValue = (int)$Number[0] - 2;
        }
        return $minusValue;
    }

    private function setWinner($board_id, $price, $qtrx, $qtry, $first, $second, $firstValuePlus, $secondValuePlus, $firstValueMinus, $secondValueMinus)
    {

        $rightWay = SquareBuy::with('user')->where(['board_id' => $board_id, 'price' => $price])->where($qtrx, $first)->where($qtry, $second)->first();

        $wrongWay = SquareBuy::with('user')->where(['board_id' => $board_id, 'price' => $price])->where($qtrx, $second)->where($qtry, $first)->first();

        $plus2 = SquareBuy::with('user')->where(['board_id' => $board_id, 'price' => $price])->where($qtrx, $firstValuePlus)->where($qtry, $secondValuePlus)->first();

        $minus2 = SquareBuy::with('user')->where(['board_id' => $board_id, 'price' => $price])->where($qtrx, $firstValueMinus)->where($qtry, $secondValueMinus)->first();
        $arr = ['rightWay' => $rightWay, 'wrongWay' => $wrongWay, 'plus2' => $plus2, 'minus2' => $minus2];

        return $arr;
    }

    private function shuffleNumber($num)
    {
        $shuffledNumber = "";

        for ($i = 1; $i <= 6; $i++) {

            $shuffledArray = $num;
            shuffle($shuffledArray);
            $shuffledNumber = $shuffledArray;
        }

        $arr = [$shuffledNumber[0], $shuffledNumber[1], $shuffledNumber[2], $shuffledNumber[3], $shuffledNumber[4], $shuffledNumber[5], $shuffledNumber[6], $shuffledNumber[7]];
        return $arr;
    }

    private  function convertIntoNumber($val, $val2)
    {
        $string = strtolower($val);
        $string2 = strtolower($val2);

        $numberMap = [
            'ten' => 10,
            'twenty' => 20,
            'thirty' => 30,
            'fourth' => 40,
            'fifty' => 50,
            'others' => 'others',
        ];

        $arr = [];
        if (array_key_exists($string, $numberMap)) {
            $arr[] = $numberMap[$string];
        } else {
            return null;
        }

        if (array_key_exists($string2, $numberMap)) {
            $arr[] = $numberMap[$string2];
        } else {
            return null;
        }

        return $arr;
    }

    private  function setUserWinnerFunc($FirstArr, $SecondArr, $ThirdArr, $FourthArr)
    {
        $Firstqtr1 = "$FirstArr[0]";
        $Firstqtr2 = "$FirstArr[1]";

        $Secondqtr1 = "$SecondArr[0]";
        $Secondqtr2 = "$SecondArr[1]";

        $Thirdqtr1 = "$ThirdArr[0]";
        $Thirdqtr2 = "$ThirdArr[1]";

        $Fourthqtr1 = "$FourthArr[0]";
        $Fourthqtr2 = "$FourthArr[1]";

        return [$Firstqtr1, $Firstqtr2, $Secondqtr1, $Secondqtr2, $Thirdqtr1, $Thirdqtr2, $Fourthqtr1, $Fourthqtr2];
    }

    private  function setWinnerFourthFunc($setWinnerFourthQtrArr)
    {

        $rightWayQtr = [];
        $rightWayUserId = [];
        if ($setWinnerFourthQtrArr['rightWay']) {
            $rightWayUserId[] = $setWinnerFourthQtrArr['rightWay']->user_id;
            $rightWayQtr[] = $setWinnerFourthQtrArr['rightWay']->q1x;
            $rightWayQtr[] = $setWinnerFourthQtrArr['rightWay']->q1y;
        } else {
            $rightWayUserId[] = 'null';
            $rightWayQtr[] = 'null';
            $rightWayQtr[] = 'null';
        }


        $wrongWayQtr = [];
        $wrongWayUserId = [];
        if ($setWinnerFourthQtrArr['wrongWay']) {
            $wrongWayUserId[] = $setWinnerFourthQtrArr['wrongWay']->user_id;
            $wrongWayQtr[] = $setWinnerFourthQtrArr['wrongWay']->q1x;
            $wrongWayQtr[] = $setWinnerFourthQtrArr['wrongWay']->q1y;
        } else {
            $wrongWayUserId[] = 'null';
            $wrongWayQtr[] = 'null';
            $wrongWayQtr[] = 'null';
        }

        $plus2Qtr = [];
        $plus2UserId = [];
        if ($setWinnerFourthQtrArr['plus2']) {
            $plus2UserId[] =  $setWinnerFourthQtrArr['plus2']->user_id;
            $plus2Qtr[] =  $setWinnerFourthQtrArr['plus2']->q1x;
            $plus2Qtr[] =  $setWinnerFourthQtrArr['plus2']->q1y;
        } else {
            $plus2UserId[] = 'null';
            $plus2Qtr[] = 'null';
            $plus2Qtr[] = 'null';
        }

        $minus2Qtr = [];
        $minus2UserId = [];
        if ($setWinnerFourthQtrArr['minus2']) {
            $minus2UserId[] = $setWinnerFourthQtrArr['minus2']->user_id;
            $minus2Qtr[] = $setWinnerFourthQtrArr['minus2']->q1x;
            $minus2Qtr[] = $setWinnerFourthQtrArr['minus2']->q1y;
        } else {
            $minus2UserId[] = 'null';
            $minus2Qtr[] = 'null';
            $minus2Qtr[] = 'null';
        }

        return $rightWayDataArr = ['rightWayFourthQtr' => $rightWayQtr, 'rightWayFourthUserId' => $rightWayUserId, 'wrongWayFourthQtr' => $wrongWayQtr, 'wrongWayFourthUserId' => $wrongWayUserId, 'plus2FourthQtr' => $plus2Qtr, 'plus2FourthUserId' => $plus2UserId, 'minus2FourthQtr' => $minus2Qtr, 'minus2FourthUserId' => $minus2UserId];
    }

    private  function setWinnerThirdFunc($setWinnerThirdQtrArr)
    {

        $rightWayQtr = [];
        $rightWayUserId = [];
        if ($setWinnerThirdQtrArr['rightWay']) {
            $rightWayUserId[] = $setWinnerThirdQtrArr['rightWay']->user_id;
            $rightWayQtr[] = $setWinnerThirdQtrArr['rightWay']->q1x;
            $rightWayQtr[] = $setWinnerThirdQtrArr['rightWay']->q1y;
        } else {
            $rightWayUserId[] = 'null';
            $rightWayQtr[] = 'null';
            $rightWayQtr[] = 'null';
        }


        $wrongWayQtr = [];
        $wrongWayUserId = [];
        if ($setWinnerThirdQtrArr['wrongWay']) {
            $wrongWayUserId[] = $setWinnerThirdQtrArr['wrongWay']->user_id;
            $wrongWayQtr[] = $setWinnerThirdQtrArr['wrongWay']->q1x;
            $wrongWayQtr[] = $setWinnerThirdQtrArr['wrongWay']->q1y;
        } else {
            $wrongWayUserId[] = 'null';
            $wrongWayQtr[] = 'null';
            $wrongWayQtr[] = 'null';
        }

        $plus2Qtr = [];
        $plus2UserId = [];
        if ($setWinnerThirdQtrArr['plus2']) {
            $plus2UserId[] =  $setWinnerThirdQtrArr['plus2']->user_id;
            $plus2Qtr[] =  $setWinnerThirdQtrArr['plus2']->q1x;
            $plus2Qtr[] =  $setWinnerThirdQtrArr['plus2']->q1y;
        } else {
            $plus2UserId[] = 'null';
            $plus2Qtr[] = 'null';
            $plus2Qtr[] = 'null';
        }

        $minus2Qtr = [];
        $minus2UserId = [];
        if ($setWinnerThirdQtrArr['minus2']) {
            $minus2UserId[] = $setWinnerThirdQtrArr['minus2']->user_id;
            $minus2Qtr[] = $setWinnerThirdQtrArr['minus2']->q1x;
            $minus2Qtr[] = $setWinnerThirdQtrArr['minus2']->q1y;
        } else {
            $minus2UserId[] = 'null';
            $minus2Qtr[] = 'null';
            $minus2Qtr[] = 'null';
        }

        return $rightWayDataArr = ['rightWayThirdQtr' => $rightWayQtr, 'rightWayThirdUserId' => $rightWayUserId, 'wrongWayThirdQtr' => $wrongWayQtr, 'wrongWayThirdUserId' => $wrongWayUserId, 'plus2ThirdQtr' => $plus2Qtr, 'plus2ThirdUserId' => $plus2UserId, 'minus2ThirdQtr' => $minus2Qtr, 'minus2ThirdUserId' => $minus2UserId];
    }

    private  function setWinnerSecondFunc($setWinnerSecondQtrArr)
    {

        $rightWayQtr = [];
        $rightWayUserId = [];
        if ($setWinnerSecondQtrArr['rightWay']) {
            $rightWayUserId[] = $setWinnerSecondQtrArr['rightWay']->user_id;
            $rightWayQtr[] = $setWinnerSecondQtrArr['rightWay']->q1x;
            $rightWayQtr[] = $setWinnerSecondQtrArr['rightWay']->q1y;
        } else {
            $rightWayUserId[] = 'null';
            $rightWayQtr[] = 'null';
            $rightWayQtr[] = 'null';
        }


        $wrongWayQtr = [];
        $wrongWayUserId = [];
        if ($setWinnerSecondQtrArr['wrongWay']) {
            $wrongWayUserId[] = $setWinnerSecondQtrArr['wrongWay']->user_id;
            $wrongWayQtr[] = $setWinnerSecondQtrArr['wrongWay']->q1x;
            $wrongWayQtr[] = $setWinnerSecondQtrArr['wrongWay']->q1y;
        } else {
            $wrongWayUserId[] = 'null';
            $wrongWayQtr[] = 'null';
            $wrongWayQtr[] = 'null';
        }

        $plus2Qtr = [];
        $plus2UserId = [];
        if ($setWinnerSecondQtrArr['plus2']) {
            $plus2UserId[] =  $setWinnerSecondQtrArr['plus2']->user_id;
            $plus2Qtr[] =  $setWinnerSecondQtrArr['plus2']->q1x;
            $plus2Qtr[] =  $setWinnerSecondQtrArr['plus2']->q1y;
        } else {
            $plus2UserId[] = 'null';
            $plus2Qtr[] = 'null';
            $plus2Qtr[] = 'null';
        }

        $minus2Qtr = [];
        $minus2UserId = [];
        if ($setWinnerSecondQtrArr['minus2']) {
            $minus2UserId[] = $setWinnerSecondQtrArr['minus2']->user_id;
            $minus2Qtr[] = $setWinnerSecondQtrArr['minus2']->q1x;
            $minus2Qtr[] = $setWinnerSecondQtrArr['minus2']->q1y;
        } else {
            $minus2UserId[] = 'null';
            $minus2Qtr[] = 'null';
            $minus2Qtr[] = 'null';
        }

        return $rightWayDataArr = ['rightWaySecondQtr' => $rightWayQtr, 'rightWaySecondUserId' => $rightWayUserId, 'wrongWaySecondQtr' => $wrongWayQtr, 'wrongWaySecondUserId' => $wrongWayUserId, 'plus2SecondQtr' => $plus2Qtr, 'plus2SecondUserId' => $plus2UserId, 'minus2SecondQtr' => $minus2Qtr, 'minus2SecondUserId' => $minus2UserId];
    }

    private  function setWinnerFirstFunc($setWinnerFirstQtrArr)
    {

        $rightWayQtr = [];
        $rightWayUserId = [];
        if ($setWinnerFirstQtrArr['rightWay']) {
            $rightWayUserId[] = $setWinnerFirstQtrArr['rightWay']->user_id;
            $rightWayQtr[] = $setWinnerFirstQtrArr['rightWay']->q1x;
            $rightWayQtr[] = $setWinnerFirstQtrArr['rightWay']->q1y;
        } else {
            $rightWayUserId[] = 'null';
            $rightWayQtr[] = 'null';
            $rightWayQtr[] = 'null';
        }


        $wrongWayQtr = [];
        $wrongWayUserId = [];
        if ($setWinnerFirstQtrArr['wrongWay']) {
            $wrongWayUserId[] = $setWinnerFirstQtrArr['wrongWay']->user_id;
            $wrongWayQtr[] = $setWinnerFirstQtrArr['wrongWay']->q1x;
            $wrongWayQtr[] = $setWinnerFirstQtrArr['wrongWay']->q1y;
        } else {
            $wrongWayUserId[] = 'null';
            $wrongWayQtr[] = 'null';
            $wrongWayQtr[] = 'null';
        }

        $plus2Qtr = [];
        $plus2UserId = [];
        if ($setWinnerFirstQtrArr['plus2']) {
            $plus2UserId[] =  $setWinnerFirstQtrArr['plus2']->user_id;
            $plus2Qtr[] =  $setWinnerFirstQtrArr['plus2']->q1x;
            $plus2Qtr[] =  $setWinnerFirstQtrArr['plus2']->q1y;
        } else {
            $plus2UserId[] = 'null';
            $plus2Qtr[] = 'null';
            $plus2Qtr[] = 'null';
        }

        $minus2Qtr = [];
        $minus2UserId = [];
        if ($setWinnerFirstQtrArr['minus2']) {
            $minus2UserId[] = $setWinnerFirstQtrArr['minus2']->user_id;
            $minus2Qtr[] = $setWinnerFirstQtrArr['minus2']->q1x;
            $minus2Qtr[] = $setWinnerFirstQtrArr['minus2']->q1y;
        } else {
            $minus2UserId[] = 'null';
            $minus2Qtr[] = 'null';
            $minus2Qtr[] = 'null';
        }

        return $rightWayDataArr = ['rightWayFirstQtr' => $rightWayQtr, 'rightWayFirstUserId' => $rightWayUserId, 'wrongWayFirstQtr' => $wrongWayQtr, 'wrongWayFirstUserId' => $wrongWayUserId, 'plus2FirstQtr' => $plus2Qtr, 'plus2FirstUserId' => $plus2UserId, 'minus2FirstQtr' => $minus2Qtr, 'minus2FirstUserId' => $minus2UserId];
    }

    private  function winningUsersDataGet($scoreNumber, $id, $price)
    {

        //plus
        $firstValuePlus = $this->plus2($scoreNumber[0]);
        $secondFirstValuePlus = $this->plus2($scoreNumber[1]);

        $secondValuePlus = $this->plus2($scoreNumber[2]);
        $secondSecondValuePlus = $this->plus2($scoreNumber[3]);

        $thirdValuePlus = $this->plus2($scoreNumber[4]);
        $secondThirdValuePlus = $this->plus2($scoreNumber[5]);

        $fourthValuePlus = $this->plus2($scoreNumber[6]);
        $secondFourthValuePlus = $this->plus2($scoreNumber[7]);

        //minus
        $firstValueMinus = $this->minus2($scoreNumber[0]);
        $secondFirstValueMinus = $this->minus2($scoreNumber[1]);

        $secondValueMinus = $this->minus2($scoreNumber[2]);
        $secondSecondValueMinus = $this->minus2($scoreNumber[3]);

        $thirdValueMinus = $this->minus2($scoreNumber[4]);
        $secondThirdValueMinus = $this->minus2($scoreNumber[5]);

        $fourthValueMinus = $this->minus2($scoreNumber[6]);
        $secondFourthValueMinus = $this->minus2($scoreNumber[7]);


        $qtr1x = 'q1x';
        $qtr1y = 'q1y';
        $first = $scoreNumber[0];
        $second = $scoreNumber[1];

        $setWinnerFirst =  $this->setWinner($id, $price, $qtr1x, $qtr1y, $first, $second, $firstValuePlus, $secondFirstValuePlus, $firstValueMinus, $secondFirstValueMinus);

        $qtr2x = 'q2x';
        $qtr2y = 'q2y';
        $firstSecond = $scoreNumber[2];
        $secondSecond = $scoreNumber[3];

        $setWinnerSecond =  $this->setWinner($id, $price, $qtr2x, $qtr2y, $firstSecond, $secondSecond, $secondValuePlus, $secondSecondValuePlus, $secondValueMinus, $secondSecondValueMinus);

        $qtr3x = 'q3x';
        $qtr3y = 'q3y';
        $firstThird = $scoreNumber[4];
        $secondThird = $scoreNumber[5];

        $setWinnerThird =  $this->setWinner($id, $price, $qtr3x, $qtr3y, $firstThird, $secondThird, $thirdValuePlus, $secondThirdValuePlus, $thirdValueMinus, $secondThirdValueMinus);

        $qtr4x = 'q4x';
        $qtr4y = 'q4y';
        $firstFourth = $scoreNumber[6];
        $secondFourth = $scoreNumber[7];

        $setWinnerFourth =  $this->setWinner($id, $price, $qtr4x, $qtr4y, $firstFourth, $secondFourth, $fourthValuePlus, $secondFourthValuePlus, $fourthValueMinus, $secondFourthValueMinus);


        $setWinnerFirstFunc = $this->setWinnerFirstFunc($setWinnerFirst);

        $setWinnerSecondFunc = $this->setWinnerSecondFunc($setWinnerSecond);

        $setWinnerThirdFunc = $this->setWinnerThirdFunc($setWinnerThird);

        $setWinnerFourthFunc = $this->setWinnerFourthFunc($setWinnerFourth);

        // RIGHT WAY START
        $rwFirstArr = $setWinnerFirstFunc['rightWayFirstQtr'];
        $rwSecondArr = $setWinnerSecondFunc['rightWaySecondQtr'];
        $rwThirdArr = $setWinnerThirdFunc['rightWayThirdQtr'];
        $rwFourthArr = $setWinnerFourthFunc['rightWayFourthQtr'];

        $rightWayGetArr = $this->setUserWinnerFunc($rwFirstArr, $rwSecondArr, $rwThirdArr, $rwFourthArr);

        // user id  START
        $rwfuid1 = $setWinnerFirstFunc['rightWayFirstUserId'][0];
        $rwsuid1 = $setWinnerSecondFunc['rightWaySecondUserId'][0];
        $rwtuid1 = $setWinnerThirdFunc['rightWayThirdUserId'][0];
        $rwftuid1 = $setWinnerFourthFunc['rightWayFourthUserId'][0];
        // user id END
        $rightWayUserIdArr = ["$rwfuid1", "$rwsuid1", "$rwtuid1", "$rwftuid1"];
        // RIGHT WAY END


        // WRONG WAY START
        $wrongWayFirstArr = $setWinnerFirstFunc['wrongWayFirstQtr'];
        $wrongWaySecondArr = $setWinnerSecondFunc['wrongWaySecondQtr'];
        $wrongWayThirdArr = $setWinnerThirdFunc['wrongWayThirdQtr'];
        $wrongWayFourthArr = $setWinnerFourthFunc['wrongWayFourthQtr'];

        $wrongWayGetArr = $this->setUserWinnerFunc($wrongWayFirstArr, $wrongWaySecondArr, $wrongWayThirdArr, $wrongWayFourthArr);

        // user id START
        $wrongWayfuid1 = $setWinnerFirstFunc['wrongWayFirstUserId'][0];
        $wrongWaysuid1 = $setWinnerSecondFunc['wrongWaySecondUserId'][0];
        $wrongWaytuid1 = $setWinnerThirdFunc['wrongWayThirdUserId'][0];
        $wrongWayftuid1 = $setWinnerFourthFunc['wrongWayFourthUserId'][0];
        // user id END
        $wrongWayUserIdArr = ["$wrongWayfuid1", "$wrongWaysuid1", "$wrongWaytuid1", "$wrongWayftuid1"];
        // WRONG WAY END

        // PLUS 2 WAY START
        $plus2FirstArr = $setWinnerFirstFunc['plus2FirstQtr'];
        $plus2SecondArr = $setWinnerSecondFunc['plus2SecondQtr'];
        $plus2ThirdArr = $setWinnerThirdFunc['plus2ThirdQtr'];
        $plus2FourthArr = $setWinnerFourthFunc['plus2FourthQtr'];

        $plus2GetArr = $this->setUserWinnerFunc($plus2FirstArr, $plus2SecondArr, $plus2ThirdArr, $plus2FourthArr);

        // user id START
        $plus2fuid1 = $setWinnerFirstFunc['plus2FirstUserId'][0];
        $plus2suid1 = $setWinnerSecondFunc['plus2SecondUserId'][0];
        $plus2tuid1 = $setWinnerThirdFunc['plus2ThirdUserId'][0];
        $plus2ftuid1 = $setWinnerFourthFunc['plus2FourthUserId'][0];
        // user id END
        $plus2UserIdArr = ["$plus2fuid1", "$plus2suid1", "$plus2tuid1", "$plus2ftuid1"];
        // PLUS 2 END


        // MINUS 2 WAY START
        $minus2FirstArr = $setWinnerFirstFunc['minus2FirstQtr'];
        $minus2SecondArr = $setWinnerSecondFunc['minus2SecondQtr'];
        $minus2ThirdArr = $setWinnerThirdFunc['minus2ThirdQtr'];
        $minus2FourthArr = $setWinnerFourthFunc['minus2FourthQtr'];

        $minus2GetArr = $this->setUserWinnerFunc($minus2FirstArr, $minus2SecondArr, $minus2ThirdArr, $minus2FourthArr);

        // user id START
        $minus2fuid1 = $setWinnerFirstFunc['minus2FirstUserId'][0];
        $minus2suid1 = $setWinnerSecondFunc['minus2SecondUserId'][0];
        $minus2tuid1 = $setWinnerThirdFunc['minus2ThirdUserId'][0];
        $minus2ftuid1 = $setWinnerFourthFunc['minus2FourthUserId'][0];
        // user id END
        $minus2UserIdArr = ["$minus2fuid1", "$minus2suid1", "$minus2tuid1", "$minus2ftuid1"];
        // MINUS 2 END

        $data = ['rightWayGetArr' => $rightWayGetArr, 'wrongWayGetArr' => $wrongWayGetArr, 'plus2GetArr' => $plus2GetArr, 'minus2GetArr' => $minus2GetArr];
        $ids = ['rightWayUserIdArr' => $rightWayUserIdArr, 'wrongWayUserIdArr' => $wrongWayUserIdArr, 'plus2UserIdArr' => $plus2UserIdArr, 'minus2UserIdArr' => $minus2UserIdArr];

        return $arr = [$data, $ids];
    }

    private  function percentage($price)
    {
        $totalAmount = $price * 100;

        $adminPercentage = $totalAmount / 100 * 20;

        $usersPercentage = $totalAmount - $adminPercentage;


        $percentage9 = $usersPercentage / 100 * 9;
        $percentage6 = $usersPercentage / 100 * 6;
        $percentage3 = $usersPercentage / 100 * 3;
        $percentage17 = $usersPercentage / 100 * 17;
        $percentage12 = $usersPercentage / 100 * 12;
        $percentage4 = $usersPercentage / 100 * 4;

        return $arr = ['9' => $percentage9, '6' => $percentage6, '3' => $percentage3, '17' => $percentage17, '12' => $percentage12, '4' => $percentage4];
    }

    // functionality start 
    private  function check()
    {
        $date = Carbon::now()->format('Y-m-d');

        $baord = Board::where('game_date', $date)->get();

        foreach ($baord as $value) {
            $num = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

            $percentageArr = ["9", "6", "3", "3", "9", "6", "3", "3", "9", "6", "3", "3", "17", "12", "4", "4"];

            $winningBoard = json_decode($value->winning_board);

            $price = $this->convertIntoNumber($winningBoard[0], $winningBoard[1]);

            // check data exist in the tabel or not. 
            $winningBoard1 = WinningUser::where(['board_id' => $value->id, 'board_price' => $price[0]])->first();
            $winningBoard2 = WinningUser::where(['board_id' => $value->id, 'board_price' => $price[1]])->first();


            if ($winningBoard1 == null) {

                $scoreNumber = $this->shuffleNumber($num);

                $data1 =  $this->winningUsersDataGet($scoreNumber, $value->id, $price[0]);

                //Percentage start
                $percentage = $this->percentage($price[0]);

                $insertUsersData = $this->insertWinningUsers($scoreNumber, $data1, $percentage, $percentageArr, $value->id, $price[0]);
            }

            if ($winningBoard2 == null) {
                $scoreNumber2 = $this->shuffleNumber($num);
                $data2 =  $this->winningUsersDataGet($scoreNumber2, $value->id, $price[1]);
                $percentage2 = $this->percentage($price[1]);

                $insertUsersData = $this->insertWinningUsers($scoreNumber2, $data2, $percentage2, $percentageArr, $value->id, $price[1]);
            }
        }
    }

    private  function insertWinningUsers($scoreNumber, $data, $percentage, $percentageArr, $boardId, $price)
    {
        $rightWayPercentage = ['$' . $percentage[9], '$' . $percentage[9], '$' . $percentage[9], '$' . $percentage[17]];

        $wrongWayPercentage = ['$' . $percentage[6], '$' . $percentage[6], '$' . $percentage[6], '$' . $percentage[12]];

        $plus2_minus2_Percentage = ['$' . $percentage[3], '$' . $percentage[3], '$' . $percentage[3], '$' . $percentage[4]];

        $post = WinningUser::updateOrCreate([
            'board_id' => $boardId,
            'board_price' => $price
        ], [
            'board_id' => $boardId,
            'board_price' => $price,
            'percentage' => json_encode($percentageArr),
            'score' => json_encode($scoreNumber),
            'winning_number' => json_encode($scoreNumber),

            'right_way' => json_encode($data[0]['rightWayGetArr']),
            'right_way_name' => json_encode($data[1]['rightWayUserIdArr']),

            'right_way_price' => json_encode($rightWayPercentage),

            'wrong_way' => json_encode($data[0]['wrongWayGetArr']),
            'wrong_way_name' => json_encode($data[1]['wrongWayUserIdArr']),

            'wrong_way_price' => json_encode($wrongWayPercentage),

            'plus2' => json_encode($data[0]['plus2GetArr']),
            'plus2_name' => json_encode($data[1]['plus2UserIdArr']),

            'plus2_price' => json_encode($plus2_minus2_Percentage),

            'minus2' => json_encode($data[0]['minus2GetArr']),
            'minus2_name' => json_encode($data[1]['minus2UserIdArr']),

            'minus2_price' => json_encode($plus2_minus2_Percentage)
        ]);
    }
}
