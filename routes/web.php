<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// The configuration to auth login is in -> app\Providers\RouteServiceProvider.php
// MAIN (index.html)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('welcome');
});

Route::controller(UserController::class)->group(function () {
    // Route::get('/users', [UserController::class, 'index'])->name('Users.users');
    Route::get('/users', 'index')->name('Users.users');
    Route::get('/edit/{id}', 'edit')->name('Users.edit');
    Route::post('/user/update_ok/{id}', 'updated')->name('Users.update_ok');
    Route::get('/user/create', 'create')->name('Users.create');
    Route::post('/user/insert', 'insert')->name('Users.insert_ok');
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

/* #region pass */

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

/* #endregion */