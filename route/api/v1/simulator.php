<?php

use App\Http\Controllers\Api\Admin\Simulator\AdminSimulatorController;
use App\Http\Controllers\Api\Admin\Simulator\AdminSimulatorLanguageWordController;
use Illuminate\Support\Facades\Route;

/** Префикс admin */


Route::middleware(['auth:admin', 'scope:admin'])->group(function () {

    Route::prefix('/simulators')->group(function () {
        Route::get('/get', [AdminSimulatorController::class, 'getSimulatorsAction']);
    });

    Route::prefix('/simulator')->group(function () {
        Route::get('/get-by-id/{simulatorId}', [AdminSimulatorController::class, 'getSimulatorByIdAction']);
        Route::post('/create', [AdminSimulatorController::class, 'createAction']);
        Route::post('/update/{id}', [AdminSimulatorController::class, 'updateAction']);
        Route::delete('/delete/{id}', [AdminSimulatorController::class, 'deleteAction']);

        Route::prefix('/language/words')->group(function () {
            Route::get('/get', [AdminSimulatorLanguageWordController::class, 'getSimulatorsLanguageWordsAction']);
        });

        Route::prefix('/language/word')->group(function () {
            Route::get('/get-by-id/{wordId}', [AdminSimulatorLanguageWordController::class, 'getSimulatorLanguageWordByIdAction']);
            Route::post('/create', [AdminSimulatorLanguageWordController::class, 'createAction']);
            Route::post('/update/{id}', [AdminSimulatorLanguageWordController::class, 'updateAction']);
            Route::delete('/delete/{id}', [AdminSimulatorLanguageWordController::class, 'deleteAction']);
        });
    });
});
