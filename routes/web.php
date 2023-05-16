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
// MAIN (index.html)
Route::get('/', function () {
    return view('welcome');
})->name('index.welcome');
// All USERS
Route::get('/users', [UserController::class, 'index'])->name('Users.users');
// USER by ID
Route::get('/user/{id}', [UserController::class, 'userById'])->name(('Users.user'));
// UPDATED USER
Route::get('/user/update_ok/{id}', [UserController::class, 'updated'])->name(('Users.update_ok'));
