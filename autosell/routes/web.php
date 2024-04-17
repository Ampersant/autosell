<?php

use App\Http\Controllers\AutoController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'index'])->name('index');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ViewController::class, 'profile'])->name('profile.index');
    Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('dashboard.show');
    Route::get('/adform', [ViewController::class, 'adform'])->name('ad.form.show');
    Route::post('/adformstore', [AutoController::class, 'adform_store'])->name('ad.form.store');
});
Route::get('/register', [ViewController::class, 'register'])->name('register.show');
Route::get('/login', [ViewController::class, 'login'])->name('login.show');

require __DIR__.'/auth.php';
