<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentsController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index', ['tournaments' => $tournaments]);
    }

    public function edit(Tournament $tournament)
    {
        return view('tournaments.edit', ['tournament' => $tournament]);
    }

    public function update(Request $request, Tournament $tournament)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'max_teams' => ['required', 'numeric'],
        ]);

        $tournament->update([
            'title' => $request->title,
            'max_teams' => $request->max_teams,
        ]);

        return redirect()->route('tournaments.index');
    }

    public function create()
    {
        return view('tournaments.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['string', 'required'],
            'max_teams' => ['required', 'numeric'],
        ]);

        $tournaments = Tournament::create([
            'title' => $request->title,
            'max_teams' => $request->max_teams,
        ]);

        $tournaments->save();

        return redirect()->route('tournaments.index');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return redirect()->route('tournaments.index');
    }
}
