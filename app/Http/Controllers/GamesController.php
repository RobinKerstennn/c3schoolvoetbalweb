<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index()
    {
        $games = Game::whereNull('team_1_score')
            ->whereNull('team_2_score')
            ->get();
        return view('games.index', ['games' => $games]);
    }


    public function leaderboard($tournament_id)
    {
        $games = Game::where('tournament_id', $tournament_id)
            ->get();

        $teamScores = [];

        foreach ($games as $game) {

            if (!isset($teamScores[$game->team_1])) {
                $teamScores[$game->team_1] = 0;
            }
            $teamScores[$game->team_1] += $game->team_1_score > $game->team_2_score ? 3 : ($game->team_1_score === $game->team_2_score ? 1 : 0);

            if (!isset($teamScores[$game->team_2])) {
                $teamScores[$game->team_2] = 0;
            }
            $teamScores[$game->team_2] += $game->team_2_score > $game->team_1_score ? 3 : ($game->team_1_score === $game->team_2_score ? 1 : 0);
        }

        $teams = Team::whereIn('id', array_keys($teamScores))->get();

        $leaderboard = $teams->map(function ($team) use ($teamScores) {
            $team->score = $teamScores[$team->id];
            return $team;
        })->sortByDesc('score'); 

        return view('games.leaderboard', ['leaderboard' => $leaderboard]);
    }

    public function show()
    {
        $tournaments = Tournament::all();
        return view('games.leaderboardhome', ['tournaments' => $tournaments]);
    }

    public function generateMatches()
    {
        $teams = Team::all();

        foreach ($teams as $team_1) {
            $i = $team_1->id;
            foreach ($teams as $team_2) {
                $j = $team_2->id;
                if ($j > $i) {
                    $game = Game::create([
                        'team_1' => $i,
                        'team_2' => $j,
                        'tournament_id' => 1,
                    ]);
                }
            }
        }
        $games = Game::all();
        return redirect()->route('home');
    }


    public function scoresTonen()
    {
        $games = Game::all();
        return view('referee.scores', ['games' => $games]);
    }

    public function addScores()
    {
        $games = Game::all();
        return view('referee.addScores', ['games' => $games]);
    }

    public function storeScores(Request $request, Game $game)
    {
        $request->validate([
            'team1' => ['integer'],
            'team2' => ['integer']
        ]);

        $game->update([
            'team_1_score' => $request->team1,
            'team_2_score' => $request->team2,
        ]);

        return redirect()->route('referee.scores');
    }

    public function onlyScores()
    {
        $games = Game::all(['team_1', 'team_2', 'team_1_score', 'team_2_score']);
        return view('scores.index', ['games' => $games]);
    }

}
