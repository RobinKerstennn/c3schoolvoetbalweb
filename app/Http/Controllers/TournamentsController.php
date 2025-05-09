<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentsController extends Controller
{
    //
    public function index(){
        $tournaments = Tournament::all();
        return view('tournaments.index', ['tournaments' =>$tournaments]);
    }

    public function edit(Tournament $tournament){
        return view('tournaments.edit', ['tournament' => $tournament]);
    }

    public function update(Request $request, Tournament $tournament){
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
}
