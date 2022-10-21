<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('/auth/register',[RegisterController::class, 'create']);
Route::post('auth/register', [RegisterController::class, 'store']);
Route::get('verification/{user}/{token}', [RegisterController::class, 'verify']);

Route::get('/auth/login', [LoginController::class, 'create'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store']);

Route::get('/auth/logout', [LoginController::class, 'destroy'])->name('logout');

Route::post('/teams/{team_id}/comments',[CommentController::class, 'store'])->middleware('ForbidenWords')->name('team-comments');
