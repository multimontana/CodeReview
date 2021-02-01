<?php

use App\Http\Controllers\Api\Admin\News\AdminNewsController;
use Illuminate\Support\Facades\Route;

/** Префикс admin */

Route::middleware(['auth:admin', 'scope:admin'])->group(function () {

    Route::prefix('/newses')->group(function () {
        Route::get('/get', [AdminNewsController::class, 'getNewsesAction']);
    });

    Route::prefix('/news')->group(function () {
        Route::get('/get-by-id/{newsId}', [AdminNewsController::class, 'getNewsByIdAction']);
        Route::post('/create', [AdminNewsController::class, 'createAction']);
        Route::post('/update/{id}', [AdminNewsController::class, 'updateAction']);
        Route::delete('/delete/{id}', [AdminNewsController::class, 'deleteAction']);
    });
});
