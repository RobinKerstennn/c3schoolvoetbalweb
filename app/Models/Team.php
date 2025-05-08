<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'players' => '[]',
    ];

    // Relatie met de User
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
