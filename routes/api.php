<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('exercise', App\Http\Controllers\Api\ExerciseController::class)->names([
    'index'   => 'api.exercise.index',
    'store'   => 'api.exercise.store',
    'show'    => 'api.exercise.show',
    'update'  => 'api.exercise.update',
    'destroy' => 'api.exercise.destroy',
]);

Route::apiResource('answer', App\Http\Controllers\Api\AnswerController::class)->names([
    'index'   => 'api.answer.index',
    'store'   => 'api.answer.store',
    'show'    => 'api.answer.show',
    'update'  => 'api.answer.update',
    'destroy' => 'api.answer.destroy',
]);
