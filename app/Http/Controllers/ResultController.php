<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Result;

class ResultController extends Controller
{
    public function index()
    {
        // Haal alle resultaten op
        return response()->json(Game::all());
    }
}
