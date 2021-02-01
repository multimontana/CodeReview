<?php

use App\Http\Controllers\Api\Admin\Course\AdminCourseController;
use Illuminate\Support\Facades\Route;

/** Префикс admin */

Route::middleware(['auth:admin', 'scope:admin'])->group(function () {

    Route::prefix('/courses')->group(function () {
        Route::get('/get', [AdminCourseController::class, 'getCoursesAction']);
    });

    Route::prefix('/course')->group(function () {
        Route::get('/get-by-id/{courseId}', [AdminCourseController::class, 'getCourseByIdAction']);
        Route::post('/create', [AdminCourseController::class, 'createAction']);
        Route::post('/update/{id}', [AdminCourseController::class, 'updateAction']);
        Route::delete('/delete/{id}', [AdminCourseController::class, 'deleteAction']);
    });
});
