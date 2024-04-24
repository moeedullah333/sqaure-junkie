<?php

namespace App\Console\Commands;

use App\Models\Board;
use App\Models\GameBoard;
use App\Models\SetJobs;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class VotingDeadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:voting-deadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */


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

    public function handle()
    {
        $setJob = SetJobs::where('id', 1)->first();


        $data = Board::where('winning_board', null)->get();

        $date = Carbon::now();

        $formatDate =  $date->format('Y-m-d H:i:s');
        $count_ten = 0;
        $count_twenty = 0;
        $count_thirty = 0;
        $count_fourty = 0;
        $count_fifty = 0;
        $count_others = 0;

        foreach ($data as $key => $item) {
            if ($formatDate >= $item->voting_deadline) {
                if ($item->ten == 0) {
                    $count_ten = 0;
                } else {
                    $count_ten = count(json_decode($item->ten));
                }

                if ($item->twenty == 0) {
                    $count_twenty = 0;
                } else {
                    $count_twenty = count(json_decode($item->twenty));
                }

                if ($item->thirty == 0) {
                    $count_thirty = 0;
                } else {
                    $count_thirty = count(json_decode($item->thirty));
                }

                if ($item->fourty == 0) {
                    $count_fourty = 0;
                } else {
                    $count_fourty =  count(json_decode($item->fourty));
                }

                if ($item->fifty == 0) {
                    $count_fifty = 0;
                } else {
                    $count_fifty = count(json_decode($item->fifty));
                }

                if ($item->others == 0) {
                    $count_others = 0;
                } else {
                    $count_others = count(json_decode($item->others));
                }

                $array  = [
                    'ten' => $count_ten,
                    'twenty' => $count_twenty,
                    'thirty' => $count_thirty,
                    'fourty' => $count_fourty,
                    'fifty' => $count_fifty,
                    'others' => $count_others
                ];

                arsort($array);

                $keys = array_keys($array);

                $lettersArray = range('a', 'z');

                $winningBoard = [];
                foreach ($array as $key => $value) {
                    if ($key == "ten") {
                        if ($value >= 100) {
                            $winningBoard[] = "ten";
                            if ($setJob->status == 1) {
                                $partValue = $this->divideValue($value);
                                $value = $this->gameBoardSave($item->id, $partValue, $lettersArray, 10);
                                $this->numberGenerate($value);
                            }
                        }
                    }

                    if ($key == "twenty") {
                        if ($value >= 100) {
                            $winningBoard[] = "twenty";
                            if ($setJob->status == 1) {
                                $partValue = $this->divideValue($value);
                                $value = $this->gameBoardSave($item->id, $partValue, $lettersArray, 20);
                                $this->numberGenerate($value);
                            }
                        }
                    }

                    if ($key == "thirty") {
                        if ($value >= 100) {
                            $winningBoard[] = "thirty";
                            if ($setJob->status == 1) {
                                $partValue = $this->divideValue($value);
                                $value = $this->gameBoardSave($item->id, $partValue, $lettersArray, 30);
                                $this->numberGenerate($value);
                            }
                        }
                    }

                    if ($key == "fourty") {
                        if ($value >= 100) {
                            $winningBoard[] = "fourty";
                            if ($setJob->status == 1) {
                                $partValue = $this->divideValue($value);
                                $value = $this->gameBoardSave($item->id, $partValue, $lettersArray, 40);
                                $this->numberGenerate($value);
                            }
                        }
                    }

                    if ($key == "fifty") {
                        if ($value >= 100) {
                            $winningBoard[] = "fifty";
                            if ($setJob->status == 1) {
                                $partValue = $this->divideValue($value);
                                $value = $this->gameBoardSave($item->id, $partValue, $lettersArray, 50);
                                $this->numberGenerate($value);
                            }
                        }
                    }

                    if ($key == "others") {
                        if ($value >= 100) {
                            $winningBoard[] = "others";
                            if ($setJob->status == 1) {
                                $partValue = $this->divideValue($value);
                                $value = $this->gameBoardSave($item->id, $partValue, $lettersArray, $item->other_value);
                                $this->numberGenerate($value);
                            }
                        }
                    }
                }

                $item->winning_board = json_encode($winningBoard);
                $item->save();
            }
        }
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
