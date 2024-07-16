<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;

Route::apiResource('categorias', CategoriaController::class);

Route::prefix('categorias/{categoria}')->group(function () {
    Route::post('subcategorias', [SubcategoriaController::class, 'store']);
    Route::get('subcategorias', [SubcategoriaController::class, 'index']);
    Route::get('subcategorias/{subcategoria}', [SubcategoriaController::class, 'show']);
    Route::put('subcategorias/{subcategoria}', [SubcategoriaController::class, 'update']);
    Route::delete('subcategorias/{subcategoria}', [SubcategoriaController::class, 'destroy']);
});