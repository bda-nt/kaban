<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(StatusController::class)->group(function () {
    Route::prefix('/statuses')->group(function () {
        Route::get('/', 'index');
    });
});

Route::controller(ProjectController::class)->group(function () {
    Route::prefix('/projects')->group(function () {
        Route::get('/', 'index');
    });
});

Route::controller(TeamController::class)->group(function () {
    Route::prefix('/teams')->group(function () {
        Route::get('/', 'index');
    });
});

Route::controller(UserController::class)->group(function () {
    Route::prefix('/users')->group(function () {
        Route::get('/', 'index');
    });
});

Route::controller(TaskController::class)->group(function () {
    Route::prefix('/tasks')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{taskId}', 'show')->whereNumber('taskId');
        Route::put('/{taskId}', 'update')->whereNumber('taskId');
        //Route::delete('/{taskId}', 'destroy')->whereNumber('taskId');
    });
});
