<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShortcutController;
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

Route::get('/', IndexController::class)->name('home');
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('register', [UserController::class, 'create']);
Route::post('register', [UserController::class, 'store']);


Route::resource('shortcut', ShortcutController::class)->withTrashed()->middleware('auth');
Route::put('shortcut/{shortcut}/restore', [ShortcutController::class, 'restore'])->name('shortcut.restore')->middleware('auth');

