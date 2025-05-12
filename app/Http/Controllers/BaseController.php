<?php

namespace App\Http\Controllers;
use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        return view('home', ['user' => $user]);
    }
    public function user()
    {
        $users = User::all();
        return view('users.user', ['users' => $users]);
    }

    public function admin()
    {
        $teams = Team::all();
        $users = User::all();
        $tournaments = Tournament::all();
        $games = Game::all();

        return view('admin.adminPanel', ['games' => $games, 'teams' => $teams, 'users' => $users, 'tournaments' => $tournaments]);
    }

    public function logout(User $user)
    {
        Auth::logout($user);
        return view('home');
    }

    public function index()
    {
        $users = User::all();
        $teams = Team::all();
        return view('users.index', ['users' => $users]);
    }


    public function userEdit(User $user)
    {
        return view('users.userEdit', ['user' => $user]);
    }

    public function userUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'role' => ['required'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index');
    }

    public function userDestroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
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

    public function storeScores(Request $request)
    {
        $data = $request->validate([
            'scores' => 'required|array',
            'scores.*.team1' => 'required|integer',
            'scores.*.team2' => 'required|integer',
            'scores.*.game_id' => 'required|exists:games,id',
        ]);

        foreach ($data['scores'] as $score) {
            Game::where('id', $score['game_id'])->update([
                'team_1_score' => $score['team1'],
                'team_2_score' => $score['team2'],
            ]);
        }

        return redirect()->route('referee.scores');
    }
}
