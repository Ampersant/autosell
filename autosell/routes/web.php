<?php

use App\Http\Controllers\AutoController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AuthViewController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'index'])->name('index');
Route::get('/about', [ViewController::class, 'about'])->name('about.show');
Route::get('/blog', [ViewController::class, 'blog'])->name('blog.show');
Route::get('/item/{id}', [ViewController::class, 'singleitem'])->name('singleitem.show');

Route::delete('/delete/item/{id}', [AutoController::class, 'destroy'])->name('singleitem.destroy');
Route::get('/images/{path}', [ImageController::class, 'show'])->name('image.show');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ViewController::class, 'profile'])->name('profile.index');
    Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('dashboard.show');
    //form
    Route::get('/adform', [ViewController::class, 'adform'])->name('ad.form.show');
    Route::post('/adformstore', [AutoController::class, 'adform_store'])->name('ad.form.store');
    //chat
    Route::get('/chats', [ViewController::class, 'showchat'])->name('chat.show');
    Route::post('/chats/{chatId}', [ChatController::class, 'message_send'])->name('message.send');
    //admin
    Route::get('/adminpanel', [ViewController::class, 'adminpanel'])->name('admin.show');
});
//toauth
Route::get('/register', [ViewController::class, 'register'])->name('register.show');
Route::get('/login', [ViewController::class, 'login'])->name('login.show');
// 


  
require __DIR__.'/auth.php';
