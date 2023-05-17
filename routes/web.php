<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginRegisterController;
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

Route::controller(UserController::class)->group(function () {    
    // Route::get('/users', [UserController::class, 'index'])->name('Users.users');
    Route::get('/users', 'index')->name('Users.users');    
    // Route::get('/edit/{id}', [UserController::class, 'edit'])->name('Users.edit');
    Route::get('/edit/{id}', 'edit')->name('Users.edit');    
    // Route::post('/user/update_ok/{id}', [UserController::class, 'updated'])->name('Users.update_ok');
    Route::post('/user/update_ok/{id}', 'updated')->name('Users.update_ok');    
    // Route::get('/user/create', [UserController::class, 'create'])->name('Users.create');
    Route::get('/user/create', 'create')->name('Users.create');    
    // Route::post('/user/insert', [UserController::class, 'insert'])->name('Users.insert_ok');
    Route::post('/user/insert', 'insert')->name('Users.insert_ok');    
    // Route::get('/user/remove/{id}', [UserController::class, 'destroy'])->name('Users.deleted_ok');
    Route::get('/user/remove/{id}', 'destroy')->name('Users.deleted_ok');
});

// Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
