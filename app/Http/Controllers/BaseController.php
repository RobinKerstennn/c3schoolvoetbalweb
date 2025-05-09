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

    public function admin(){
        $teams =  Team::all();
        $users = User::all();
        $tournaments = Tournament::all();
        $games = Game::all();

        return view('admin.adminPanel', ['games' => $games, 'teams' => $teams, 'users' => $users, 'tournaments' => $tournaments ]);
    }

    public function logout(User $user)
    {
        Auth::logout($user);
        return view('home');
    }

    public function index(){
        $users = User::all();
        $teams = Team::all();
        return view('users.index', ['users' => $users]);
    }


    public function userEdit(User $user){
        return view('users.userEdit', ['user' => $user]);
    }

    public function userUpdate(Request $request, User $user){
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

    public function userDestroy(User $user){
        $user->delete();

        return redirect()->route('users.index');
    }
}
