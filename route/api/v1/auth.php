<?php

use App\Http\Controllers\Api\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Api\Admin\User\AdminUserController;
use Illuminate\Support\Facades\Route;

/** Префикс admin/auth */

Route::post('/sign-up', [AdminAuthController::class, 'signUpAction']);
Route::post('/sign-in', [AdminAuthController::class, 'signInAction']);

Route::group(['middleware' => ['auth:admin', 'scope:admin']], function () {
    Route::get('/user', [AdminUserController::class, 'userAction']);
    Route::post('/logout', [AdminAuthController::class, 'logoutAction']);
});
