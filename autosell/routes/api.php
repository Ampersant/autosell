<?php

use App\Http\Controllers\Api\MarkModelController;
use App\Http\Controllers\Api\StateController;
use Illuminate\Http\Request;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/roles', [RolesController::class, 'index']);
Route::get('/getmodelsbymark', [MarkModelController::class, 'getbymark']);
Route::get('/getmarks', [TypeController::class, 'getmarks']);
Route::get('/getforms', [TypeController::class, 'getforms']);
Route::get('/getstates', [StateController::class, 'getstates']);
