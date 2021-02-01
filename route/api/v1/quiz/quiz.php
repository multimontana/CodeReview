<?php

use App\Http\Controllers\Api\Admin\Quiz\AdminQuizController;
use App\Http\Controllers\Api\Admin\Quiz\AdminQuizQuestionController;
use App\Http\Controllers\Api\Admin\Quiz\AdminQuizThemeController;
use Illuminate\Support\Facades\Route;

/** Префикс admin */

Route::middleware(['auth:admin', 'scope:admin'])->group(function () {

    Route::prefix('/quizzes')->group(function (){
        Route::get('/get', [AdminQuizController::class, 'getQuizzesAction']);
    });

    Route::prefix('quiz')->group(function () {
        Route::get('/get-by-id/{quizId}', [AdminQuizController::class, 'getQuizByIdWithThemesAction']);
        Route::post('/create', [AdminQuizController::class, 'createAction']);
        Route::post('/update/{id}', [AdminQuizController::class, 'updateAction']);
        Route::delete('/delete/{id}', [AdminQuizController::class, 'deleteAction']);

        Route::prefix('/questions')->group(function () {
            Route::get('/get-by-quiz-id/{quizId}', [AdminQuizQuestionController::class, 'getQuestionsByQuizIdAction']);
        });

        Route::prefix('/question')->group(function () {
            Route::get('/get-by-id/{questionId}', [AdminQuizQuestionController::class, 'getQuestionByIdAction']);
            Route::post('/create', [AdminQuizQuestionController::class, 'createAction']);
            Route::put('/update/{id}', [AdminQuizQuestionController::class, 'updateAction']);
            Route::delete('/delete/{id}', [AdminQuizQuestionController::class, 'deleteAction']);
        });

        Route::prefix('/themes')->group(function () {
            Route::get('/get', [AdminQuizThemeController::class, 'getQuizThemesAction']);
        });

        Route::prefix('/theme')->group(function () {
            Route::get('/get-by-id/{quizId}', [AdminQuizThemeController::class, 'getQuizThemeByIdAction']);
            Route::post('/create', [AdminQuizThemeController::class, 'createAction']);
            Route::put('/update/{id}', [AdminQuizThemeController::class, 'updateAction']);
            Route::delete('/delete/{id}', [AdminQuizThemeController::class, 'deleteAction']);
        });
    });
});

