<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameBoard extends Model
{
    use HasFactory;
    protected $table = 'game_board';

    public function boardName()
    {
        return $this->hasOne(Board::class, 'id', 'board_id');
    }

    public function gameBoardNamePayout()
    {
        return $this->belongsTo(Board::class, 'id', 'board_id');
    }


    public function gameBoardShowPart()
    {
        return $this->belongsTo(Board::class, 'id', 'board_id');
    }
}
