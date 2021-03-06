<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TasksController;
use App\Http\Controllers\Api\ProjectsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/authenticate',[AuthController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('projects',ProjectsController::class);
    Route::apiResource('tasks',TasksController::class)->except(['index','show']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
