<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CharacterAttributeController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CharacterClassController;
use App\Http\Controllers\VerificationController;



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
    return view('intro');
});

Route::resource('character',CharacterController::class);
Route::resource('characterAttribute',CharacterAttributeController::class);
Route::resource('attribute',AttributeController::class);
Route::resource('user',UserController::class);
Route::resource('character_class',CharacterclassController::class);
Route::get('/character/game/{character}',[CharacterController::class,'sendToGame']);
Route::delete('/character/perma/{character}',[CharacterController::class,'permaDelete']);
Route::get('/character/recover/{delId}',[CharacterController::class,'recover']);
Route::get('/character/createU/{userId}',[CharacterController::class,'createU']);
Route::put('/character/game/saveGameData/{character}',[CharacterController::class,'saveGameData']);
Auth::routes();
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/home/{order}/{busqueda?}', [App\Http\Controllers\HomeController::class, 'orderByInput']);
Route::post('/busqueda', [App\Http\Controllers\HomeController::class, 'search']);
Route::get('/userOrder/{order}/{busqueda?}', [App\Http\Controllers\UserController::class, 'orderByInput']);
Route::get('/showOrder/{order}/{busqueda?}', [App\Http\Controllers\UserController::class, 'showorderByInput']);
