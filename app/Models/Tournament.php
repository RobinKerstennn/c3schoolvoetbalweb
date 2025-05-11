<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'max_teams',
        'started'
    ];

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function games(){
        return $this->hasMany(Game::class);
    }
}
