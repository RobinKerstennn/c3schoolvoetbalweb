<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatchController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/





use App\Http\Controllers\GamesController;

Route::get('/games', [GamesController::class, 'getGamesJson']); // Voor alle games (wedstrijdinfo)
Route::get('/results', [GamesController::class, 'getResultsJson']); // Alleen de resultaten




Route::get('/matches/scores', [MatchController::class, 'getMatchScores']);

