<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function edit($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return redirect()->route('teams.index')->withErrors('Teams niet gevonden.');
        }

        return view('teams.edit', compact('team'));
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
        ]);

        return redirect()->route('teams.index')->with('success', 'Team succesvol aangemaakt!');
    }

    public function update(Request $request, $id){
        $team = Team::find($id);
        $team->update($request->all());
        return redirect()->route('teams.index')->with('succes!', 'Team succesvol aangepast.');

    }
}
