<?php

use App\Http\Controllers\ProfileController;
use Faker\Provider\Base;
use App\Models\Tournament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Console\Migrations\BaseCommand;
use App\Http\Controllers\TournamentsController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\TeamsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/user', function () {
    return redirect()->route('profiles.user', Auth::id());
});



Route::get('/', [BaseController::class, 'home'])->name('home');

Route::get('/home', [BaseController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/admin/users', [BaseController::class, 'index'])->name('users.index');
    Route::get('/admin/user/{user}/edit', [BaseController::class, 'userEdit'])->name('users.edit');
    Route::put('/admin/user/{user}/edit', [BaseController::class, 'userUpdate'])->name('users.update');
    Route::delete('/admin/user/{user}/delete', [BaseController::class, 'userDestroy'])->name('users.delete');

    Route::get('/adminPanel', [BaseController::class, 'admin'])->name('admin.adminPanel');

    Route::get('/referee/scores', [BaseController::class, 'scoresTonen'])->name('referee.scores');
    Route::get('/referee/addScores', [BaseController::class, 'addScores'])->name('referee.addScores');
    Route::post('/referee/addScores', [BaseController::class, 'storeScores'])->name('referee.storeScores');


    Route::get('/teambeheer', [TeamsController::class, 'index'])->name('teams.index');
    Route::post('/teambeheer', [TeamsController::class, 'store'])->name('teams.store');
    Route::get('/mijn-team', [TeamsController::class, 'mijnTeam'])->name('teams.mijnTeam');
    Route::get('/teams/{team}/edit', [TeamsController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/{team}', [TeamsController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team}', [TeamsController::class, 'destroy'])->name('teams.delete');

    Route::get('/admin/tournaments', [TournamentsController::class, 'index'])->name('tournaments.index');
    Route::get('/admin/teambeheer', [TeamsController::class, 'adminTeambeheer'])->name('admin.teambeheer');
    Route::put('/admin/tournament/{tournament}/edit', [TournamentsController::class, 'update'])->name('tournaments.update');
    Route::get('/admin/tournament/create', [TournamentsController::class, 'create'])->name('tournaments.create');
    Route::post('/admin/tournament/create', [TournamentsController::class, 'store'])->name('tournaments.store');
    Route::delete('/admin/tournament/delete/{tournament}', [TournamentsController::class, 'destroy'])->name('tournament.delete');


    Route::get('/wedstrijdschema', [TeamsController::class, 'wedstrijdSchema'])->name('wedstrijdschema');
    Route::get('/wedstrijdschema/tournament', [TeamsController::class, 'tournaments'])->name('wedstrijdschema.tournament');
    Route::get('/wedstrijdschema/tournamentsView/{tournament}', [TeamsController::class, 'tournamentsView'])->name('wedstrijdschema.tournaments.view');


    Route::get('/generateMatches', action: [GamesController::class, 'generateMatches'])->name('generate.matches');
    Route::get('/scores-only', [GamesController::class, 'onlyScores'])->name('scores.only');

    Route::get('/games/{tournament_id}/leaderboard', [GamesController::class, 'leaderboard'])->name('games.leaderboard');
    Route::get('/leaderboard/home', [GamesController::class, 'show'])->name('leaderboard.home');
});

Route::get('/user/{user}', [BaseController::class, 'user'])->name('profiles.user');
Route::get('/user/{user}/edit', [BaseController::class, 'userEdit'])->name('users.edit');

Route::post('/logout', [BaseController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
