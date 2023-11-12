<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
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
Route::post('forgot-password', ForgotPasswordController::class)->name('forgotpassword');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('register', [UserController::class, 'create']);
Route::post('register', [UserController::class, 'store']);

Route::patch('shortcut/{shortcut}/restore', [ShortcutController::class, 'restore'])->name('shortcut.restore')->withTrashed()->middleware('auth');
Route::get('shortcut/share', [ShortcutController::class, 'share']);
Route::get('shortcut/trashed', [ShortcutController::class, 'indexTrashed']);

Route::resource('shortcut', ShortcutController::class)->middleware('auth')->withTrashed()->middleware('shortcut.owner');


