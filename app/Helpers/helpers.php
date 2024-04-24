<?php



use App\Models\Board;

use App\Models\GameBoard;

use App\Models\Payment;



function findSquareCount($board_id, $price, $boardsSquareCount)

{



    if (!empty($boardsSquareCount)) {

        foreach ($boardsSquareCount as $board) {

            if ($board['board_id'] == $board_id && $board['price'] == $price) {

                if ($board['board_full_status']) {

                    return true;

                }

            } else {

                continue;

            }

        }

    }



    return false;

}





function checkBoardExist($board_id, $price)

{

    $gameBoard = GameBoard::where(['board_id' => $board_id, 'price' => $price])->first();

    if ($gameBoard !== null) {

        $msg = true;

    } else {

        $msg = false;

    }

    return $msg;

}





function countOtherBoardValue()

{

    $otherBoardCount = Board::where('other_value', null)->get();



    $baordsGet = [];

    foreach ($otherBoardCount as $key => $value) {

        if ($value->others > 0) {

            $baordsGet[] = $value;

        }

    }



    return count($baordsGet);

}



function checkVoteColumnExists($board_id, $price)

{

    $board = Board::where('id', $board_id)->first();

    $checkPrice = 0;

    if($price == 'others'){
        if ($board->other_value !== '' && $board->other_value !== "0") {
            $checkPrice = $board->other_value;
        }
    }
    else{
        $checkPrice = $price;
    }

    $gameBoard = GameBoard::where(['board_id' => $board_id, 'price' => $checkPrice])->first();

    if ($gameBoard == null) {

        return false;

    }

    $exists = false;



    switch ($price) {

        case 10:

            if ($board->ten !== '' && $board->ten !== "0") {

                $exists = true;

            }

            break;

        case 20:

            if ($board->twenty !== '' && $board->twenty !== "0") {

                $exists = true;

            }

            break;

        case 30:

            if ($board->thirty !== '' && $board->thirty !== "0") {

                $exists = true;

            }

            break;

        case 40:

            if ($board->fourty !== '' && $board->fourty !== "0") {

                $exists = true;

            }

            break;

        case 50:

            if ($board->fifty !== '' && $board->fifty !== "0") {

                $exists = true;

            }

            break;

        case 'others':

            if ($board->others !== '' && $board->others !== "0") {

                $exists = true;

            }

            break;

    }



    return $exists;

}



function checkPayments($board_id, $part, $price)

{

    $payments = Payment::where(['board_id' => $board_id, 'part' => $part, 'price' => $price, 'delete_status' => 0, 'refund_status' => 0])->get();



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



    return ($totalCounts >= 100) ? true : false;

    

}

