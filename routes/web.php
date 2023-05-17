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

// MAIN (index.html)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// All USERS
Route::get('/users', [UserController::class, 'index'])->name('Users.users');
// UPDATED USER
Route::get('/edit/{id}', [UserController::class, 'edit'])->name('Users.edit');
// UPDATED USER
Route::post('/user/update_ok/{id}', [UserController::class, 'updated'])->name('Users.update_ok');
// CREATE USER
Route::get('/user/create', [UserController::class, 'create'])->name('Users.create');
// CREATE USER
Route::post('/user/insert', [UserController::class, 'insert'])->name('Users.insert_ok');
// DELETE USER
Route::post('/user/remove/{id}', [UserController::class, 'destroy'])->name('Users.deleted_ok');
