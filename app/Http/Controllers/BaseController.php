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

        return view('admin.adminPanel', ['games' => $games, 'teams' => $teams, 'users' => $users,  ]);
    }

    public function logout(User $user)
    {
        Auth::logout($user);
        return view('home');
    }

    public function userEdit(User $user){
        return view('users.userEdit', ['user' => $user]);
    }
}
