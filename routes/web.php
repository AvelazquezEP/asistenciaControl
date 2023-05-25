<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostHomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\PostController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\HomeController;
use PHPUnit\Framework\Attributes\Group;

Auth::routes(); //<--- Este necesita de una clase (importarla arriba)

/* #region WELCOMECONTROLLER / HOME */

Route::controller(WelcomeController::class)->group(function () {
    // remember comment the las 2 routes if we need clear the cache
    Route::get('/', 'index')->name('welcome');
    Route::get('/welcome', 'index')->name('welcome');
    // Route::get('/home', 'index')->name('welcome');
});

// Route::get('/home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

/* #ENDREGION */

/* #region DASHBOARDCONTROLLER */

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

/* #ENDREGION */

/* #region USERCONTROLLER */

Route::controller(UserController::class)->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('Users.users');
    Route::get('/users', 'index')->name('Users.users');
    Route::get('/edit/{id}', 'edit')->name('Users.edit');
    Route::post('/user/update_ok/{id}', 'updated')->name('Users.update_ok');
    Route::get('/user/create', 'create')->name('Users.create');
    Route::post('/user/insert', 'insert')->name('Users.insert_ok');
    Route::get('/user/remove/{id}', 'destroy')->name('Users.deleted_ok');
});

/* #ENDREGION */

/* #region LOGINCONTROLLER */

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

/* #ENDREGION */

/* #region POSTCONTROLLER */

Route::controller(PostHomeController::class)->Group(function () {
    // Route::get('/resst', 'resst')->name('res.index');
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/post/create', 'create')->name('post.create');
    Route::post('/post/store', 'store')->name('post.store');
    Route::get('/post/edit/{i}', 'edit')->name('post.edit');
    Route::post('/post/update/{id}', 'update')->name('post.update');
    Route::get('/post/remove/{id}', 'destroy')->name('post.remove');
});
/* #ENDREGION */

/* #region ROLECONTROLLER */

Route::controller(RoleController::class)->group(function () {
    Route::get('/roles', 'index')->name('roles.index');
    Route::get('/roles/create', 'create')->name('roles.create');
    Route::post('/roles/store', 'store')->name('roles.store');
    Route::get('/roles/edit/{i}', 'edit')->name('roles.edit');
    Route::patch('/roles/update/{i}', 'update')->name('roles.update');
    Route::get('/roles/destroy/{i}', 'destroy')->name('roles.remove');
});

/* #ENDREGION */

/* #region RESOURCECONTROLLER */

Route::controller(ResourceController::class)->group(function () {
    Route::get('/resources', 'index')->name('resources.index');
    // Route::get('/resource/create', 'create')->name('resources.create');
    // Route::get('/resources/store', 'store')->name('resources.store');
    // Route::get('/resources/edit/{id}', 'edit')->name('resources.edit');
    // Route::get('/resources/update/{id}', 'update')->name('resources.update');
    // Route::get('/resources/remove/{id}', 'remove')->name('resources.remove');
});

/* #endregion */

/* #region CUSTOM MIDDLEWARE FOR SOME TABLES (Controllers) */

Route::group(['middleware' => ['auth']], function () {
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

/* #endregion */

/* #region FORGOT PASSWORD */

Route::get('/forgot-password', function () {
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
