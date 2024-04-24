<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinningUser extends Model
{
    use HasFactory;
    protected $table = "winning_users";

    public $fillable = ['board_id', 'part', 'board_price', 'percentage', 'score', 'winning_number', 'right_way', 'right_way_name', 'right_way_price', 'wrong_way', 'wrong_way_name', 'wrong_way_price', 'plus2', 'plus2_name', 'plus2_price', 'minus2', 'minus2_name', 'minus2_price', 'status'];

    public function winningUser()
    {
        return $this->belongsTo(Board::class,  'id', 'board_id');
    }
}
