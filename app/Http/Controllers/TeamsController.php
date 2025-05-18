<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;

class TeamsController extends Controller
{
    public function adminTeambeheer()
    {
        $user = Auth::user();
        $teams = Team::all();
        return view('admin.teambeheer', ['teams' => $teams, 'user' => $user]);
    }
    public function edit(Team $team)
    {
        if (!$team) {
            return redirect()->route('teams.index')->withErrors('Team niet gevonden.');
        }
        return view('teams.edit', ['team' => $team]);
    }


    public function index()
    {
        $user = Auth::user();
        $teams = Team::where('user_id', $user->id)->get();
        return view('teams.teambeheer', ['teams' => $teams]);
    }


    public function mijnTeam()
    {
        $mijnTeam = Auth::user()->team;
        return view('teams.mijnTeam', ['mijnTeam' => $mijnTeam]);
    }

    public function store(Request $request)
    {
        // Validatie
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Maak een nieuw team aan, gekoppeld aan de ingelogde gebruiker
        Team::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('teams.index')->with('success', 'Team succesvol aangemaakt!');
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => ['string', 'required']
        ]);

        $players = explode(", ", $request->players);

        $team->update([
            'name' => $request->name,
            'players' => json_encode($players),
        ]);
        return redirect()->route('teams.index')->with('success', 'Team succesvol aangepast');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index');
    }

    public function wedstrijdSchema()
    {
        $tournaments = Tournament::all();
        return view('wedstrijd.Wedstrijdschema', ['tournaments' => $tournaments]);
    }

    public function wedstrijdtournaments(Tournament $tournament)
    {
        $user = Auth::user();
        $max_teams = $tournament->teams()->count();
        // Haal alle wedstrijden voor dit toernooi op
        $games = Game::where('tournament_id', $tournament->id)->get();

        // Maak een array voor de scores van de teams
        $teamScores = [];

        // Verwerk de scores van alle wedstrijden
        foreach ($games as $game) {
            // Verwerk de score van team 1
            if (!isset($teamScores[$game->team_1])) {
                $teamScores[$game->team_1] = 0;
            }
            $teamScores[$game->team_1] += $game->team_1_score > $game->team_2_score ? 3 : ($game->team_1_score === $game->team_2_score ? 1 : 0);

            // Verwerk de score van team 2
            if (!isset($teamScores[$game->team_2])) {
                $teamScores[$game->team_2] = 0;
            }
            $teamScores[$game->team_2] += $game->team_2_score > $game->team_1_score ? 3 : ($game->team_1_score === $game->team_2_score ? 1 : 0);
        }

        // Haal de teams op en voeg ze toe aan de scores
        $teams = Team::whereIn('id', array_keys($teamScores))->get();

        // Voeg de scores toe aan de teams en sorteer ze op score
        $leaderboard = $teams->map(function ($team) use ($teamScores) {
            $team->score = $teamScores[$team->id];
            return $team;
        })->sortByDesc('score'); // Sorteer van hoog naar laag

        return view('wedstrijd.wedstrijdTournament', ['games' => $games, 'tournament' => $tournament, 'leaderboard' => $leaderboard, 'user' => $user, 'max_teams' => $max_teams]);
    }
}
