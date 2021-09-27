<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'index']);

Route::get('/plataformaCreate', [GameController::class, 'createPlat'])->middleware('auth')  ;
Route::post('/plataformaCreate', [GameController::class, 'storePlat']);

Route::get('/dashboardPlataforma', [GameController::class, 'dashboardPlataforma'])->middleware('auth');

Route::delete('/dashboardPlataforma_{id}', [GameController::class, 'destroyPlat'])->middleware('auth');
Route::get('/plataformaedit_{id}', [GameController::class, 'editPlat'])->middleware('auth');
Route::put('/plataformaupdate_{id}', [GameController::class, 'updatePlat'])->middleware('auth');


Route::get('/gamesCreate', [GameController::class, 'createGame'])->middleware('auth');
Route::post('/gamesCreate', [GameController::class, 'storeGame']);

Route::get('/games_{id}', [GameController::class, 'show'])->middleware('auth');
Route::delete('/games_{id}', [GameController::class, 'destroyGame'])->middleware('auth');

Route::get('/gamesedit_{id}', [GameController::class, 'editGame'])->middleware('auth');
Route::put('/gamesupdate_{id}', [GameController::class, 'updateGame'])->middleware('auth');

Route::get('/games', [GameController::class, 'games']);

Route::get('/dashboard', [GameController::class, 'dashboard'])->middleware('auth');
