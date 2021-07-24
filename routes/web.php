<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('questiontype', \App\Http\Controllers\QuestionTypeController::class);

    Route::resource('exercise', \App\Http\Controllers\ExerciseController::class);
    Route::get('exercise/{exercise}/delete', '\App\Http\Controllers\ExerciseController@delete')->name('exercise.delete');

    Route::resource('answer', \App\Http\Controllers\AnswerController::class)->except('index');
    Route::get('answer/{answer}/delete', '\App\Http\Controllers\AnswerController@delete')->name('answer.delete');
});
