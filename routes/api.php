<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\GeneroGames;

use App\Http\Controllers\GamesController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/games/cadastrarGame', [GamesController::class, 'cadastrarGame'])->name('cadastrarGame');
Route::get('/games/buscarGame/{id}', [GamesController::class, 'buscarGame'])->name('');
Route::put('/games/atualizarGame/{id}', [GamesController::class, 'atualizarGame'])->name('atualizarGame');
Route::delete('/games/excluirGame/{id}', [GamesController::class, 'excluirGame'])->name('excluirGame');
Route::get('/games/listarGames', [GamesController::class, 'listarGames'])->name('listarGames');
Route::get('/games/random', [GamesController::class, 'getRandom'])->name('random');
Route::get('/games/randomnome', [GamesController::class, 'getNomeJogoRandom'])->name('randomnome');


Route::get('/games/generos', function () {
    return GeneroGames::all();
})->name('generos');
