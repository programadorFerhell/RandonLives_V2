<?php

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

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/',function() {
    return view('home.home');
})->name('home');

Route::get('/list_games', function(){
    return view('games.list_games');
})->name('list_games');

Route::get('/cad_games', function() {
    return view('games.cad_games');
})->name('cad_games');

Route::get('/sort_games', function() {
    return view('games.sort_games');
})->name('sort_games');
