<?php

use App\Http\Controllers\Api\Admin\Category\AdminCategoryController;
use Illuminate\Support\Facades\Route;

/** Префикс admin */

Route::middleware(['auth:admin', 'scope:admin'])->group(function () {

    Route::prefix('/categories')->group(function () {
        Route::get('/get', [AdminCategoryController::class, 'getCategoriesAction']);
    });

    Route::prefix('category')->group(function () {
        Route::get('/childes/by-category-id/{categoryId}', [AdminCategoryController::class, 'getCategoryChildesAction']);
        Route::post('/create', [AdminCategoryController::class, 'createAction']);
        Route::put('/update/{id}', [AdminCategoryController::class, 'updateAction']);
        Route::delete('/delete/{id}', [AdminCategoryController::class, 'deleteAction']);
    });
});



