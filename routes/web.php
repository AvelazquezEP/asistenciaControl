<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostHomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use PHPUnit\Framework\Attributes\Group;

/* #region OLD ROUTES */

// The configuration to auth login is in -> app\Providers\RouteServiceProvider.php

Auth::routes(); //<--- Este necesita de una clase (importarla arriba)

Route::controller(WelcomeController::class)->group(function () {
    // routes to main site
    Route::get('/', 'index')->name('welcome');
    Route::get('/welcome', 'index')->name('welcome');
    Route::get('/home', 'index')->name('welcome');
});

Route::get('/home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('Users.users');
    Route::get('/users', 'index')->name('Users.users');
    Route::get('/edit/{id}', 'edit')->name('Users.edit');
    Route::post('/user/update_ok/{id}', 'updated')->name('Users.update_ok');
    Route::get('/user/create', 'create')->name('Users.create');
    Route::post('/user/insert', 'insert')->name('Users.insert_ok');
    Route::get('/user/remove/{id}', 'destroy')->name('Users.deleted_ok');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(PostHomeController::class)->Group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/post/create', 'create')->name('posts.create');
    Route::post('/post/store', 'store')->name('post.store');
    Route::get('/post/edit/{i}', 'edit')->name('posts.edit');
    Route::post('/post/update/{id}', 'updated')->name('post.update');
    Route::post('/post/remove/{id}', 'remove')->name('post.remove');
});

Route::controller(RoleController::class)->group(function () {
    Route::get('/roles', 'index')->name('roles.index');
    Route::get('/roles/create', 'create')->name('roles.create');
    Route::post('/roles/store', 'store')->name('roles.store');
    Route::get('/roles/edit/{i}', 'edit')->name('roles.edit');
    Route::patch('/roles/update/{i}', 'update')->name('roles.update');
    Route::get('/roles/destroy/{i}', 'destroy')->name('roles.remove');
});

// CUSTOM MIDDLEWARE FOR SOME TABLES (Controllers)
Route::group(['middleware' => ['auth']], function () {
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/forgot-password', function () {
    // return view('auth.forgot-password');
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

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


/* #region TEST */

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
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('products', ProductController::class);
// });

/*  #endregion */