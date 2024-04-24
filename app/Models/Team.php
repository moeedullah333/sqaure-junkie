<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = "teams";

    protected $fillable = ['board_id', 'price', 'part', 'team_x', 'team_y'];

    public function boardTeams(){
        return $this->hasOne(Board::class , 'id' , 'board_id');
    }
}
