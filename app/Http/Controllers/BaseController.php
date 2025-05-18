<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $tournaments = Tournament::all();
        return view('home', ['user' => $user, 'tournaments' => $tournaments]);
    }

    public function user()
    {
        $users = User::all();
        return view('users.user', ['users' => $users]);
    }

    public function admin()
    {
        $teams =  Team::all();
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

    public function addScores(Game $game)
    {
        return view('scores.addScores', ['game' => $game]);
    }

    public function storeScores(Request $request, Game $game)
    {
        $request->validate([
            'team1' => 'required|integer',
            'team2' => 'required|integer',
            'game_id' => 'required|exists:games,id',
        ]);


        Game::where('id', $game->id)->update([
            'team_1_score' => $request->team1,
            'team_2_score' => $request->team2,
        ]);

        return redirect()->route('wedstrijdschema');
    }


    public function userAddTeam()
    {
        $user = Auth::user();
        $tournaments = Tournament::all();
        return view('users.addTeam', ['user' => $user, 'tournaments' => $tournaments]);
    }

    public function storeTeam(Request $request)
    {
        $request->validate([
            'team' => ['required'],
            'tournament' => ['required'],
        ]);


        $team = Team::where('name', $request->team)->first();
        $tournament = Tournament::where('title', $request->tournament)->first();

        $max_teams_tournament = $tournament->teams()->count();
        if ($max_teams_tournament >= $tournament->max_teams) {
            return redirect()->back()->withErrors(['error' => 'The maximum number of teams for this tournament has been reached.']);
        }

        if (!$team || !$tournament) {
            return redirect()->back()->withErrors(['error' => 'This team is already added to the tournament.']);
        }

        if (!$tournament->teams()->where('team_id', $team->id)->exists()) {
            $tournament->teams()->attach($team->id);
        }

        $max_teams_tournament++;
        return redirect()->route('teams.mijnTeam');
    }

    public function generateMatches(Tournament $tournament)
    {
        $teams = $tournament->teams;
        $max_teams_tournament = $tournament->teams()->count();
        if ($max_teams_tournament >= 8) {
            foreach ($teams as $team_1) {
                $i = $team_1->id;
                foreach ($teams as $team_2) {
                    $j = $team_2->id;
                    if ($j > $i) {
                        $game = Game::create([
                            'team_1' => $i,
                            'team_2' => $j,
                            'tournament_id' => $tournament->id,
                        ]);
                        $tournament->update([
                            'started' => now(),
                        ]);
                    }
                }
            }

        }
        else{
            return redirect()->back()->withErrors(['error' => 'The maximum number of teams for this tournament has been reached.']);
        }

        $games = Game::all();
        return redirect()->route('wedstrijdschema');
    }
}


// public function storeScores(Request $request)
//     {

//         $data = $request->validate([
//             'scores' => 'required|array',
//             'scores.*.team1' => 'required|integer',
//             'scores.*.team2' => 'required|integer',
//             'scores.*.game_id' => 'required|exists:games,id',
//         ]);

//         foreach ($data['scores'] as $score) {
//             Game::where('id', $score['game_id'])->update([
//                 'team_1_score' => $score['team1'],
//                 'team_2_score' => $score['team2'],
//             ]);
//         }

//         return redirect()->route('referee.scores');
//     }
