<?php

use App\Http\Controllers\UserController;
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

// EL ORDEN DE LA FUNCION DE FLECHA VA AL FINAL (DESPUÉS DE TERMINAR LA FUNCTION)
Route::get('/', function () {
    return view('welcome');
})->name('index.welcome');

// Route::get('/', 'UserController@index')->name('index.topics');
Route::get('/users', [UserController::class, 'index'])->name('Users.users');
