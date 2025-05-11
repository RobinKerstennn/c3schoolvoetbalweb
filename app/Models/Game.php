<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_id',
        'team_1',
        'team_2',
        'team_1_score',
        'team_2_score,'
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function team1(){
        return $this->belongsTo(Team::class, 'team_1');
    }

    public function team2(){
        return $this->belongsTo(Team::class, 'team_2');
    }
}
