<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardOther extends Model
{
    use HasFactory;
    protected $table = "board_others";

    public $timestamps=false;

    public function Users(){
        return $this->hasOne(User::class , 'id' , 'user_id');
    }


    public function Board(){
        return $this->belongsTo(Board::class ,  'id', 'board_id' );
    }
}
