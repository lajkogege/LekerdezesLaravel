<?php

use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//User
Route::get('/users', [UserController::class, 'index']);
//kebabcase javasolt, nincs $ az útvonalban!
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store']);

//Lending
Route::get('/lendings', [LendingController::class, 'index']);
//kebabcase javasolt, nincs $ az útvonalban!
Route::get('/lending/{user_id}/{copy_id}/{start}', [LendingController::class, 'show']);
Route::post('/lending', [LendingController::class, 'store']);
//módosítás patch!!!, mert összetett kulcs
Route::patch('/lending/{user_id}/{copy_id}/{start}', [LendingController::class, 'update']);
Route::delete('/lending/{user_id}/{copy_id}/{start}', [LendingController::class, 'destroy']);