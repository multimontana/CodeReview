<?php

use App\Http\Controllers\Api\Admin\Group\AdminGroupController;
use Illuminate\Support\Facades\Route;

/** Префикс admin/group */

Route::middleware(['auth:admin', 'scope:admin'])->group(function () {
    Route::get('/type/{typeId}/difficulty/{difficultyId}/category/{categoryId}', [AdminGroupController::class, 'getGroupWithCategoryAndDifficultyAction']);
    Route::post('/create', [AdminGroupController::class, 'createAction']);
    Route::put('/update/{id}', [AdminGroupController::class, 'updateAction']);
    Route::delete('/delete/{id}', [AdminGroupController::class, 'deleteAction']);
});
