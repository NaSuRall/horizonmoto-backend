<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/login', [\App\Http\Controllers\Api\UsersController::class, 'login']);

Route::get('/users', [\App\Http\Controllers\Api\UsersController::class, 'index']);
Route::get('/user/{id}', [\App\Http\Controllers\Api\UsersController::class, 'show']);
Route::post('/register', [\App\Http\Controllers\Api\UsersController::class, 'store']);
Route::put('/user/{id}', [\App\Http\Controllers\Api\UsersController::class, 'update']);
Route::delete('/user/{id}', [\App\Http\Controllers\Api\UsersController::class, 'destroy']);


Route::get('/produits', [\App\Http\Controllers\Api\ProduitController::class, 'index']);
Route::get('/produits/{id}', [\App\Http\Controllers\Api\ProduitController::class, 'show']);
Route::post('/produits', [\App\Http\Controllers\Api\ProduitController::class, 'store']);
Route::put('/produits/{id}', [\App\Http\Controllers\Api\ProduitController::class, 'update']);
Route::delete('/produits/{id}', [\App\Http\Controllers\Api\ProduitController::class, 'destroy']);



Route::get('/categories', [\App\Http\Controllers\Api\CategorieController::class, 'index']);
Route::get('/categories/{id}', [\App\Http\Controllers\Api\CategorieController::class, 'show']);
Route::post('/categories', [\App\Http\Controllers\Api\CategorieController::class, 'store']);
Route::put('/categories/{id}', [\App\Http\Controllers\Api\CategorieController:: class, 'update']);
Route::delete('/categories/{id}', [\App\Http\Controllers\Api\CategorieController::class, 'destroy']);


Route::get('/marques', [\App\Http\Controllers\Api\MarqueController::class, 'index']);
Route::get('/marques/{id}', [\App\Http\Controllers\Api\MarqueController::class, 'show']);
Route::post('/marques', [\App\Http\Controllers\Api\MarqueController::class, 'store']);
Route::put('/marques/{id}', [\App\Http\Controllers\Api\MarqueController::class, 'update']);
Route::delete('/marques/{id}', [\App\Http\Controllers\Api\MarqueController::class, 'destroy']);