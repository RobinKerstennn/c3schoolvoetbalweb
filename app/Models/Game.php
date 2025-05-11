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

    public function teams(){
        return $this->hasMany(Team::class);
    }
}
