<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SquareBuy extends Model
{
    use HasFactory;
    protected $table = 'square_buy';

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id")->select(['id', 'alias']);
    }


    
    public function squareBuy(){
        return $this->belongsTo(User::class , 'id' , 'user_id');
    }
}
