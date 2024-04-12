<?php

use App\Http\Controllers\Api\MarkModelController;
use Illuminate\Http\Request;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/roles', [RolesController::class, 'index']);
Route::get('/getmodelsbymark', [MarkModelController::class, 'getbymark']);
