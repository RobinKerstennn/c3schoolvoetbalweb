<?php

use App\Http\Controllers\BaseController;
use Illuminate\Database\Console\Migrations\BaseCommand;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BaseController::class, 'home'])->name('home');

Route::get('/home', [BaseController::class, 'home'])->name('home');

Route::get('/user', function(){
    return redirect()->route('profiles.user', Auth::id());
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

use App\Http\Controllers\TeamsController;

Route::get('/teambeheer', [TeamsController::class, 'index'])->name('teams.index');
Route::post('/teambeheer', [TeamsController::class, 'store'])->name('teams.store');
Route::get('/mijn-team', [TeamsController::class, 'mijnTeam'])->name('teams.mijnTeam');
Route::get('/teams/{team}/edit', [TeamsController::class, 'edit'])->name('teams.edit');
Route::get('/teams/{team}', [TeamsController::class, 'update'])->name('teams.update');


require __DIR__.'/auth.php';
