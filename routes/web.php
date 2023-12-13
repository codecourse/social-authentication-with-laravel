<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Social\AuthCallbackController;
use App\Http\Controllers\Social\AuthIndexController;
use App\Http\Controllers\Social\AuthRedirectController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/auth', AuthIndexController::class)->name('auth.index');

    Route::get('/auth/redirect/{service}', AuthRedirectController::class)->name('auth.redirect');
    Route::get('/auth/callback/{service}', AuthCallbackController::class)->name('auth.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
