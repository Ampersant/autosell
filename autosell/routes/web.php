<?php

use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'index'])->name('index');
Route::middleware(['auth'])->group(function () {
});
Route::get('/profile', [ViewController::class, 'profile'])->name('profile.index');

require __DIR__.'/auth.php';
