<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = "payment";

    public function boardName()
    {
        return $this->hasOne(Board::class, 'id', 'board_id')->select('id' , 'board_name' , 'payment_start_date' , 'payment_deadline');
    }

    public function User(){
        return $this->hasOne(User::class , 'id' , 'user_id')->select(['id' , 'name']);
    }
}
