<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function getMatchScores()
    {
        $games = Game::all();

        $response = $games->map(function ($game) {
            return [
                'team_1' => $game->team1->name,
                'team_2' => $game->team2->name,
                'team_1_score' => $game->team_1_score,
                'team_2_score' => $game->team_2_score,
                'tournament_id' => $game->tournament_id,
            ];
        });

        return response()->json($response);
    }
}
