<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[TeamController::class, 'index'])->name('home');
Route::get('/teams/{id}', [TeamController::class, 'show'])->name('single-team');
Route::get('/player/{id}', [PlayerController::class, 'show'])->name('single-player');