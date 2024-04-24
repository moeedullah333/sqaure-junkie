<?php

namespace App\Console\Commands;

use App\Models\Board;
use App\Models\GameBoard;
use App\Models\Payment;
use App\Models\SquareBuy;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemoveBoard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-board';

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
        $date = Carbon::now();
        $dateFormat = $date->format('Y-m-d H:i:00');

        $boardDateCheck = Board::where('square_deadline', $dateFormat)->get();

        // dd($boardDateCheck->toArray());

        foreach ($boardDateCheck as $key => $value) {

            $gameBoard = GameBoard::where('board_id', $value->id)->get();
            foreach ($gameBoard as $gkey => $gameBoardvalue) {

                $squareBuy = SquareBuy::where(['board_id' => $gameBoardvalue->board_id, 'price' => $gameBoardvalue->price, 'part' => $gameBoardvalue->part])->count();

                if ($squareBuy < 100) {

                    // GameBoard::where(['board_id' => $gameBoardvalue->board_id, 'part' => $gameBoardvalue->part, 'price' => $gameBoardvalue->price])->delete();
                    // SquareBuy::where(['board_id' => $gameBoardvalue->board_id, 'part' => $gameBoardvalue->part, 'price' => $gameBoardvalue->price])->delete();
                    // Payment::where(['board_id' => $gameBoardvalue->board_id, 'part' => $gameBoardvalue->part, 'price' => $gameBoardvalue->price])->delete();

                    GameBoard::where(['board_id' => $gameBoardvalue->board_id, 'part' => $gameBoardvalue->part, 'price' => $gameBoardvalue->price])->update([
                        'delete_status' => 1
                    ]);
                    SquareBuy::where(['board_id' => $gameBoardvalue->board_id, 'part' => $gameBoardvalue->part, 'price' => $gameBoardvalue->price])->update([
                        'delete_status' => 1
                    ]);
                    
                    Payment::where(['board_id' => $gameBoardvalue->board_id, 'part' => $gameBoardvalue->part, 'price' => $gameBoardvalue->price])->update([
                        'delete_status' => 1
                    ]);
                }

                $GameBoard = SquareBuy::where(['board_id' => $gameBoardvalue->board_id, 'delete_status' => 0])->first();

                if ($GameBoard == null) {
                    Board::where('id', $gameBoardvalue->board_id)->update([
                        'delete_status' => 1,
                    ]);
                }
            }
        }
    }
}
