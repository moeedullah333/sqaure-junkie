<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\GameBoard;
use Illuminate\Http\Request;

class ManualBoardCreateContoller extends Controller
{
    //

    public function boardPartData(Request $request)
    {
        $board = Board::where('id', $request->id)->first();
        return response()->json([
            'status' => true,
            'data' => $board,
        ]);
    }

    // create baord manually
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

        $checkGameBoard =  GameBoard::where(['board_id' => $id, 'price' => $price])->first();

        if ($checkGameBoard != null) {
            return false;
        } else {
            for ($i = 0; $i < $partValue; $i++) {
                $data = new GameBoard();
                $data->board_id = $id;
                $data->part = $lettersArray[$i];
                $data->price = $price;
                $data->save();
                $dataInsertArr[] = $data;
            }
        }

        return $dataInsertArr;
    }



    public function add_board_part_manual(Request $request)
    {
        $board = Board::where('id', $request->id)->first();

        $lettersArray = range('a', 'z');

        if ($request->data == "ten") {

            if (count(json_decode($board->ten)) >= 100) {
                $partValue = $this->divideValue(count(json_decode($board->ten)));
                $value = $this->gameBoardSave($board->id, $partValue, $lettersArray, 10);;
                if ($value == false) {
                    return $this->response('Board already exist');
                }
                $this->numberGenerate($value);
                return $this->response();
            }
        }

        if ($request->data == "twenty") {
            if (count(json_decode($board->twenty)) >= 100) {
                $partValue = $this->divideValue(count(json_decode($board->twenty)));
                $value = $this->gameBoardSave($board->id, $partValue, $lettersArray, 20);
                if ($value == false) {
                    return $this->response('Board already exist');
                }
                $this->numberGenerate($value);
                return $this->response();
            }
        }

        if ($request->data == "thirty") {
            if (count(json_decode($board->thirty)) >= 100) {
                $partValue = $this->divideValue(count(json_decode($board->thirty)));
                $value = $this->gameBoardSave($board->id, $partValue, $lettersArray, 30);
                if ($value == false) {
                    return $this->response('Board already exist');
                }
                $this->numberGenerate($value);
                return $this->response();
            }
        }

        if ($request->data == "fourty") {
            if (count(json_decode($board->fourty)) >= 100) {
                $partValue = $this->divideValue(count(json_decode($board->fourty)));
                $value = $this->gameBoardSave($board->id, $partValue, $lettersArray, 40);
                if ($value == false) {
                    return $this->response('Board already exist');
                }
                $this->numberGenerate($value);
                return $this->response();
            }
        }

        if ($request->data == "fifty") {
            if (count(json_decode($board->fifty)) >= 100) {
                $partValue = $this->divideValue(count(json_decode($board->fifty)));
                $value = $this->gameBoardSave($board->id, $partValue, $lettersArray, 50);
                if ($value == false) {
                    return $this->response('Board already exist');
                }
                $this->numberGenerate($value);
                return $this->response();
            }
        }

        if ($request->data == "others") {
            if (count(json_decode($board->others)) >= 100) {
                $partValue = $this->divideValue(count(json_decode($board->others)));
                $value = $this->gameBoardSave($board->id, $partValue, $lettersArray, $board->other_value);
                if ($value == false) {
                    return $this->response('Board already exist');
                }
                $this->numberGenerate($value);
                return $this->response();
            }
        }
    }


    function response($msg = null)
    {
        if ($msg) {
            return response()->json([
                'status' => false,
                'msg' => $msg,
            ]);
        } else {

            return response()->json([
                'status' => true
            ]);
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
