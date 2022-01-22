<?php

use Illuminate\Support\Facades\Route;

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
