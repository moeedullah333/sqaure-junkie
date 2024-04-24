<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function boardName()
    {
        return $this->belongsTo(Payment::class, 'board_id', 'id');
    }

    public function teams()
    {
        return $this->belongsTo(Team::class, 'board_id', 'id');
    }

    public function gameBoardName()
    {
        return $this->belongsTo(GameBoard::class, 'board_id', 'id');
    }

    public function gameBoardNamePayout()
    {
        // return $this->hasMany(GameBoard::class , 'board_id' , 'id')->where('delete_status' , 0);
        return $this->hasMany(GameBoard::class, 'board_id', 'id');
    }

    public function winningUser()
    {
        return $this->hasMany(WinningUser::class, 'board_id', 'id');
    }

    public function gameBoardShowPart()
    {
        return $this->hasMany(GameBoard::class, 'board_id', 'id');
    }

    public function OtherBoard(){
        return $this->hasMany(BoardOther::class , 'board_id' , 'id');
    }
}
