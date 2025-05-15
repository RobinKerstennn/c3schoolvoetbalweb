<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $teams = Team::all();
        return view('teams.teambeheer', ['teams' => $teams, 'user' => $user]);
    }

    public function edit(Team $team)
    {
        if (!$team) {
            return redirect()->route('teams.index')->withErrors('Team niet gevonden.');
        }
        return view('teams.edit', ['team' => $team]);
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
            'user_id' => auth()->id(),
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
        return redirect()->route('teams.index')->with('succes!', 'Team succesvol aangepast.');

    }

    public function destroy(Team $team){
        $team->delete();
        return redirect()->route('teams.index');
    }

    public function wedstrijdSchema()
    {
        // Haal alle wedstrijden op met de benodigde relatie-informatie
        $games = Game::with(['team1', 'team2'])->get();

        // Stuur de wedstrijden naar de view
        return view('wedstrijd.Wedstrijdschema', compact('games'));
    }
}
