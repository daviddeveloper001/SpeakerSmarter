<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('levels', App\Http\Controllers\LevelController::class);

Route::resource('lessons', App\Http\Controllers\LessonController::class);

Route::resource('categories', App\Http\Controllers\CategoryController::class);


Route::resource('levels', App\Http\Controllers\LevelController::class);

Route::resource('lessons', App\Http\Controllers\LessonController::class);

Route::resource('categories', App\Http\Controllers\CategoryController::class);
