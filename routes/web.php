<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\RegisterController;
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

Route::resource('/keluhan', KeluhanController::class)->only(['create', 'store', 'index', 'edit', 'update', 'destroy']);
Route::resource('/bidang', BidangController::class)->only(['create', 'store', 'index']);
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/registration', [RegisterController::class, 'show']);
Route::post('/registration', [RegisterController::class, 'store']);
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::get('/', [Controller::class, 'home'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout']);
