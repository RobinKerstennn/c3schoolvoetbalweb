<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'players',
    ];

    protected $casts = [
        'players' => 'array',
    ];
    // Relatie met de User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tournaments(){
        return $this->belongsToMany(Tournament::class);
    }

    public function games(){
        return $this->hasMany(Game::class);
    }
}
