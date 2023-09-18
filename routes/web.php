<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamItemsController;
use App\Http\Controllers\examUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostHomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ResourceExamsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\PostController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuestionExamController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResourceCategoryController;
use App\Http\Controllers\SchedulerController;
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
Route::controller(ResourceController::class)->Group(function () {
    Route::get('/resources/{id}', 'index')->name('resources.index');
    Route::get('/resource/show/{id}', 'show')->name('resource.show');
    Route::get('/resource/create', 'create')->name('resource.create');
    Route::post('/resource/store', 'store')->name('resource.store');
    Route::get('/resource/edit/{id}', 'edit')->name('resource.edit');
    Route::post('/resource/update/{id}', 'update')->name('resource.update');
    Route::get('/resource/destroy/{id}', 'destroy')->name('resource.remove');
});
/* #endregion */

/* #region RESOURCECATEGORYCONTROLLER */
Route::controller(ResourceCategoryController::class)->Group(function () {
    Route::get('/categories', 'index')->name('category.index');
    Route::get('/category/show/{id}', 'show')->name('category.show');
    Route::get('/category/create', 'create')->name('category.create');
    Route::post('/category/store', 'store')->name('category.store');
    Route::get('/category/edit/{id}', 'edit')->name('category.edit');
    Route::post('/category/update/{id}', 'update')->name('category.update');
    Route::get('/category/destroy/{id}', 'destroy')->name('category.remove');
});
/* #endregion */

/* #region EXAM MODULE */

/* #region RESOURCE EXAMS */
Route::controller(ResourceExamsController::class)->Group(function () {
    Route::get('/resource/exam', 'index')->name('resource_exams.index');
    Route::get('/resource/exam/show/{id}', 'show')->name('resource_exams.show');
    Route::get('/resource/exam/create', 'create')->name('resource_exams.create');
    Route::post('/resource/exam/store', 'store')->name('resource_exams.store');
    Route::get('/resource/exam/edit/{id}', 'edit')->name('resource_exams.edit');
    Route::post('/resource/exam/update/{id}', 'update')->name('resource_exams.update');
    Route::get('/resource/exam/destroy/{id}', 'destroy')->name('resource_exams.remove');
});
/* #endregion */

/* #region ExamItem Controller */
Route::controller(ExamItemsController::class)->Group(function () {
    Route::get('/exam/{id}', 'index')->name('exam.index');
    Route::get('/exam/show/{id}', 'show')->name('exam.show');
    Route::get('/exam/create/{id}', 'create')->name('exam.create');
    Route::post('/exam/store', 'store')->name('exam.store');
    Route::get('/exam/edit/{id}', 'edit')->name('exam.edit');
    Route::post('/exam/update/{id}', 'update')->name('exam.update');
    Route::get('/exam/destroy/{id}', 'destroy')->name('exam.destroy');
});
/* #endregion */

/* #region QuestionExamController */
Route::controller(QuestionExamController::class)->Group(function () {
    Route::get('/question/index', 'index')->name('questionExam.index');
    Route::get('/question/create/{id}', 'create')->name('questionExam.create');
    Route::post('/question/store', 'store')->name('questionExam.store');
    Route::get('/question/edit/{id}', 'edit')->name('questionExam.edit');
    Route::post('/question/update/{id}', 'update')->name('questionExam.update');
    Route::get('/question/destroy/{id}', 'destroy')->name('questionExam.destroy');
});
/* #endregion */

/* #region EXAM USER */
Route::controller(examUserController::class)->Group(function () {
    Route::get('/examuser/{id}', 'index')->name('examuser.index');
    Route::get('/examuser/show/{id}', 'show')->name('examuser.show');
    Route::get('/examuser/create', 'create')->name('examuser.create');
    Route::post('/examuser/store/{id}', 'store')->name('examuser.store');
    Route::post('/examuser/question', 'save_question')->name('examuser.save_question');
});
/* #endregion */

/* #endregion */

/* #region PERMISSIONS */
Route::controller(PermissionController::class)->Group(function () {
    Route::get('/permissions', 'index')->name('permission.index');
    Route::get('/permission/create', 'create')->name('permission.create');
    Route::get('/permission/store', 'store')->name('permission.store');
    Route::get('/permission/edit/{id}', 'edit')->name('permission.edit');
    Route::get('/permission/update/{id}', 'updated')->name('permission.update');
    Route::get('/permission/destroy/{id}', 'destroy')->name('permission.remove');
});
/* #endregion */

/* #region SCHEDULERS */
Route::controller(SchedulerController::class)->Group(function () {
    Route::get('/schedulers', 'index')->name('scheduler.index');
    Route::get('/scheduler/create/{id}', 'create')->name('scheduler.create');
    Route::post('/scheduler/store', 'store')->name('scheduler.store');
    Route::get('/scheduler/edit/{id}', 'edit')->name('scheduler.edit');
    Route::post('/scheduler/update/{id}', 'update')->name('scheduler.update');
    Route::get('/scheduler/destroy/{id}', 'destroy')->name('scheduler.remove');
});
/* #endregion */

/* #region REQUESTS */
Route::controller(RequestController::class)->Group(function () {
    Route::get('/requests', 'index')->name('request.index');
    Route::get('/request/create', 'create')->name('request.create');
    Route::get('/request/store', 'store')->name('request.store');
    Route::get('/request/edit/{id}', 'edit')->name('request.edit');
    Route::get('/request/update/{id}', 'updated')->name('request.update');
    Route::get('/request/destroy/{id}', 'destroy')->name('request.remove');
});
/* #endregion */

/* #region CUSTOM MIDDLEWARE FOR SOME TABLES (Controllers) */
Route::group(['middleware' => ['auth']], function () {
    // Route::resource('roles', RoleController::class);
    // Route::resource('resources', ResourceController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
/* #endregion */
