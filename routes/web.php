<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\UsersController;

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

Route::get('/', [\App\Http\Controllers\CVController::class, 'welcome'])->name('cv.welcome');
Route::post('/send', [\App\Http\Controllers\CVController::class, 'sendMail'])->name('cv.sendMail');

Route::get('/spa', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'admin']], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::group(['prefix' => 'admin',], function () {
        Route::group(['prefix' => 'users',], function () {
            Route::get('/', [UsersController::class, 'index'])->name('users.index');
            Route::get('/create', [UsersController::class, 'create'])->name('users.create');
            Route::post('/store', [UsersController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
            Route::get('/{id}', [UsersController::class, 'show'])->name('users.show');
            Route::post('/update/{id}', [UsersController::class, 'update'])->name('users.update');
            Route::post('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
        });
    });
});


