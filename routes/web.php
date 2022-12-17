<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HashController;
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

Route::get('/', function () {
    return view('hash');
});

Route::view('/login', 'login')->name('login')->middleware('guest');
Route::view('/register', 'register')->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::view('/hash', 'hash')->middleware('auth');
Route::post('/hash', [HashController::class, 'hash'])->middleware('auth');
Route::post('/verify_hash', [HashController::class, 'verify_hash'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
